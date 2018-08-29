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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TPM</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
</head>
<body background="img/Background-Picture-Html.jpg">
<!--NAVMENU-->
<div class="row" id="header">
<nav class="navbar navbar-inverse" id="nav">
        <button class="navbar-toggle" data-toggle="collapse" data-target="#a" id="toggle">
            ☰
        </button>
        <div class="navbar-header">
            <a class=" navbar-brand"><img src="img/ibm-logo-png-transparent-background.png" width="50" height="20"></a>
            <a href="main.php" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
              <?php
              if($user != "GERENCIA"){
          echo '<li><a href="main.php">HOME</a></li>
                 <li class="dropdown">
                    <a href="assets.php" class="dropdown-toggle" data-toggle="dropdown" role="button">CTRL OF ASSETS</a>
                    <ul class="dropdown-menu">
                        <li><a href="assets.php">VIEW/MODIFY</a></li>
                        <li><a href="peradd.php">ADD</a></li>
                        <li><a href="perdel.php">DELETE</a></li>
                    </ul>
                </li>
                 <li><a href="rec.php">RECORDS</a></li>
                 <li><a href="service.php">SERVICES</a></li>
                 <li><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
                <li><a href="tools.php">TOOLS</a></li>
                <li  id="highlightbox"><a href="TPMVIEWER.php">TPM</a></li>
                 <li><a href="spareparts.php">SPARE PARTS</a></li>
            </ul>';
          }else{
          echo '<li><a href="viewer.php">HOME</a></li>
              <li><a href="recG.php">RECORDS</a></li>
               <li><a href="mttoG.php">CALENDAR OF MAINTENANCE</a></li>
               <li  id="highlightbox"><a href="TPMVIEWER.php">TPM</a></li>
           </ul>';
        }
            ?>
            <ul class="nav navbar-nav pull-right">
                <li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
                <li><a href='logout.php'>Logout</a></li>                </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<div class="container"><!--Container-->
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><?php
          if($user != "GERENCIA"){
         echo '<p style="color: rgb(204,204,204);">Nota la Tabla del TPM Solo se Puede Eliminar los Viernes</p></div>';
        }
        ?>
    </div>
  
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-3">
      <p align="left"><a href="Downloadtpm.php"><button id="submitbutton">Download TPM</button></a></p>
    </div>
      <div class="col-sm-3"></div>
      <div class="col-sm-3">
        <?php
        if($user != "GERENCIA"){ 
      echo '<p ><a href="TPMTRUNCATE.php"><button id="submitbutton">Delete TPM</button></a></p>';
    }
    ?>
    </div>
  </div>
<!--CONTAINER-->
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="max-width: 1000px; max-height: 400px;">
   <canvas id="myChart" width="500" height="200"></canvas>
 </div>
 <div class="col-sm-1"></div>
</div>
<div class="row" id="tablecontainer">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <table class="table table-bordered" id="myTable">
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
                 array_push($porce, $percent);
                if($flag==1){
                    echo ' <tr bgcolor="#FFFF00"><form action="TPMDETAILS.php" method="post"><td align="center">'.$row[0].'</td>
                        <td align="center">'.$percent.'%</td>
                        <td align="center"><input type="hidden" name="area" value="'.$row[0].'"><button type="submit"><i class="glyphicon glyphicon-eye-open" style="font-size:1.0em;"></i></button></td>
                   </form></tr> ';
                }else{
                         echo ' <tr><form action="TPMDETAILS.php" method="post"><td align="center">'.$row[0].'</td>
                        <td align="center">'.$percent.'%</td>
                        <td align="center"><input type="hidden" name="area" value="'.$row[0].'"><button type="submit"><i class="glyphicon glyphicon-eye-open" style="font-size:1.0em;"></i></button></td>
                   </form></tr> ';
                } 
            } 
            echo '</table>';
            }
            db2_close($db2);
            ?>
            <a href="#" class="scrollup"><p align="center"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-chevron-up"></i></button></p></a>
            </tbody>
    </table>
  </div>
</div><!--ENDCONATINER-->
</div> <!--endContainer-->
</body>
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
              echo "'rgba(204, 204, 204, 0.4)'".' ,';
            } 
            ?>],
            borderColor: [<?php 
             $f=0;  
          for($f=0;$f<count($names);$f++){
              echo "'rgba(204, 204, 204, 1)'".' ,';
            } 
            ?>],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                        barThickness : 8,
                        barPercentage: 0,
                ticks: {
                      padding: 1,
                      fontSize: 9
                }
            }],
            xAxes: [{
            ticks: {
              beginAtZero:true,
                fontSize: 9,
                padding: 1
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
</html>