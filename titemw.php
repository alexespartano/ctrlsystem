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
            //record of transaction
            $num=0;
    require_once('connectsys.php');
      $queryid = "SELECT ID FROM CTRLSYSTEM.TRECTRANS ORDER BY ID DESC LIMIT 1 ";
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
            if($num==0){
              $num=1;
            }  
   $date = new DateTime();
        $date =  $date->format('Y-m-d');
                $date=substr($date,2);
                $date=str_replace('-','/',$date);
                  $I = strtoupper($_SESSION['username']);
$descrip= "MODIFIED BY TOOLS";
 require_once('connectsys.php');
   $query = 'INSERT INTO CTRLSYSTEM.TRECTRANS ("BRAND","TYPE","SN","ING","DATE","ACCION","ID")
                                               VALUES ('."'$upbrand'".','."'$uptype'".','."'$upsn'".','."'$I'".','."'$date'".','."'$descrip'".','.$num.')';
            $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               }

            header("location: ttools.php");
              ?>