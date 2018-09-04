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
$item = strtoupper($_POST['items']);
$quanti = strtoupper($_POST['quantity']);
$min = strtoupper($_POST['minim']);
$max = strtoupper($_POST['maxim']);
$partnum = strtoupper($_POST['part']);
$link = $_POST['lin'];
$num=0;
    require_once('connectsys.php');
      $queryid = "SELECT ID FROM CTRLSYSTEM.SPARE ORDER BY ID DESC LIMIT 1";
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
      require_once('connectsys.php');
        $query = 'INSERT INTO CTRLSYSTEM.SPARE ("ID","ITEM","QUANTITY","MIN","MAX","PARTNUM","LINK") VALUES ('.$num.','."'$item'".','."'$quanti'".','."'$min'".','."'$max'".','."'$partnum'".','."'$link'".')';
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
    <title>Part Added</title>
    
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
                <p>Part Added</p>
            </div>
        </div>          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-6-6">
                <p class=" ibm-h1 ibm-center">Part Added on SparePart's</p>
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