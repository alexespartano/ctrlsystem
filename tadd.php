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
}?>
<!DOCTYPE html>
<html lang="en-US" >
<head>
    <meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Add Asset</title>
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
                    <form action="twadd.php" method="post" class="ibm-row-form">
                      <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                <p>Add Asset</p>
            </div>
        </div>
        <!--Row1-->          
        <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-12-3">
               <label for="are">Area:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="are" list="AREA" name="tarea" title="Double click to display all current options" maxlength="30" autofocus required>
                    <datalist id="AREA">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "AREA" FROM CTRLSYSTEM.TINV GROUP BY "AREA"';
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
                    <div class="ibm-col-12-3">
              <label for="bra">Brand:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="bra" list="BRAND" name="tbrand" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="BRAND">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "BRAND" FROM CTRLSYSTEM.TINV GROUP BY "BRAND"';
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
             <div class="ibm-col-12-3">
              <label for="acc">Accion:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="acc" list="ACCION" name="taccion" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="ACCION">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "ACCION" FROM CTRLSYSTEM.TINV GROUP BY "ACCION"';
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
            <div class="ibm-col-12-3">
              <label for="typ">Type:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="typ" list="TYPE" name="ttype" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="TYPE">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "TYPE" FROM CTRLSYSTEM.TINV GROUP BY "TYPE"';
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
<!--Row2-->
  <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-12-3">
               <label for="ser">Serial:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="ser" list="SN" name="tsn" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="SN">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "SN" FROM CTRLSYSTEM.TINV GROUP BY "SN"';
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
                    <div class="ibm-col-12-3">
              <label for="mod">Model:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="mod" list="MODEL" name="tmodel" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="MODEL">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "MODEL" FROM CTRLSYSTEM.TINV GROUP BY "MODEL"';
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
             <div class="ibm-col-12-3">
              <label for="com">Comments:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="N/A" size="40" id="com" name="tcomments" title="Double click to display all current options" maxlength="30" required>
                </span>
            </div>
            <div class="ibm-col-12-3">
              <label for="tma">TradeMark:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="tma" list="TRADEMARK" name="ttrademark" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="TRADEMARK">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "TRADEMARK" FROM CTRLSYSTEM.TINV GROUP BY "TRADEMARK"';
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

<!--Row3-->
 <div class="ibm-columns ibm-seamless ibm-padding-bottom-0">
            <div class="ibm-col-12-3">
               <label for="nom">Nom:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="nom" list="NOM" name="tnom" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="NOM">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "NOM" FROM CTRLSYSTEM.TINV GROUP BY "NOM"';
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
                    <div class="ibm-col-12-3">
              <label for="md">Mantto. Date:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="md" list="MANTTO" name="tmatto" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="MANTTO">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "MATTO" FROM CTRLSYSTEM.TINV GROUP BY "MATTO"';
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
             <div class="ibm-col-12-3">
             <label for="ing">ING:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="ing" list="ING" name="ting" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="ING">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "ING" FROM CTRLSYSTEM.TINV GROUP BY "ING"';
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
            <div class="ibm-col-12-3">
              <label for="fre">Frecuency:<span class="ibm-required">*</span></label>
                <span>
                    <input type="text" value="" size="40" id="fre" list="FRECUENCY" name="tfrec" title="Double click to display all current options" maxlength="30" required>
                    <datalist id="FRECUENCY">
                 <?php
                        //query to generete all the options on the datalist
                        require_once('connectsys.php');
                        $query = 'SELECT "FREC" FROM CTRLSYSTEM.TINV GROUP BY "FREC"';
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
        <div class="ibm-columns ibm-center">
            <div class="ibm-col-1-1">
                 <button type="submit" class="ibm-ind-link ibm-btn-sec ibm-btn-transparent ibm-fullwidth" name="but"><a class="ibm-save-link">Add</a></button>
            </div>
        </div> 


    </form>       
        </main>
      </div>
    </div>

  </body>
</html>