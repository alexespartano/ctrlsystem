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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Spare Parts</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
  <script script type="text/javascript" src="js/totop.js"></script>
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
                 <li><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
                <li><a href="tools.php">TOOLS</a></li>
                <li><a href="TPMVIEWER.php">TPM</a></li>
                 <li id="highlightbox"><a href="spareparts.php">SPARE PARTS</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->
<div id="menuoptions">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-2">
			   &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="#" onclick="javascript:add();"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-plus-sign"></i></button></a> &nbsp;&nbsp;&nbsp;<a href="#" onclick="javascript:del();"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-remove-sign"></i></button></a>
		</div>
    <div class="col-sm-5"></div>
    <div class="col-sm-3">
      <button onClick="window.location.reload()" id="submitbutton" title="Refresh all the web Page and update sql"><i class="glyphicon glyphicon-refresh"></i>REFRESH</button>
    </div>
	</div>
  <!--CONTAINER-->
<div class="row" id="tablecontainer">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <table class="table table-bordered" id="myTable">
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
        		echo '<tr bgcolor="#ff7f7f">';
        	}else{
        	if($row[2] >= $row[4]){
        		//verde
        		echo '<tr bgcolor="#88ff84">';
        	}
        	else{
        		echo '<tr>';
        	}
        }
            echo '<td align="center"><a href="#" onclick="javascript:modi('.$row[0].');"><i class="glyphicon glyphicon-cog" style="font-size:1.5em;"></i></a></td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center"><a href="https://'.$row[6].'">'.
            $row[5] . '</a></td>';
            echo '</tr>';
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

<script>
function modi(id){
  win2 = window.open('sparemod.php?id='+id,'Modifica_U','scrollbars=no,top=220,left=500,width=580,height=450');  
}
function add(){
 win3 = window.open('spareadd.php','Modifica_U','scrollbars=no,top=220,left=500,width=580,height=450'); 
}
function del(){
 win3 = window.open('sparedel.php','Modifica_U','scrollbars=no,top=220,left=500,width=300,height=300'); 
}
</script>
</div>
</body>
</html>
