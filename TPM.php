<?php
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
session_start();
// If session variable is not set it will redirect to login page
$USER = strtoupper($_SESSION['username']);
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "MFG"){
 header("location: index.php");
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
            <a href="" class="navbar-brand" id="title" title="Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez">CTRL SYSTEM</a>
        </div>       
        <div class="collapse navbar-collapse" id="a">
            <ul class="nav navbar-nav">
               
            </ul>
            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->



<!--CONTAINER-->
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <p style="color: rgb(204,204,204); font-weight: bold; font-style: italic;">NOTA: EL REGISTRO DEL TPM SOLO SE REALIZARA DE LUNES A JUEVES DANDO EL VIERNES PARA QUE IT RECOPILE LA INFORMACION.</p>

    </div>
<div class="row" id="tablecontainer">
  </div>
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <table class="table table-bordered" id="myTable">
      <thead>
        <tr>
                 
                    <th>LOCATION</th>
                    <th>TYPE</th>
                    <th>S/N</th>
                    <th>COMMENTS</th>
                     <th>LOCATED</th>
                    <th>SUBMIT</th>
                   
        </tr>
      </thead>
            <tbody>
            <?php
            require_once('connectsys.php');
            
            $query = 'SELECT "LOCATION", "TYPE", "S/N", "ID", "LOCALIZADO" FROM CTRLSYSTEM.TPM WHERE "AREA"  LIKE '."'$USER'".'  ORDER BY "LOCATION"';
            
            $stmt=db2_prepare($db2,$query);
            if($stmt){
               $result=db2_execute($stmt);
              if(!$result){
                echo "Error Messange". db2_stmt_errormsg($stmt);
              }
              
        while($row = db2_fetch_array($stmt)){
        if($row[4]==0){
            echo '<tr><form action="tpmwriter.php" method="post"><td align="center">' .$row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td>
            <td><input type="text" name="com"></td>
            <td align="center"><input type="checkbox" name="check" value="YES"></td>

            <td align="center"><input type="hidden" name="id" value="'.$row[3].'"><button type="submit" id="subutton"><i class="glyphicon glyphicon-ok" style="font-size:1.0em;"></i></button></td>
          </form>';
            echo '</tr>';
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
</body>
</html>
