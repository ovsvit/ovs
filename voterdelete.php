<?php
$con=mysqli_connect("localhost","root","","voterregistration");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$query="delete from voterregister where Serial_num='$id'";

$result=mysqli_query($con,$query);

if($result)
{
  

header("Location:votermyprofile.php");
}
?>

