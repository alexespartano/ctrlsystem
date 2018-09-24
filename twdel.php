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
$sn= strtoupper($_POST['tsn']);    
$brand="";
$type="";
 require_once('connectsys.php');
      $queryid = 'SELECT "BRAND","TYPE" FROM CTRLSYSTEM.TINV WHERE "SN"='."'$sn'";
            $stmt = db2_prepare($db2, $queryid);
            if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
              while($row = db2_fetch_array($stmt)){
               $brand=$row[0];
               $type=$row[1];
                }
            } 
$num=0;
    require_once('connectsys.php');
      $queryid = "SELECT ID FROM CTRLSYSTEM.TRECTRANS ORDER BY ID DESC LIMIT 1 ";
            $stmt = db2_prepare($db2, $queryid);
            if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
              while($row = db2_fetch_array($stmt)){
                $num=$row[0] + 1;
                }
            } 
            if($num==0){
              $num=1;
            }  
   $date = new DateTime();
        $date =  $date->format('Y-m-d');
                $date=substr($date,2);
                $date=str_replace('-','/',$date);
                  $I = strtoupper($_SESSION['username']);
$descrip= "DELETE";
 require_once('connectsys.php');
   $query = 'INSERT INTO CTRLSYSTEM.TRECTRANS ("BRAND","TYPE","SN","ING","DATE","ACCION","ID")
                                               VALUES ('."'$brand'".','."'$type'".','."'$sn'".','."'$I'".','."'$date'".','."'$descrip'".','.$num.')';
            $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               }


      require_once('connectsys.php');
        $query = 'DELETE FROM CTRLSYSTEM.TINV WHERE "SN" = '."'$sn'";
            $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
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
    <title>Asset Deleted</title>
    
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
                    <form action="#" method="post" class="ibm-row-form">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Asset Deleted</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-6">
                <p class=" ibm-h1 ibm-center">Asset Deleted From Inventory</p>
                </div>
        </div>
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
              <p class="ibm-ind-link"><a class="ibm-confirm-link ibm-btn-sec" href="javascript:close()">Close Window</a></p>
     </span>
            </div>
        </div> 
    </form>       
        </main>
      </div>
    </div>

  </body>
</html>