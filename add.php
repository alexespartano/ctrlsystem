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
    <title>Assets</title>
    
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
                            <li role="presentation" ><a role="menuitem" href="assets.php">View/Modify</a></li>
                            <li role="presentation" class="ibm-highlight"><a role="menuitem" href="peradd.php">Add</a></li>
                            <li role="presentation"><a role="menuitem" href="perdel.php">Delete</a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a role="menuitem" href="rec.php">Records</a></li>
                    <li role="presentation"><a role="menuitem"  href="service.php">Services</a></li>
                    <li role="presentation"><a role="menuitem" href="mttos.php">Calendar of Maintenance</a></li>
                     <li role="presentation"><a role="menuitem" href="tools.php">Tools</a></li>
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
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">                                   
<form  class="ibm-row-form" action="addwrite.php" method="post">
   <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <div id="menuoptions">
      <label for="loc">Location:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="loc" list="LOCATION" name="LOCATION" title="Double click to display all current options" maxlength="20" autofocus pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="LOCATION">
                    <?php
                    //query to generete all the options on the datalist
            require_once('connectsys.php');
            $query = 'SELECT "LOCATION" FROM CTRLSYSTEM.INV GROUP BY "LOCATION"';
                    $stmt = db2_prepare($db2, $query);
      if($stmt){
                $result = db2_execute($stmt);
                if(!$result){
                    echo "Error Messange".db2_stmt_errormsg($stmt);
                    exit;
                }        
        while($row = db2_fetch_array($stmt)){
            echo '<option value="'. $row[0] .'">';
            } 
        }
            ?>
            </datalist>
                </span>


    </div>
  </div>
     <div class="ibm-col-12-4">
<br>

                <label for="are">Area:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="are" list="AREA" name="AREA" title="Double click to display all current options" maxlength="15" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="AREA">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "AREA" FROM CTRLSYSTEM.INV GROUP BY "AREA"';
                        $stmt =db2_prepare($db2, $query);
                        if($stmt){        
                            $result = db2_execute($stmt);
                            if(!$result){
                                echo "Error Messange ".db2_stmt_errormsg($stmt);
                            }
                    while($row = db2_fetch_array($stmt)){
                        echo '<option value="'. $row[0] .'">';
                        }   
                    }
                    ?>
            </datalist>
                </span>
       
     </div>
   </div>

<!--columna 2-->
<br>
 <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <label for="bra">Brand:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="bra" list="BRAND" name="BRAND" title="Double click to display all current options" maxlength="15" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="BRAND">
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php'); 
                    $query = 'SELECT "BRAND" FROM CTRLSYSTEM.INV GROUP BY "BRAND"';
                    $stmt =db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }        
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
            </datalist>
                </span>


    </div>
     <div class="ibm-col-12-4">
