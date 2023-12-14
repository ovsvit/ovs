<?php
session_start();
$con=mysqli_connect("localhost","root","","result");

if($_SERVER['REQUEST_METHOD']=='POST')
$dt=$_POST['dt'];
$query="insert into result(date_time) values('$dt')";
$result=mysqli_query($con,$query);

header("location: adminhome.php");
?>
