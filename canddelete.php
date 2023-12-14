<?php
$con1=mysqli_connect("localhost","root","","candidate_reg");
$con2=mysqli_connect("localhost","root","","party_details");
if(isset($_GET['id']))
{
$id=$_GET['id'];
}
$query1="delete from candidateregister where Serial_num='$id'";
$query2="delete from partydetails where Serial_num='$id'";

$result1=mysqli_query($con1,$query1);
$result2=mysqli_query($con2,$query2);

if($result1 && $result2)
{
  header("Location:candmyprofile.php");
}
?>

