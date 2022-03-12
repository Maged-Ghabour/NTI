<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Data</title>
</head>
<body>
<?php
  session_start();
  $myfile = fopen("from-save.txt", "r") or die("Unable to open file!");
  echo fgets($myfile,filesize("from-save.txt.txt"));
  fclose($myfile);
?>
</body>
</html>
