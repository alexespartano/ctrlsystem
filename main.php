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
    <title>Home</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
  </head>
  <body id="ibm-com" class="ibm-type">
    <div id="ibm-top" class="ibm-landing-page">
<nav role="navigation" aria-label="NAV">
        <div class="ibm-sitenav-menu-container">
            <div class="ibm-sitenav-menu-name">
            	<div id="ibm-home"><a href="main.php">IBM®</a></div>
            	<a href="main.php">&nbsp;&nbsp;&nbsp;&nbsp;CTRLSYSTEM</a></div>
            <div class="ibm-sitenav-menu-list">
                <ul role="menubar">
                    <li role="presentation" class="ibm-haschildlist"><button role="menuitem">Ctrl of Assets</button>
                        <ul role="menu" aria-label="Assets">
                            <li role="presentation"><a role="menuitem" href="assets.php">View/Modify</a></li>
                            <li role="presentation"><a role="menuitem" href="peradd.php">Add</a></li>
                            <li role="presentation"><a role="menuitem" href="perdel.php">Delete</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a role="menuitem" href="rec.php">Records</a></li>
                    <li role="presentation"><a role="menuitem"  href="service.php">Services</a></li>
                    <li role="presentation"><a role="menuitem" href="mttos.php">Calendar of Maintenance</a></li>
                     <li role="presentation"><a role="menuitem" href="tools.php">Tools</a></li>
                      <li role="presentation"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>
                       <li role="presentation"><a role="menuitem" href="spareparts.php">Spare Parts</a></li>
                    <!-- Optional right side CTA link -->
                    <li class="ibm-sitenav-menu-item-right">
                      <p class="ibm-ind-link ibm-icononly ibm-icononly" style="margin-top: 7px;"><a class="ibm-profile-link"></a></p>
                      <ul role="menu" style="margin-top: -15px;">
                            <li role="presentation"><a role="menuitem"><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
                            <li role="presentation"><a role="menuitem" href="logout.php">Logout</a></li>
                        </ul>
                        
                      </li>
                </ul>
            </div>
             
        </div>
    </nav>
            <!-- CONTENT_NAV_BEGIN -->
                        <!-- CONTENT_NAV_END -->
        <div id="ibm-leadspace-head" class="ibm-alternate" style="background: url(/img/Imag_bkp/banner.jpg) center / cover no-repeat; max-height: 500px;">
  <div id="ibm-leadspace-body" class="ibm-padding-top-2  ibm-padding-bottom-r2 ibm-alternate-background">
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
      <br>
      <br> 
    	<br>
  </div>
</div>        
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">
                                                        
     <div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-cool-white-30 ibm-textcolor-default">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">Ctrl of Assets</span>
                    <br />Inventory of Asset´s, list of all Assets, where you can see, modify, delete and add new items. </h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="assets.php">Go ahead</span></p>
        </a>
    </div>
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-neutral-white-20 ibm-textcolor-default">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">Records</span>
                    <br />Records. the entire list of corrective services.</h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="rec.php">Go ahead</span></p>
        </a>
    </div>
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-neutral-white-30">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">Services</span>
                    <br />Services Register Form to register preventive and corrective services.</h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="service.php">Go ahead</span></p>
        </a>
    </div>
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-neutral-white-40">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">Calendar of Maintenance</span>
                    <br />Calendar for check your maintenance list all months and check if you had any maintenance pendent.</h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="mttos.php">Go ahead</span></p>
        </a>
    </div>
</div>    
<br>
<br>
 <div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-cool-white-30 ibm-textcolor-default">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">Tools</span>
                    <br />System Tools. </h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="tools.php">Go ahead</span></p>
        </a>
    </div>
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-neutral-white-20 ibm-textcolor-default">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">TPM</span>
                    <br />T.P.M. OVERVIEW </h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="TPMVIEWER.php">Go ahead</span></p>
        </a>
    </div>
    <div class="ibm-col-4-1 ibm-nospacing ibm-background-neutral-white-30">
        <a href="##" class="ibm-blocklink ibm-padding-content">
            <div class="ibm-center"></div>
            <h4 class="ibm-padding-top-1"><span class="ibm-bold">Spare Parts</span>
                    <br />List of Spare parts for the Maintenance of the assets.</h4>
            <p class="ibm-icon-nolink ibm-linkcolor-default"><span class="ibm-forward-link" href="spareparts.php">Go ahead</span></p>
        </a>
    </div>
</div>  
      </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>