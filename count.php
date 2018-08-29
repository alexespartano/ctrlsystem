<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
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
$value = $_POST['arrow'];
$item = $_POST['name'];
$num = 0;
echo $value."  valor";
echo $item."  item";
  require_once('connectsys.php');
                         $query = 'SELECT "QUANTITY" FROM CTRLSYSTEM.SPARE WHERE "ITEM"= '."'$item'"; 
                          $stmt = db2_prepare($db2,$query);
                            if($stmt){
                              $result = db2_execute($stmt);
                                if(!$result){
                                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                                }
                            while($row = db2_fetch_array($stmt)){
                          $num = $row[0];
                          $num = $num + $value;
                          }
                        }
   							require_once('connectsys.php');
                         $stmt = 'UPDATE CTRLSYSTEM.SPARE SET "QUANTITY"='.$num.' WHERE "ITEM"='."'$item'"; 
                         $stmt = db2_prepare($db2,$stmt);
                          if($stmt){
                            $result = db2_execute($stmt);
                            if(!$result){
                                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                            }
                          }
                         db2_close($db2);
                         	header("location: spareparts.php");
?>