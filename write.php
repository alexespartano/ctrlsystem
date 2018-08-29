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
			$query = 'UPDATE CTRLSYSTEM.INV SET "LOCATION" = \'IT\', "COMMENTS" = \''.$commentsw.'\' WHERE ID='.$idw;
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
                            //asignamos a oscar el equipo
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MODIFY</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
</head>


<body background="img/Background-Picture-Html.jpg">

<!--CONTENTOPTIONS-->
<div class="container">
<div class="row boxcol">
 <div class="col-sm-12">
 	<table class="table table-responsive table-condensed" id="modtable">
			<thead>
				<tr>
                	<th colspan="2">MODIFIER</th>
				</tr>
			</thead>
            <form action="write.php" method="post">
            <input type="hidden" value="<?php echo $id;?>" name="identy">
            <tr>
            	<td>
                	<label>LOCATION:
                   <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "LOCATION" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
             $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }   
					?></label>
                </td>
                <td>
              		<label>AREA:
                    <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "AREA" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>BRAND:
                    <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "BRAND" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
                <td>
                	<label>TYPE: <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "TYPE" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>S/N: <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "S/N" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
                <td>
                	<label>MODEL: <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "MODEL" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
              		<label>RESPONSIBLE:<?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "RESPONSIBLE" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            	<td>
                	<label>STATUS:<?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "STAT" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>PHYSICAL INVENTORY:<?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "PHYSICAL INV" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
                <td>
                	<label>RFID S/N:<?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "RFID S/N" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<label>COMMENTS</label><br><label><?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "COMMENTS" FROM CTRLSYSTEM.INV WHERE ID='.$idw;
						$stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
					?></label>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<a href="javascript:close()">Close Window</a>
              	</td>
            </tr>
            </form>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
