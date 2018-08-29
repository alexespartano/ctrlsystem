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
              $uplocation=$_POST['location'];
              $uparea=$_POST['area'];
              $upbrand=$_POST['brand'];
              $uptype=$_POST['type'];
              $upsn=$_POST['serial'];
              $upmodel=$_POST['model'];
              $upmt=$_POST['mt'];
              $upresponsible=$_POST['responsible'];
              $upstat=$_POST['stat'];
              $upphysical=$_POST['physical'];
              $updatepurchase=$_POST['purchase'];
              $updatedepre=$_POST['depreciation'];
              $upcost=$_POST['center'];
              $upinver=$_POST['inver'];
              $uprfidsn=$_POST['rfserial'];
              $uprfiddate=$_POST['drf'];
              $uping=$_POST['inge'];
              $upfechamatto=$_POST['matto'];
              $upfrecmatto=$_POST['frecuency'];
              $upid=$_POST['identy'];
              require_once('connectsys.php');
              $tru = 'UPDATE CTRLSYSTEM.INV SET "LOCATION"='."'$uplocation'".', "AREA"='."'$uparea'".',"BRAND"='."'$upbrand'".',"TYPE"='."'$uptype'".', "S/N"='."'$upsn'".',"MODEL"='."'$upmodel'".',"MT"='."'$upmt'".',"RESPONSIBLE"='."'$upresponsible'".',"STAT"='."'$upstat'".',"PHYSICAL INV"='."'$upphysical'".',"DATE OF PURCHASE"='."'$updatepurchase'".',"DATE OF DEPRECIATION"='."'$updatedepre'".',"COST CENTER"='."'$upcost'".', "NUM INVER"='."'$upinver'".', "RFID S/N"='."'$uprfidsn'".',"DATE RFID"='."'$uprfiddate'".',"ING"='."'$uping'".',"FECHA MATTO"='."'$upfechamatto'".',"FRECUENCY MTTO"='.$upfrecmatto.' WHERE "ID"='.$upid;
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
            header("location: tools.php");
              ?>