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
                <div id="ibm-home"><a href="tmain.php">IBM®</a></div>
                <a href="tmain.php">&nbsp;&nbsp;&nbsp;&nbsp;CTRLSYSTEM</a></div>
            <div class="ibm-sitenav-menu-list">
                  <ul role="menubar">
                    <li role="presentation"><a role="menuitem" href="tassets.php">Asset's</a></li>
                    <li role="presentation"><a role="menuitem" href="toolrec.php">Records</a></li>
                    <li role="presentation"><a role="menuitem" href="tmttos.php">Calendar of Maintenance</a></li>
                     <li role="presentation"><a role="menuitem" href="ttools.php">Tools</a></li>
                      <li role="presentation"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>
                       <li role="presentation"><a role="menuitem" href="toolspare.php">Spare Parts</a></li>
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
 <form action="titemw.php" method="post" class="ibm-row-form"  id="1">
  <input type="hidden" value="<?php
            require_once('connectsys.php');
                  $query = 'SELECT "ID" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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

      <label for="ar">Area:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="ar" list="are" name="area"  value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "AREA" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT AREA FROM CTRLSYSTEM.TINV GROUP BY AREA";
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
                  $query = 'SELECT "BRAND" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT BRAND FROM CTRLSYSTEM.TINV GROUP BY BRAND";
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
    
    <label for="lo">Accion:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="lo" list="loca" name="accion"  value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT ACCION FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT ACCION FROM CTRLSYSTEM.TINV GROUP BY ACCION";
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
                  $query = 'SELECT "TYPE" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT TYPE FROM CTRLSYSTEM.TINV GROUP BY TYPE";
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
                  $query = 'SELECT "SN" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = 'SELECT "SN" FROM CTRLSYSTEM.TINV GROUP BY "SN"';
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
                  $query = 'SELECT "MODEL" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT MODEL FROM CTRLSYSTEM.TINV GROUP BY MODEL";
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
        
        <label for="mat">TradeMark:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="mat" list="mach" name="trademark" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "TRADEMARK" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT TRADEMARK FROM CTRLSYSTEM.TINV GROUP BY TRADEMARK";
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
      <label for="res">NOM:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="res" list="resp" name="nom" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "NOM" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT NOM FROM CTRLSYSTEM.TINV GROUP BY NOM";
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
    
    <label for="st">Mantto. Date:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="st" list="sta" name="mtto" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MATTO" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = "SELECT MATTO FROM CTRLSYSTEM.TINV GROUP BY MATTO";
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

      <label for="pi">ING:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="pi" list="pinv" name="ing" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "ING" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = 'SELECT "ING" FROM CTRLSYSTEM.TINV GROUP BY "ING"';
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
        
        <label for="dp">Frecuency:<span class="ibm-required">*</span></label>
                    <input type="text" size="20" id="dp" list="dop" name="frecuency" value="<?php 
            require_once('connectsys.php');
                  $query = 'SELECT "FREC" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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
            $query = 'SELECT "FREC" FROM CTRLSYSTEM.TINV GROUP BY "FREC"';
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
                <b class="ibm-ind-link"><a class="ibm-close-link  ibm-btn-pri" href="ttools.php">Go Back</a></b>
            </div>
        </div> ';
}
if($sn!=0 || $sn!=''){
  require_once('connectsys.php');
        $sta = 'SELECT "ID" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
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