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
    <title>Tool's</title>
    
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
                     <li role="presentation" class="ibm-highlight"><a role="menuitem" href="tools.php">Tools</a></li>
                      <li role="presentation"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>
                       <li role="presentation"><a role="menuitem" href="spareparts.php">Spare Parts</a></li>
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
    <div id="ibm-leadspace-head" class="ibm-alternate" style="background: url(img/tools.jpg) center / cover no-repeat;">
           <div id="ibm-leadspace-body" class="ibm-padding-top-2  ibm-padding-bottom-r2 ibm-alternate-background">
           </div>
         </div>
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">                                   
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
  

<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">Download DB's</h3>
                <p>Get a Copy of Inv or Records DB'S</p>
               <span class="ibm-ind-link"><a class="ibm-download-link ibm-btn-sec ibm-btn-blue-50" href="download.php">INV DB</a> &nbsp;<a class="ibm-download-link ibm-btn-sec ibm-btn-blue-50" href="downloadrecords.php">Records DB</a></span>
            </div>
        </div>
  </div>
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-h3">Delete Records DB's</h3>
                <br>
                 <span class="ibm-ind-link"><a class="ibm-close-link ibm-btn-sec ibm-btn-blue-50" href="#" onclick="javascript:delrec();">Records DB</a> &nbsp;<a class="ibm-close-link ibm-btn-sec ibm-btn-blue-50" href="#"  onclick="javascript:delmfsrec();">MFS Records DB</a></span>
            </div>
        </div>
    </div>
    <div class="ibm-col-6-2">
        <div class="ibm-card">
            <div class="ibm-card__content">
                <h3 class="ibm-h3">MFG Users</h3>
                <p>Add and Delete of MFG User's</p>
                 <span class="ibm-ind-link"><a class="ibm-add-link ibm-btn-sec ibm-btn-blue-50" href="adduser.php">Add User</a> &nbsp;<a class="ibm-remove-link ibm-btn-sec ibm-btn-blue-50" href="deluser.php">Delete User</a></span>
            </div>
        </div>
    </div>
</div>
<div class="ibm-columns">
  <div class="ibm-col-6-2">
    <div class="ibm-card">
            <div class="ibm-card__content">
               <h3 class="ibm-h3">Item's</h3>
                <p>Modify all the Propities of a Item from INV</p>
                <form action="item.php" method="post" class="ibm-row-form">
      <label for="ite">Item to Modify.</label>
      <input type="text" name="sn"  size="30" placeholder="Serial Number" class="form-control" style="max-width: 80%;" list="ser" id="ite">
      <datalist id="ser">
                    <?php
            require_once('connectsys.php');
            $query = 'SELECT "S/N" FROM CTRLSYSTEM.INV GROUP BY "S/N"';
            $stmt = db2_prepare($db2,$query);
                        if($stmt){
                             $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }        
                        while($row = db2_fetch_array($stmt)){
                            echo '<option value="'. $row[0] .'">';
                            }   
                        }
            ?>
            </datalist>
            <button type="submit" class="ibm-btn-pri ibm-btn-small ibm-btn-blue-50">Search</button>
    </form>
            </div>
        </div>
  </div>
</div>



              </div>
            </div>
          </div>
        </main>
        <script>
function delrec(){
  win1 = window.open('delrec.php','Modifica_U','scrollbars=no,top=220,left=500,width=580,height=400');  
}
function delmfsrec(){
  win2 = window.open('delmfsrec.php','Modifica_U','scrollbars=no,top=220,left=500,width=580,height=400');  
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