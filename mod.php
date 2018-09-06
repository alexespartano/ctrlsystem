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
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Modifier</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
<link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
  </head>
  <body id="ibm-com" class="ibm-type">
    <div id="ibm-top" class="ibm-landing-page">
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
                    <form class="ibm-row-form" action="write.php" method="post">
                          <input type="hidden" value="<?php echo $id;?>" name="identy">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Modifier</p>
            </div>
        </div>          
        <div class="ibm-columns">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">
                <label for="lo">Location:</label>
                     <input type="text" list="loca" name="location" id="lo" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">
                         <label for="ar">Area:</label>
                    <input type="text" list="ARE" name="area" id="ar" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">
            <label>Brand:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">
                        <label>Type:</label>
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
                    ?></label>
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">

                <label>S/N:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">

                <label>Model:</label>
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
            </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">

                <label>Responsible:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">

                <label for="st">Status:</label>
                   <input type="text" list="stats" name="status" id="st" value="<?php 
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
            </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">
                     
                <label for="pi">Physical Inv:</label>
                    <input type="text" list="physical" name="inventariofisico" id="pi" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">
                    
                <label for="rfs">RFID S/N:</label>
                    <input type="text" list="sn" name="rfidserial" id="rfs" value="<?php 
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
            </div>
        </div>
            <div class="ibm-columns">
                <div class="ibm-col-1-1 ibm-center">
                <label for="cme">Comments:</label>
                      <input type="text" name="comments" maxlength="28" id="cme"></div>

            </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                 <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but"><a class="ibm-save-link">Save</a></button>
            </div>
        </div> 

    </form>       
        </main>
      </div>
    </div>

  </body>
</html>