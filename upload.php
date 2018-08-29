<?php
/*Desarrollado por Alejandro Romero Aldrete y Gilberto Bustamante Sanchez*/
$target_dir = "ensamblefiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 foreach (glob("ensamblefiles/*.*") as $files):
      $file=explode('/', $files);
unlink($target_dir.$file[1]);
endforeach;

if(isset($_POST["submit"])) {
echo 'tipo de archivo  ='.$FileType;
if($FileType== "xls" || $FileType == "xlsx"){
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	}
}
}
header("location: diskfile.php");
?>
