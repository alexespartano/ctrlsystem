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
    <title>Spare Parts</title>
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
  <script script type="text/javascript" src="js/tspare.js"></script>
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
                    <li role="presentation"><a role="menuitem" href="tassets.php">Asset's</a></li>
                    <li role="presentation"><a role="menuitem" href="toolrec.php">Records</a></li>
                    <li role="presentation"><a role="menuitem"  href="tservice.php">Services</a></li>
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
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">
                <form action="#" class="ibm-row-form">  
                <div class="ibm-columns">
                  <div class="ibm-col-12-2">
                    <select id="Input1" placeholder="UBICATION" title="SEARCH FOR UBICATION">
                            <option value="">UBICATION</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = "SELECT UBI FROM CTRLSYSTEM.TSPARE GROUP BY UBI";
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
                  </div>
                  <div class="ibm-col-12-4">
                     <select id="Input3" placeholder="ITEM" title="SEARCH FOR ITEM">
                            <option value="">ITEM</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = 'SELECT "DESC" FROM CTRLSYSTEM.TSPARE GROUP BY "DESC"';
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
                  </div>
                  <div class="ibm-col-12-2"></div>
                   <div class="ibm-col-12-3">
<span class="ibm-ind-link ibm-btn-row"><a class="ibm-refresh-link ibm-btn-sec ibm-btn-blue-50" href="#" onClick="window.location.reload()">Refresh</a><a class="ibm-search-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="tspare()">Search</a></span>
    </div>
                </div>
          <div class="ibm-columns">
            <div class="ibm-col-12-2">
              <select id="Input2" placeholder="BRAND" title="SEARCH FOR BRAND">
                            <option value="">BRAND</option>
                                 <?php
                                 require_once('connectsys.php');
                    $query = "SELECT BRAND FROM CTRLSYSTEM.TSPARE GROUP BY BRAND";
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
            </div>
            <div class="ibm-col-12-2">
              <select id="Input4" placeholder="MADE BY">
                <option value="">TRADEMARK</option>
                  <?php
                    require_once('connectsys.php');
                    $query = "SELECT MARC FROM CTRLSYSTEM.TSPARE GROUP BY MARC";
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
            </div>
            <div class="ibm-col-12-1">
              <select id="Input5" placeholder="STOCK">
                <option value="">STOCK</option>
                 <option value="SI">SI</option>
                 <option value="NO">NO</option>
            </select>
            </div>
            <div class="ibm-col-12-2">
               <select  id="Input7" placeholder="MODEL" title="SEARCH FOR MODEL">
            <option value="">MODEL</option>
            <?php
                 require_once('connectsys.php');
                    $query = "SELECT MODEL FROM CTRLSYSTEM.TSPARE GROUP BY MODEL";
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
            </div>
            <div class="ibm-col-12-1"></div>
             <div class="ibm-col-12-4">
     <span class="ibm-ind-link ibm-btn-row"><a class="ibm-add-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="javascript:add();">Add</a><a class="ibm-remove-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="javascript:del();">Remove</a>
     </span>
    </div>

          </div>



                </form>
<!--ENDFILTERS-->
<br>
<br>
<!--CONTENT-->
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
    <div class="ibm-col-12-12">
    <table class="ibm-data-table ibm-padding-small ibm-center ibm-center-block" id="myTable" data-scrollaxis="x" cellspacing="0" cellpadding="0" border="0">
            <thead>
        <tr>
           <th>MODIFY</th>
            <th>UBICATION</th>
            <th>BRAND</th>
           <th>ITEM</th>
           <th>TRADEMARK</th>
           <th>QUANTITY</th>
           <th>MIN</th>
           <th>MAX</th>
           <th>STOCK</th>
           <th>MODEL</th>
        </tr>
      </thead>
            <tbody>
               <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "ID", "UBI", "BRAND" ,"DESC" ,"MARC"  ,"QUANTI", "MIN", "MAX", "STOCK", "MODEL", "LINK" FROM CTRLSYSTEM.TSPARE ORDER BY "DESC"';
             $stmt = db2_prepare($db2, $query); 
      if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
          
          if($row[5] <= $row[6] && $row[8]=="SI"){
            //rojo
            echo '<tr bgcolor="#ff7f7f">';
          }else{
          if($row[5] > $row[7]  && $row[8]=="SI"){
            //verde
            echo '<tr bgcolor="#88ff84">';
          }
          else{
            echo '<tr>';
          }
        }
            echo '<td align="center" class="ibm-ind-link"><a href="#" onclick="javascript:modi('.$row[0].');" class="ibm-setting-link"></a></td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td><td align="center">' .
            $row[7] . '</td><td align="center">' .
            $row[8] . '</td><td align="center"><a href="https://'.$row[10].'" target="_blank">'.
            $row[9] . '</a></td>';
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
<script>
function modi(id){
  win2 = window.open('tsparemod.php?id='+id,'Modifica_U','scrollbars=no,top=20,left=500,width=750,height=750');  
}
function add(){
 win3 = window.open('tspareadd.php','Modifica_U','scrollbars=no,top=20,left=500,width=750,height=750'); 
}
function del(){
 win3 = window.open('tsparedel.php','Modifica_U','scrollbars=no,top=220,left=500,width=700,height=450'); 
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