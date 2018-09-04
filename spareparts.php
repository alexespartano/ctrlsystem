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
    <title>Spare Parts</title>
    
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
                    <li role="presentation"><a role="menuitem" href="mttos.php">Calendar of Maintenance</a></li>
                     <li role="presentation"><a role="menuitem" href="tools.php">Tools</a></li>
                      <li role="presentation"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>
                       <li role="presentation" class="ibm-highlight"><a role="menuitem" href="spareparts.php">Spare Parts</a></li>
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
<div class="ibm-columns">
    <div class="ibm-col-12-3"></div>  
    <div class="ibm-col-12-4">
     <span class="ibm-ind-link ibm-btn-row"><a class="ibm-add-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="javascript:add();">Add</a><a class="ibm-remove-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="javascript:del();">Remove</a>
     </span>
    </div>
    <div class="ibm-col-12-3">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span class="ibm-ind-link"><a class="ibm-refresh-link ibm-btn-sec ibm-btn-blue-50" onClick="window.location.reload()">Refresh</a></span>
    </div>
  </div>
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
           <th>ITEM</th>
           <th>QUANTITY</th>
           <th>MIN</th>
           <th>MAX</th>
           <th>PART NUM.</th>
        </tr>
      </thead>
            <tbody>
               <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "ID", "ITEM", "QUANTITY", "MIN", "MAX", "PARTNUM", "LINK" FROM CTRLSYSTEM.SPARE ORDER BY "ITEM"';
             $stmt = db2_prepare($db2, $query); 
      if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
          
          if($row[2] <= $row[3]){
            //rojo
            echo '<tr class="ibm-bgcolor-red-10">';
          }else{
          if($row[2] > $row[4]){
            //verde
            echo '<tr class=" ibm-bgcolor-green-10">';
          }
          else{
            echo '<tr>';
          }
        }
            echo '<td align="center" class="ibm-ind-link"><a href="#" onclick="javascript:modi('.$row[0].');" class="ibm-setting-link"><i class="glyphicon glyphicon-cog" style="font-size:1.5em;"></i></a></td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center"><a href="https://'.$row[6].'" target="_blank">'.
            $row[5] . '</a></td>';
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
  win2 = window.open('sparemod.php?id='+id,'Modifica_U','scrollbars=no,top=220,left=500,width=600,height=450');  
}
function add(){
 win3 = window.open('spareadd.php','Modifica_U','scrollbars=no,top=220,left=500,width=600,height=450'); 
 //agregar reinicio de la pagina principal
}
function del(){
 win3 = window.open('sparedel.php','Modifica_U','scrollbars=no,top=220,left=500,width=300,height=400'); 
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