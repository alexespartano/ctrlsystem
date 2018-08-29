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
  <div class="col-sm-3"></div>
 <div class="col-sm-6 well" style="background-color: rgb(204,204,204);">
 	<table class="table">
      <caption class="text-center" style="font-size: 25px;" id="1">DEL MFG USER.</caption>
            <form action="deluser.php" method="post">
            <tbody>
            <tr>
              <td class="text-center" colspan="2"><p><label>USERNAME:</label><br>
                  <select name="user">
                            <option value="">USER</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = 'SELECT "USERNAME" FROM CTRLSYSTEM.USERS WHERE "ROL"='."'MFG'";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }

                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
                        </select>



                  </td>
            <tr><td colspan="2"><p align="center"><button type="submit" name="submit" class="btn btn-default" >DELETE.</button></p></td></tr>
            </tbody>
          </form>
            </table>
            <?php
            if(isset($_POST['submit'])){
             $userr=strtoupper($_POST['user']);
             require_once('connectsys.php');
              $tru = 'DELETE FROM CTRLSYSTEM.USERS WHERE "USERNAME"='."'$userr'";
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
              header("location: tools.php");
          }
            ?>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
