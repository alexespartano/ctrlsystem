<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "IT"){
 header("location: index.php");
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADD</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
</head>


<body background="img/Background-Picture-Html.jpg">

<!--NAVMENU-->
<div class="row" id="header">
<nav class="navbar navbar-inverse" id="nav">
        <button class="navbar-toggle" data-toggle="collapse" data-target="#a" id="toggle">
            ☰
        </button>
        <div class="navbar-header">
        	<a class=" navbar-brand"><img src="img/ibm-logo-png-transparent-background.png" width="50" height="20"></a>
            <a href="main.php" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
                <li><a href="main.php">HOME</a></li>
                 <li class="dropdown">
                    <a href="assets.php" class="dropdown-toggle" data-toggle="dropdown" role="button">CTRL OF ASSETS</a>
                    <ul class="dropdown-menu">
                    	<li><a href="assets.php">VIEW/MODIFY</a></li>
                        <li id="highlightbox"><a href="peradd.php">ADD</a></li>
                        <li><a href="perdel.php">DELETE</a></li>
                    </ul>
                </li>
                 <li><a href="rec.php">RECORDS</a></li>
                 <li><a href="service.php">SERVICES</a></li>
                 <li><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
                <li><a href="tools.php">TOOLS</a></li>
                <li><a href="TPMVIEWER.php">TPM</a></li>
                 <li><a href="spareparts.php">SPARE PARTS</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<form action="addwrite.php" method="post">
    <!--ROW1-->
<div id="menuoptions">
	<div class="row"> 
        <div class="col-sm-4"></div>
           <div class="col-sm-1">
            
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">LOCATION:</p>
        </div>
 		<div class="col-sm-2">
  <input list="LOCATION" name="LOCATION"   class="form-control"  title="Double click to display all current options" maxlength="20" autofocus>
  <datalist id="LOCATION">
                    <?php
                    //query to generete all the options on the datalist
            require_once('connectsys.php');
            $query = 'SELECT "LOCATION" FROM CTRLSYSTEM.INV GROUP BY "LOCATION"';
                    $stmt = db2_prepare($db2, $query);
			if($stmt){
                $result = db2_execute($stmt);
                if(!$result){
                    echo "Error Messange".db2_stmt_errormsg($stmt);
                    exit;
                }        
        while($row = db2_fetch_array($stmt)){
            echo '<option value="'. $row[0] .'">';
            }	
        }
            ?>
            </datalist>
            <br>
 		</div>
	</div>
</div> <!--ENDROW1-->
    <!--ROW2-->




<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">AREA</p>
            </div>

            <div class="col-sm-2">
            <input list="AREA" name="AREA"   class="form-control"  title="Double click to display all current options" maxlength="15">
                <datalist id="AREA">
                        <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "AREA" FROM CTRLSYSTEM.INV GROUP BY "AREA"';
                        $stmt =db2_prepare($db2, $query);
                        if($stmt){        
                            $result = db2_execute($stmt);
                            if(!$result){
                                echo "Error Messange ".db2_stmt_errormsg($stmt);
                            }
                    while($row = db2_fetch_array($stmt)){
                        echo '<option value="'. $row[0] .'">';
                        }   
                    }
                    ?>
                    </datalist>
                    <br>
        </div>
    </div>
</div><!--ENDROW2-->

    <!--ROW3-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">BRAND</p>
        </div>
        <div class="col-sm-2">
                 <input list="BRAND" name="BRAND"   class="form-control"  title="Double click to display all current options" maxlength="15">
                    <datalist id="BRAND">                   
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php'); 
                    $query = 'SELECT "BRAND" FROM CTRLSYSTEM.INV GROUP BY "BRAND"';
                    $stmt =db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }        
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
                    </datalist>
                    <br>
        </div> 
    </div>
