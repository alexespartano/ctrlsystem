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
}}

$ubi    = strtoupper($_POST['tubi']);
$brand  = strtoupper($_POST['tbrand']);
$desc   = strtoupper($_POST['tdesc']);
$marc   = strtoupper($_POST['tmarc']);
$model  = strtoupper($_POST['tmodel']);
$max    = $_POST['tmax'];
$min    = $_POST['tmin'];
$quanti = $_POST['tquanti'];
$stock  = strtoupper($_POST['tstock']);
$link = $_POST['tlink'];
$num=0;
    require_once('connectsys.php');
      $queryid = "SELECT ID FROM CTRLSYSTEM.TSPARE ORDER BY ID DESC LIMIT 1 ";
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

      require_once('connectsys.php');
   $query = 'INSERT INTO CTRLSYSTEM.TSPARE ("ID","UBI","BRAND","DESC","MARC","MODEL","MAX","MIN","QUANTI","STOCK","LINK")
                                               VALUES ('.$num.','."'$ubi'".','."'$brand'".','."'$desc'".','."'$marc'".','."'$model'".','.$max.','.$min.','.$quanti.','."'$stock'".','."'$link'".')';
            $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
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
          <caption class="text-center" style="font-size: 25px;">ITEM ADDED</caption>
           <tr><td colspan="2"><a href="javascript:close()"><button type="button" class="btn btn-default">Close Window</button></a></td></tr>
            
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
