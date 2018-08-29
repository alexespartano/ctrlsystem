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
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
}else{
$id = "null";
$id=strtoupper($_GET['id']);
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
<div class="row boxcol">
 <div class="col-sm-12">
 	<table class="table table-responsive table-condensed" id="modtable">
			<thead>
				<tr>
                	<th colspan="2">DELETE</th>
				</tr>
			</thead>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
}else{ echo $id;}?>" name="identy">
            <tr>
            	<td>
                	<label>LOCATION:</label><br>
                    <label><?php 
					if($_SERVER["REQUEST_METHOD"] == "POST"){
}else{
					  require_once('connectsys.php');
            			$query = 'SELECT "LOCATION" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
            			$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
                <td>
              		<label>AREA:</label><br>
                    <label><?php 
					if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
            			$query = 'SELECT "AREA" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
						}
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>BRAND:</label><br>
                     <label><?php
					 if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
						$query = 'SELECT "BRAND" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
                <td>
                	<label>TYPE:</label><br>
					<label><?php 
					  if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
						$query = 'SELECT "TYPE" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label><br>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>S/N:</label><br>
                    	<label> <?php
						if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{ 
					  require_once('connectsys.php');
						$query = 'SELECT "S/N" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
						}
					?></label>
                </td>
                <td>
                	<label>MODEL:</label><br>
                    	<label> <?php 
					  	if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
						$query = 'SELECT "MODEL" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
              		<label>RESPONSIBLE:</label><br>
                	<label><?php 
					 	if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
						$query = 'SELECT "RESPONSIBLE" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
            	<td>
                	<label>STATUS:</label><br>
                	<label><?php 
					 if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
						$query = 'SELECT "STAT" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>PHYSICAL INVENTORY:</label><br>
                    <label><?php 
					 if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
            			$query = 'SELECT "PHYSICAL INV" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
                <td>
                	<label>RFID S/N:</label><br>
                    <label><?php 
					 if($_SERVER["REQUEST_METHOD"] == "POST"){
					}else{
					  require_once('connectsys.php');
						$query = 'SELECT "RFID S/N" FROM CTRLSYSTEM.INV WHERE "ID"='.$id;
						$stmt = db2_prepare($db2, $query);
            			if($stmt){
            				$result = db2_execute($stmt);
            				if(!$result){
            					echo "Error messange".db2_stmt_errormsg($stmt);
            				}
            				while ($row = db2_fetch_array($stmt)) {
            					 echo $row[0];
            				}
						}
					}
					?></label>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<button type="submit" name="modi" id="subutton"><i class="glyphicon glyphicon glyphicon-remove"></i>DELETE</button>
              	</td>
            </tr>
            </form>
            <?php 
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				 require_once('connectsys.php');
				 $IDE2 = $_POST['identy'];
				$querydel = 'DELETE FROM CTRLSYSTEM.INV WHERE "ID" = '.$IDE2;
				$stmt=db2_prepare($db2, $querydel);
				if($stmt){
					$result=db2_execute($stmt);
					if(!$result){
						echo "Erro Messange". db2_stmt_errormsg($stmt);
					}
				}
			echo'<tr><td colspan="2"><a href="javascript:close()">ITEM DELETED<br>Close Window</a></td></tr>';
			}
			?>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>