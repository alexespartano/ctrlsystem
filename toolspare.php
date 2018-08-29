<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "TOOL"){
 header("location: index.php");
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Spare Parts</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
  <script script type="text/javascript" src="js/tspare.js"></script>
  <script script type="text/javascript" src="js/totop.js"></script>
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
                 <li class="dropdown">
                    <a href="assets.php" class="dropdown-toggle" data-toggle="dropdown" role="button">CTRL OF ASSETS</a>
                    <ul class="dropdown-menu">
                    	<li><a href="assets.php">VIEW/MODIFY</a></li>
                        <li><a href="peradd.php">ADD</a></li>
                        <li><a href="perdel.php">DELETE</a></li>
                    </ul>
                </li>
                 <li><a href="rec.php">RECORDS</a></li>
                 <li><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
                <li><a href="TPMVIEWER.php">TPM</a></li>
                 <li id="highlightbox"><a href="spareparts.php">SPARE PARTS</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->

<!--FILTERS-->
<form action="#">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-1">
        <select id="Input1" placeholder="UBICATION" title="SEARCH FOR UBICATION"  style="font-size: 10px;">
                            <option value="">UBICATION</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = "SELECT UBI FROM CTRLSYSTEM.TSPARE GROUP BY UBI";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }

                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
                        </select>
            <br>
            <br>
           <select id="Input2" placeholder="BRAND" title="SEARCH FOR BRAND"  style="font-size: 10px;">
                            <option value="">BRAND</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = "SELECT BRAND FROM CTRLSYSTEM.TSPARE GROUP BY BRAND";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }

                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
                        </select>
        </div>
        <div class="col-sm-3">
      
                        <select id="Input3" placeholder="ITEM" title="SEARCH FOR ITEM"  style="font-size: 10px;">
                            <option value="">ITEM</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = 'SELECT "DESC" FROM CTRLSYSTEM.TSPARE GROUP BY "DESC"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }

                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
                        </select>
            <br>
            <br>
             <select id="Input4" placeholder="MADE BY"  style="font-size: 10px;">
                <option value="">MADE BY</option>
                  <?php
                    require_once('connectsys.php');
                    $query = "SELECT MARC FROM CTRLSYSTEM.TSPARE GROUP BY MARC";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }

                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>

             </select>
              <select id="Input5" placeholder="STOCK" style="font-size: 10px;">
                <option value="">STOCK</option>
                 <option value="SI">SI</option>
                 <option value="NO">NO</option>
            </select>
        <select  id="Input7" placeholder="MODEL" title="SEARCH FOR MODEL"  style="font-size: 9px;">
            <option value="">MODEL</option>
            <?php
                 require_once('connectsys.php');
                    $query = "SELECT MODEL FROM CTRLSYSTEM.TSPARE GROUP BY MODEL";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
            ?>
        </select>
      </div>
      <div class="col-sm-1"></div>
         <div class="col-sm-3">
         <p><button onClick="window.location.reload()" title="Refresh all the web Page and update sql" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i>REFRESH</button>    <button onclick="clear(this.form);" class="btn btn-default" type="reset" title="Clear filters"><i class="glyphicon glyphicon-trash"></i>Clear</button>    <button onclick="tspare()" class="btn btn-default" title="Execute filters"><i class="glyphicon glyphicon-search"></i>Submit</button></p>
         <br><br>
         &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="#" onclick="javascript:add();"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-plus-sign"></i></button></a> &nbsp;&nbsp;&nbsp;<a href="#" onclick="javascript:del();"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-remove-sign"></i></button></a>
       </div>
    </div></form><!--ENDFILTERS-->

<div id="menuoptions">
  <!--CONTAINER-->
<div class="row" id="tablecontainer">
  <div class="col-sm-12">
    <table class="table table-bordered" id="myTable" style="font-size: 10px;">
      <thead>
        <tr>
           <th>MODIFY</th>
            <th>UBICATION</th>
            <th>BRAND</th>
           <th>ITEM</th>
           <th>MADE BY</th>
           <th>QUANTITY</th>
           <th>MIN</th>
           <th>MAX</th>
           <th>STOCK</th>
           <th>MODEL</th>
        </tr>
      </thead>
            <tbody>
            <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "ID", "UBI", "BRAND" ,"DESC" ,"MARC"  ,"QUANTI", "MIN", "MAX", "STOCK", "MODEL", "LINK" FROM CTRLSYSTEM.TSPARE ORDER BY "DESC"';
             $stmt = db2_prepare($db2, $query); 
      if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
        	
        	if($row[5] <= $row[6] && $row[8]=="SI"){
        		//rojo
        		echo '<tr bgcolor="#ff7f7f">';
        	}else{
        	if($row[5] > $row[7]  && $row[8]=="SI"){
        		//verde
        		echo '<tr bgcolor="#88ff84">';
        	}
        	else{
        		echo '<tr>';
        	}
        }
            echo '<td align="center"><a href="#" onclick="javascript:modi('.$row[0].');"><i class="glyphicon glyphicon-cog" style="font-size:1.5em;"></i></a></td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td><td align="center">' .
            $row[7] . '</td><td align="center">' .
            $row[8] . '</td><td align="center"><a href="https://'.$row[10].'" target="_blank">'.
            $row[9] . '</a></td>';
            echo '</tr>';
            } 
            echo '</table>';
        }
            db2_close($db2);  
            
            ?>
            <a href="#" class="scrollup"><p align="center"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-chevron-up"></i></button></p></a>
            </tbody>
    </table>
  </div>

</div><!--ENDCONATINER-->

<script>
function modi(id){
  win2 = window.open('tsparemod.php?id='+id,'Modifica_U','scrollbars=no,top=220,left=500,width=480,height=380');  
}
function add(){
 win3 = window.open('tspareadd.php','Modifica_U','scrollbars=no,top=220,left=500,width=750,height=480'); 
}
function del(){
 win3 = window.open('tsparedel.php','Modifica_U','scrollbars=no,top=220,left=500,width=700,height=200'); 
}
</script>
</div>
</body>
</html>
