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
$sample = $_POST['sample'];
$mesure = $_POST['mesure'];
$frec;

$AREA;
$BRAND;
$TYPE;
$ING;
//query to get the frecuency of mantainance of the item submited
require_once('connectsys.php');
$query = 'SELECT "FREC","AREA","BRAND","TYPE","ING" FROM CTRLSYSTEM.TINV WHERE "ID"='.$id;
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
                    $TYPE = $row[3];
                    $ING = $row[4];
                    }   
                }
//format of the date for later UPDATE
$date = new DateTime();
$date_actual = new DateTime();
$date_actual = $date->format('d/m/y');
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
$query ='INSERT INTO CTRLSYSTEM.TRECMS ("AREA","BRAND","ASPMEDI","DATE","TAM","ING","MEDIC","ID") VALUES ('."'$AREA'".','."'$BRAND'".','."'$TYPE'".','."'$date_actual'".','."'$sample'".','."'$ING'".','."'$mesure'".',0)';
$stmt = db2_prepare($db2,$query);
if($stmt){
    $result=db2_execute($stmt);
    if(!$result){
        echo "Error Messange".db2_stmt_errormsg($stmt);
    }
}
header("location:tesdmm.php");
?>
