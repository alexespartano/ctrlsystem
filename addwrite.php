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
<?php
//catch all the data posted on the variables.
$loc = strtoupper($_POST['LOCATION']);
$area =strtoupper($_POST['AREA']);
$brand = strtoupper($_POST['BRAND']);
$type = strtoupper($_POST['TYPE']);
$sn =  strtoupper($_POST['SERIAL']);
$model =  strtoupper($_POST['MODEL']);
$mt =  strtoupper($_POST['MT']);
$respo =  strtoupper($_POST['RESPONSIBLE']);
$stat =  strtoupper($_POST['STAT']);
$comment =  strtoupper($_POST['COMMENT']);
$dateof =  strtoupper($_POST['PUDATE']);
$cost =  strtoupper($_POST['COSTCENTER']);
$invernum =  strtoupper($_POST['INVERNUM']);
$inge = strtoupper($_POST['ING']);
$femtto = strtoupper($_POST['FECHAMTTO']);
$rfid =  strtoupper($_POST['RFIDSN']);
$invdate = date("y-m-d");
$invdate = str_replace('-','/',$invdate);
$rfiddate = $invdate;
$dateof =  str_replace('/','-',$dateof);
$enddate = date('m-d-y',strtotime( "+4 year",strtotime($dateof)));
$departure = $enddate;
$departure = str_replace('-','/',$departure);
$dateof = str_replace('-','/',$dateof);
$femtto =  str_replace('-','/',$femtto);
$femtto = substr($femtto,2);

    $num =0;
 require_once('connectsys.php');
            $queryid = "SELECT ID FROM CTRLSYSTEM.INV ORDER BY ID DESC LIMIT 1";
            $stmt = db2_prepare($db2, $queryid);
            if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
              while($row = db2_fetch_array($stmt)){
                $num=$row[0] + 1;
                }
            }

            require_once('connectsys.php');
			//this complete the inset of the asset
          $query = 'INSERT INTO CTRLSYSTEM.INV ("DIVISION", "LOCATION", "AREA", "BRAND", "TYPE", "S/N", "MODEL", "MT", "RESPONSIBLE", "STAT", "COMMENTS", "PHYSICAL INV", "DATE OF PURCHASE", "DATE OF DEPRECIATION", "COST CENTER", "NUM INVER", "RFID S/N", "DATE RFID", "ING", "FECHA MATTO", "FRECUENCY MTTO", "NOM", "ID") VALUES ('."'IT'".','."'$loc'".','."'$area'".','."'$brand'".','."'$type'".','."'$sn'".','."'$model'".','."'$mt'".','."'$respo'".','."'$stat'".','."'$comment'".','."'$invdate'".','."'$dateof'".','."'$departure'".','."'$cost'".','."'$invernum'".','."'$rfid'".','."'$rfiddate'".','."'$inge'".','."'$femtto'".',6,'."'NOT APPLY'".','.$num.')';
            
            $stmt = db2_prepare($db2, $query);
            if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
            }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADDED</title>
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
            <ul class="nav navbar-nav pull-right">
                <li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
                <li><a href='logout.php'>Logout</a></li>                </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<!--CONTENTOPTIONS-->
<div class="container" style="padding-top:40px;">
<div class="row boxcol">
 <div class="col-sm-12">
 	<table class="table table-responsive table-condensed" id="modtable">
			<thead>
				<tr>
                	<th colspan="2">ADDED</th>
				</tr>
			</thead>
            <form action="#" method="post">
            <tr>
            	<td>
                	<label>LOCATION:
                   <?php 
					echo $loc ;
					?></label>
                </td>
                <td>
              		<label>AREA:
                    <?php
					echo $area;
					?></label>
                   
                </td>
            </tr>
            <tr>
            	<td>
                	<label>BRAND:
                    <?php
					echo $brand;
					?></label>
                </td>
                <td>
                	<label>TYPE: <?php 
					echo $type;
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>S/N: <?php 
					  echo $sn;
					?></label>
                </td>
                <td>
                	<label>MODEL: <?php 
					  echo $model;
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
              		<label>RESPONSIBLE:<?php 
							echo $respo;	  
							?></label>
                </td>
            	<td>
                	<label>STATUS:<?php 
					  echo $stat;
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>PHYSICAL INVENTORY:<?php 
					  echo $invdate;
					?></label>
                </td>
                <td>
                	<label>RFID S/N:<?php 
					  echo $rfid;
					?></label>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<label>COMMENTS</label><br><label><?php 
					echo $comment;
					?></label>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<a href="add.php">Go Back Window</a>
              	</td>
            </tr>
            </form>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>

