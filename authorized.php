<?php 
/*Desarrollado por Alejandro Romero Aldrete*/
$div = "";
$user =	strtoupper($_SESSION['username']);
    require_once('connectsys.php'); #db2 variable
    $sql = "SELECT DIVISION FROM CTRLSYSTEM.USERS WHERE USERNAME = '$user'";
    $stmt = db2_prepare($db2, $sql);
    if($stmt){
        $result = db2_execute($stmt);
        if (!$result) {
         echo "exec errormsg: " .db2_stmt_errormsg($stmt);
        exit;
      }
      while($row = db2_fetch_array($stmt)){
            switch($row[0]){
                case "GERENCIA":
                    $div = "GERENCIA";
                break;
                case "MFS":
                    $div = "MFS";
                break;
                case "MANUFACTURA":
                    $div = "MANUFACTURA";
                break;
                case "MFG":
                    $div = "MFG";
                break;
                case "IT":
                    $div = "IT";
                break;
                 case "VISITOR":
                    $div = "VISITOR";
                break;
                 case "TOOL":
                    $div = "TOOL";
                break;
            }
        }                                   
    }
?>