<?php
session_start();
include("db.php");

if(isset($_POST['user']) && isset($_POST['pass']))
{
function validate($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$user=validate($_POST['user']);
$pass=validate($_POST['pass']);

if(empty($user))
{
    header("Location: voterlogin.php?error=Username is required");
    exit();
}
else if(empty($pass))
{
    header("Location: voterlogin.php?error=Password is required");
    exit();
}
else{
$sql="select * from voter_login where username='$user' and password='$pass'";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result) === 1)
{
   $row=mysqli_fetch_assoc($result);
   if($row['username']=== $user && $row['password']=== $pass)
   {
   
   header("Location: home1.html ");
   }

}
else
{
    header("Location: voterlogin.php?error=Username or Password is invalid");
    exit();
}
}

}
else
{
    
   header("Location: voterlogin.php");
   exit();
}


?>
