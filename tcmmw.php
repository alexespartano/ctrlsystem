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

<?php
$id = $_POST['identification'];
$comms = $_POST['comm'];
$frec;
$AREA;
$BRAND;
$SN;
$ING;
//query to get the frecuency of mantainance of the item submited
require_once('connectsys.php');
$query = 'SELECT "FREC","AREA","BRAND","SN","ING" FROM CTRLSYSTEM.TINV WHERE "ID"='.$id;
$stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $frec = $row[0];
                    $AREA = $row[1];
                    $BRAND = $row[2];
                    $SN = $row[3];
                    $ING = $row[4];
                    }   
                }
//format of the date for later UPDATE
$date = new DateTime();
date_add($date,date_interval_create_from_date_string(strval($frec)." months"));
$date =  $date->format('d/m/y');
///update for the new date
 require_once('connectsys.php');
$query = 'UPDATE CTRLSYSTEM.TINV SET "MATTO" = '."'$date'".' WHERE "ID"='.$id;
$stmt = db2_prepare($db2,$query);
if($stmt){
    $result=db2_execute($stmt);
    if(!$result){
        echo "Error Messange".db2_stmt_errormsg($stmt);
    }
}

///INSERT INTO RECORD TABLE OF CHECKOUT MAINTENANCE
require_once('connectsys.php');
$query ='INSERT INTO CTRLSYSTEM.TRECRP ("AREA","BRAND","NOM","DATE","COMMNETS","ING","ID") VALUES ('."'$AREA'".','."'$BRAND'".','."'$SN'".','."'$date'".','."'$comms'".','."'$ING'".',0)';
$stmt = db2_prepare($db2,$query);
if($stmt){
    $result=db2_execute($stmt);
    if(!$result){
        echo "Error Messange".db2_stmt_errormsg($stmt);
    }
}
header("location:tcmm.php");
?>
