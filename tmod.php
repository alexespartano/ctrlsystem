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
                    <form class="ibm-row-form" action="twrite.php" method="post">
                          <input type="hidden" value="<?php echo $id;?>" name="identy">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Modifier</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-1-1 ibm-center">

                <label>S/N:</label>
                  <label> <?php 
                      require_once('connectsys.php');
                        $query = 'SELECT "SN" FROM CTRLSYSTEM.TINV WHERE ID='.$id;
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
            <div class="ibm-columns">
                <div class="ibm-col-1-1 ibm-center">
                <label for="cme">Comments:</label>
                      <input type="text" name="comments" maxlength="28" id="cme" value="<?php 
                      require_once('connectsys.php');
                        $query = "SELECT COMMENTS FROM CTRLSYSTEM.TINV WHERE ID='$id'";
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