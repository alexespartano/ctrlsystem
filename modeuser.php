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
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<div class="row">
  <div class="col-sm-2"></div>
 <div class="col-sm-8 well" style="background-color: rgb(204,204,204);">
 	<table class="table">
      <caption class="text-center" style="font-size: 25px;" id="1">ADD MFG USER.</caption>
            <form action="adduser.php" method="post">
            <tbody>
            <tr>
              <td class="text-center"><p><label>USERNAME:</label><br>
                    <input name="username"></td>
              <td class="text-center"><label>PASSWORD:</label><br>
                 <input name="pass"></td>
            <tr><td colspan="2"><p align="center"><button type="submit" name="submit" class="btn btn-default" >CREATE.</button></p></td></tr>
            </tbody>
          </form>
            </table>
            <?php
            if(isset($_POST['submit'])){
             $user=strtoupper($_POST['username']);
             $pass=strtoupper($_POST['pass']);
             $num =0;
 require_once('connectsys.php');
            $queryid = "SELECT ID FROM CTRLSYSTEM.USERSS ORDER BY ID DESC LIMIT 1";
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
              $tru = 'INSERT INTO CTRLSYSTEM.USERSS ("USERNAME", "PASSWORD", "DIVISION", "ROL", "ID") VALUES ('."'$user'".', '."'$pass'".','."'MFG'".', '."'MFG'".' ,'.$num.')';
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
          }
          header("location: tools.php");
            ?>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
