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
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Delete</title>
    
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
                    <form class="ibm-row-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
}else{ echo $id;}?>" name="identy">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Delete</p>
            </div>
        </div>          
        <div class="ibm-columns">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">
                <label for="lo">Location:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">
                         <label>Area:</label>
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
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">
            <label>Brand:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">
                        <label>Type:</label>
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
          ?></label>
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">

                <label>S/N:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">

                <label>Model:</label>
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
            </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">

                <label>Responsible:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">

                <label for="st">Status:</label>
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
            </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2 ibm-center">
                     
                <label for="pi">Physical Inv.:</label>
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
                </div>
                    <div class="ibm-col-6-2 ibm-center">
                    
                <label for="rfs">RFID S/N:</label>
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
            </div>
        </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                 <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but"><a class="ibm-close-link">Save</a></button>
            </div>
        </div> 

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
      echo'
<script type="text/javascript">
    window.close();
</script>';
      }
      ?>    
        </main>
      </div>
    </div>

  </body>
</html>