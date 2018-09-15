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
    <title>Modifier</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
<link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
  </head>
  <body id="ibm-com" class="ibm-type">
    <div id="ibm-top" class="ibm-landing-page">
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
                   <!--CONTENT-->
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-1-1 ibm-nospacing">
    <table class="ibm-data-table ibm-grid ibm-altrows  ibm-padding-small ibm-center" id="myTable" data-scrollaxis="x" cellspacing="0" cellpadding="0" border="0" style="font-size: 9px;">
            <thead>
                <tr>
                    <th>STATUS</th>
                    <th>LOCATION</th>
                    <th>AREA</th>
                    <th>BRAND</th>
                    <th>S/N</th>
                    <th>MT</th>
                    <th>MODEL</th>
                    <th>RESPONSIBLE</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "LOCATION", "AREA", "BRAND", "S/N", "MT", "MODEL", "RESPONSIBLE" FROM CTRLSYSTEM.INV ORDER BY "LOCATION"';
             $stmt = db2_prepare($db2, $query); 
            if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
            $output = shell_exec("ping ".$row[3]);
 
            if (strpos($output, "recibidos = 0")) {
                echo '<tr><td align="center" class="ibm-ind-link"><a href="#" class="ibm-close-link">OFFLINE</a></td><td align="center">';
              } else {
                    echo '<tr><td align="center" class="ibm-ind-link"><a href="#" class="ibm-confirm-link">ONLINE</a></td><td align="center">';
                  }
          echo $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td>';
            echo '</tr>';
            }   
            echo '</table>';
        }
            db2_close($db2);  
            
            ?>
            </tbody>
        </table>
    </div>
</div>     
        </main>
      </div>
    </div>

  </body>
</html>