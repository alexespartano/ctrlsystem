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
$ing  = strtoupper($_SESSION['username']);
$date = strtoupper($_POST['date']);
$sn   = strtoupper($_POST['serial']);
$maty   = strtoupper($_POST['mty']);
$mod   = strtoupper($_POST['mode']);
$loca = strtoupper($_POST['location']);
$area = strtoupper($_POST['area']);
$brand= strtoupper($_POST['brand']);
$type = strtoupper($_POST['type']);
$des  = strtoupper($_POST['description']);
$divi = strtoupper($_POST['div']);
$num = 0;

if($type=="CPU"){
$up=1;
}else{
$up=0;
}

 require_once('connectsys.php');
 			$queryid = "SELECT ID FROM CTRLSYSTEM.REC ORDER BY ID DESC LIMIT 1";
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







	$query = 'INSERT INTO CTRLSYSTEM.REC ("DIVISION", "DATE", "LOCATION", "AREA", "BRAND", "TYPE", "SN","MT","MODEL", "ING", "DESCRI","PHYSVERI","UPDATES", "ID") VALUES ('."'$divi'".','."'$date'".','."'$loca'".','."'$area'".','."'$brand'".','."'$type'".','."'$sn'".','."'$maty'".','."'$mod'".','."'$ing'".','."'$des'".',1,'."'$up'".','."'$num'".')';
         $stmt = db2_prepare($db2, $query);
 			if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
            }
            db2_close($db2);

if($up==1 || $type=="IMPRESORA"){
require_once('connectsys.php');
	$nummfs = 0; 
	$queryid = "SELECT ID FROM CTRLSYSTEM.RECMFS ORDER BY ID DESC LIMIT 1";
			$stmt = db2_prepare($db2, $queryid);
 			if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
              while($row = db2_fetch_array($stmt)){
              	$nummfs=$row[0] + 1;
                }
            }
	$query = 'INSERT INTO CTRLSYSTEM.RECMFS ("DIVISION", "DATE", "LOCATION", "AREA", "BRAND", "TYPE", "SN","MT","MODEL", "ING", "DESCRI","PHYSVERI","UPDATES", "ID") VALUES ('."'$divi'".','."'$date'".','."'$loca'".','."'$area'".','."'$brand'".','."'$type'".','."'$sn'".','."'$maty'".','."'$mod'".','."'$ing'".','."'$des'".',1,'."'$up'".','."'$nummfs'".')';
	  $stmt = db2_prepare($db2, $query);
 			if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
            }
            db2_close($db2);
}
	echo' <script>window.close()</script> ';
?>