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

$stau="";
$areau="";
$idw = strtoupper($_POST['identy']);
$locationw = strtoupper($_POST['location']);
$areaw = strtoupper($_POST['area']);
$brandw = strtoupper($_POST['brand']);
$responsiblew = strtoupper($_POST['responsible']);
$statusw = strtoupper($_POST['status']);
$physicalinvw = strtoupper($_POST['inventariofisico']);
$rfidw = strtoupper($_POST['rfidserial']);
$commentsw = strtoupper($_POST['comments']);
      require_once('connectsys.php');
        $sta = 'SELECT "STAT", "AREA" FROM CTRLSYSTEM.INV WHERE "ID"='.$idw;
            $stmt = db2_prepare($db2, $sta);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $stau = $row[0];
                    $areau = $row[1];
                    }   
                }
                    if($stau == "AL"){
                    if($stau == $statusw){
                      //ALMACENADO Y PERMANECIO AHI SOLO MODIFICA COMENTARIOS.
                      require_once('connectsys.php');
			$query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = \''.$locationw.'\', "COMMENTS" = \''.$commentsw.'\' WHERE ID='.$idw;
                             $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        }
                    }else{
                        ///ALMACENADO PASA A ASIGNADO A MFG.
                                    $branda = "";
                                    $respoa ="";
                                    $inva ="";
                                    $inga = "";
                                    $costa="";
                                    $rfidda="";
                                    $mttoa="";

                              require_once('connectsys.php');
                            $areachange ='SELECT "BRAND" , "RESPONSIBLE", "PHYSICAL INV", "ING" , "COST CENTER" , "DATE RFID" , "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "AREA"='."'$areaw'";
                               $stmt = db2_prepare($db2, $areachange);
                                if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while ($rowa = db2_fetch_array($stmt)) {
                                    $branda = $rowa[0];
                                    $respoa =$rowa[1];
                                    $inva =$rowa[2];
                                    $inga = $rowa[3];
                                    $costa=$rowa[4];
                                    $rfidda=$rowa[5];
                                    $mttoa=$rowa[6];
                                    }
                                  }
                                    db2_close($db2);
                                      require_once('connectsys.php');
                                     $query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = '."'$locationw'".', "AREA" = '."'$areaw'".', "BRAND" = '."'$branda'".', "RESPONSIBLE" = '."'$respoa'".', "STAT" = \'AS\' , "PHYSICAL INV" = '."'$inva'".', "RFID S/N" = '."'$rfidw'".', "COMMENTS" = '."'$commentsw'".' ,"ING" = '."'$inga'".', "COST CENTER" = '."'$costa'".', "DATE RFID" = '."'$rfidda'".', "FECHA MATTO" = '."'$mttoa'".'  WHERE "ID"='.$idw;
                              $stmt = db2_prepare($db2, $query);
                                if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                     echo $areaw;
                                    echo '\''.$areaw.'\'';
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                  }
                                  db2_close($db2);
                             $recfecha = new DateTime();
        $recfecha =  $recfecha->format('Y-m-d');
                $recfecha=substr($recfecha,2);
                $recfecha=str_replace('-','/',$recfecha);

                                    $I = strtoupper($_SESSION['username']);
                                    $sn= "";
                                    $type = "";
                                    $maty = "";
                                    $mod = "";
                        require_once('connectsys.php');
                      $inf  = 'SELECT "S/N", "TYPE","MT","MODEL" FROM CTRLSYSTEM.INV WHERE ID='.$idw; 
                                $value2 = db2_prepare($db2, $inf);
                                if($value2){
                                  $result = db2_execute($value2);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($value2);
                                    exit;
                                    }
                                    while($rowb = db2_fetch_array($value2)){
                                    $sn=$rowb[0];
                                    $type = $rowb[1];
                                    $maty = $rowb[2];
                                    $mod = $rowb[3];
                                  }
                                }
                                db2_close($db2);
                             echo ' 
                <form action="corrective2.php" method="POST" name="pre" target="result" onsubmit="window.open("","result","width=100,height=100");">
          <input name="div" type="hidden" value="IT">     
          <input class="form-control"  type="hidden"  name="ing" value="'.$I.'">
          <input class="form-control"  type="hidden"  name="date" value="'.$recfecha.'">
          <input class="form-control"  type="hidden"  name="serial" value="'.$sn.'">
           <input class="form-control"  type="hidden"  name="mty" value="'.$maty.'">
            <input class="form-control"  type="hidden"  name="mode" value="'.$mod.'">
          <input class="form-control"  type="hidden"  name="location" value="'.$locationw.'">
          <input class="form-control"  type="hidden"  name="area" value="'.$areaw.'">
          <input class="form-control"  type="hidden"  name="brand" value="'.$branda.'">
          <input class="form-control"  type="hidden"  name="type" value="'.$type.'">
          <input class="form-control"  type="hidden"   name="description" value="ASIGNADO">
                </form>

<script>
  document.pre.submit();
