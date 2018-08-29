<?php
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
session_start();
// If session variable is not set it will redirect to login page
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "MFS"){
 header("location: index.php");
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tools</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <a href="viewermfs.php" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
            <li><a href="viewermfs.php">HOME</a></li>
             <li><a href="recm.php">RECORDS</a></li>
            <li id="highlightbox"><a href="toolsm.php">TOOLS</a></li>
            
           </ul>
            <ul class="nav navbar-nav pull-right">
              <li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
        <li><a href='logout.php'>Logout</a></li>              </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <p align="left"><a href="download.php"><button id="submitbutton">Download DB</button></a></p>
    </div>
      <div class="col-sm-3"></div>
    <div class="col-sm-3">
      <p align="left"><a href="downloadrecordsmfs.php"><button id="submitbutton">Download Records DB</button></a></p>
    </div>
  </div>
</form>
  </div>
</div>
</body>
</html>
