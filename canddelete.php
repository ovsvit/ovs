<?php
$conn1=mysqli_connect("localhost","root","","ovs");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$query1="delete from candidate_login where Serial_num='$id'";
$query2="delete from party_register where Serial_num='$id'";

$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn1,$query2);

if($result1 && $result2)
{
  header("Location:managecandidate.php");
}
?>

