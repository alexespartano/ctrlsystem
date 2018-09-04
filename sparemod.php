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

    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
  </head>
  <body id="ibm-com" class="ibm-type">
    <div id="ibm-top" class="ibm-landing-page">
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
                    <form action="sparewrite.php" method="post" class="ibm-row-form">
                         <input type="hidden" value="<?php echo $id;?>" name="identy">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Modifier</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="it">Item:<span class="ibm-required">*</span></label>
                    <input type="text" list="item" size="10" name="items" id="it" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="qa">Quantity:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="quantity" id="qa" list="qua" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="mi">Min:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="minim" id="mi" list="min" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="ma">Max:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="maxim" id="ma" list="max" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="pn">Part Number:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="part" id="pn" list="par" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="ln">Link:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="lin" id="ln" placeholder="www.example.com" list="li" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                 <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but"><a class="ibm-save-link">Save Changes</a></button>
     </span>
            </div>
        </div> 
    </form>       
        </main>
      </div>
    </div>

  </body>
</html>