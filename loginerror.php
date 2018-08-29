<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
</head>
<body background="img/Background-Picture-Html.jpg">
<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is set will redirect to main
if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
  $user = strtoupper($_SESSION['username']);
   require_once('connectsys.php'); #db2 variable
   $sql = "SELECT DIVISION FROM CTRLSYSTEM.USERS WHERE USERNAME = '$user'";
   $stmt = db2_prepare($db2, $sql);
   if($stmt){
   $result = db2_execute($stmt);
    if (!$result) {
         echo "exec errormsg: " .db2_stmt_errormsg($stmt);
          exit;
      }
   }else{
    echo "<p>Failed conexccion.</p>";
    exit;
   }
   $division = "";
   //assign the division of the user to a variable
   while($row = db2_fetch_array($stmt)){
    $division = $row[0];
   }
     db2_close( $db2 );
     //re direct to the right page.
              if($division == "IT"){
                         header("location: main.php");
                        }
              if($division == "GERENCIA"){
                         header("location: viewer.php");
                        }
                         if($division == "MANUFACTURA"){
                         header("location: diskfile.php");
                        }
                         if($division == "MFS"){
                         header("location: viewermfs.php");
                        }
                        if($division == "MFG"){
                         header("location: TPM.php");
                        }
                        
  exit;
}
?>
<div class="row" id="header">
	<div class="col-sm-4">
	  <p class="introbar"> <img class="img-responsive" src="img/ibm-logo-png-transparent-background.png" height="200" width="200"></p></div>
	<div class="col-sm-4"><p class="introbar" align="center" title="Desarrollado por Alejandro Romero Aldrete">CTRL SYSTEM</p></div>
	<div class="col-sm-4"><p class="introbar"></p></div>
</div>
<div class="container">

<div class="row">
 <div class="col-sm-4"></div>
  <div class="col-sm-4" id="formbox">
   <form action="process.php" method="post">
   <div class="form-group-sm">
 <br>
   <div class="input-group input-group-lg">
  <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
  </span>
  <input class="form-control" type="text" placeholder="User Name" name="User">
    </div>
    </div>
        
<div class="form-group-sm">
<br>        
<div class="input-group input-group-lg">
  <span class="input-group-addon">
    <span class="glyphicon glyphicon-lock"></span>
  </span>
  <input class="form-control" type="password" placeholder="Password" name="pwd">
    </div> 
    </div>
        <br>
    <button type="submit" class="btn btn-default" id="formsubmit" name="log">LOGIN</button>
    <p id="alert">USER/PASSWORD: INVALID. TRY AGAIN</p>
   </form>
  </div>
  <div class="col-sm-4"></div>
</div>
</div>
</body>
</html>
