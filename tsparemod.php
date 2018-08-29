<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "TOOL"){
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
                	<th colspan="3">MODIFIER</th>
				</tr>
			</thead>
            <form action="tsparewrite.php" method="post">
            <input type="hidden" value="<?php echo $id;?>" name="identy">
            <tr>
            	<td>
                	<label>UBICATION:</label><br>
                    <input list="item" name="UBI" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT UBI FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
            $query = "SELECT UBI FROM CTRLSYSTEM.TSPARE GROUP BY UBI";
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
              		<label>BRAND:</label><br>
                    <input list="qua" name="BRAND" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT BRAND FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                        $query = "SELECT BRAND FROM CTRLSYSTEM.TSPARE GROUP BY BRAND";
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
                  <label>ITEM:</label><br>
                  <input list="IT" name="TITEM" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DESC" FROM CTRLSYSTEM.TSPARE WHERE "ID"='."'$id'";
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
                    <datalist id="IT">
                        <?php
                        require_once('connectsys.php');
                        $query = 'SELECT "DESC" FROM CTRLSYSTEM.TSPARE GROUP BY "DESC"';
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
                	<label>QUANTITY:</label><br>
					    <input name="QUAN" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT QUANTI FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                </td>
                 <td>
                  <label>MIN:</label><br>
              <input name="MIN" value="<?php 
            require_once('connectsys.php');
                  $query = "SELECT MIN FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                </td>
                 <td>
                  <label>MAX:</label><br>
              <input name="MAX" value="<?php 
            require_once('connectsys.php');
                  $query = "SELECT MAX FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                </td>
            </tr>
            <tr>
            	<td>
                	<label>STOCK:</label><br>
                    <input list="par" name="STOCK" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT STOCK FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                    </datalist>
                </td>
                  <td>
                  <label>STATUS:</label><br>
                    <input list="ST" name="STAT" value="<?php 
            require_once('connectsys.php');
                  $query = "SELECT STAT FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                    <datalist id="ST">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT STAT FROM CTRLSYSTEM.TSPARE GROUP BY STAT";
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
                	<label>MODEL:</label><br>
                    <input list="MO" name="MODEL" value="<?php 
					  require_once('connectsys.php');
            			$query = "SELECT MODEL FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                    <datalist id="MO">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT MODEL FROM CTRLSYSTEM.TSPARE GROUP BY MODEL";
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
                  <label>MADE BY:</label><br>
                    <input list="mad" name="MADE" value="<?php 
            require_once('connectsys.php');
                  $query = "SELECT MARC FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                    <datalist id="mad">
                        <?php
                        require_once('connectsys.php');
                        $query = "SELECT MARC FROM CTRLSYSTEM.TSPARE GROUP BY MARC";
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
                <td colspan="2">
                  <label>LINK:</label><br>
                    <input list="li" name="LINK" placeholder="www.example.com" value="<?php 
            require_once('connectsys.php');
                  $query = "SELECT LINK FROM CTRLSYSTEM.TSPARE WHERE ID='$id'";
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
                </td>
              </tr>
              <tr>
            	<td colspan="3">
                	<button type="submit" name="modi" class="btn btn-default"><i class="glyphicon  glyphicon-save"></i></button>
              	</td>
            </tr>
            </form>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
