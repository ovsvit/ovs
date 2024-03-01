<?php
session_start();
include("db.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$query3="delete from candidate_login where username = (Select Candidateid_number from candidate_register where Serial_num='$id')";
$query1="delete from candidate_register where Serial_num='$id'";
$query2="delete from party_register where Serial_num='$id'";
//$query3="delete from candidate_login where username = (Select Candidateid_number from candidate_register where Serial_num='$id')";
$result3=mysqli_query($conn,$query3);
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);


if($result1 && $result2 && $result3)
{
  header("Location:managecandidate.php");
}
?>

