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
            <a href="#" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
            </ul>
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<!--CONTAINER-->
<div class="row" id="tablecontainer">
<div class="row">
  <div class="col-sm-5"></div>
  <div class="col-sm-2" style="color: rgb(204,204,204);">
    <p align="center">FILE ON DIRECTORY</p>
 <p align="center"><?php 
    foreach (glob("ensamblefiles/*.*") as $files):
      $path = $files;
     $file=explode('/', $files);
        $name = $file[1];
      echo '<a href="'.$path.'" style="font-size:44px;">'.$name.'</a>';
      endforeach;
?></p>
  </div>
</div>
   </div><!--ENDCONATINER-->
</body>
</html>
