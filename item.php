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
$sn=0;
$iden=0;
$sn=strtoupper($_POST['sn']);
?>
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Tool's</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
  <link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
    IBMCore.common.util.config.set({
       backtotop: {
        enabled: true
        }
    });
</script>   
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
                     <li role="presentation" class="ibm-highlight"><a role="menuitem" href="tools.php">Tools</a></li>
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
    <div id="ibm-leadspace-head" class="ibm-alternate" style="background: url(img/tools.jpg) center / cover no-repeat;">
           <div id="ibm-leadspace-body" class="ibm-padding-top-2  ibm-padding-bottom-r2 ibm-alternate-background">
           </div>
         </div>
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">                                   
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0 ibm-background-neutral-white-10" data-widget="setsameheight" data-items=".ibm-blocklink">
  <div class="ibm-columns">
    <div class="ibm-col-1-1">
      <p class="ibm-center  ibm-h1">Item</p>
    </div>
  </div>
 <form action="itemw.php" method="post" class="ibm-row-form"  id="1">
  <input type="hidden" value="<?php
            require_once('connectsys.php');
                  $query = 'SELECT "ID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
             ?>" name="identy">
<!--ROW1-->
<div class="ibm-columns">
  <div class="ibm-col-12-3">
    
    <label for="lo">Location:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="lo" list="loca" name="location"  value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT LOCATION FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
    <div class="ibm-col-12-3">

      <label for="ar">Area:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="ar" list="are" name="area"  value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "AREA" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="are">
                    
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
    <div class="ibm-col-12-3">
        
        <label for="br">Brand:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="br" list="bra" name="brand" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "BRAND" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="bra">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT BRAND FROM CTRLSYSTEM.INV GROUP BY BRAND";
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
    <div class="ibm-col-12-3">
       <label for="ty">Type:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="ty" list="typ" name="type" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "TYPE" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="typ">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT TYPE FROM CTRLSYSTEM.INV GROUP BY TYPE";
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
<!--ENDROW1-->
<!--ROW2-->
<div class="ibm-columns">
  <div class="ibm-col-12-3">
    
    <label for="se">Serial:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="se" list="seri" name="serial" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "S/N" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="seri">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "S/N" FROM CTRLSYSTEM.INV GROUP BY "S/N"';
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
    <div class="ibm-col-12-3">

      <label for="mo">Model:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="mo" list="mod" name="model"  value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MODEL" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="mod">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT MODEL FROM CTRLSYSTEM.INV GROUP BY MODEL";
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
    <div class="ibm-col-12-3">
        
        <label for="mat">MT:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="mat" list="mach" name="mt" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MT" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="mach">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT MT FROM CTRLSYSTEM.INV GROUP BY MT";
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
    <div class="ibm-col-12-3">
      <label for="res">Responsible:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="res" list="resp" name="responsible" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "RESPONSIBLE" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="resp">
                    
                    <?php
            require_once('connectsys.php');
            $query = "SELECT RESPONSIBLE FROM CTRLSYSTEM.INV GROUP BY RESPONSIBLE";
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

<!--ROW3-->
<div class="ibm-columns">
  <div class="ibm-col-12-3">
    
    <label for="st">Status:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="st" list="sta" name="stat" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "STAT" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="sta">
                    
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
    <div class="ibm-col-12-3">

      <label for="pi">Physical inv:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="pi" list="pinv" name="physical" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "PHYSICAL INV" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="pinv">
                    
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
    <div class="ibm-col-12-3">
        
        <label for="dp">Date of Pruchase:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="dp" list="dop" name="purchase" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DATE OF PURCHASE" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="dop">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "DATE OF PURCHASE" FROM CTRLSYSTEM.INV GROUP BY "DATE OF PURCHASE"';
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
    <div class="ibm-col-12-3">
      <label for="dd">Date of Depreciation:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="dd" list="dod" name="depreciation" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DATE OF DEPRECIATION" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="dod">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "DATE OF DEPRECIATION" FROM CTRLSYSTEM.INV GROUP BY "DATE OF DEPRECIATION"';
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

<!--ROW4-->
<div class="ibm-columns">
  <div class="ibm-col-12-3">
    
    <label for="cc">Cost Center:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="cc" list="ccen" name="center" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="ccen">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV GROUP BY "COST CENTER"';
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
    <div class="ibm-col-12-3">

      <label for="ni">Num inver:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="ni" list="ninv" name="inver" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "NUM INVER" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="ninv">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "NUM INVER" FROM CTRLSYSTEM.INV GROUP BY "NUM INVER"';
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
    <div class="ibm-col-12-3">
        
        <label for="rfs">RFID s/n:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="rfs" list="rfsn" name="rfserial" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "RFID S/N" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="rfsn">
                    
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
    <div class="ibm-col-12-3">
      <label for="drfi">Date RFID:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="drfi" list="drf" name="drf" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "DATE RFID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="drf">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "DATE RFID" FROM CTRLSYSTEM.INV GROUP BY "DATE RFID"';
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

<!--ROW5-->
<div class="ibm-columns">
  <div class="ibm-col-12-3">
    
    <label for="i">ING:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="i" list="ing" name="inge" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "ING" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="ing">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "ING" FROM CTRLSYSTEM.INV GROUP BY "ING"';
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
    <div class="ibm-col-12-3">

      <label for="md">Mainte. Date:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="md" list="mdate" name="matto" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="mdate">
                    
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV GROUP BY "FECHA MATTO"';
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
    <div class="ibm-col-12-3">
        
        <label for="fm">Frecuency of Maintenance:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="fm" list="fre" name="frecuency" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "FRECUENCY MTTO" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
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
                     <datalist id="fre">
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "FRECUENCY MTTO" FROM CTRLSYSTEM.INV GROUP BY "FRECUENCY MTTO"';
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
<div class="ibm-col-1-1">
  <p class="ibm-right"><button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth"><a class="ibm-save-link">Save</a></button></p>
</div>
</div>
</form>
  <?php
      $flag=0;
function nosn(){
  //table for  s/n not founded
   echo '<script>$("#" + 1).remove();</script>';
  echo "<br><br><br>";
  echo '<div class="ibm-columns ibm-seamless ibm-padding-bottom-0 ibm-pull-quote ibm-h1">
            <div class="ibm-col-6-6">
               <p class=" ibm-h1 ibm-center">Serial Number Not Founded.</p>
                </div>
        </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <b class="ibm-ind-link"><a class="ibm-close-link  ibm-btn-pri" href="tools.php">Go Back</a></b>
            </div>
        </div> ';
}
if($sn!=0 || $sn!=''){
  require_once('connectsys.php');
        $sta = 'SELECT "ID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$sn'";
            $stmt = db2_prepare($db2, $sta);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $flag=$flag+1;
                    $iden=$row[0];
                    }   
                }
                if($iden==0){
                  nosn();
                }
}else{
  nosn();
}
?>



              </div>
            </div>
          </div>
        </main>
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