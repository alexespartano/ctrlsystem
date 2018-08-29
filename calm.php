<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.html");
  exit;
}else{
    $name = strtoupper($_SESSION['username']);
    if($name == "ADMIN"){
header("location: admincalendar.html");
exit;
}else{
 require_once('authorized.php');
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script script type="text/javascript" src="js/filters.js"></script>
  <script script type="text/javascript" src="js/totop.js"></script>
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
                <li><a href="main.php">HOME</a></li>
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
                 <li id="highlightbox"><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
                <li><a href="tools.php">TOOLS</a></li>
                <li><a href="TPMVIEWER.php">TPM</a></li>
                 <li><a href="spareparts.php">SPARE PARTS</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<div id="menuoptions">
	<div class="row" id="tablecontainer">
	<div class="col-sm-12">
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>LOCATION</th>
                    <th>AREA</th>
                    <th>BRAND</th>
                    <th>TYPE</th>
                    <th>S/N</th>
                    <th>MODEL</th>
                    <th>STATUS</th>
                    <th>COMMENTS</th>
                    <th>PHYSICAL INV.</th>
                    <th>RFID S/N</th>
                    <th>DATE RFID</th>
                    <th>Label</th>
        </tr>
			</thead>
            <?php
            $year =  (new \DateTime())->format('Y');
            $year = substr($year,2);
            $month =  (new \DateTime())->format('m');
            $value = "0" . $_POST['but'];
             $flag = 0;
             $flag2 = 0;
            require_once('connectsys.php');
            $query = 'SELECT "LOCATION", "AREA", "BRAND", "TYPE", "S/N", "MODEL", "STAT", "COMMENTS", "PHYSICAL INV", "RFID S/N","FECHA MATTO","DATE RFID", "ING","ID" FROM CTRLSYSTEM.INV';
            $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
               if($row[12] == strtoupper($_SESSION['username']) ){
          $mttoyear =  $row[10];
            $recyear = substr($mttoyear,0,2);
            $recmonth = substr($mttoyear,3,2);
            if($recmonth == $value){
             if ($recyear > $year){
                    echo '<tr>';            
                }else{
    if( $month < $value){
    echo '<tr>';
      }
    
    if( $month == $value){
    echo '<tr bgcolor="#FFFF00">';
      }
      if($month > $value){
         echo '<tr bgcolor="#FF0000">';
            }
                  }
               $idi = $row[13];
       echo '<td align="center">' .
            $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td><td align="center">' .
            $row[7] . '</td><td align="center">' .
            $row[8] . '</td><td align="center">' .
            $row[9] . '</td><td align="center">' .
            $row[11] . '</td>';
            echo "<td align='center'>";
             echo '<a href="#" onclick="javascript:modi('.$row[13].');"><i class="glyphicon glyphicon-print" style="font-size:1.5em;"></i></a></td>';
            echo '</tr>';
            }
}
}
            }
 echo'</table>';
            db2_close($db2);			
            ?>
             <a href="#" class="scrollup"><p align="center"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-chevron-up"></i></button></p></a>
		</table>
	</div>
</div><!--ENDCONATINER-->
</div>
<script>
function modi(id){
  window.open('label.php?id='+id,'Modifica_U','scrollbars=no,top=220,left=500,width=220,height=250'); 
  
}

</script>
</body>
</html>
