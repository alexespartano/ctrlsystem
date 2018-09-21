<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
$user = strtoupper($_SESSION['username']);
if($user == "GERENCIA"){
}else{
 require_once('authorized.php');
 if($div != "IT" || $div != "TOOL"){
 header("location: index.php");
}
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
    <title>TPM</title>
    
    <script src="//1.www.s81c.com/common/stats/ida_stats.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
    <script src="//1.www.s81c.com/common/v18/js/www.js"></script>
    <link href="//1.www.s81c.com/common/v18/css/forms.css" rel="stylesheet">
<script src="//1.www.s81c.com/common/v18/js/forms.js"></script>
    <link href="https://1.www.s81c.com/common/v18/css/tables.css" rel="stylesheet">
    <script src="https://1.www.s81c.com/common/v18/js/tables.js"></script>
    <script script type="text/javascript" src="js/filters2.js"></script>
  <link href="https://1.www.s81c.com/common/v18/css/grid-fluid.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
    IBMCore.common.util.config.set({
       backtotop: {
        enabled: true
        }
    });
</script>   
  </head>
  <body id="ibm-com" class="ibm-type ibm-background-white-10">
    <div id="ibm-top" class="ibm-landing-page">
<nav role="navigation" aria-label="NAV">
        <div class="ibm-sitenav-menu-container">
            <div class="ibm-sitenav-menu-name">
                <div id="ibm-home"><a href="main.php">IBM®</a></div>
                <a href="main.php">&nbsp;&nbsp;&nbsp;&nbsp;CTRLSYSTEM</a></div>
            <div class="ibm-sitenav-menu-list">
                <ul role="menubar">

                   <?php
                        if($div != "IT"){
                          echo '
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
                      <li role="presentation" class="ibm-highlight"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>
                       <li role="presentation"><a role="menuitem" href="spareparts.php">Spare Parts</a></li>';

                     }else{
                      echo '<li role="presentation"><a role="menuitem" href="tassets.php">Assets</a></li>
                    <li role="presentation"><a role="menuitem" href="toolrec.php">Records</a></li>
                    <li role="presentation"><a role="menuitem"  href="tservice.php">Services</a></li>
                    <li role="presentation"><a role="menuitem" href="tmttos.php">Calendar of Maintenance</a></li>
                     <li role="presentation"><a role="menuitem" href="ttools.php">Tools</a></li>
                      <li role="presentation"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>
                       <li role="presentation"><a role="menuitem" href="toolspare.php">Spare Parts</a></li>';
                     }

?>
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
<!--CONTENT-->    
        <main role="main" aria-labelledby="ibm-pagetitle-h1">
          <div id="ibm-pcon">
            <div id="ibm-content">
              <div id="ibm-content-body">
                <div id="ibm-content-main">
                  <br>
                  <div class="ibm-columns">
                    <div class="ibm-col-1-1">
                      <span class="ibm-ind-link ibm-icononly"><a href="TPMVIEWER.php" class="ibm-back-link"></a></span>
                    </div>
                  </div>
                                                   
<div class="ibm-columns">
    <div class="ibm-col-12-6" style="max-width: 900px; max-height: 500px;" >
       <canvas id="myChart" width="400" height="240"></canvas>
    </div>
    <div class="ibm-col-12-6" data-widget="scrollable" data-height="500">
    <table class="ibm-data-table ibm-padding-small ibm-center ibm-center-block" id="myTable" data-scrollaxis="Y" cellspacing="0" cellpadding="0" border="0">
         <thead>
        <tr>   
                    <th>LOCATION</th>
                    <th>AREA</th>
                    <th>TYPE</th>
                    <th>S/N</th>
                    <th>COMMENTS</th>
        </tr>
      </thead>
            <tbody>
              <?php
            $Found=0;
            $NFound=0;
            $WARNING=0;
            $conta=0;
            require_once('connectsys.php');
            $selarea = $_POST['area'];
            $query = 'SELECT "LOCALIZADO","LOCATION","AREA","TYPE","S/N","COMMENTS" FROM CTRLSYSTEM.TPM WHERE "AREA"='."'$selarea'".' ORDER BY "LOCATION"';
            $response =db2_prepare($db2,$query);
      if($response){
           $result = db2_execute($response);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($response);
                            exit;
                          }  
        while($row = db2_fetch_array($response)){
          if($row[5]!=""){
            echo '<tr bgcolor="#FFFF00">';
            $WARNING=$WARNING+1;
          }else{
              echo '<tr>';
          }
          if($row[0]==0){
               echo '<tr bgcolor="#FF0000">';
               $NFound=$NFound+1;
          }
            echo '<td align="center">' .$row[1] . '</td><td align="center">'.
            $row[2].'</td><td align="center">' .
            $row[3].'</td><td align="center">'.
      $row[4].'</td><td align="center">'.
      $row[5].'</td>';
            echo '</tr>';
            $conta++;
            }
            $Found=$conta-($WARNING+$NFound); 
            echo '</table>';
        }
            ?>
             
            </tbody>
        </table>
    </div>
  </div>
<!--ENDCONTENT-->
</div>
              </div>
            </div>
        </div>
        </main>
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['FOUNDED','WARNING','NOT FOUND'],
        datasets: [{
            label: "TPM",
            data: [<?php 
              echo $Found.' ,'.$WARNING.' ,'.$NFound;
              ?>],
            backgroundColor: [
            'rgba(85, 150, 230, 0.3)','rgba(255, 255, 0, 0.4)','rgba(255, 0, 0, 0.4)'],
            borderColor: [
            'rgba(85, 150, 230, 0.3)','rgba(255, 255, 0, 0.4)','rgba(255, 0, 0, 0.4)'],
            borderWidth: 1
        }]
    },
    options: {
         legend: { 
             display: false
          },
      title: {
        display: true,
        text: <?php echo "'$selarea'";?>
      }
    }
});
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