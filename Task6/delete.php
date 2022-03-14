<?php
require_once 'dbConnection.php';
$id = $_GET['id'];
$sql = "delete from usersinfo where id= $id";
$data = mysqli_query($con,$sql); 
mysqli_close($con);
header("location:index.php");

?>