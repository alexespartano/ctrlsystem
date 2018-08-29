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
$desc= strtoupper($_POST['tdesc']);    
      require_once('connectsys.php');
        $query = 'DELETE FROM CTRLSYSTEM.TSPARE WHERE "DESC" = '."'$desc'";
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
<title>DELETE</title>
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
          <caption class="text-center" style="font-size: 25px;">ITEM DELETED</caption>
           <tr><td colspan="2"><a href="javascript:close()"><button type="button" class="btn btn-default">Close Window</button></a></td></tr>
            
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>