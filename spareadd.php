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
<title>ADD</title>
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
			<thead>
				<tr>
                	<th colspan="2">MODIFIER</th>
				</tr>
			</thead>
            <form action="sparewadd.php" method="post">
            <tr>
            	<td>
                	<label>ITEM:</label><br>
                    <input name="items">
                </td>
                <td>
              		<label>QUANTITY:</label><br>
                    <input name="quantity">
                </td>
            </tr>
            <tr>
            	<td>
                	<label>MIN:</label><br>
                	<input name="minim">
                </td>
                <td>
                	<label>MAX:</label><br>
					    <input name="maxim">
                </td>
            </tr>
            <tr>
            	<td>
                	<label>PART NUMBER:</label><br>
                    <input name="part">
                </td>
                <td>
                	<label>LINK:</label><br>
                    <input name="lin">
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<button type="submit" name="modi" id="subutton"><i class="glyphicon  glyphicon-save"></i></button>
              	</td>
            </tr>
            </form>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
