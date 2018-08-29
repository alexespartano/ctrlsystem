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
$id = "null";
$id=strtoupper($_GET['id']);
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
      <caption class="text-center" style="font-size: 25px;" id="1">ARE YOU SURE THAT WANT TO DELETE THE RECORD TABLE? (YOU MUST TO BACKUP THE INFO. BEFORE YOU DELETE IT)</caption>
            <tbody>
            <tr id=2><td><form method="post" action="delrec.php"><button type="submit" class="btn btn-success" name="submit">Yes</button></form></td>
                        <td><a href="javascript:close()"><button type="button" class="btn btn-danger">No</button></a></td>
            </tr>
              <?php 
            if(isset($_POST['submit'])){
              require_once('connectsys.php');
              $tru = "TRUNCATE CTRLSYSTEM.REC IMMEDIATE";
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
                 echo '<script>$("#" + 1).remove();</script>';
                 echo '<script>$("#" + 2).remove();</script>';
               echo '<caption class="text-center" style="font-size: 25px;">RECORDS REMOVED</caption>';
              echo '<tr><td colspan="2"><a href="javascript:close()"><button type="button" class="btn btn-default">Close Window</button></a></td></tr>';
              }
              ?>
            </tbody>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
