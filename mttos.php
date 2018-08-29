<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
$user=strtoupper($_SESSION['username']);
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "IT"){
 header("location: index.php");
}else{
    if($user == "ADMIN"){
header("location: admincalendar.php");
exit;
        }
    }
}
?>
<!doctype html>
<html>


<head>
<meta charset="utf-8">
<title>Calendar</title>
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
	<!--ROW1-->
	<div class="row">
     <div class="col-sm-1">
        </div>
	<div class="col-sm-2 boxcol boxes">
        	<h3 align="center">JANUARY</h3>
        	<br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="1" class="boxes" name="but" style="width:100%;">
             <?php  
                $flag = 0;
                $flag2 = 0;
             	$year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
             	$month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
            	$query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
            	$stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
               	$recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "01"){
                if ($recyear > $year){                  
                }else{
		if( $month == "01"){
		$flag = 1;
			}
			if($month >"01"){
				echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                		$flag2 = 1;
                        break;

						}
                	}
             	  }
                }
            }
			 if($month == "01" && $flag == 1){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
		    }else{
                if($flag2 == 0){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
					}
                    }
               ?>
               </button>
              </form>
             <br>
        </div>
        <div class="col-sm-2">
        </div>
       <div class="col-sm-2 boxcol boxes">
        	<h3 align="center">FEBRUARY</h3>
        	<br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="2" class="boxes"  name="but" style="width:100%;">
             <?php  
             	 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
               	$recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "02"){
                if ($recyear > $year){                  
                }else{
		if( $month == "02"){
		$flag = 1;
			}
			if($month >"02"){
				echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                		$flag2 = 1;
                        break;

						}
                	}
             	  }
                }
            }
			 if($month == "02" && $flag == 1){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
											}
				else{
                if($flag2 == 0){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
					}
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
         
        <div class="col-sm-2">
        </div>  
         
         <div class="col-sm-2 boxcol boxes">
        	<h3 align="center">MARCH</h3>
        	<br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="3" class="boxes" name="but"  style="width:100%;">
             <?php  
             	 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
               	$recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "03"){
                if ($recyear > $year){                  
                }else{
		if( $month == "03"){
		$flag = 1;
			}
			if($month >"03"){
				echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                		$flag2 = 1;
                        break;

						}
                	}
             	  }
                }
            }
			 if($month == "03" && $flag == 1){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
											}
				else{
                if($flag2 == 0){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
					}
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
        
        <div class="col-sm-1">
        </div>
        
      
    
    
    </div><!-- END ROW-->
    <br>
	<!--ROW2-->
	<div class="row">
     <div class="col-sm-1">
        </div>
	<div class="col-sm-2 boxcol boxes">
        	<h3 align="center">APRIL</h3>
        	<br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="4" class="boxes" name="but"  style="width:100%;">
             <?php  
             	 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
               	$recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "04"){
                if ($recyear > $year){                  
                }else{
		if( $month == "04"){
		$flag = 1;
			}
			if($month >"04"){
				echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                		$flag2 = 1;
                        break;

						}
                	}
             	  }
                }
            }
			 if($month == "04" && $flag == 1){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
											}
				else{
                if($flag2 == 0){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
					}
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
        <div class="col-sm-2">
        </div>
       <div class="col-sm-2 boxcol boxes">
        	<h3 align="center">MAY</h3>
        	<br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="5" class="boxes" name="but"  style="width:100%;">
             <?php  
             	 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
               	$recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "05"){
                if ($recyear > $year){                  
                }else{
		if( $month == "05"){
		$flag = 1;
			}
			if($month >"05"){
				echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                		$flag2 = 1;
                        break;

						}
                	}
             	  }
                }
            }
			 if($month == "05" && $flag == 1){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
											}
				else{
                if($flag2 == 0){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
					}
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
         
        <div class="col-sm-2">
        </div>  
         
         <div class="col-sm-2 boxcol boxes">
        	<h3 align="center">JUNE</h3>
        	<br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="6" class="boxes" name="but"  style="width:100%;">
             <?php  
             	 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
               	$recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "06"){
                if ($recyear > $year){                  
                }else{
		if( $month == "06"){
		$flag = 1;
			}
			if($month >"06"){
				echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                		$flag2 = 1;
                        break;

						}
                	}
             	  }
                }
            }
			 if($month == "06" && $flag == 1){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
											}
				else{
                if($flag2 == 0){
 					echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
					}
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
        
        <div class="col-sm-1">
        </div>
        
      
    
    
    </div><!-- END ROW-->
    <br>
    



    <!--ROW3-->
    <div class="row">
     <div class="col-sm-1">
        </div>
    <div class="col-sm-2 boxcol boxes">
            <h3 align="center">JULY</h3>
            <br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="7" class="boxes" name="but"  style="width:100%;">
             <?php  
                 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "07"){
                if ($recyear > $year){                  
                }else{
        if( $month == "07"){
        $flag = 1;
            }
            if($month >"07"){
                echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                        $flag2 = 1;
                        break;

                        }
                    }
                  }
                }
            }
             if($month == "07" && $flag == 1){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
                                            }
                else{
                if($flag2 == 0){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
                    }
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
        <div class="col-sm-2">
        </div>
       <div class="col-sm-2 boxcol boxes">
            <h3 align="center">AUGUST</h3>
            <br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="8" class="boxes" name="but"  style="width:100%;">
             <?php  
                 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "08"){
                if ($recyear > $year){                  
                }else{
        if( $month == "08"){
        $flag = 1;
            }
            if($month >"08"){
                echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                        $flag2 = 1;
                        break;

                        }
                    }
                  }
                }
            }
             if($month == "08" && $flag == 1){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
                                            }
                else{
                if($flag2 == 0){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
                    }
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
         
        <div class="col-sm-2">
        </div>  
         
         <div class="col-sm-2 boxcol boxes">
            <h3 align="center">SEPTEMBER</h3>
            <br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="9" class="boxes" name="but"  style="width:100%;">
             <?php  
                 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "09"){
                if ($recyear > $year){                  
                }else{
        if( $month == "09"){
        $flag = 1;
            }
            if($month >"09"){
                echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                        $flag2 = 1;
                        break;

                        }
                    }
                  }
                }
            }
             if($month == "09" && $flag == 1){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
                                            }
                else{
                if($flag2 == 0){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
                    }
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
        
        <div class="col-sm-1">
        </div>
    </div><!-- END ROW-->
    <br>

<!--ROW2-->
    <div class="row">
     <div class="col-sm-1">
        </div>
    <div class="col-sm-2 boxcol boxes">
            <h3 align="center">OCTOBER</h3>
            <br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="10" class="boxes" name="but"  style="width:100%;">
             <?php  
                 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "10"){
                if ($recyear > $year){                  
                }else{
        if( $month == "10"){
        $flag = 1;
            }
            if($month >"10"){
                echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                        $flag2 = 1;
                        break;

                        }
                    }
                  }
                }
            }
             if($month == "10" && $flag == 1){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
                                            }
                else{
                if($flag2 == 0){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
                    }
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
        <div class="col-sm-2">
        </div>
       <div class="col-sm-2 boxcol boxes">
            <h3 align="center">NOVEMBER</h3>
            <br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="11" class="boxes" name="but"  style="width:100%;">
             <?php  
                 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "11"){
                if ($recyear > $year){                  
                }else{
        if( $month == "11"){
        $flag = 1;
            }
            if($month >"11"){
                echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                        $flag2 = 1;
                        break;

                        }
                    }
                  }
                }
            }
             if($month == "11" && $flag == 1){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
                                            }
                else{
                if($flag2 == 0){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
                    }
                    }
               ?>
               </button>
               </form>
             <br>
        </div>
         
        <div class="col-sm-2">
        </div>  
         
         <div class="col-sm-2 boxcol boxes">
            <h3 align="center">DECEMBER</h3>
            <br>
            <form action="calm.php" method="post"> 
            <button type="submit" value="12" class="boxes" name="but"  style="width:100%;">
             <?php  
                 $flag = 0;
                $flag2 = 0;
                $year =  (new \DateTime())->format('Y');
                $year = substr($year,2);
                $month =  (new \DateTime())->format('m');
                 require_once('connectsys.php');
                $query = 'SELECT "FECHA MATTO" FROM CTRLSYSTEM.INV WHERE "ING" = '."'$user'"; 
                $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               while($row = db2_fetch_array($stmt)){
                $mttoyear =  $row[0];
                $recyear = substr($mttoyear,0,2);
                $recmonth = substr($mttoyear,3,2);
                if($recmonth == "12"){
                if ($recyear > $year){                  
                }else{
        if( $month == "12"){
        $flag = 1;
            }
            if($month >"12"){
                echo '<p align="center" style="font-style:italic; font-size:18px;">EXPIRED  <i class="glyphicon glyphicon-remove-sign"></i></p>';
                        $flag2 = 1;
                        break;

                        }
                    }
                  }
                }
            }
             if($month == "12" && $flag == 1){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">ABOUT TO EXPIRED  <i class="glyphicon glyphicon-eye-open"></i></p>';
                                            }
                else{
                if($flag2 == 0){
                    echo '<p align="center" style="font-style:italic; font-size:18px;">OK <i class="glyphicon glyphicon-ok-sign"></i></p>';
                    }
                    }
               ?>
               </button>
               </form>
             <br>
        </div>        
        <div class="col-sm-1">
        </div>
    </div><!-- END ROW-->
    <br>
</div>
</body>
</html>
