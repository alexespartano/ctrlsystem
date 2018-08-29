<?php
/*Desarrollado por Alejandro Romero Aldrete*/
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}else{
 require_once('authorized.php');
if($div != "TOOL"){
 header("location: index.php");
}
}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADD</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
</head>
<body background="img/Background-Picture-Html.jpg">
<!--CONTENTOPTIONS-->
<div class="container">
<div class="row boxcol">
 <div class="col-sm-12">
 	<table class="table table-responsive table-condensed" id="modtable">
			<thead>
				<tr>
                	<th colspan="2">MODIFIER</th>
				</tr>
			</thead>
            <form action="tsparewadd.php" method="post">
           
            <tr>
            	<td>
                	<label>UBICATION:</label><br>
                    <input name="tubi" pattern="[A-Z0-9--]{2,30}" required>
                </td>


                <td>
              		<label>BRAND:</label><br>
                    <input name="tbrand" pattern="[A-Z]{2,15}" required>
                </td>
            </tr>

            <tr>
            	<td>
                	<label>DESCRIPTION:</label><br>
                	<input name="tdesc" pattern="[A-Z0-9-/-#]{2,80}" required>
                </td>
                <td>
                	<label>MARCA:</label><br>
					    <input name="tmarc" pattern="[A-Z0-9]{2,40}" required>
                </td>
            </tr>

   <tr>
                <td>
                    <label>MODEL:</label><br>
                    <input name="tmodel" pattern="[A-Z0-9-/]{2,40}" required>
                </td>
                <td>
                    <label>MAX:</label><br>
                        <input name="tmax"pattern="[0-9]{1,5}" required>
                </td>
            </tr>

               <tr>
                <td>
                    <label>MIN:</label><br>
                    <input name="tmin" pattern="[0-9]{1,5}"required>
                </td>
                <td>
                    <label>QUANTITY:</label><br>
                        <input name="tquanti" pattern="[0-9]{1,100}"required>
                </td>
            </tr>

               <tr>
                <td>
                    <label>STOCK:</label><br>
               
               <select style="width:120px" required>
                      <option value=""></option>
                      <option value="SI">SI</option>
                      <option value="NO">NO</option>
                </select>

                    
                </td>
            </tr>


            
                <tr>
                <td colspan="2"> <label>  LINK:</label> <br> <input  name="tlink" size="135" pattern="{1,200}" required>  </td>
                </tr>
            


            	<td colspan="2">
                	<button type="submit" name="modi" class="btn btn-default"><i class="glyphicon  glyphicon-save"></i></button>
              	</td>
            </tr>
            </form>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
