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
$sn=0;
$iden=0;
$sn=strtoupper($_POST['sn']);
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
</div>
      <div class="row" id=1>
        <div class="col-sm-1"></div>
        <div class="col-sm-10 well">
          <table class="table">
            <caption class="text-center">ITEM</caption>
            <tbody>
                 <form action="itemw.php" method="post">
            <input type="hidden" value="<?php
            require_once('connectsys.php');
                  $query = 'SELECT "ID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
             ?>" name="identy">
              <tr>
                <td><label>LOCATION:</label><br>
                    <input list="loca" name="location" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT LOCATION FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="loca">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT LOCATION FROM CTRLSYSTEM.INV GROUP BY LOCATION";
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
            </datalist></td>
                <td><label>AREA:</label><br>
                    <input list="are" name="area" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "AREA" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="are">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT AREA FROM CTRLSYSTEM.INV GROUP BY AREA";
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
            </datalist></td>
                <td><label>BRAND:</label><br>
                    <input list="bra" name="brand" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "BRAND" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="bra">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT BRAND FROM CTRLSYSTEM.INV GROUP BY BRAND";
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
            </datalist></td>
                <td><label>TYPE:</label><br>
                    <input list="typ" name="type" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "TYPE" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="typ">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT TYPE FROM CTRLSYSTEM.INV GROUP BY TYPE";
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
            </datalist></td>
              </tr>
              <tr>
                <td><label>SERIAL:</label><br>
                    <input list="seri" name="serial" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "S/N" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="seri">
                    
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
            </datalist></td>
                <td><label>MODEL:</label><br>
                    <input list="mod" name="model" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MODEL" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="mod">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT MODEL FROM CTRLSYSTEM.INV GROUP BY MODEL";
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
            </datalist></td>
                <td><label>MT:</label><br>
                    <input list="mach" name="mt" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MT" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="mach">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT MT FROM CTRLSYSTEM.INV GROUP BY MT";
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
            </datalist></td>
                <td><label>RESPONSIBLE:</label><br>
                    <input list="resp" name="responsible" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "RESPONSIBLE" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="resp">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT RESPONSIBLE FROM CTRLSYSTEM.INV GROUP BY RESPONSIBLE";
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
            </datalist></td>
              </tr>
              <tr>
                <td><label>STATUS:</label><br>
                    <input list="sta" name="stat" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "STAT" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="sta">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT STAT FROM CTRLSYSTEM.INV GROUP BY STAT";
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
            </datalist></td>
                <td><label>PHYSICAL INV:</label><br>
                    <input list="pinv" name="physical" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "PHYSICAL INV" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="pinv">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "PHYSICAL INV" FROM CTRLSYSTEM.INV GROUP BY "PHYSICAL INV"';
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
            </datalist></td>
                <td><label>DATE OF PURCHASE:</label><br>
                    <input list="dop" name="purchase" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DATE OF PURCHASE" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="dop">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "DATE OF PURCHASE" FROM CTRLSYSTEM.INV GROUP BY "DATE OF PURCHASE"';
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
            </datalist></td>
                <td><label>DATE OF DEPRECIATION:</label><br>
                    <input list="dod" name="depreciation" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DATE OF DEPRECIATION" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="dod">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "DATE OF DEPRECIATION" FROM CTRLSYSTEM.INV GROUP BY "DATE OF DEPRECIATION"';
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
            </datalist></td>
              </tr>
              <tr>
                <td><label>COST CENTER:</label><br>
                    <input list="ccen" name="center" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="ccen">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV GROUP BY "COST CENTER"';
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
            </datalist></td>
                <td><label>NUM INVER:</label><br>
                    <input list="ninv" name="inver" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "NUM INVER" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="ninv">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "NUM INVER" FROM CTRLSYSTEM.INV GROUP BY "NUM INVER"';
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
            </datalist></td>
                <td><label>RFID S/N:</label><br>
                    <input list="rfsn" name="rfserial" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "RFID S/N" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="rfsn">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "RFID S/N" FROM CTRLSYSTEM.INV GROUP BY "RFID S/N"';
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
            </datalist></td>
                <td><label>DATE RFID:</label><br>
                    <input list="drf" name="drf" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DATE RFID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="drf">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "DATE RFID" FROM CTRLSYSTEM.INV GROUP BY "DATE RFID"';
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
            </datalist></td>
              </tr>
              <tr>
                <td><label>ING:</label><br>
                    <input list="ing" name="inge" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "ING" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="ing">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "ING" FROM CTRLSYSTEM.INV GROUP BY "ING"';
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
            </datalist></td>
                <td><label>MAINTE. DATE:</label><br>
                    <input list="mdate" name="matto" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>" autofocus>
                     <datalist id="mdate">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV GROUP BY "FECHA MATTO"';
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
            </datalist></td>
                <td><label>FRECUENCY OF MAINTENANCE:</label><br>
                    <input list="fre" name="frecuency" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "FRECUENCY MTTO" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
             echo $row[0];
                            }
                        }
          ?>">
                     <datalist id="fre">
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "FRECUENCY MTTO" FROM CTRLSYSTEM.INV GROUP BY "FRECUENCY MTTO"';
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
            </datalist></td>
                <td></td>
              </tr>
              <tr><td colspan="4"><a href="javascript:close()"><button type="submit" class="btn btn-default" >Apply Changes.</button></a></td></tr>
            </form>
            </tbody>
          </table>
        </div>
      </div>
      <?php
function nosn(){
  //table for  s/n not founded
   echo '<script>$("#" + 1).remove();</script>';
  echo "<br><br><br><br><br>";
  echo '<div class="row"><div class="col-sm-3"></div><div class="col-sm-6 well" style="font-size: 40px; background-color:rgb(204,204,204);">Serial Number Not Founded.<br><a href="tools.php"><button type="button" class="btn btn-default">Go Back</button></a></div></div>';
}
if($sn!=0 || $sn!=''){
  require_once('connectsys.php');
        $sta = 'SELECT "ID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2, $sta);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $flag=$flag+1;
                    $iden=$row[0];
                    }   
                }
                if($iden==0){
                  nosn();
                }
}else{
  nosn();
}
?>
</body>
</html>
