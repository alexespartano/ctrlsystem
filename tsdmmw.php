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
$enc;
if(isset($_POST['enc'])){$enc=$_POST['enc'];}else{$enc="";}
$uno;
if(isset($_POST['uno'])){$uno=$_POST['uno'];}else{$uno="";}
$dos;
if(isset($_POST['dos'])){$dos=$_POST['dos'];}else{$dos="";}
$tres;
if(isset($_POST['tres'])){$tres=$_POST['tres'];}else{$tres="";}
$cuatro;
if(isset($_POST['cuatro'])){$cuatro=$_POST['cuatro'];}else{$cuatro="";}
$cinco;
if(isset($_POST['cinco'])){$cinco=$_POST['cinco'];}else{$cinco="";}


$frec;
$AREA;
$BRAND;
$TYPE;
$SN;
$ING;
//query to get the frecuency of mantainance of the item submited
require_once('connectsys.php');
$query = 'SELECT "FREC","AREA","BRAND","TYPE","SN","ING" FROM CTRLSYSTEM.TINV WHERE "ID"='.$id;
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
                    $SN = $row[4];
                    $ING = $row[5];
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
$query ='INSERT INTO CTRLSYSTEM.TRECCIE ("AREA","BRAND","TYPE","DATE","SN","ING","ENC","PRI","SEC","TER","CUA","QUI","ID") VALUES ('."'$AREA'".','."'$BRAND'".','."'$TYPE'".','."'$date'".','."'$SN'".','."'$ING'".','."'$enc'".','."'$uno'".','."'$dos'".','."'$tres'".','."'$cuatro'".','."'$cinco'".',0)';
$stmt = db2_prepare($db2,$query);
if($stmt){
    $result=db2_execute($stmt);
    if(!$result){
        echo "Error Messange".db2_stmt_errormsg($stmt);
    }
}
header("location:tsdmm.php");
?>
