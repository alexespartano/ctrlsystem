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
<title>MODIFY</title>
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
            <form action="write.php" method="post">
            <input type="hidden" value="<?php echo $id;?>" name="identy">
            <tr>
            	<td>
                	<label>LOCATION:</label><br>
                    <input list="loca" name="location" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT LOCATION FROM CTRLSYSTEM.INV WHERE ID='$id'";
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
            </datalist>  
                </td>
                <td>
              		<label>AREA:</label><br>
                    <input list="ARE" name="area" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT AREA FROM CTRLSYSTEM.INV WHERE ID='$id'";
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
                    <datalist id="ARE">
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
                    </datalist>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>BRAND:</label><br>
                    <label><?php
                        $BRANDV = ""; 
                      require_once('connectsys.php');
                        $query = "SELECT BRAND FROM CTRLSYSTEM.INV WHERE ID='$id'";
                       $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
                            $BRANDV = $row[0];
                         echo $row[0];
                            }
                        }
                    ?></label><br>
                     <input type="hidden" value="<?php 
                     echo $BRANDV;
                     ?>" name="brand">
                </td>
                <td>
                	<label>TYPE:</label><br>
					<label><?php 
					  require_once('connectsys.php');
            			$query = "SELECT TYPE FROM CTRLSYSTEM.INV WHERE ID='$id'";
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
					?></label><br>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>S/N:</label><br>
                    	<label> <?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "S/N" FROM CTRLSYSTEM.INV WHERE ID='.$id;
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
					?></label>
                </td>
                <td>
                	<label>MODEL:</label><br>
                    	<label> <?php 
					  require_once('connectsys.php');
            			$query = "SELECT MODEL FROM CTRLSYSTEM.INV WHERE ID='$id'";
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
					?></label>
                </td>
            </tr>
            <tr>
            	<td>
              		<label>RESPONSIBLE:</label><br>
                	<label> <?php
                        $RESV = ""; 
                      require_once('connectsys.php');
                        $query = "SELECT RESPONSIBLE FROM CTRLSYSTEM.INV WHERE ID='$id'";
                       $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                        while($row = db2_fetch_array($stmt)){
                            $RESV = $row[0];
                         echo $row[0];
                            }
                        }
                    ?></label>
                    <input type="hidden" value="<?php 
                     echo $RESV;
                     ?>" name="responsible">
                </td>
            	<td>
                	<label>STATUS:</label><br>
                	<input list="stats" name="status" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT STAT FROM CTRLSYSTEM.INV WHERE ID='$id'";
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
                    <datalist id="stats">
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
            </datalist>
                </td>
            </tr>
            <tr>
            	<td>
                	<label>PHYSICAL INVENTORY:</label><br>
                    <input list="physical" name="inventariofisico" value="<?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "PHYSICAL INV" FROM CTRLSYSTEM.INV WHERE ID='.$id;
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
                     <datalist id="physical">
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
            </datalist>
                </td>
                <td>
                	<label>RFID S/N:</label><br>
                    <input list="sn" name="rfidserial" value="<?php 
					  require_once('connectsys.php');
            			$query = 'SELECT "RFID S/N" FROM CTRLSYSTEM.INV WHERE ID='.$id;
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
                     <datalist id="sn">
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
            </datalist>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<label>COMMENTS:</label><br>
                    <input name="comments" maxlength="28">
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
