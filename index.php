<?php
require "controller.php";

$controle = new Controller('data.xlsx');
?>

<html lang="en">
  <head>
  <meta charset="UTF-8">
  <title>DeepOr - Stats</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="overwrite.css" rel="stylesheet">
 <script src="function.js"></script>
 </head>
  <body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header">
  <a class="navbar-brand" href="http://www.deepor.ai/"><img class="res" src="logo.png"></a>
  </div>
  <ul class="nav navbar-nav">
  </ul>
  </div>
  </nav>
    <div class="to_center">
    <h4>Select the file you want to analyze: </h4>
    </div>
  <div class="select_file">
  <?php
  foreach ($controle->list_file() as $row)
  echo $row;
  ?>
  </div>
<br>
<br>
<div class="to_center">
<h4>Selected file: </h4>
    </div>
  <div class="selected_file" id="selected_file">
   </div>
    <br>
    <br>
  </body>
</html>