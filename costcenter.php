<?php
/*$aserial="";
$cost="";
	 require_once('connectsys.php');    
            $query = 'SELECT "S_N", "COST" FROM CTRLSYSTEM.ASSETS';
             $stmt = db2_prepare($db2, $query); 
			if($stmt){     
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }   
        while($row = db2_fetch_array($stmt)){
        $aserial=$row[0];
        $cost=$row[1];
        //echo "0  ".$aserial."  ".$cost."  ".$fe;
        //echo "";
        	require_once('connectsys.php');    
            $query2 = 'SELECT "ID" FROM CTRLSYSTEM.INV WHERE "S/N"='."'$aserial'".'AND "TYPE"='."'CPU'";
             $stmt2 = db2_prepare($db2, $query2); 
			if($stmt2){     
                        $result2 = db2_execute($stmt2);
                        if (!$result2) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt2);
                            exit;
                          }   
        while($row2 = db2_fetch_array($stmt2)){
        	$ide=$row2[0];
        	echo "id: ".$ide;
        		require_once('connectsys.php');    
            $query3 = 'UPDATE CTRLSYSTEM.INV SET "COST CENTER"='."'$cost'".' WHERE "ID"='.$ide;
             $stmt3 = db2_prepare($db2, $query3); 
			if($stmt3){     
                        $result3 = db2_execute($stmt3);
                        if (!$result3) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt3);
                            exit;
                          }  
                          }
        }
        }
        }
        }*/
         header("location: index.php");
?>