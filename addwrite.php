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
            header("location: add.php");
?>