</div><!--ENDROW3-->


    <!--ROW4-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">TYPE</p>
        </div>
        <div class="col-sm-2">
                         <input list="TYPE" name="TYPE"   class="form-control"  title="Double click to display all current options" maxlength="12">
                         <datalist id="TYPE">
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "TYPE" FROM CTRLSYSTEM.INV GROUP BY "TYPE"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result=db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange".db2_stmt_errormsg($stmt);
                        }        
                while($row =db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
                    </datalist>
                    <br>
        </div>
    </div>
</div><!--ENDROW4-->

    <!--ROW5-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">S/N</p>
        </div>
        <div class="col-sm-2">
             
        <input name="SERIAL"   class="form-control"  title="Double click to display all current options" maxlength="25">
        </div>
    </div>
</div><!--ENDROW5-->

    <!--ROW6-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">MODEL</p>
        </div>
        <div class="col-sm-2">
             <input list="MODEL" name="MODEL"   class="form-control"  title="Double click to display all current options" maxlength="12">
                    <datalist id="MODEL">
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "MODEL" FROM CTRLSYSTEM.INV GROUP BY "MODEL"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){        
                        $result = db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }
                while($row =db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
                    </datalist>
                    <br>
        </div>
    </div>
</div><!--ENDROW6-->


 <!--ROW6-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">MT</p>
        </div>
        <div class="col-sm-2">
             <input list="MT" name="MT"   class="form-control"  title="Double click to display all current options" maxlength="10">
                    <datalist id="MT">
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "MT" FROM CTRLSYSTEM.INV GROUP BY "MT"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){        
                        $result = db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }
                while($row =db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
                    </datalist>
                    <br>
        </div>
    </div>
</div><!--ENDROW6-->

<!--ROW7-->
<div id="menuoptions">
	<div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">RESPONSIBLE</p>
        </div>
 		<div class="col-sm-2">
                    <input list="RESPONSIBLE" name="RESPONSIBLE"   class="form-control"  title="Double click to display all current options" maxlength="15">
                    <datalist id="RESPONSIBLE">
                    <?php
                    //query to generete all the options on the datalist
            require_once('connectsys.php');
            $query = 'SELECT "RESPONSIBLE" FROM CTRLSYSTEM.INV GROUP BY "RESPONSIBLE"';
            $stmt =db2_prepare($db2, $query);
			if($stmt){        
                $result=db2_execute($stmt);
                if(!$result){
                    echo "Error Messange". db2_stmt_errormsg($stmt);
                }
        while($row = db2_fetch_array($stmt)){
            echo '<option value="'. $row[0] .'">';
            }	
        }
            ?>
            </datalist>
            <br>
 		</div>
	</div>
</div><!--ENDROW7-->

<!--ROW8-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">STATUS</p>
        </div>
        <div class="col-sm-2">
            <select name="STAT" class="form-control" title="Click to display all current options">
                  <option value=""> </option>
                        <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "STAT" FROM CTRLSYSTEM.INV GROUP BY "STAT"';
                        $stmt =db2_prepare($db2, $query);
                        if($stmt){        
                            $result=db2_execute($stmt);
                            if(!$result){
                                echo "Error Messange". db2_stmt_errormsg($stmt);
                            }
                    while($row = db2_fetch_array($stmt)){
                        echo '<option value="'. $row[0] .'">'.$row[0].'</option>';
                        }   
                    }
                    ?>
                    </select>
                    <br>
        </div>
    </div>
</div><!--ENDROW8-->

<!--ROW9-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">COMMENTS</p>
        </div>
        <div class="col-sm-2">
             <input name="COMMENT" class="form-control" maxlength="28">
        </div>
    </div>
</div><!--ENDROW9-->

<!--ROW10-->
<div id="menuoptions"> 
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">PURCHASE DATE</p>
        </div>
        <div class="col-sm-2">
             <input type="date" id="txtfecha" name="PUDATE" class="form-control" value="<?php echo date("j-n-Y");?>">  
             
        </div>
    </div>
</div><!--ENDROW10-->

<!--ROW11-->


<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">COST CENTER</p>
        </div>
        <div class="col-sm-2">
             <input list="COST CENTER" name="COSTCENTER"   class="form-control"  title="Double click to display all current options" maxlength="8">
                    <datalist id="COST CENTER">
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV GROUP BY "COST CENTER"';
                    $stmt =db2_prepare($db2, $query);
                    if($stmt){        
                        $result=db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
                    </datalist>
                    <br>
        </div>
    </div>
</div><!--ENDROW11-->

<!--ROW12-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">INVERSION No.</p>
        </div>
        <div class="col-sm-2">
             <input name="INVERNUM" class="form-control" maxlength="15">
        </div>
    </div>
</div><!--ENDROW12-->

<!--ROW8-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">ING</p>
        </div>
        <div class="col-sm-2">
            <select name="ING" class="form-control" title="Click to display all current options">
                        <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "ING" FROM CTRLSYSTEM.INV GROUP BY "ING"';
                        $stmt =db2_prepare($db2, $query);
                        if($stmt){        
                            $result=db2_execute($stmt);
                            if(!$result){
                                echo "Error Messange". db2_stmt_errormsg($stmt);
                            }
                    while($row = db2_fetch_array($stmt)){
                        echo '<option value="'. $row[0] .'">'.$row[0].'</option>';
                        }   
                    }
                    ?>
                    </select>
                    <br>
        </div>
    </div>
</div><!--ENDROW8-->

<!--ROW10-->
<div id="menuoptions"> 
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">MATTO DATE</p>
        </div>
        <div class="col-sm-2">
             <input type="date" name="FECHAMTTO" class="form-control" min="2000-01-01" max="3000-12-31">  
             
        </div>
    </div>
</div><!--ENDROW10-->





<!--ROW13-->
<div id="menuoptions">
	<div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1">
            <p align="center" style="color: rgb(204,204,204); font-style:italic; font-weight: bold;">RFID S/N</p>
            </div>
	        <div class="col-sm-2">
             <input type="text" name="RFIDSN" class="form-control"  title="Double click to display all current options" maxlength="12">
                    <br>  
        </div>
    </div>
</div><!--ENDROW13-->

<!--ROW14-->
<div id="menuoptions">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-2 boxcol boxes">
            <br>
             <input type="submit" name="submit" class="form-control" value="SUBMIT">
             <br>
        </div>
    </div>
</div><!--ENDROW14-->
</form>
</body>
</html>
