<?php 
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
date_default_timezone_set("America/Mexico_City");
	$comments = $_POST['com'];
	$ide = $_POST['id'];
	$checkyes = $_POST['check'];
	if(isset($_POST['check']) && $_POST['check'] == 'YES')
	{
		require_once('connectsys.php');
$day = date('D');
if($day== "Mon" || $day == "Tue" || $day == "Wed" || $day == "Thu" ){
	$query = 'UPDATE CTRLSYSTEM.TPM SET "COMMENTS" = '."'$comments'".' ,"LOCALIZADO"=1 WHERE "ID"='.$ide;
							$stmt = db2_prepare($db2,$query);
							if($stmt){
								$result=db2_execute($stmt);
								if(!$result){
									echo "Error Messange".db2_stmt_errormsg($stmt);
								}
							}
	}
}
header("location:TPM.php");
?>