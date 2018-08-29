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
  <script script type="text/javascript" src="js/filters2.js"></script>
  <script script type="text/javascript" src="js/totop.js"></script>
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
                  $user = strtoupper($_SESSION['username']);
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



<!--CONTAINER-->
    <div class="row">
    <div class="col-sm-2"></div>
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
            db2_close($dbc);
            ?>
            <a href="#" class="scrollup"><p align="center"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-chevron-up"></i></button></p></a>
            </tbody>
    </table>
  </div>

</div><!--ENDCONATINER-->
</body>
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
            'rgba(204, 204, 204, 0.4)','rgba(255, 255, 0, 0.4)','rgba(255, 0, 0, 0.4)'],
            borderColor: [
            'rgba(204, 204, 204, 0.4)','rgba(255, 255, 0, 0.4)','rgba(255, 0, 0, 0.4)'],
            borderWidth: 1
        }]
    },
    options: {
         legend: { 
             display: false
          },
      title: {
        display: true,
        text: 'TPM'
      }
    }
});
</script>
</html>
