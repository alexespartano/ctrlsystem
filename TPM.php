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
if($div != "MFG"){
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
                <div id="ibm-home"><a href="TPM.php">IBM®</a></div>
                <a href="TPM.php">&nbsp;&nbsp;&nbsp;&nbsp;CTRLSYSTEM</a></div>
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
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-12-12">
    <table class="ibm-data-table ibm-padding-small ibm-center ibm-center-block" id="myTable" data-scrollaxis="x" cellspacing="0" cellpadding="0" border="0">
                 <thead>
        <tr>
                 
                    <th>LOCATION</th>
                    <th>TYPE</th>
                    <th>S/N</th>
                    <th>COMMENTS</th>
                     <th>LOCATED</th>
                    <th>SUBMIT</th>
                   
        </tr>
      </thead>
            <tbody>
               <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "LOCATION", "TYPE", "S/N", "ID", "LOCALIZADO" FROM CTRLSYSTEM.TPM WHERE "AREA"  LIKE '."'$USER'".'  ORDER BY "LOCATION"';
            
            $stmt=db2_prepare($db2,$query);
            if($stmt){
               $result=db2_execute($stmt);
              if(!$result){
                echo "Error Messange". db2_stmt_errormsg($stmt);
              }
              
        while($row = db2_fetch_array($stmt)){
        if($row[4]==0){
            echo '<tr><form action="tpmwriter.php" method="post" class="ibm-row-form"><td align="center">' .$row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td>
            <td><input type="text" name="com"></td>
            <td align="center"><input type="checkbox" name="check" value="YES"></td>

            <td align="center" class="ibm-ind-link"><input type="hidden" name="id" value="'.$row[3].'"><button type="submit" id="subutton" class="ibm-btn-sec ibm-btn-transparent" ibm-btn-small"><a href="#" class="ibm-confirm-link"></a></button></td>
          </form>';
            echo '</tr>';
              }
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