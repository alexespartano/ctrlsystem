<?php
require_once('connectsys.php');

$query = "SELECT `RFID S/N`, `ID` FROM `inv`";
  $response =@mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($response)){ 
        	$serial = $row['RFID S/N'];
        	$ide = $row['ID'];
        	echo $ide + "\n"; 

        	if($ide >1419){
        	//echo $serial;
        	//lengh of the serial number an set the other spaces with ceros to fullfill the require lenght
        	$len = strlen($serial);
        	//echo "   " .  $len;
        	$ceros = 12 - $len;
        	$count = 0;
        	//echo "   " . $count;
        	$cade ='';
        	for($count;$count<$ceros;$count++){
        			$cade = $cade . "0";
        	}
        	$final = $cade . $serial;
        	//echo "  " . $final; 
			require_once('connectsys.php');        		
        	 $up = "UPDATE `inv` SET `RFID S/N`= '$final' WHERE `ID`= '$ide'";
        	 	$res =@mysqli_query($dbc, $up);
        	}
        	}
?>