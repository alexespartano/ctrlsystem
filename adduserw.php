<?php
            if(isset($_POST['submit'])){
             $user=strtoupper($_POST['username']);
             $pass=strtoupper($_POST['pass']);
             $num =0;
 require_once('connectsys.php');
            $queryid = "SELECT ID FROM CTRLSYSTEM.USERS ORDER BY ID DESC LIMIT 1";
            $stmt = db2_prepare($db2, $queryid);
            if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
              while($row = db2_fetch_array($stmt)){
                $num=$row[0] + 1;
                }
            }
             require_once('connectsys.php');
              $tru = 'INSERT INTO CTRLSYSTEM.USERS ("USERNAME", "PASSWORD", "DIVISION", "ROL", "ID") VALUES ('."'$user'".', '."'$pass'".','."'MFG'".', '."'MFG'".' ,'.$num.')';
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
               header("location: tools.php");
          }
            ?>


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
             $user=strtoupper($_POST['username']);
             $pass=strtoupper($_POST['pass']);
             $num =0;
 require_once('connectsys.php');
            $queryid = "SELECT ID FROM CTRLSYSTEM.USERS ORDER BY ID DESC LIMIT 1";
            $stmt = db2_prepare($db2, $queryid);
            if($stmt){
              $result = db2_execute($stmt);
              if (!$result) {
                echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                exit;
                }
              while($row = db2_fetch_array($stmt)){
                $num=$row[0] + 1;
                }
            }
             require_once('connectsys.php');
              $tru = 'INSERT INTO CTRLSYSTEM.USERS ("USERNAME", "PASSWORD", "DIVISION", "ROL", "ID") VALUES ('."'$user'".', '."'$pass'".','."'MFG'".', '."'MFG'".' ,'.$num.')';
              $stmt = db2_prepare($db2, $tru);
              if($stmt){
                $result = db2_execute($stmt);
                if (!$result) {
                  echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                  exit;
                } 
            }
               header("location: tools.php");
            ?>


