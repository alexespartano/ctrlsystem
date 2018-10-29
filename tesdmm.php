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
    <script script type="text/javascript" src="js/filtersttrec.js"></script>
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
                    <li role="presentation"><a role="menuitem" class="ibm-highlight"><a role="menuitem" href="tmttos.php">Calendar of Maintenance</a></li>
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
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">
<!--ENDFILTERS-->

<br>
<br>
<br>
<br>
<!--CONTENT-->
<div class="ibm-columns ibm-center" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-12-12 ibm-center">
    <table class="ibm-data-table ibm-center ibm-center-block" id="myTable">
            <thead>
                <tr>
                    <th>AREA</th>
                    <th>BRAND</th>
                    <th>ASPECT MESUREMENT</th>
                    <th>SAMPLE SIZE</th>  
                    <th>DATE</th>
                    <th>MESUREMENTS</th>    
                    <th>SUBMIT</th>
                </tr>
            </thead>
            <tbody>


                <?php
                  $use=strtoupper($_SESSION['username']);
              require_once('connectsys.php');
            $query = 'SELECT  "AREA","BRAND","TYPE","MATTO" FROM CTRLSYSTEM.TINV WHERE "ING"='."'$use'".' AND "ACCION"='."'MEDICIONES ESD'";
          $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $fech = $row[3];
                $datemantto=DateTime::createFromFormat('d/m/y', $fech);
                $fechatoday = new DateTime();
                ///extraer mes
                $mesmantto =  $datemantto->format('d/m/y');
                $anomantto= substr($mesmantto,6,2);
                $mesmantto= substr($mesmantto,3,2);

                $mestoday=  $fechatoday->format('d/m/y');
                $anotoday=substr($mestoday,6,2);
                $mestoday=substr($mestoday,3,2);
               
                if($anomantto < $anotoday){
                  //expirado
                  echo '<tr bgcolor="#ff5050"><form action="tesdmmw.php" method="post" class="ibm-row-form"><td align="center" >' .
            $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td><input type="text" name="sample" size="3"></td><td align="center">' .
            $row[3] . '</td><td><input type="text" name="mesure" size="20"></td><td><input type="text" name="comm" size="10"></td><td align="center" class="ibm-ind-link"> <button type="submit" id="subutton" class="ibm-btn-sec ibm-btn-transparent " ibm-btn-small "><a href="#" class="ibm-confirm-link"></a></button></td></form> ';

                }else{
                  if($anomantto == $anotoday){
                    if($mestoday > $mesmantto){
                         //expirado
                         echo '<tr bgcolor="#ff5050"><form action="tesdmmw.php" method="post" class="ibm-row-form"><td align="center" >' .
            $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td><input type="text" name="sample" size="3"></td><td align="center">' .
            $row[3] . '</td><td><input type="text" name="mesure" size="20"></td><td><input type="text" name="comm" size="10"></td><td align="center" class="ibm-ind-link"> <button type="submit" id="subutton" class="ibm-btn-sec ibm-btn-transparent " ibm-btn-small "><a href="#" class="ibm-confirm-link"></a></button></td></form> ';
             
                
                    }
                    if($mestoday == $mesmantto){
                      //about to expire
                      echo '<tr bgcolor="#efc100"><form action="tesdmmw.php" method="post" class="ibm-row-form"><td align="center" >' .
             $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td><input type="text" name="sample" size="3"></td><td align="center">' .
            $row[3] . '</td><td><input type="text" name="mesure" size="20"></td><td align="center" class="ibm-ind-link"> <button type="submit" id="subutton" class="ibm-btn-sec ibm-btn-transparent " ibm-btn-small "><a href="#" class="ibm-confirm-link"></a></button></td></form> ';
          
                 }
                  }

                }
       }//while end
     }//if statement end
            echo '</table>';
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
    <span class="ibm-ind-link"><a class="ibm-help-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="IBMCore.common.widget.overlay.show('overlayExampleSmall'); return false;">Contact</a> &nbsp;<a class="ibm-pdf-link ibm-btn-sec ibm-btn-blue-50" href="#">Help/Manual</a></span>
  <div class="ibm-common-overlay  ibm-overlay-alt" data-widget="overlay" id="overlayExampleSmall">
       <p class="ibm-center ibm-ind-link""><a href="#" class="ibm-admi-link">alexr@mx1.ibm.com. Alejandro Romero Aldrete</a></p>
       <p class="ibm-center ibm-ind-link""><a href="#" class="ibm-admin-link">gilbusta@mx1.ibm.com Gilberto Bustamante Sanchez</a></p>
</div>
</div>
</div>
</html>