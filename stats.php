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
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>PC status</title>
    
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
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0 ibm-pull-quote ibm-h1">
            <div class="ibm-col-6-6" id="1">
               <p class=" ibm-h1 ibm-center">PC STATUS SOFTWARE.</p>
                </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0 ibm-pull-quote ibm-h1">
            <div class="ibm-col-6-6" id="1">
               <p class=" ibm-h3 ibm-center">Used for check the conexion of a MFG PC from Storage and Appliance.</p>
                </div>
        </div>
         <div class="ibm-columns ibm-seamless ibm-padding-bottom-0 ibm-pull-quote ibm-h1">
            <div class="ibm-col-6-6" id="1">
               <p class="ibm-center">Make sure you have the most recent JRE from JAVA.<br>At the time you execute the program wait around 3 minutes for display the information, the software call every pc through the network.</p>
                </div>
        </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1" id="2">
              <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-btn-small"><a class="ibm-confirm-link  ibm-btn-sec" href="PCstats.jar">Yes</a></button>
                <b class="ibm-ind-link"><a class="ibm-close-link  ibm-btn-pri" href="javascript:close()">No</a></b>
            </div>
        </div> 
    
        </main>
      </div>
    </div>

  </body>
</html>