<br>
                <label for="typ">Type:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="typ" list="TYPE" name="TYPE" title="Double click to display all current options" maxlength="12" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="TYPE">
                <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "TYPE" FROM CTRLSYSTEM.INV GROUP BY "TYPE"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result=db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange".db2_stmt_errormsg($stmt);
                        }        
                while($row =db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
            </datalist>
                </span>
       
     </div>
   </div>
   <!--COLUMNA3-->

<div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <label for="ser">S/N:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="ser"  name="SERIAL" title="Double click to display all current options" maxlength="25" pattern="[A-Z0-9--]{2,30}" required>
                   
                </span>


    </div>
     <div class="ibm-col-12-4">
<br>
                <label for="typ">Model:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="typ" list="MODEL" name="MODEL" title="Double click to display all current options" maxlength="12" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="MODEL">
                <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "MODEL" FROM CTRLSYSTEM.INV GROUP BY "MODEL"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){        
                        $result = db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }
                while($row =db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
            </datalist>
                </span>
       
     </div>
   </div>



<!--COLUMNA4-->

 <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <label for="mt">MT:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="mt" list="MT" name="MT" title="Double click to display all current options" maxlength="10" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="MT">
                    <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "MT" FROM CTRLSYSTEM.INV GROUP BY "MT"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){        
                        $result = db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }
                while($row =db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
            </datalist>
                </span>


    </div>
     <div class="ibm-col-12-4">
      <br>
                <label for="res">Responsible:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="res" list="RESPONSIBLE" name="RESPONSIBLE" title="Double click to display all current options" maxlength="15" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="TYPE">
              <?php
                    //query to generete all the options on the datalist
            require_once('connectsys.php');
            $query = 'SELECT "RESPONSIBLE" FROM CTRLSYSTEM.INV GROUP BY "RESPONSIBLE"';
            $stmt =db2_prepare($db2, $query);
      if($stmt){        
                $result=db2_execute($stmt);
                if(!$result){
                    echo "Error Messange". db2_stmt_errormsg($stmt);
                }
        while($row = db2_fetch_array($stmt)){
            echo '<option value="'. $row[0] .'">';
            } 
        }
            ?>
            </datalist>
                </span>
       
     </div>
   </div>



<!--COLUMNA5-->

 <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <label for="sta">Status<span class="ibm-required">*</span></label>
                <span>
              
                   <select  id="STAT" title="Status" size="25" required name="STAT">
                   <option SIZE="25" value="" selected="selected">N/A</option>
                    

                  
                     <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "STAT" FROM CTRLSYSTEM.INV GROUP BY "STAT"';
                        $stmt =db2_prepare($db2, $query);
                        if($stmt){        
                            $result=db2_execute($stmt);
                            if(!$result){
                                echo "Error Messange". db2_stmt_errormsg($stmt);
                            }
                    while($row = db2_fetch_array($stmt)){
                        echo '<option value="'. $row[0] .'">'.$row[0].'</option>';
                        }   
                    }
                    ?>
         
          </select>
                </span>


    </div>
     <div class="ibm-col-12-4">
      <br>
                <label for="com">Comments:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="com" name="COMMENT" title="Double click to display all current options" maxlength="28">
                   
                </span>
       
     </div>
   </div>



<!--columna 6-->
<br>
 <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      
      <label for="pud">Purchase Date:<span class="ibm-required" class=" ibm-date-time">*</span></label>
                <span>
                    <input type="text" value="<?php echo date("j-n-Y");?>" size="40" id="pud"  name="PUDATE" required>
                    <datalist id="txtfecha">
                    
            </datalist>
                </span>


    </div>
     <div class="ibm-col-12-4">
<br>
                <label for="cost">Cost Center:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="cost" list="COSTCENTER" name="COSTCENTER" title="Double click to display all current options" maxlength="12" required>
                    <datalist id="COST CENTER">
              <?php
                    //query to generete all the options on the datalist
                    require_once('connectsys.php');
                    $query = 'SELECT "COST CENTER" FROM CTRLSYSTEM.INV GROUP BY "COST CENTER"';
                    $stmt =db2_prepare($db2, $query);
                    if($stmt){        
                        $result=db2_execute($stmt);
                        if(!$result){
                            echo "Error Messange". db2_stmt_errormsg($stmt);
                        }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">';
                    }   
                }
                    ?>
                    </datalist>
                </span>
       
     </div>
   </div>


<!--columna 7-->
<br>
 <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <label for="in">Inversion No:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="in" name="INVERNUM" title="Double click to display all current options" maxlength="15" required>
                </span>


    </div>
     <div class="ibm-col-12-4">
<br>
                <label for="in">ING:<span class="ibm-required">*</span></label>
                <span>


                    <select  id="ING" title="Status" size="25" name="ING" required>
                   <option SIZE="25" value="" selected="selected">N/A</option>

                   
                <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "ING" FROM CTRLSYSTEM.INV GROUP BY "ING"';
                        $stmt =db2_prepare($db2, $query);
                        if($stmt){        
                            $result=db2_execute($stmt);
                            if(!$result){
                                echo "Error Messange". db2_stmt_errormsg($stmt);
                            }
                    while($row = db2_fetch_array($stmt)){
                        echo '<option value="'. $row[0] .'">'.$row[0].'</option>';
                        }   
                    }
                    ?>
        
          </select>
                </span>
       
     </div>
   </div>

<!--columna 8-->
<br>
 <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-3"> 
      <br>
      <label for="mtt">Matto Date mm/dd/yy:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="mtt"  name="FECHAMTTO" min="2000-01-01" max="3000-12-31"  required>
                    <datalist id="FECHAMTTO">
                 
            </datalist>
                </span>
    </div>
     <div class="ibm-col-12-4">
      <br>

                <label for="rf">RFID S/N:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="rf" list="RFIDSN" name="RFIDSN" title="Double click to display all current options" maxlength="12" pattern="[A-Z0-9--]{2,30}" required>
                    <datalist id="RFIDSN">
             
            </datalist>
                </span>
     </div>
   </div>

    <div class="ibm columns">
    <div class="ibm-col-12-3"> </div>
    <div class="ibm-col-12-6"> 
    <div class=" ibm-center">
      <br>
      <br>

     <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth   " ><a class="ibm-save-link">Save</a></button> 

    </div>
   </div>
 </div>
</form>
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