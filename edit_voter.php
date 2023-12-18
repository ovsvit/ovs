

<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fieldname = isset($_POST['field']) ? $_POST['field'] : '';
    $voter_id = isset($_POST['voter_id']) ? $_POST['voter_id'] : '';
    $existingval = isset($_POST['old']) ? $_POST['old'] : '';
    $newval = isset($_POST['new']) ? $_POST['new'] : '';
    $proof = isset($_POST['proof']) ? $_POST['proof'] : '';

    // Debugging: Output values to the console
    error_log("fieldname: $fieldname, voter_id: $voter_id, existingval: $existingval, newval: $newval, proof: $proof");

    // Check if the field name is not empty
    if (!empty($fieldname)) {
        // Use backticks around the dynamic column name
        $updateQuery = "UPDATE voter_register SET `$fieldname` = '$newval' WHERE VoterID_number = '$voter_id' AND `$fieldname` = '$existingval'";
        
        // Debugging: Output SQL query to the console
        error_log("SQL Query: $updateQuery");

        $result2 = mysqli_query($conn, $updateQuery);

        if (!$result2) {
            die('MySQL Error: ' . mysqli_error($conn));
            echo "<script type='text/javascript'>alert('ERROR: CAN\'T UPDATE THE DATA IN THE DATABASE...')</script>";
        } else {
            echo "<script type='text/javascript'>alert('SUCCESSFULLY UPDATED :)')</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('ERROR: Field name is empty.')</script>";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="app_vot.js" defer></script>
    <title>Update Voter Profile</title>
    <style>
        body{
                   
            background-image:url(img1.jpg);
        }
        .field{
            width:400px;
            margin:auto;
            margin-top: 40px;
            margin-bottom: 40px;
            background-color:rgb(6, 224, 240);
            color:black;
            padding:10px 20px 30px;
            font-size:1.1em;  
            border-radius:10px;         
        
        
        }
        .label{
        padding: 5px;
        }
        h2{
            color:black;
            text-align: center;
        }
        
        div{
            margin:8px;
          
        }
        
        .inp{
            margin-left: 5px;
            width:99%;
            font-size:80%;
            border: 1px solid blue;
            padding:8px 10px;
            border-radius: 7px;
            display:block;
            box-shadow:5px;
            box-sizing: border-box;
        }
        .btn{
            text-align: center;
           padding:10px;
         
        }
        button{
            text-align:center;
            border-radius:6px;
            padding: 10px;
            
        }
        nav{
            border-style:double;
            border-color:black;
            color:black;
            background-color:rgb(6, 224, 240);
            padding:5px;
            border-radius:10px;   
        
        }
        ul{
            margin-left:80%;
        }
        li,h1,ul{
            display:Inline;
        }
        li{
            font-size:1.5em;
        }
        .inp-grp input:focus{
    outline:0;
}

.inp-grp .error{
    color:red;
    font-size:16px;
    margin-top:5px;
    border-color:red;
   
}
.inp-grp.success input{
    border-color:green;
    border-width:2px;

}
.inp-grp.error input{
    border-color:red;
    border-width:2px;
}
        
        </style>
                

</head>
<body>
    <div class="head">
        <nav>
            <h1> Online Voting System</h1>
            <ul>
                <li ><a href="candidatehomepage.html">Home</a></li>
                <li>|</li>
                <li><a href="home1.html">Logout</a></li>
            </ul>    
        </nav>
        
         
    </div>
   
    <fieldset class="field">
        <b>
            <legend> <h2>Update Profile </h2>
               
            </legend>
        </b>
        
        <form class="form" action="voterviewprofile.php" method="post" id="form">

            <div class="inp-grp">


            <label class="label" for="field">Field name</label>
          <select id="field" class="inp" name="field" title="Select field name">
            <option selected hidden value="" >select field name</option>
                    <option>Firstname</option>
                    <option>Lastname</option>
                    <option>VoterID_number</option>
                    <option>Aadhar_number</option>
                    <option>DOB</option>
                    <option>Age</option>
                    <option>Gender</option>
                    <option>Phone_Number</option>
                    <option>Email</option>
                    <option>Door_Number</option>
                    <option>Street</option>
                    <option>City</option>
                    <option>Pincode</option>
                    <option>Nationality</option>
                    
                </select>
                <div class="error"></div>
               
            </div >

            <div class="inp-grp">
                <label class="label" for="voter_id">Voter ID</label>
                <input id="voter_id" class="inp" type="text"  name="voter_id" placeholder="Enter Voter_ID value">
                <div class="error"></div>
            </div>

            <div class="inp-grp">
                <label class="label"  for="old">Existing value</label>
                <input id="old" class="inp" type="text"  name="old" placeholder="Enter existing value">
                <div class="error"></div>
            </div>
            <div class="inp-grp">
                <label class="label"  for="new" >New value</label>
                <input id="new" class="inp" type="text" name="new" placeholder="Enter new value">
                <div class="error"></div>
                
            </div>
            <div class="inp-grp">
                <label class="label" for="proof">Upload proof</label>
                <input id="proof" class="inp" type="file" name="proof" >
                <div class="error"></div>
            </div>
             
            <div class="btn">
                <button  type="submit" name="submit">Update</button>
            </div>
        </form>
    </fieldset>
    
    
</body>
</html>
