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
            <a href="main.php" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
                <li><a href="main.php">HOME</a></li>
                 <li class="dropdown">
                    <a href="assets.php" class="dropdown-toggle" data-toggle="dropdown" role="button">CTRL OF ASSETS</a>
                    <ul class="dropdown-menu">
                    	<li><a href="assets.php">VIEW/MODIFY</a></li>
                        <li><a href="peradd.php">ADD</a></li>
                        <li><a href="perdel.php">DELETE</a></li>
                    </ul>
                </li>
                 <li><a href="rec.php">RECORDS</a></li>
                 <li><a href="service.php">SERVICES</a></li>
                 <li><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
                <li id="highlightbox"><a href="tools.php">TOOLS</a></li>
                <li><a href="TPMVIEWER.php">TPM</a></li>
                 <li><a href="spareparts.php">SPARE PARTS</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-3 well well-box" style="background-color: rgb(60,60,60);">
      <p align="center"><a href="download.php"><button id="submitbutton">DOWNLOAD INV DB</button></a></p>
       <p align="center"><a href="downloadrecords.php"><button id="submitbutton">DOWNLOAD RECORDS DB</button></a></p>
    </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-3 well well-box" style="background-color: rgb(60,60,60);">
      <p align="center"><a href="#" onclick="javascript:delrec();"><button id="submitbutton">DELETE RECORDS DB</button></a></p>
       <p align="center"><a href="#" onclick="javascript:delmfsrec();"><button id="submitbutton">DELETE MFS RECORDS DB</button></a></p>
    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-2 well well-box" style="background-color: rgb(60,60,60);">
      <table class="table">
        <caption class="text-center">USER MANAGER</caption>
        <tbody>
        <tr><td>&nbsp;&nbsp;&nbsp;<a href="adduser.php"><button id="submitbutton">ADD USER</button></a></td></tr>
        <tr><td>&nbsp;&nbsp;&nbsp;<a href="deluser.php"><button id="submitbutton">DELETE USER</button></a></td></tr>
        </tbody>
      </table>
    </div>
    </div>
<br>
<br>
<div class="row">
  <div class="col-sm-3 well well-box" style="background-color: rgb(60,60,60);">
    <form action="item.php" method="post">
      <label style="color: rgb(204,204,204);">Item to Modify.</label>
      <input type="text" name="sn" placeholder="Serial Number" class="form-control" style="max-width: 80%;" list="ser">
      <datalist id="ser">
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "S/N" FROM CTRLSYSTEM.INV GROUP BY "S/N"';
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }        
                        while($row = db2_fetch_array($stmt)){
                            echo '<option value="'. $row[0] .'">';
                            }   
                        }
            ?>
            </datalist>
      <button type="submitbutton" id="submitbutton" style="color: rgb(204,204,204);">Search</button>
    </form>
  </div>
</div>
</div>
</body>
<script>
function delrec(){
  win1 = window.open('delrec.php','Modifica_U','scrollbars=no,top=220,left=500,width=580,height=200');  
}
function delmfsrec(){
  win2 = window.open('delmfsrec.php','Modifica_U','scrollbars=no,top=220,left=500,width=580,height=200');  
}
</script>
</html>
