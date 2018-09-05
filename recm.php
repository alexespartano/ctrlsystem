<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "MFS"){
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
    <title>Records</title>
    
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
                <div id="ibm-home"><a href="viewermfs.php">IBM®</a></div>
                <a>&nbsp;&nbsp;&nbsp;&nbsp;CTRLSYSTEM</a></div>
            <div class="ibm-sitenav-menu-list">
                <ul role="menubar">

                    <li role="presentation"><a role="menuitem"  href="viewermfs.php">Ctrl of Assets</a></li>
                    <li role="presentation" class="ibm-highlight"><a role="menuitem" href="recm.php">Records</a></li>
                    
                  
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
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-1-1 ibm-nospacing">
        <form action="#" class="ibm-row-form">
          <p>
                    <input type="text" size="25" placeholder="Serial Number" id="Input1" autofocus>
          &nbsp;&nbsp;&nbsp;
                <select id="Input3" title="SEARCH FOR AREA">
                <option value="" selected="selected">Area</option>
   <?php
        require_once('connectsys.php');
        $query = "SELECT AREA FROM CTRLSYSTEM.INV GROUP BY AREA";
        $stmt = db2_prepare($db2, $query);
        if($stmt){
           $result = db2_execute($stmt);
           if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
           }

         while($row = db2_fetch_array($stmt)){
                echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
          }   
         }
    ?>
</select>
  &nbsp;&nbsp;&nbsp;&nbsp;
<select id="Input5" title="SEARCH FOR RESPONSIBLE">
  <option value="" selected="selected">Responsible</option>
  <?php
                 require_once('connectsys.php');
                    $query = "SELECT RESPONSIBLE FROM CTRLSYSTEM.INV GROUP BY RESPONSIBLE";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
            ?>
</select>
            </p>
        </form>
    </div>
    <div class="ibm-columns">
    <div class="ibm-col-6-4  ibm-nospacing">
        <form class="ibm-row-form">
<select id="Input2" title="SEARCH FOR TYPE">
  <option value="" selected="selected">Type</option>
  <?php
                    require_once('connectsys.php');
                    $query = "SELECT TYPE FROM CTRLSYSTEM.INV GROUP BY TYPE";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
    ?>
</select>
 &nbsp;&nbsp;&nbsp;&nbsp;
<select  id="Input4" title="SEARCH FOR BRAND">
  <option value="" selected="selected">Brand</option>
 <?php
                    require_once('connectsys.php');
                    $query = "SELECT BRAND FROM CTRLSYSTEM.INV GROUP BY BRAND";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }

                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
</select>
 &nbsp;&nbsp;&nbsp;&nbsp;
<select id="Input6" title="SEARCH FOR COST CENTER">
  <option value="" selected="selected">Cost Center</option>
    <?php
                    require_once('connectsys.php');
                    $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV GROUP BY "COST CENTER"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
            ?>
</select>
 &nbsp;&nbsp;&nbsp;&nbsp;
<select id="Input7" title="SEARCH FOR STATUS AS=ASIGNADO, AL=ALMACEN">
  <option value="" selected="selected">Status</option>
   <option value="AS">Asignado</option>
   <option value="AL">Almacenado</option>
</select>
 &nbsp;&nbsp;&nbsp;&nbsp;
<select id="Input8" title="SEARCH FOR ING RESPONSIBLE">
  <option value="" selected="selected">Ing</option>
  <option value="N/A">N/A</option>
  <option value="ING1">ING1</option>
  <option value="ING2">ING2</option>
  <option value="ING3">ING3</option>
</select>
</div> 
<div class="ibm-col-6-2  ibm-nospacing">
    <span class="ibm-ind-link ibm-btn-row"><a class="ibm-refresh-link ibm-btn-sec ibm-btn-blue-50" href="#" onClick="window.location.reload()">Refresh</a><a class="ibm-search-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="filter2()">Search</a><a class="ibm-calculator-link ibm-btn-sec ibm-btn-blue-50">Items:<b id="con"></b></a></span>
</div>
</form>
</div>
<!--ENDFILTERS-->
<br>
<br>
<br>
<br>
<!--CONTENT-->
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-1-1 ibm-nospacing">
    <table class="ibm-data-table ibm-grid ibm-altrows  ibm-padding-small ibm-center" id="myTable" data-scrollaxis="x" cellspacing="0" cellpadding="0" border="0" style="font-size: 17px;">
         <thead>
        <tr>
                  
          <th>LOCATION</th>
                    <th>AREA</th>
                    <th>BRAND</th>
                    <th>TYPE</th>
                    <th>S/N</th>
                    <th>MT</th>
                    <th>MM</th>
                    <th>ING</th>
                    <th>DATE</th>
                    <th>DESCRIPTION</th>
        </tr>
      </thead>
            <tbody>
            <?php
            require_once('connectsys.php');
            
            require_once('connectsys.php');
            $query = 'SELECT "LOCATION", "AREA", "BRAND", "TYPE", "SN","MT","MODEL","ING", "DATE", "DIVISION", "DESCRI" FROM CTRLSYSTEM.RECMFS';
            $stmt=db2_prepare($db2,$query);
             $stmt = db2_prepare($db2, $query); 
            if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
            echo '<tr><td align="center">' .
            $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td><td align="center">' .
            $row[7] . '</td><td align="center">' .
            $row[8] . '</td><td align="center">' .
            $row[10] . '</td>';
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
<script>
function modi(id){
    win2 = window.open('mod.php?id='+id,'Modifica_U','scrollbars=no,top=220,left=500,width=580,height=450');    
}
</script>
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