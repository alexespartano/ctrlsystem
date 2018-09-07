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
}?>
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
                    <form action="tsparewadd.php" method="post" class="ibm-row-form">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Add Part</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="it">Ubication:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="tubi" pattern="[A-Z0-9--]{2,30}" required id="it">
                </div>
                    <div class="ibm-col-6-2">
                <label for="qua">Brand:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" name="tbrand" pattern="[A-Z]{2,15}" required id="qua">
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="mi">Description:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" id="mi" name="tdesc" pattern="[A-Z0-9-/-#]{2,80}" required>
                </div>
                    <div class="ibm-col-6-2">
                <label for="ma">TradeMark:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" id="ma" name="tmarc" pattern="[A-Z0-9]{2,40}" required>
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="pn">Model:<span class="ibm-required">*</span></label>
                    <input type="text" value="N/A" size="10" id="pn"  name="tmodel" pattern="[A-Z0-9-/]{2,40}" required>
                </div>
                    <div class="ibm-col-6-2">
                <label for="ln">Max:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" id="ln" name="tmax"pattern="[0-9]{1,5}" required>
            </div>
        </div>

        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="mi">Min:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" id="mi"  name="tmin" pattern="[0-9]{1,5}" required >
                </div>
                    <div class="ibm-col-6-2">
                <label for="qu">Quantity:<span class="ibm-required">*</span></label>
                    <input type="text" size="10" id="qu" name="tquanti" pattern="[0-9]{1,100}" required>
            </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-1"></div>
            <div class="ibm-col-6-2">
                <label for="st">Stock:<span class="ibm-required">*</span></label>
                  <select required id="st" name="tstock">
                      <option value="SI">SI</option>
                      <option value="NO">NO</option>
                </select>
                </div>
        </div>
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-1-1 ibm-center">
                <label for="linki">Link:<span class="ibm-required">*</span></label>
                  <input type="text" name="tlink" placeholder="www.example.com" id="linki" size="30" pattern="{1,200}" required> 
                </div>
        </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                 <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but"><a class="ibm-save-link">Add</a></button>
            </div>
        </div> 


    </form>       
        </main>
      </div>
    </div>

  </body>
</html>