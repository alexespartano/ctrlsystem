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
    <title>Add Part's</title>
    
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
                    <form action="sparewadd.php" method="post" class="ibm-row-form">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Add Part</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="it">Item:<span class="ibm-required">*</span></label>
                    <input type="text" value="" size="10" name="items" id="it">
                </div>
                    <div class="ibm-col-6-2">
                <label for="qua">Quantity:<span class="ibm-required">*</span></label>
                    <input type="text" value="" size="10" name="quantity" id="qua">
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="mi">Min:<span class="ibm-required">*</span></label>
                    <input type="text" value="" size="10" name="minim" id="mi">
                </div>
                    <div class="ibm-col-6-2">
                <label for="ma">Max:<span class="ibm-required">*</span></label>
                    <input type="text" value="" size="10" name="maxim" id="ma">
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="pn">Part Number:<span class="ibm-required">*</span></label>
                    <input type="text" value="N/A" size="10" name="part" id="pn">
                </div>
                    <div class="ibm-col-6-2">
                <label for="ln">Link:<span class="ibm-required">*</span></label>
                    <input type="text" value="" size="10" name="lin" id="ln" placeholder="www.example.com">
            </div>
        </div>

        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                 <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but"><a class="ibm-save-link">Add</a></button>
     </span>
            </div>
        </div> 


    </form>       
        </main>
      </div>
    </div>

  </body>
</html>