<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD']=='POST')
$dt=$_POST['dt'];
$query="insert into admin_login(username,password,set_time) values('admin','admin','$dt')";
$result=mysqli_query($conn,$query);

header("location: adminhome.php");
?>
