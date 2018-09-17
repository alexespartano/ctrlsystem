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
    <title>Service</title>
    
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
                    <li role="presentation" class="ibm-highlight"><a role="menuitem"  href="service.php">Services</a></li>
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
    <!--Banner-->
             <div id="ibm-leadspace-head" class="ibm-alternate" style="background: url(img/tecworld.jpg) center / cover no-repeat;">
           <div id="ibm-leadspace-body" class="ibm-padding-top-2  ibm-padding-bottom-r2 ibm-alternate-background">
           </div>
         </div>
         <!--endBanner-->
        <!--filters-->      
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">                                   
<div class="ibm-columns ibm-seamless ibm-padding-bottom-0" data-widget="setsameheight" data-items=".ibm-blocklink">
  
<div class="ibm-col-1-1 ibm-center ibm-pull-quote ibm-h1">
  <br>
  <br>
       <form action="service.php" method="post" class="ibm-row-form">
      <label for="ite">Serial Number for Maintenance</label>
      <input type="text" name="serial"  size="30" placeholder="Serial Number" style="max-width: 80%;" list="sn" id="ite">
      <datalist id="sn">
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
            <br>
            <button type="submit" class="ibm-btn-pri ibm-btn-blue-50" name="submit">Submit</button>
    </form>
                  </div>



              </div>
            </div>
          </div>
        </main>
      <?php 
    if(isset($_POST['submit']) && strlen($_POST['serial']) > 0){
        $sn = trim(strtoupper($_POST['serial'])); 
        $month =  (new \DateTime())->format('m');
            require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO", "ING", "AREA", "ID","TYPE","MT","MODEL","DIVISION","LOCATION","BRAND"  FROM CTRLSYSTEM.INV WHERE "S/N" = '."'$sn'";
              $stmt = db2_prepare($db2, $query);
              if($stmt){
                  $result = db2_execute($stmt);
                  if(!$result){
                     echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                  }
                while($row = db2_fetch_array($stmt)){
                $itemid = $row [3];
                $ing = $row[1];
                $area = $row[2];
                $fecha = $row[0];
                $type = $row[4]; 
                $maty = $row[5];
                $mod = $row[6];
                $div = $row[7];
                $loc = $row[8];
                $brand = $row[9];
                $recfecha = new DateTime();
                $recfecha =  $recfecha->format('Y-m-d');
                $recfecha=substr($recfecha,2);
                $recfecha=str_replace('-','/',$recfecha);
                if ($row[1] == $user){
                    $year =  (new \DateTime())->format('Y');
                    $year = substr($year,2);
                    $month =  (new \DateTime())->format('m');
                    $mttoyear =  $row[0];
                    $recyear = substr($mttoyear,0,2);
                    $recmonth = substr($mttoyear,3,2);
                    if($recyear > $year){
                    }else{
                        if ($recmonth == $month){ 
                             $link= "<script>
                              window.open('label.php?id='+'$itemid','Modifica_U','scrollbars=no,top=220,left=500,width=280,height=320');
                            </script>";
                            echo $link;
                           $newdate1 =  date_create("20".$fecha);
                            date_add($newdate1,date_interval_create_from_date_string("6 months"));
                            $newdate=date_format($newdate1,"Y-m-d");
                            $newdate=substr($newdate,2);
                            $newdate=str_replace('-','/',$newdate);
                            require_once('connectsys.php');
                            $update  = 'UPDATE CTRLSYSTEM.INV SET "FECHA MATTO" = '."'$newdate'".',  "PHYSICAL INV" = '."'$newdate'".' WHERE "ID" = '.$itemid; 
                      $stmt = db2_prepare($db2, $update);
                      if($stmt){
                        $result = db2_execute($stmt);
                        if(!$result){
                          echo "messange error  "-db2_stmt_errormsg($stmt);
                          exit;
                        }
                      }      
      }else{
                if( $month > $recmonth){
                         require_once('connectsys.php');
              $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'".' AND "AREA" = '."'$area'"; 
              $stmt = db2_prepare($db2, $query);
              if($stmt){
                $result = db2_execute($stmt);
                if(!$result){
                  echo "error messange  ".db2_stmt_errormsg($stmt);
                  exit;
                }
              while($row = db2_fetch_array($stmt)){
               $comfecha = $row[0];
               $prueba = $row[0];
               if($comfecha != $fecha){
               $comfecha = date_create("20".$comfecha);
               $fecharec =   date_create("20".$fecha);
               $diff=date_diff($fecharec,$comfecha);
                  $dif= $diff->format("%R%a");
                    $sim =substr($dif,0,1);
                    $numb =substr($dif,1);
                    if($sim == "+" && $numb > 31){
                        $link= "<script>
                              window.open('label.php?id='+'$itemid','Modifica_U','scrollbars=no,top=220,left=500,width=280,height=320');
                            </script>";
                            echo $link;
                             require_once('connectsys.php');
                         $update  = 'UPDATE CTRLSYSTEM.INV SET "FECHA MATTO" = '."'$prueba'".', "PHYSICAL INV" = '."'$prueba'".' WHERE "ID" = '.$itemid; 
                         $stmt = db2_prepare($db2, $update);
                         if($stmt){
                          $result = db2_execute($stmt);
                          if(!$result){
                            echo "error messange  ".db2_stmt_errormsg($stmt);
                          }
                         }
                        }
                    }//endif
                        }//endwhile
                      }//if stmt
                    }
            }    
                 echo ' 
                <form action="corrective.php" method="POST" name="pre">
          <input name="div" type="hidden" value="'.$div.'">     
          <input class="form-control"  type="hidden"  name="ing" value="'.$ing.'">
          <input class="form-control"  type="hidden"  name="date" value="'.$recfecha.'">
          <input class="form-control"  type="hidden"  name="serial" value="'.$sn.'">
          <input class="form-control"  type="hidden"  name="mty" value="'.$maty.'">
          <input class="form-control"  type="hidden"  name="mode" value="'.$mod.'">
          <input class="form-control"  type="hidden"  name="location" value="'.$loc.'">
          <input class="form-control"  type="hidden"  name="area" value="'.$area.'">
          <input class="form-control"  type="hidden"  name="brand" value="'.$brand.'">
          <input class="form-control"  type="hidden"  name="type" value="'.$type.'">
          <input class="form-control"  type="hidden"   name="description" value="MTTO PREVENTIVO">
                </form>
<script>
  document.pre.submit();
</script>
          ';
      }  //else año de manto     
                } //END IF ING = user
              }//while $row
              }// if $stmt
    } //if isset   
    ?>
  </body>
    <br>
  <br>
  <br>    <br>
  <br>
  <br>    <br>
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