</script>
          ';
          echo'<script>window.close();</script>';
                    }
                    }else{
                           $branda = "";
                          $respoa = "";
                          $inva = "";
                          $inga = "";
                          $costa= "";
                          $rfidda= "";
                         $mttoa= "";
                        if($stau == $statusw){
                            //checo que el area se igual si actualizo lo demas de lo contrario asigno los valores de la nueva area...
                                if($areau == $areaw){
                                   $recfecha = new DateTime();
        $recfecha =  $recfecha->format('Y-m-d');
                $recfecha=substr($recfecha,2);
                $recfecha=str_replace('-','/',$recfecha);
                                    require_once('connectsys.php');
            $query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = \''.$locationw.'\', "PHYSICAL INV" = \''.$recfecha.'\', "RFID S/N" = \''.$rfidw.'\', "COMMENTS" = \''.$commentsw.'\' WHERE ID='.$idw;
               $stmt = db2_prepare($db2, $query);
                                if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                  }
                                }else{
                                  require_once('connectsys.php');
                                    $areachange ='SELECT "BRAND" , "RESPONSIBLE" , "PHYSICAL INV" , "ING" , "COST CENTER" , "DATE RFID" , "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "AREA"='."'$areaw'";
                                    $value = db2_prepare($db2, $areachange);
                                if($value){
                                  $result = db2_execute($value);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($value);
                                    exit;
                                    }
                                    while ($rowa = db2_fetch_array($value)) {
                                    $branda = $rowa[0];
                                    $respoa =$rowa[1];
                                    $inva =$rowa[2];
                                    $inga = $rowa[3];
                                    $costa=$rowa[4];
                                    $rfidda=$rowa[5];
                                    $mttoa=$rowa[6];
                                      }
                                    }
                                    db2_close($db2);
                                require_once('connectsys.php');
                                     $query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = '."'$locationw'".' , "AREA" = '."'$areaw'".', "BRAND" = '."'$branda'".', "RESPONSIBLE" = '."'$respoa'".', "PHYSICAL INV" = '."'$inva'".', "RFID S/N" = '."'$rfidw'".', "COMMENTS" = '."'$commentsw'".',"ING" = '."'$inga'".', "COST CENTER" = '."'$costa'".', "DATE RFID" = '."'$rfidda'".', "FECHA MATTO" = '."'$mttoa'".'  WHERE "ID" ='.$idw;
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
                        }else{
                            //asignamos a it el equipo
                          $divis="";
                               require_once('connectsys.php');
        $DI = 'SELECT "DIVISION" FROM CTRLSYSTEM.INV WHERE "ID"='.$idw;
            $stmt = db2_prepare($db2, $DI);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $divis = $row[0];
                    }}
                       
                          if($divis=="IT"){
                                require_once('connectsys.php');
                             $query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = \'IT\', "AREA" = \'ALMACEN IT\', "BRAND" = \'ALMACEN IT\', "RESPONSIBLE" = \'OSCAR MICHEL\', "STAT" = \'AL\', "PHYSICAL INV" = \''.$physicalinvw.'\', "RFID S/N" = \''.$rfidw.'\', "COMMENTS" = \''.$commentsw.'\', "ING" = \'N/A\', "FECHA MATTO" = \'N/A\' WHERE ID='.$idw;
                              $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    }
                                    db2_close($db2); 
                          }else{
                            require_once('connectsys.php');
                             $query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = \'XIV\', "AREA" = \'ALMACEN IT\', "BRAND" = \'ALMACEN IT\', "RESPONSIBLE" = \'MARIO VAZQUEZ\', "STAT" = \'AL\', "PHYSICAL INV" = \''.$physicalinvw.'\', "RFID S/N" = \''.$rfidw.'\', "COMMENTS" = \''.$commentsw.'\', "ING" = \'N/A\', "FECHA MATTO" = \'N/A\' WHERE ID='.$idw;
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
             $recfecha = new DateTime();
        $recfecha =  $recfecha->format('Y-m-d');
                $recfecha=substr($recfecha,2);
                $recfecha=str_replace('-','/',$recfecha);
   $I = strtoupper($_SESSION['username']);
   $sn="";
   $type="";
   $maty="";
   $mod="";
      require_once('connectsys.php');
                      $inf  = 'SELECT "S/N", "TYPE","MT","MODEL" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
                         $stmt = db2_prepare($db2, $inf);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                    $sn=$row[0];
                                    $type = $row[1];
                                     $maty = $row[2];
                                    $mod = $row[3];
                                    }
                                    }
                                    db2_close($db2);  
                                
              echo ' 
               <form action="corrective2.php" method="POST" name="pre" target="result" onsubmit="window.open("","result","width=100,height=100");">
          <input name="div" type="hidden" value="IT">     
          <input class="form-control"  type="hidden"  name="ing" value="'.$I.'">
          <input class="form-control"  type="hidden"  name="date" value="'.$recfecha.'">
          <input class="form-control"  type="hidden"  name="serial" value="'.$sn.'">
            <input class="form-control"  type="hidden"  name="mty" value="'.$maty.'">
            <input class="form-control"  type="hidden"  name="mode" value="'.$mod.'">
          <input class="form-control"  type="hidden"  name="location" value="IT">
          <input class="form-control"  type="hidden"  name="area" value="ALMACEN IT">
          <input class="form-control"  type="hidden"  name="brand" value="ALMACEN IT">
          <input class="form-control"  type="hidden"  name="type" value="'.$type.'">
          <input class="form-control"  type="hidden"   name="description" value="'.$commentsw.'">
                </form>

<script>
  document.pre.submit();
</script>
          ';
             echo'<script>window.close();</script>';
                        }


                    }

?>
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Modifier</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
<link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">

    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
  </head>
  <body id="ibm-com" class="ibm-type">
    <div id="ibm-top" class="ibm-landing-page">
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
                    <form action="#" method="post" class="ibm-row-form">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Modifier</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-6">
                <p class=" ibm-h1 ibm-center">Item Modified</p>
                </div>
        </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
              <p class="ibm-ind-link"><a class="ibm-confirm-link ibm-btn-sec" href="javascript:close()">Close Window</a></p>
     </span>
            </div>
        </div> 
    </form>       
        </main>
      </div>
    </div>
  </body>
</html>