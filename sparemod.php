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
            <form action="sparewrite.php" method="post">
            <input type="hidden" value="<?php echo $id;?>" name="identy">
            <tr>
            	<td>
                	<label>ITEM:</label><br>
                    <input list="item" name="items" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT ITEM FROM CTRLSYSTEM.SPARE WHERE ID='$id'";
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
                     <datalist id="item">
                    <?php
            require_once('connectsys.php');
            $query = "SELECT ITEM FROM CTRLSYSTEM.SPARE GROUP BY ITEM";
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
              		<label>QUANTITY:</label><br>
                    <input list="qua" name="quantity" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT QUANTITY FROM CTRLSYSTEM.SPARE WHERE ID='$id'";
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
                    <datalist id="qua">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT QUANTITY FROM CTRLSYSTEM.SPARE GROUP BY QUANTITY";
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
                	<label>MIN:</label><br>
                	<input list="min" name="minim" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT MIN FROM CTRLSYSTEM.SPARE WHERE ID='$id'";
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
                    <datalist id="min">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT MIN FROM CTRLSYSTEM.SPARE GROUP BY MIN";
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
                	<label>MAX:</label><br>
					    <input list="max" name="maxim" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT MAX FROM CTRLSYSTEM.SPARE WHERE ID='$id'";
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
                    <datalist id="max">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT MAX FROM CTRLSYSTEM.SPARE GROUP BY MAX";
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
                	<label>PART NUMBER:</label><br>
                    <input list="par" name="part" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT PARTNUM FROM CTRLSYSTEM.SPARE WHERE ID='$id'";
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
                    <datalist id="par">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT PARTNUM FROM CTRLSYSTEM.SPARE GROUP BY PARTNUM";
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
                	<label>LINK:</label><br>
                    <input list="li" name="lin" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT LINK FROM CTRLSYSTEM.SPARE WHERE ID='$id'";
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
                    <datalist id="li">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT LINK FROM CTRLSYSTEM.SPARE GROUP BY LINK";
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
