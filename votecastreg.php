<?php
session_start();
include("db.php");

if(isset($_POST['vid']) && isset($_GET['id']) )
{
    $vid=$_POST['vid'];
    $id=$_GET['id'];
    
}
$query1="select Status from voter_register where VoterID_number ='$vid' ";

$result1=mysqli_query($conn,$query1);
$row1 = mysqli_fetch_assoc($result1);
$Status= $row1['Status'];

$query2="select Vote_count from party_register where Serial_num='$id'";
$result2=mysqli_query($conn,$query2);
$row2= mysqli_fetch_assoc($result2);
$vote_count=$row2['Vote_count'];

if($Status==0)
{
$query3="update voter_register set Status=1  where VoterID_number ='$vid'";
$result=mysqli_query($conn,$query3);
$vote_count=$vote_count+1;
echo "$vote_count";
$query4="update party_register set Vote_count=$vote_count  where Serial_num='$id'";
$result=mysqli_query($conn,$query4);
header("Location: votesuccess.php");
}
else
{
    echo '<script>';
    echo 'alert("You have already voted! No second vote is allowed");';
    echo 'window.location.href = "home1.html";';
    echo '</script>';
  
}


?>

