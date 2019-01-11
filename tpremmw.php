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
$c0;
if(isset($_POST['c0'])){$c0="X";}else{$c0="";}
$c1;
if(isset($_POST['c1'])){$c1="X";}else{$c1="";}
$c2;
if(isset($_POST['c2'])){$c2="X";}else{$c2="";}
$c3;
if(isset($_POST['c3'])){$c3="X";}else{$c3="";}
$c4;
if(isset($_POST['c4'])){$c4="X";}else{$c4="";}
$c5;
if(isset($_POST['c5'])){$c5="X";}else{$c5="";}
$c6;
if(isset($_POST['c6'])){$c6="X";}else{$c6="";}
$c7;
if(isset($_POST['c7'])){$c7="X";}else{$c7="";}
$c8;
if(isset($_POST['c8'])){$c8="X";}else{$c8="";}
$c9;
if(isset($_POST['c9'])){$c9="X";}else{$c9="";}

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
$query ='INSERT INTO CTRLSYSTEM.TRECMIE ("AREA","BRAND","TYPE","DATE","SN","ING","FUNC","LIMYRE","INTCA","ENGLUB","AJBA","CCTR","RESJACK","DREAGU","CONPT","MFN","ID") VALUES ('."'$AREA'".','."'$BRAND'".','."'$TYPE'".','."'$date'".','."'$SN'".','."'$ING'".','."'$c0'".','."'$c1'".','."'$c2'".','."'$c3'".','."'$c4'".','."'$c5'".','."'$c6'".','."'$c7'".','."'$c8'".','."'$c9'".',0)';
$stmt = db2_prepare($db2,$query);
if($stmt){
    $result=db2_execute($stmt);
    if(!$result){
        echo "Error Messange".db2_stmt_errormsg($stmt);
    }
}
header("location:tpremm.php");
?>
