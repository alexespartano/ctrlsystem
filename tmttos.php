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
?>
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Maintenance</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
    <script script type="text/javascript" src="js/filters2.js"></script>
  <link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
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
    <div id="ibm-leadspace-head" class="ibm-alternate" style="background: url(img/calendar.jpg) center / cover no-repeat;">
           <div id="ibm-leadspace-body" class="ibm-padding-top-2  ibm-padding-bottom-r2 ibm-alternate-background">
           </div>
         </div>
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">                                   
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
  

<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">Maintenance of Screwdriver</h3>
                <p>Add,Delete,Modify Transactions</p>
               <p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="treccie.php">Go ahead</a></p>
            </div>
        </div>
  </div>
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">Preventive Maintenance</h3>
                <p>Preventive Maintencance</p>
               <p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="trecmie.php">Go ahead</a></p>
            </div>
        </div>
  </div>
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">ESD Maintenance</h3>
                <p>Preventive Maintencance Assets</p>
               <p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="g4trectrans
                .php">Go ahead</a></p> <!--g1 los demas son pruebas-->
            </div>
        </div>
  </div>
</div>
<!--row2-->
<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">Checkout Maintenance</h3>
                <p>Preventive Maintencance</p>
                <?php  
                $use=strtoupper($_SESSION['username']);
                $exp=False;
                $abexp=False;
                $dias2;
                 require_once('connectsys.php');
                 $sta = 'SELECT "MATTO" FROM CTRLSYSTEM.TINV WHERE "ING"='."'$use'".' AND "ACCION"='."'REVISION PREVENTIVA'";
                  $stmt = db2_prepare($db2, $sta);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $fech = $row[0];
                  $datemantto=DateTime::createFromFormat('d/m/y', $fech);
                    $fechatoday = new DateTime();
                    ///extraer mes
                    $mesmantto =  $datemantto->format('d/m/y');
                    $mesmantto= substr($mesmantto,2,2);

                    $mestoday=  $fechatoday->format('d/m/y');
                    $mestoday=substr($mestoday,2,2);
                    echo "<p>";
                    echo "mes del manto:".$mesmantto."  mesactual: ".$mestoday;
                    echo "</p>";
                    
                    }
                }
                ?>            </div>
        </div>
  </div>
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">External Maintenance</h3>
                <p>Preventive Maintencance</p>
                <?php  
                $use=strtoupper($_SESSION['username']);
                $exp=False;
                $abexp=False;
                $dias2;
                 require_once('connectsys.php');
                 $sta = 'SELECT "MATTO" FROM CTRLSYSTEM.TINV WHERE "ING"='."'$use'".' AND "ACCION"='."'CALIBRACION EXTERNA'";
                  $stmt = db2_prepare($db2, $sta);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $fech = $row[0];
                  $datemantto=DateTime::createFromFormat('d/m/y', $fech);
                    $fechatoday = new DateTime();
                    $difer=date_diff($fechatoday,$datemantto);
                      $dif= $difer->format("%R%a");
                      $sim =substr($dif,0,1);
                      $numb =substr($dif,1);
                    if($sim == "+" && $numb < 41){
                             echo '<p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="temm.php">About To Expired</a></p>';
                            $abexp=True; 
                            break;
                      }
                          if($sim == "-"){
                              //boton de expirado cortamos ciclo while
                        echo '<p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="temm.php">Expired</a></p>';
                          $exp=True;
                           break;
                          }
                    }
                     if($exp==False && $abexp==False){
                            //codigo boton ok
                      echo '<p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link">OK</a></p>';
                    }  
                }
                ?>
            </div>
        </div>
  </div>
 <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">SISA Maintenance</h3>
                <p>Preventive Maintencance</p>
                <?php  
                $use=strtoupper($_SESSION['username']);
                $exp=False;
                $abexp=False;
                $dias2;
                 require_once('connectsys.php');
                 $sta = 'SELECT "MATTO" FROM CTRLSYSTEM.TINV WHERE "ING"='."'$use'".' AND "ACCION"='."'MANTENIMIENTO SISA'";
                  $stmt = db2_prepare($db2, $sta);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    $fech = $row[0];
                  $datemantto=DateTime::createFromFormat('d/m/y', $fech);
                    $fechatoday = new DateTime();
                    $difer=date_diff($fechatoday,$datemantto);
                      $dif= $difer->format("%R%a");
                      $sim =substr($dif,0,1);
                      $numb =substr($dif,1);
                    if($sim == "+" && $numb < 41){
                             echo '<p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="tsmm.php">About To Expired</a></p>';
                            $abexp=True; 
                            break;
                      }
                          if($sim == "-"){
                              //boton de expirado cortamos ciclo while
                        echo '<p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link" href="tsmm.php">Expired</a></p>';
                          $exp=True;
                           break;
                          }
                    }
                     if($exp==False && $abexp==False){
                            //codigo boton ok
                      echo '<p class="ibm-icon-nolink ibm-linkcolor-default"><a class="ibm-forward-link">OK</a></p>';
                    }  
                }
                ?>
            </div>
        </div>
  </div>
</div>

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