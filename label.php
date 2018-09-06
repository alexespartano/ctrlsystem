<?php 
/*Desarrollado por Alejandro Romero Aldrete*/
$id = "";
$lare = "";
$ling = "";
$lser = "";
$lmto = "";
$lbra = "";
$id=strtoupper($_GET['id']);
$months = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
require_once('connectsys.php');
$label ='SELECT "AREA","ING","S/N","FECHA MATTO","BRAND" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
                  $stmt = db2_prepare($db2, $label);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                   $lare = $row[0];
                   $ling = $row[1];
                   $lser = $row[2];
                   $lmto = $row[3];
                   $lbra = $row[4];
               }
             }
$Todays = date("y-m-d");
$Todays = str_replace('-','/',$Todays);
$yea =substr($Todays,0,2);
$mon =substr($Todays,3,2);
$day =substr($Todays,6);
$lyea = substr($lmto,0,2);
$lmon =substr($lmto,3,2);
$lday =substr($lmto,6);

for($c=1;$c<=12;$c++){
  if($mon==$c){
    $Todays=$day."/".$months[$c-1]."/".$yea;
      break;
  
  }
}
for($d=1;$d<=12;$d++){
  if($lmon==$d){
    $lmto=$lday."/".$months[$d-1]."/".$lyea;
      break;
        }
      }
echo '<div class="ibm-columns">';
echo '<div class="ibm-col-1-1 ibm-center">';
echo "<h4>MTTO PREVENTIVO</h4>";
echo '</div>';
echo '</div>';
echo '<div class="ibm-columns">';
echo '<div class="ibm-col-1-1">';
echo "<p>Area: ".$lare."</p>";
echo "<p>".$ling."</p>";
echo "<p>U.MTTO: ".$Todays."</p>";
echo"<p> Prox.MTTO: ". $lmto."</p>";
echo "<p>Serial: ".$lser."</p>";
echo '<p class="ibm-ind-link"><a class="ibm-print-link ibm-btn-pri ibm-fullwidth" href="#" onclick="openWin()" autofocus>Print Label</a></p>';
echo "</div>";
echo "</div>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$cadena='${^XA
^CF0,40
^FO140,20^FDMTTO^FS
^CF0,40
^FO270,20^FDPREVENTIVO^FS
^CF0,30
^FO25,50^FD'.$ling.' ^FS
^FO300,55^FDBrand: '.$lbra.' ^FS
^FO25,80^FDArea: '.$lare.' ^FS
^FO25,110^FDMTTO : '.$Todays.'^FS
^FO285,110^FDProx. MTTO: '.$lmto.'^FS
^FO90,135^BY2^BCN,60,N,N^FD'.$lser.'^FS
^FO130,200^A0N,30,30^FD'.$lser.'^FS
^XZ}$';
echo $cadena;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />      
<title>LABEL</title>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
  <link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
</head>
<body>
</body>
</html>
<script type="text/javascript">
  function openWin() {
     window.print();
    window.close();
  }
</script>
