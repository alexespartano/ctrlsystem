<?php
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
/*******EDIT LINES 3-8*******/
require_once('authorized.php');
$filename = "RACK-DB";         
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
//create MySQL connection   
$sql = "SELECT * FROM CTRLSYSTEM.TRECRP";
     $stmt = db2_prepare($db2, $sql);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          } 
$file_ending = "xls";
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < db2_num_fields($stmt); $i++) {
$property = db2_field_name($stmt, $i);
    echo $property . "\t";
    //echo mysqli_field_name($result,$i) . "\t";

}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = db2_fetch_array($stmt))
    {
        $schema_insert = "";
        for($j=0; $j<db2_num_fields($stmt);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   
}
?>
