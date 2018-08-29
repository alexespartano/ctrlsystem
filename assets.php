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
<title>assets</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script script type="text/javascript" src="js/filters2.js"></script>
  <script script type="text/javascript" src="js/totop.js"></script>
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
                    	<li id="highlightbox"><a href="assets.php">VIEW/MODIFY</a></li>
                        <li><a href="peradd.php">ADD</a></li>
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

<!--FILTERS-->
<form action="#">
    <div class="row" id="FILTERSBOX">
    	<div class="col-sm-2">
    		</label><input type="text" id="Input1" placeholder="S/N" title="SEARCH FOR S/N" style="font-size: 9px;" autofocus>
            <br>
            <br>
            <select id="Input2" placeholder="TYPE" title="SEARCH FOR TYPE"  style="font-size: 9px;">
                <option value="">TYPE</option>
                <?php
                    require_once('connectsys.php');
                    $query = "SELECT TYPE FROM CTRLSYSTEM.INV GROUP BY TYPE";
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
        <div class="col-sm-2">
      
                        <select id="Input3" placeholder="AREA" title="SEARCH FOR AREA"  style="font-size: 9px;">
                            <option value="">AREA</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = "SELECT AREA FROM CTRLSYSTEM.INV GROUP BY AREA";
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
             <select id="Input4" placeholder="BRAND" title="SEARCH FOR BRAND"  style="font-size: 9px;">
                <option value="">BRAND</option>
                  <?php
                    require_once('connectsys.php');
                    $query = "SELECT BRAND FROM CTRLSYSTEM.INV GROUP BY BRAND";
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
        <div class="col-sm-2">
            <select id="Input6" placeholder="COST CENTER" title="SEARCH FOR COST CENTER"  style="font-size: 9px;">
                <option value="">COST CENTER</option>
                 <?php
                    require_once('connectsys.php');
                    $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV GROUP BY "COST CENTER"';
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
             <select id="Input7" placeholder="STATUS" title="SEARCH FOR STATUS AS=ASIGNADO, AL=ALMACEN"  style="font-size: 9px;">
                 <option value="">STATUS</option>
                 <option value="AS">ASIGNADO</option>
                 <option value="AL">ALMACENADO</option>
            </select>
        </div>
        <div class="col-sm-2">
        <select  id="Input5" placeholder="RESPONSIBLE" title="SEARCH FOR RESPONSIBLE"  style="font-size: 9px;">
            <option value="">RESPONSIBLE</option>
            <?php
                 require_once('connectsys.php');
                    $query = "SELECT RESPONSIBLE FROM CTRLSYSTEM.INV GROUP BY RESPONSIBLE";
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
        <select  id="Input8" placeholder="ING" title="SEARCH FOR ING RESPONSIBLE"  style="font-size: 9px;">
            <option value="">ING RESPO.</option>
            <option value="ING1">ING1</option>
            <option value="ING2">ING2</option>
            <option value="ING3">ING3</option>
            <option value="N/A">N/A</option>
        </select>
        <br>
        <br>
            </div>
         <div class="col-sm-3">
         <p><button onClick="window.location.reload()" id="submitbutton" title="Refresh all the web Page and update sql"><i class="glyphicon glyphicon-refresh"></i>REFRESH</button><button onclick="clear(this.form);"  id="submitbutton" type="reset" title="Clear filters"><i class="glyphicon glyphicon-trash"></i>Clear</button>    <button onclick="filter2()"  id="submitbutton" title="Execute filters"><i class="glyphicon glyphicon-search"></i>Submit</button></p>
         <!--COUNTER-->
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-1" style=" color:rgb(204,204,204);">Items:<p id="con"></p></div>
</div><!--COUNTER--> 
    	</div>
    </div></form><!--ENDFILTERS-->

<!--CONTAINER-->
<div class="row" id="tablecontainer">
	<div class="col-sm-12">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
                	<th>MODIFY</th>
					<th>LOCATION</th>
                    <th>AREA</th>
                    <th>BRAND</th>
                    <th>TYPE</th>
                    <th>S/N</th>
                    <th>MT</th>
                    <th>MODEL</th>
                    <th>RESPONSIBLE</th>
                    <th>STATUS</th>
                    <th>COMMENTS</th>
                    <th>PHYSICAL INV.</th>
                    <th>DATE OF PURCHASE</th>
                    <th>DATE OF DEPRECIATION</th>
                    <th>COST CENTER</th>
                    <th>No.INVER.</th>
                    <th>RFID S/N</th>
                    <th>DATE RFID</th>
                    <th>ING</th>
				</tr>
			</thead>
            <tbody>
            <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "LOCATION", "AREA", "BRAND", "TYPE", "S/N", "MT", "MODEL", "RESPONSIBLE", "STAT", "COMMENTS", "PHYSICAL INV", "DATE OF PURCHASE", "DATE OF DEPRECIATION", "COST CENTER", "NUM INVER", "RFID S/N", "DATE RFID", "ING", "ID" FROM CTRLSYSTEM.INV ORDER BY "LOCATION"';
             $stmt = db2_prepare($db2, $query); 
			if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
            echo '<tr><td align="center"><a href="#" onclick="javascript:modi('.$row[18].');"><i class="glyphicon glyphicon-cog" style="font-size:1.5em;"></i></a></td><td align="center">' .
            $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td><td align="center">' .
            $row[7] . '</td><td align="center">' .
            $row[8] . '</td><td align="center">' .
            $row[9] . '</td><td align="center">' .
            $row[10] . '</td><td align="center">' .
            $row[11] . '</td><td align="center">' .
            $row[12] . '</td><td align="center">' .
            $row[13] . '</td><td align="center">' .
            $row[14] . '</td><td align="center">' .
            $row[15] . '</td><td align="center">' .
            $row[16] . '</td><td align="center">' .
            $row[17] . '</td>';
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
	win2 = window.open('mod.php?id='+id,'Modifica_U','scrollbars=no,top=220,left=500,width=580,height=450');	
}
</script>
</body>
</html>
