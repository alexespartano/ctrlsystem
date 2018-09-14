
<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is set will redirect to main
if(isset($_SESSION['username']) || !empty($_SESSION['username'])){
  $user = strtoupper($_SESSION['username']);
   require_once('connectsys.php'); #db2 variable
   $sql = "SELECT DIVISION FROM CTRLSYSTEM.USERS WHERE USERNAME = '$user'";
   $stmt = db2_prepare($db2, $sql);
   if($stmt){
   $result = db2_execute($stmt);
    if (!$result) {
         echo "exec errormsg: " .db2_stmt_errormsg($stmt);
          exit;
        }
   }else{
    echo "<p>Failed coneccion.</p>";
    exit;
   }
   $division = "";
   //assign the division of the user to a variable
   while($row = db2_fetch_array($stmt)){
    $division = $row[0];
   }
     db2_close( $db2 );
     //re direct to the right page.
              if($division == "IT"){
                         header("location: main.php");
                        }
                        if($division == "TOOL"){
                         header("location: toolspare.php");
                        }
                         if($division == "MANUFACTURA"){
                         header("location: diskfile.php");
                        }
                         if($division == "MFS"){
                         header("location: viewermfs.php");
                        }
                        if($division == "MFG"){
                         header("location: TPM.php");
                        }
                        
  exit;
}
?>
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>LogIn</title>
    
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
      <nav role="navigation" aria-label="NAV">
        <div class="ibm-sitenav-menu-container">
            <div class="ibm-sitenav-menu-name">
                <div id="ibm-home"><a href="main.php">IBM®</a></div>
                </div> 
        </div>
    </nav>
        <main role="main" aria-labelledby="ibm-pagetitle-h1" class="ibm-band">

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
       <br>
      <br>
      <br>
      <div class="ibm-columns" data-items=".ibm-card" data-widget="setsameheight">
        <div class="ibm-col-12-4"></div>
    <div class="ibm-col-12-4 ibm-col-medium-6-2 ibm-center">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <p class="ibm-center"><h3 class="ibm-h3">CTRLSYSTEM</h3></p>
                <p></p>
               <form action="process.php" method="post" class="ibm-row-form">
                     <p class="ibm-icon-nolink ibm-profile-link"><input type="text" size="40" id="us" name="User" placeholder="Username" autofocus></p>
                    <p></p>
                     <p class="ibm-icon-nolink ibm-password-link"><input type="password" name="pwd" placeholder="Password" size="40" id="pa"></p>
                    <p class="ibm-center"><button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent" name="log"><a class="ibm-confirm-link">LogIn</a></button></p>
          </form>
            </div>
        </div>
    </div>
</div>
    
      <br><br><br><br><br><br><br><br>
        </main>
      </div>
    </div>

  </body>
      <br>
  <br>
  <br>
<div class="ibm-columns">
  <div class="ibm-col-12-9"></div>
  <div class="ibm-col-12-3 ibm-right">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span class="ibm-ind-link"><a class="ibm-email-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="IBMCore.common.widget.overlay.show('overlayExampleSmall'); return false;">Contact</a> &nbsp;<a class="ibm-help-link ibm-btn-sec ibm-btn-blue-50" href="#">Help/Manual</a></span>
  <div class="ibm-common-overlay  ibm-overlay-alt" data-widget="overlay" id="overlayExampleSmall">
       <p class="ibm-center ibm-ind-link""><a href="#" class="ibm-admin-link">alexr@mx1.ibm.com. Alejandro Romero Aldrete</a></p>
       <p class="ibm-center ibm-ind-link""><a href="#" class="ibm-admin-link">gilbusta@mx1.ibm.com Gilberto Bustamante Sanchez</a></p>
</div>
</div>
</div>
</html>