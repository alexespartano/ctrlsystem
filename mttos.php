<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
$user=strtoupper($_SESSION['username']);
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "IT"){
 header("location: index.php");
}else{
    if($user == "ADMIN"){
header("location: admincalendar.php");
exit;
        }
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
    <title>Assets</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
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
                    <li role="presentation" class="ibm-highlight"><a role="menuitem" href="mttos.php">Calendar of Maintenance</a></li>
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
    <!--Banner-->
             <div id="ibm-leadspace-head" class="ibm-alternate" style="background: url(img/calendar.jpg) center / cover no-repeat;">
           <div id="ibm-leadspace-body" class="ibm-padding-top-2  ibm-padding-bottom-r2 ibm-alternate-background">
           </div>
         </div>
         <!--endBanner-->
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">                                   
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
  
<!--ROW1-->
<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3 ibm-center">January</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="1" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "01"){
                if ($recyear > $year){                  
                }else{
    if( $month == "01"){
    $flag = 1;
      }
      if($month >"01"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "01" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
  </div>
  <!--               FEB                -->
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                 <h3 class="ibm-h3 ibm-center">February</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="2" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "02"){
                if ($recyear > $year){                  
                }else{
    if( $month == "02"){
    $flag = 1;
      }
      if($month >"02"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "02" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
    </div>
    <!--             March           -->
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-h3 ibm-center">March</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="3" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "03"){
                if ($recyear > $year){                  
                }else{
    if( $month == "03"){
    $flag = 1;
      }
      if($month >"03"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "03" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
        </div>
    </div>
</div>
<!--ENDROW1-->

<!--ROW2-->
<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3 ibm-center">April</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="4" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "04"){
                if ($recyear > $year){                  
                }else{
    if( $month == "04"){
    $flag = 1;
      }
      if($month >"04"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "04" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
  </div>
  <!--               may                -->
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                 <h3 class="ibm-h3 ibm-center">May</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="5" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "05"){
                if ($recyear > $year){                  
                }else{
    if( $month == "05"){
    $flag = 1;
      }
      if($month >"05"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "05" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
    </div>

    <!--             june          -->
    
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-h3 ibm-center">June</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="6" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "06"){
                if ($recyear > $year){                  
                }else{
    if( $month == "06"){
    $flag = 1;
      }
      if($month >"06"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "06" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
        </div>
    </div>
</div>
<!--ENDROW2-->

<!--ROW3-->
<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3 ibm-center">July</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="7" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "07"){
                if ($recyear > $year){                  
                }else{
    if( $month == "07"){
    $flag = 1;
      }
      if($month >"07"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "07" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
  </div>

  <!--               aug                -->
  
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                 <h3 class="ibm-h3 ibm-center">August</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="8" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "08"){
                if ($recyear > $year){                  
                }else{
    if( $month == "08"){
    $flag = 1;
      }
      if($month >"08"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "08" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
    </div>

    <!--             sep           -->
    
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-h3 ibm-center">September</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="9" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "09"){
                if ($recyear > $year){                  
                }else{
    if( $month == "09"){
    $flag = 1;
      }
      if($month >"09"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "09" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
        </div>
    </div>
</div>
<!--ENDROW3-->

<!--ROW4-->
<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3 ibm-center">October</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="10" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "10"){
                if ($recyear > $year){                  
                }else{
    if( $month == "10"){
    $flag = 1;
      }
      if($month >"10"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "10" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
  </div>

  <!--               nov                -->
  
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                 <h3 class="ibm-h3 ibm-center">November</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="11" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "11"){
                if ($recyear > $year){                  
                }else{
    if( $month == "11"){
    $flag = 1;
      }
      if($month >"11"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "11" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
            </div>
        </div>
    </div>

    <!--             dic           -->
    
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-h3 ibm-center">December</h3>
               <p class="ibm-center">Check the Maintenance for the month.</p>
               <br>
                <form action="calm.php" method="post"> 
            <button type="submit" value="12" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but">
               <?php  
                $flag = 0;
                $flag2 = 0;
              $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
              $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
              $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "12"){
                if ($recyear > $year){                  
                }else{
    if( $month == "12"){
    $flag = 1;
      }
      if($month >"12"){
        echo '<a class="ibm-close-link">Expired</a>';
                    $flag2 = 1;
                        break;

            }
                  }
                }
                }
            }
       if($month == "12" && $flag == 1){
          echo '<a class="ibm-view-link">About to Expired</a>';
        }else{
                if($flag2 == 0){
          echo '<a class="ibm-confirm-link">OK</a>';
          }
                    }
               ?>
             </button>
           </form>
        </div>
    </div>
</div>
<!--ENDROW4-->
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