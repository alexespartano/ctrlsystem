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
<meta charset="utf-8"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1" />      
    <link rel="shortcut icon" href="//www.ibm.com/favicon.ico" />
    <meta name="geo.country" content="US" />  
    <title>Assets</title>
    
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
                    <li role="presentation"><a role="menuitem"  href="service.php">Services</a></li>
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
    

            <ul class="nav navbar-nav pull-right">
            	<li><a><i class="glyphicon glyphicon-user"></i><?php echo" " .strtoupper($_SESSION['username'])."  ";?></a></li>
				<li><a href='logout.php'>Logout</a></li>	            </ul>    
        </div>
    </nav>
</div><!--ENDNAVMENU-->



<!--FILTERS-->
<form action="#">
    <div class="row" id="FILTERSBOX">
    	<div class="col-sm-2">
    		</label><input type="text" id="Input1" placeholder="S/N" title="SEARCH FOR S/N"  style="font-size: 9px;" autofocus>
            <br>
            <br>
            <br>


              <div class="ibm-columns">
    <div class="ibm-col-6-4  ibm-nospacing">
        <form class="ibm-row-form">
<select id="Input2" title="SEARCH FOR TYPE">
  <option value="" selected="selected">Type</option>

                
                <?php
                   require_once('connectsys.php');
                    $query = "SELECT TYPE FROM CTRLSYSTEM.REC GROUP BY TYPE";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
                    </select>
        </div>
        <div class="col-sm-2">
            


             <select id="Input3" placeholder="AREA" title="SEARCH FOR AREA"  style="font-size: 9px;">
             <option value="">AREA</option>

             
                                 <?php
                    require_once('connectsys.php');
                    $query = "SELECT AREA FROM CTRLSYSTEM.REC GROUP BY AREA";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
                </select>
            <br>
            <br>
            <br>
<select id="Input4" placeholder="BRAND" title="SEARCH FOR BRAND"  style="font-size: 9px;">
             <option value="">BRAND</option>
                  <?php
                    require_once('connectsys.php');
                    $query = "SELECT BRAND FROM CTRLSYSTEM.REC GROUP BY BRAND";
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
</select>
    	</div>
        <div class="col-sm-2">
<select  id="Input5" placeholder="LOCATION" title="SEARCH FOR LOCATION"  style="font-size: 9px;">
 <option value="">LOCATION</option>
                  <?php
                    require_once('connectsys.php');
                    $query = 'SELECT "LOCATION" FROM CTRLSYSTEM.REC GROUP BY "LOCATION"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
</select>
            <br>
            <br>
            <br>
<select  id="Input6" placeholder="ING" title="SEARCH FOR ING."  style="font-size: 9px;">
            <option value="">ING RESPO.</option>
            <option value="ING1">ING1</option>
            <option value="ING2">ING2</option>
            <option value="ING3">ING3</option>
            <option value="N/A">N/A</option>
        </select>
    	</div>
        <div class="col-sm-2">
        </label>
<select  id="Input7" placeholder="DATE YY/MM/DD" title="SEARCH FOR DATE"  style="font-size: 9px;">
 <option value="">DATE YY/MM/DD</option>
                  <?php
                    require_once('connectsys.php');
                    $query = 'SELECT "DATE" FROM CTRLSYSTEM.REC GROUP BY "DATE"';
                    $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
                while($row = db2_fetch_array($stmt)){
                    echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                    }   
                }
                    ?>
</select>
        <br>
        <br>
         </div>
         <div class="col-sm-3">
         <p align="center"><button onClick="window.location.reload()" id="submitbutton" title="Refresh all the web Page and update sql"><i class="glyphicon glyphicon-refresh"></i>REFRESH</button><button onclick="clear(this.form);"  id="submitbutton" type="reset" title="Clear filters"><i class="glyphicon glyphicon-trash"></i>Clear</button>    <button onclick="filter()"  id="submitbutton" title="Execute filters"><i class="glyphicon glyphicon-search"></i>Submit</button></p> 
          <!--COUNTER-->
<div class="row">
    <div class="col-sm-5"></div>
    <div class="col-sm-1" style=" color:rgb(204,204,204);">Items:<p id="con"></p></div>
</div><!--COUNTER--> 
    	</div>
    </div></form><!--ENDFILTERS-->
<!--CONTAINER-->
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
                     <th>MT</th>
                    <th>MM</th>
                    <th>ING</th>
                    <th>DATE</th>
                    <th>DESCRIPTION</th>
                    <th title="Cleaning">PHYS. VERI.</th>
                    <th title="check software/Updates.">UPDATES</th>
				</tr>
			</thead>
            <?php
            $PHYS = '<i class="glyphicon glyphicon-ok"></i>';
            require_once('connectsys.php');
            $query = 'SELECT "LOCATION", "AREA", "BRAND", "TYPE", "SN","MT","MODEL", "ING", "DATE", "DIVISION", "DESCRI","UPDATES" FROM CTRLSYSTEM.REC';
                $stmt = db2_prepare($db2, $query);
			if($stmt){
                 $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
        while($row = db2_fetch_array($stmt)){
            if($row[11] == 1){
                $update ='<i class="glyphicon glyphicon-ok"></i>';
            }else{
                $update = "N/A";
            }
            echo '<tr><td align="center">' .
            $row[0] . '</td><td align="center">' .
            $row[1] . '</td><td align="center">' .
            $row[2] . '</td><td align="center">' .
            $row[3] . '</td><td align="center">' .
            $row[4] . '</td><td align="center">' .
            $row[5] . '</td><td align="center">' .
            $row[6] . '</td><td align="center">' .
            $row[7] . '</td><td align="center">' .
            $row[8] . '</td><td align="center">' .
            $row[10] . '</td><td align="center">'.
            $PHYS . '</td><td align="center">'.
            $update . '</td>';
            echo '</tr>';
            }	
            echo '</table>';
        }
            db2_close($db2);
            ?>
             <a href="#" class="scrollup"><p align="center"><button class="btn btn-default btn-lg" style="background-color:rgb(150,150,150);"><i class="glyphicon glyphicon-chevron-up"></i></button></p></a>
		</table>
	</div>
</div><!--ENDCONATINER-->
</body>
</html>