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
<title>Services</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script script type="text/javascript" src="js/filters.js"></script>
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
                 <li id="highlightbox"><a href="service.php">SERVICES</a></li>
                 <li><a href="mttos.php">CALENDAR OF MAINTENANCE</a></li>
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
<br>
<br>
<br>
<div id="menuoptions">
	<h2 align="center" style="color:rgb(204,204,204);">
    Scan "s/n" to give an operation
    </h2>
    <form method="post" action="service.php">
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <input list="sn" name="serial" class="form-control" autofocus>
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
    </div> 
    <div class="col-sm-4"></div>
    </div>
    <br>
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    </div>
    <br>
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <button type="submit" class="boxes form-control" name="submit">Submit</button>
	</div>
    <div class="col-sm-4"></div>
    </div>
    </form>
    <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <?php 
    if(isset($_POST['submit']) && strlen($_POST['serial']) > 0){
    	$answer = $_POST['type'];
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
                              window.open('label.php?id='+'$itemid','Modifica_U','scrollbars=no,top=220,left=500,width=220,height=250');
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
                              window.open('label.php?id='+'$itemid','Modifica_U','scrollbars=no,top=220,left=500,width=220,height=250');
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
        </div>
    <div class="col-sm-4"></div>
</div>
</body>
</html>