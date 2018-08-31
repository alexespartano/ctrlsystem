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
 if($div != "IT"){
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

                  <?php
                  if($user != "GERENCIA"){
                    echo '<li role="presentation" class="ibm-haschildlist"><button role="menuitem">Ctrl of Assets</button>
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
                       echo '<li role="presentation"><a role="menuitem" href="viewer.php">Ctrl of Assets</a></li>
                    <li role="presentation"><a role="menuitem" href="recG.php">Records</a></li>
                    <li role="presentation"><a role="menuitem" href="mttoG.php">Calendar of Maintenance</a></li>
                      <li role="presentation" class="ibm-highlight"><a role="menuitem" href="TPMVIEWER.php">TPM</a></li>';
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
                <div class="ibm-columns">
                  <div class="ibm-col-1-1 ibm-center ibm-pull-quote ibm-h2">
                    <?php
          if($user != "GERENCIA"){
         echo '<p class="ibm-textcolor-blue-50"><span class="ibm-pullquote-open">“</span>Nota la Tabla del TPM Solo se Puede Eliminar los Viernes<span class="ibm-pullquote-close">“</span></p>';
          }
         ?>
                  </div>
                  <div class="ibm-columns">
                    <div class="ibm-col-12-7"></div>
<div class="ibm-col-12-4">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <span class="ibm-ind-link ibm-btn-row"><a class="ibm-download-link ibm-btn-sec ibm-btn-blue-50" href="Downloadtpm.php">Download</a> &nbsp;&nbsp;&nbsp;<a class="ibm-close-link ibm-btn-sec ibm-btn-blue-50" href="TPMTRUNCATE.php">Delete TPM</a>
     </span>
    </div>
  </div>




                </div>                                   
<div class="ibm-columns">
    <div class="ibm-col-12-6" style="max-width: 900px; max-height: 500px;" >
       <canvas id="myChart" width="400" height="240"></canvas>
    </div>  
     <div class="ibm-col-12-1"></div>
    <div class="ibm-col-12-4" data-widget="scrollable" data-height="500">
    <table class="ibm-data-table ibm-grid ibm-altrows  ibm-padding-small ibm-center ibm-center-block" id="myTable" data-scrollaxis="Y" cellspacing="0" cellpadding="0" border="0">
          <thead>
        <tr>
                    <th>AREA</th>
                    <th>CHECK PERCENT</th>
                    <th>VIEW</th>
        </tr>
      </thead>
            <tbody>
              <?php
            $names=array();
            $porce=array();
            require_once('connectsys.php');
            $query = 'SELECT DISTINCT "AREA" FROM CTRLSYSTEM.TPM WHERE "AREA" NOT LIKE \'ALMACEN IT\' AND "AREA" NOT LIKE \'KELLY\' AND "AREA" NOT LIKE \'CONTROL DE ORDENES\' AND "AREA" NOT LIKE \'NCMR\' AND "AREA" NOT LIKE \'SOPORTE PME\'';
        $response =db2_prepare($db2, $query);
      if($response){      
         $result = db2_execute($response);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($response);
                            exit;
                          }  
        while($row = db2_fetch_array($response)){
        $flag=0;
        $cont=0;
        $loc=0;
        $aarea = $row[0];
        array_push($names, $row[0]);
            require_once('connectsys.php');
            $query2 = 'SELECT "LOCALIZADO","COMMENTS" FROM CTRLSYSTEM.TPM WHERE "AREA"='."'$aarea'".'';
            $response2 =db2_prepare($db2, $query2);
              if($response2){
                        $result = db2_execute($response2);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($response2);
                            exit;
                          }
             while($row2 = db2_fetch_array($response2)){
                $cont=$cont+1;
                    if($row2[0]==1){
                        $loc=$loc+1;
                    }
                    if($row2[1]!=""){
                    $flag=1;
                }
                }
              }
                $propor = 100/$cont;
                $percent = $propor*$loc;
                $percent= number_format($percent, 2, '.', '');
                //acotar porcentaje a 4 decimales.
                 array_push($porce, $percent);
                if($flag==1){
                    echo ' <tr bgcolor="#FFFF00"><form action="TPMDETAILS.php" method="post"><td align="center">'.$row[0].'</td>
                        <td align="center">'.$percent.'%</td>
                        <td align="center" class="ibm-ind-link"><input type="hidden" name="area" value="'.$row[0].'"><button type="submit" class="ibm-btn-sec ibm-btn-transparent" ibm-btn-small"><a href="#" class="ibm-view-link"></a></button></td>
                   </form></tr> ';
                }else{
                         echo ' <tr><form action="TPMDETAILS.php" method="post"><td align="center">'.$row[0].'</td>
                        <td align="center">'.$percent.'%</td>
                        <td align="center" class="ibm-ind-link"><input type="hidden" name="area" value="'.$row[0].'"><button type="submit" class="ibm-btn-sec ibm-btn-transparent" ibm-btn-small"><a href="#" class="ibm-view-link"></a></button></td>
                   </form></tr> ';
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
  <br>
  <br>
  <br>
  <br>
  <br>
<!--ENDCONTENT-->
</div>
              </div>
            </div>
        </div>

        </main>
  </body>
</html>
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: [<?php
        $c=0;  
          for($c=0;$c<count($names);$c++){
              echo '"'.$names[$c].'"'." ,";
            }
          ?>],
        datasets: [{
            label: "OVERVIEW TPM",
            data: [<?php
        $d=0;  
          for($d=0;$d<count($names);$d++){
              echo $porce[$d]." ,";
            }
          ?>],
            backgroundColor: [<?php 
             $e=0;  
          for($e=0;$e<count($names);$e++){
              echo "'rgba(85, 150, 230, 0.3)'".' ,';
            } 
            ?>],
            borderColor: [<?php 
             $f=0;  
          for($f=0;$f<count($names);$f++){
              echo "'rgba(85, 150, 230, 1)'".' ,';
            } 
            ?>],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                        barThickness : 15,
                        barPercentage: 0,
                ticks: {
                      padding: 5,
                      fontSize: 9
                }
            }],
            xAxes: [{
            ticks: {
              beginAtZero:true,
                fontSize: 10,
                padding: 5
            }
        }]
        },
         legend: { 
             display: false
          },
      title: {
        display: true,
        text: 'OVERVIEW TPM'
      }
    }
});
</script>