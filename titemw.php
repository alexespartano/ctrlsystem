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
              $upaccion=$_POST['accion'];
              $uparea=$_POST['area'];
              $upbrand=$_POST['brand'];
              $uptype=$_POST['type'];
              $upsn=$_POST['serial'];
              $upmodel=$_POST['model'];
              $uptrade=$_POST['trademark'];
              $upnom=$_POST['nom'];
              $uping=$_POST['ing'];
              $upfechamatto=$_POST['mtto'];
              $upfrecmatto=$_POST['frecuency'];
              $upid=$_POST['identy'];
              require_once('connectsys.php');
              $tru = 'UPDATE CTRLSYSTEM.TINV SET "ACCION"='."'$upaccion'".', "AREA"='."'$uparea'".',"BRAND"='."'$upbrand'".',"TYPE"='."'$uptype'".', "SN"='."'$upsn'".',"MODEL"='."'$upmodel'".',"TRADEMARK"='."'$uptrade'".',"NOM"='."'$upnom'".',"ING"='."'$uping'".',"MATTO"='."'$upfechamatto'".',"FREC"='."'$upfrecmatto'".' WHERE "ID"='.$upid;
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
            header("location: ttools.php");
              ?>