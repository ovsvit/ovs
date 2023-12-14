<?php
require_once("config.php");
$query="select * from voterregister";
$result=mysqli_query($con,$query);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="voterinfo.css">
    <style>
body
{
  background-image: url("background3.jpeg");
}
table,tr,td
{
    border:2px solid black;
    border-collapse:collapse;
}
table{
    width:100%;
    height:200px;
    text-align: center;
    background-color: skyblue;
}
td{
    vertical-align: middle;
}

.topic:hover{
    background-color:blue;
    color:white;
}
.topic
{
    color:white;
    background-color: blue;
}
.head
{
    color:black;
    width:300px;
    height:30px;
    background-color: aqua;
    border:2px solid ;
    padding:5px;
    border-radius:10px;
}
.btn 
{
    width:50px;
    height:25px;
    background-color:lightcoral;
    border:2px solid darkblue;
    color:black;
    padding:5px;
    border-radius:5px;
    margin-top:5px;
}


    </style>
    <title>My profile</title>
</head>
<form action="" method="POST" enctype="multipart/form-data">
<body class="bg-dark">
    <div class="container">
        <div class="row" mt-5>
            <div class="col">
                <div class="card mt-5">
                    <div class=card-header>
                       <center><h2 class="head">VOTER INFORMATION</h2></center> 
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center"> 
                            <tr class="topic">
                                <td>S.NO.</td>
                                <td>Firstname</td>
                                <td>Lastname</td>
                                <td>VoterID number</td>
                                <td>Aadhar number</td>
                                <td>DOB</td>
                                <td> Age </td>
                                <td>Gender</td>
                                <td>Phone number</td>
                                <td> Email address</td>
                                <td>D/NO.</td>
                                <td>Street</td>
                                <td>City</td>
                                <td>Pincode</td>
                                <td>Nationality</td>
                                <td>Photo</td>
                                <td>Status</td>
                                <td>Delete</td>
                            </tr>
                            <tr >
                                <?php
                                while($row=mysqli_fetch_array($result))
                                {
                                ?>
                               
                               <td><?php echo $row['Serial_num'] ?></td>
                                <td><?php echo $row['Firstname'] ?></td>
                                <td><?php echo $row['Lastname'] ?></td>
                                <td><?php echo $row['VoterID_number'] ?></td>
                                <td><?php echo $row['Aadhar_number'] ?></td>
                                <td><?php echo $row['DOB'] ?></td>
                                <td><?php echo $row['Age']  ?></td>
                                <td><?php echo $row['Gender'] ?></td>
                                <td><?php echo $row['Phone_number'] ?></td>
                                <td><?php echo $row['Email'] ?></td>
                                <td><?php echo $row['Door_number'] ?></td>
                                <td><?php echo $row['Street'] ?></td>
                                <td><?php echo $row['City'] ?></td>
                                <td><?php echo $row['Pincode'] ?></td>
                                <td><?php echo $row['Nationality'] ?></td>
                               
                               
                                <td>
                                <?php echo '<img src="data:image/png;base64,'.base64_encode($row['Photo']).'"  alt="image" height:"100" width="100" />' ?>
                                </td>
                                <td><?php echo $row['Status'] ?></td>
                                <td><button class="btn"><a href="#" >Delete</a></button></td>
                              
                            </tr>
                                 <?php   
                                }
                                ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>