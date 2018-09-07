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
$stau="";
$areau="";
$idw = strtoupper($_POST['identy']);
$ubiw = strtoupper($_POST['UBI']);
$brandw = strtoupper($_POST['BRAND']);
$itemw = strtoupper($_POST['TITEM']);
$quantw = strtoupper($_POST['QUAN']);
$minw = strtoupper($_POST['MIN']);
$maxw = strtoupper($_POST['MAX']);
$stow = strtoupper($_POST['STOCK']);
$modw = strtoupper($_POST['MODEL']);
$linw = $_POST['LINK'];
$madew = strtoupper($_POST['MADE']);

      require_once('connectsys.php');
        $query = 'UPDATE CTRLSYSTEM.TSPARE SET "UBI"='."'$ubiw'".',"BRAND"='."'$brandw'".',"DESC"='."'$itemw'".',"QUANTI"='."'$quantw'".',"MIN"='."'$minw'".',"MAX"='."'$maxw'".',"STOCK"='."'$stow'".',"STAT"='."'N/A'".',"MODEL"='."'$modw'".',"LINK"='."'$linw'".',"MARC"='."'$madew'".' WHERE "ID"='.$idw;
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
    <title>Part Modified</title>
    
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
                <p>Part Modified</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-6">
                <p class=" ibm-h1 ibm-center">Part Updated</p>
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
