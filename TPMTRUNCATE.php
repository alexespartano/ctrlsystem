<?php
/*Desarrollado por Alejandro Romero Aldrete*/
$day = date('D');
echo $day;
if($day== "Fri"){
require_once('connectsys.php');
 $tru = "TRUNCATE CTRLSYSTEM.TPM IMMEDIATE";
          $stmt = db2_prepare($db2, $tru);
 			if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
            }
require_once('connectsys.php');
 $in ='INSERT INTO CTRLSYSTEM.TPM ("ID","LOCATION","AREA","S/N","TYPE") SELECT "ID","LOCATION","AREA","S/N","TYPE" FROM CTRLSYSTEM.INV';
          $stmt = db2_prepare($db2, $in);
 			if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
            }

require_once('connectsys.php');
 $in ='UPDATE CTRLSYSTEM.TPM SET "LOCALIZADO"=0';
          $stmt = db2_prepare($db2, $in);
      if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
            }
            db2_close($db2);
     }
        header("location:TPMVIEWER.php");
     
?>