<?php
/*Desarrollado por Alejandro Romero Aldrete*/
$username = "";
$password = "";
//connect to db and select 
 require_once('connectsys.php'); #db2 variable
//query the database for user
if(isset($_POST['log'])) {
	$username = strtoupper($_POST['User']);
	$password = strtoupper($_POST['pwd']);
    $sql = "SELECT DIVISION FROM CTRLSYSTEM.USERS WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $stmt = db2_prepare($db2, $sql);
    if($stmt){
    $result = db2_execute($stmt);
    if (!$result) {
         echo "exec errormsg: " .db2_stmt_errormsg($stmt);
        exit;
      }
    $c=0;
    $dnoivision="";
        while($row = db2_fetch_array($stmt)){
            $c=$c+1;
            $division = $row[0];
           }
    db2_close( $db2 );
    //redirect the page.
    if($c>0){
        session_start();
        $_SESSION['username'] = $username;
	 	if($division == "IT"){
            header("location: main.php");
        }
        if($division == "TOOL"){
            header("location: toolspare.php");
        }
		if($division == "MFS"){
            header("location: viewermfs.php");
        }
        if($division == "MANUFACTURA"){
            header("location: diskfile.php");
        }
         if($division == "VISITOR"){
            header("location: visitor.php");
        }
        if($division == "MFG"){
            header("location: TPM.php");
        }
	    exit;
	    }else{
		  header ( 'Location: loginerror.php');
		
		      }
}
else{
          header ( 'Location: loginerror.php');
}
}
?>