<?php
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
session_start();
// If session variable is not set it will redirect to login page
$USER = strtoupper($_SESSION['username']);
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
    <title>Spare Parts</title>
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
                <div id="ibm-home"><a href="trecms.php">IBM®</a></div>
                <a href="trecms.php">&nbsp;&nbsp;&nbsp;&nbsp;CTRLSYSTEM</a></div>
            <div class="ibm-sitenav-menu-list">
                <ul role="menubar">
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
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">
<!--ENDFILTERS-->
<br>
<br>
<!--CONTENT-->
<div class="ibm-columns ibm-center" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-12-12 ibm-center">
    <table class="ibm-data-table ibm-grid ibm-altrows  ibm-center ibm-center-block" id="myTable" style="font-size: 10px;">
                 <thead>
        <tr>
                 
                    <th>AREA</th>
                    <th>BRAND</th>
                    <th>SN</th>
                     <th>DATE</th>
                     <th>TOR</th>
                    
                    <th>ENC</th>
                    <th>FIRST</th>
                    <th>SECOND</th>
                    <th>THIRD</th>
                    <th>FOURTH</th>
                    <th>FIFTH</th>
                    <th>TYPE</th>
                    <th>ING</th>
                    
                    <th>SUBMIT</th>
                   
        </tr>
      </thead>
            <tbody>
               <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "AREA", "BRAND", "SN", "DATE", "TOR", "ENC", "PRI", "SEC", "TER", "CUA", "QUI", "TYPE" ,"ING"   FROM CTRLSYSTEM.TRECCIE ';
         
           

            $stmt=db2_prepare($db2,$query);
            if($stmt){
               $result=db2_execute($stmt);
              if(!$result){
                echo "Error Messange". db2_stmt_errormsg($stmt);
              }
              
        while($row = db2_fetch_array($stmt)){       

            echo '<tr><form action="g32.php" method="post" class="ibm-row-form" ><td align="center" >' .
            $row[0]  . '</td><td align="center">' .
            $row[1]  . '</td><td align="center">' .
            $row[2]  . '</td><td align="center">' .
            $row[3]  . '</td><td align="center">' .
            $row[4]  . '</td><td align="center">' .
            $row[5]  . '</td><td align="center">' .
            $row[6]  . '</td><td align="center">' .
            $row[7]  . '</td><td align="center">' .
            $row[8]  . '</td><td align="center">' .
            $row[9]  . '</td><td align="center">' .
            $row[10] . '</td><td align="center">' .
            $row[11] . '</td><td align="center">' .
            $row[12] . '</td>      
                    
             <td align="center" class="ibm-ind-link"> <button type="submit" id="subutton" class="ibm-btn-sec ibm-btn-transparent " ibm-btn-small "><a href="#" class="ibm-confirm-link"></a></button></td></form>';
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