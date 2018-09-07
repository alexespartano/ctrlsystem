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
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Modify</title>
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
                    <form action="tsparewrite.php" method="post" class="ibm-row-form">
                          <input type="hidden" value="<?php echo $id;?>" name="identy">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Part Modifier</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="it">Ubication:<span class="ibm-required">*</span></label>
                     <input type="text" list="item" name="UBI" size="10" id="it" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="qua">Brand:<span class="ibm-required">*</span></label>
                     <input type="text" size="10" id="qua" list="qua" name="BRAND" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="mi">Description:<span class="ibm-required">*</span></label>
                     <input type="text" list="IT" id="mi" size="10" name="TITEM" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="ma">TradeMark:<span class="ibm-required">*</span></label>
                     <input type="text" list="mad" size="10" id="ma" name="MADE" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="pn">Model:<span class="ibm-required">*</span></label>
                     <input type="text" list="MO" size="10" id="pn" name="MODEL" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="ln">Max:<span class="ibm-required">*</span></label>
                     <input type="text" name="MAX" size="10" id="ln" value="<?php 
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="mi">Min:<span class="ibm-required">*</span></label>
                     <input type="text" name="MIN" size="10" id="mi" value="<?php 
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
                </div>
                    <div class="ibm-col-6-2">
                <label for="qu">Quantity:<span class="ibm-required">*</span></label>
                     <input type="text" name="QUAN" size="10" id="qu" value="<?php 
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
            </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="st">Stock:<span class="ibm-required">*</span></label>
                 <input type="text" list="par" id="st" name="STOCK" value="<?php 
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
                </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-1-1 ibm-center">
                <label for="linki">Link:<span class="ibm-required">*</span></label>
                  <input type="text" list="li" name="LINK" id="linki" placeholder="www.example.com" value="<?php 
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
                </div>
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