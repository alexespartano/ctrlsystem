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
$item = strtoupper($_POST['items']);
$quanti = strtoupper($_POST['quantity']);
$min = strtoupper($_POST['minim']);
$max = strtoupper($_POST['maxim']);
$partnum = strtoupper($_POST['part']);
$link = $_POST['lin'];
$num=0;
    require_once('connectsys.php');
      $queryid = "SELECT ID FROM CTRLSYSTEM.SPARE ORDER BY ID DESC LIMIT 1";
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
        $query = 'INSERT INTO CTRLSYSTEM.SPARE ("ID","ITEM","QUANTITY","MIN","MAX","PARTNUM","LINK") VALUES ('.$num.','."'$item'".','."'$quanti'".','."'$min'".','."'$max'".','."'$partnum'".','."'$link'".')';
            $stmt = db2_prepare($db2, $query);
                    if($stmt){
                        $result = db2_execute($stmt);
                        if (!$result) {
                             echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                            exit;
                          }
               }
?>
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
            <form action="#" method="post">
            <tr>
              <td>
                  <label>ITEM:
                   <?php 
            require_once('connectsys.php');
                  $query = 'SELECT "ITEM" FROM CTRLSYSTEM.SPARE WHERE ID='.$num;
             $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }   
          ?></label>
                </td>
                <td>
                  <label>QUANTITY:
                    <?php 
            require_once('connectsys.php');
                  $query = 'SELECT "QUANTITY" FROM CTRLSYSTEM.SPARE WHERE ID='.$num;
            $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
          ?></label>
                </td>
            </tr>
            <tr>
              <td>
                  <label>MIN:
                    <?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MIN" FROM CTRLSYSTEM.SPARE WHERE ID='.$num;
            $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
          ?></label>
                </td>
                <td>
                  <label>MAX: <?php 
            require_once('connectsys.php');
                  $query = 'SELECT "MAX" FROM CTRLSYSTEM.SPARE WHERE ID='.$num;
            $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
          ?></label>
                </td>
            </tr>
            <tr>
              <td>
                  <label>PART NUMBER: <?php 
            require_once('connectsys.php');
                  $query = 'SELECT "PARTNUM" FROM CTRLSYSTEM.SPARE WHERE ID='.$num;
            $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
          ?></label>
                </td>
                <td>
                  <label>LINK: <?php 
            require_once('connectsys.php');
                  $query = 'SELECT "LINK" FROM CTRLSYSTEM.SPARE WHERE ID='.$num;
            $stmt = db2_prepare($db2, $query);
                              if($stmt){
                                  $result = db2_execute($stmt);
                                  if (!$result) {
                                    echo "exec errormsg: " .db2_stmt_errormsg($stmt);
                                    exit;
                                    }
                                    while($row = db2_fetch_array($stmt)){
                                       echo $row[0];
                                    }
                                    }
          ?></label>
                </td>
            </tr>
            <tr>
              <td colspan="2">
                  <a href="javascript:close()">Close Window</a>
                </td>
            </tr>
            </form>
            </table>
 </div>
</div>
</div><!--ENCONTENTOPTIONS-->
</body>
</html>
