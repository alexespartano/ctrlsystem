<?php
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "MANUFACTURA"){
 header("location: index.php");
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DISKFILE</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script script type="text/javascript" src="js/filters2.js"></script>
  <script script type="text/javascript" src="js/totop.js"></script>
  <link rel="stylesheet" href="css/main.css" />
</head>
<body background="img/Background-Picture-Html.jpg">
<!--NAVMENU-->
<div class="row" id="header">
<nav class="navbar navbar-inverse" id="nav">
        <button class="navbar-toggle" data-toggle="collapse" data-target="#a" id="toggle">
            ☰
        </button>
        <div class="navbar-header">
        	<a class=" navbar-brand"><img src="img/ibm-logo-png-transparent-background.png" width="50" height="20"></a>
            <a href="diskfile.php" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<!--CONTAINER-->
<div class="row" id="tablecontainer">
   <form action="upload.php" method="post" enctype="multipart/form-data">
   <p align="center" style=" color:rgb(204,204,204);"> Select File to upload:</p>
   <p align="center"> <input type="file" name="fileToUpload" id="fileToUpload" class="sb"></p>
   <p align="center"> <input type="submit" value="Upload File" name="submit" id="submitbutton"></p>
</form>
<br>
<br>
<br>
<div class="row">
  <div class="col-sm-5"></div>
  <div class="col-sm-2" style="color: rgb(204,204,204);">
    <p align="center">FILE ON DIRECTORY</p>
 <p align="center"><?php 
    foreach (glob("ensamblefiles/*.*") as $files):
      $file=explode('/', $files);
      echo '<li>'.$file[1].'</li>';
      endforeach;
?></p>
  </div>
</div>
   </div><!--ENDCONATINER-->
</body>
</html>
