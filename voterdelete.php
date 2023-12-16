<?php
session_start();
include("db.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$query="delete from voter_register where Serial_num='$id'";

$result=mysqli_query($conn,$query);

if($result)
{
  

header("Location:managevoter.php");
}
?>

