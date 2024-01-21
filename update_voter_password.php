<?php
session_start();
include("db.php");
//echo "<script type='text/javascript'>alert('Hello')</script>";


if($_SERVER['REQUEST_METHOD']== 'POST')
{
    $u= $_POST['u'];//username
    $a= $_POST['a'];//new password
    $o=$_POST['o'];
    $b=$_POST['b'];

 $query="UPDATE voter_login SET password='$a' where username='$u'";
 //mysqli_query($conn,$query);
 $query_run=mysqli_query($conn,$query);
  if($query_run)
  {
    header("Location: voterlogin.php");
  }
}

$home="homepage";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration successful</title>
    <style>
body
{
  background-image: url("background3.jpeg");
}
.msg
{
height:70px;
  width: 600px;
  margin: 10vh auto 0 auto;
  background-color: rgb(98, 230, 240);
  border-radius: 20px;
  padding: 5px;
  margin-top:20px;
  border:2px solid darkblue;
 
  
}
#h
{
    
    animation:blow 3s infinite linear;
}
@keyframes blow
{

    0%
    {
        transform:translateY(0) scale(1);
    }
    50%
    {
        transform:translateY(-10px) scale(1.05);
    }
}
.pw
{
  height:500px;
  width: 500px;
  margin: 10vh auto 0 auto;
  background-color:rgb(6, 224, 240);
  border-radius: 10px;
  padding: 10px;
  margin-top:20px;
  border-style:double;
            border-color:black;
}
#pw
{
  
  padding:5px;
  border-radius:5px;
  height:500px;
  width:400px;
  margin-left:30px;
  color:black;
  margin-bottom:5px;
}

#repw
{
  
  padding:5px;
  border-radius:5px;
  height:20px;
  width:400px;
  margin-left:30px;
  color:black;
  margin-bottom:5px;
}

#voterid
{
  
  padding:5px;
  border-radius:5px;
  height:20px;
  width:400px;
  margin-left:30px;
  color:black;
  margin-bottom:5px;
}


#btn
{
   
  background-color: blue;
  color: white;
  border: 1px solid;
  padding: 7px;
  margin: 10px 0px;
  cursor: pointer;
  border-radius: 5px;
  font-size: 20px;
  width: 50%;
  margin-left: 100px;
  margin-top:10px;
  
  margin-bottom:50px;
}
.note
{

    height:200px;
  width:600px;
  background-color: rgb(23, 151, 194);
  color:black;
  border: 2px solid;
  margin-right:50%;
}

.inputgroup.error #pw1 {
  
  color: rgb(238, 25, 25);
  margin-left: 30px;
}

.inputgroup.success input {
    
    border:2px solid rgb(11, 197, 11)
  }
  .inputgroup.error input {
    
    border:2px solid red;
  }

  #password
  {
    margin-bottom:40px;
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
        input[type=submit], input[type=button] {
                    background-color: navy;
                    border: none;
                    color: white;
                    padding: 7px 14px;
                    text-decoration: none;
                    margin: 2px 1px;
                    cursor: pointer;
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
            border-radius:1px;
            padding:0px;
            
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
        
        li,h1{
            display:Inline;
        }
        li{
            font-size:1.5em;
        }
        .bot{
                color:black;
                padding: 10px;
            }

    </style>
    
</head>
<body>
<div class="head">
        <nav>
            <h1> Online Voting System</h1>
            
            <ul >
                <li ><a href="candidatehomepage.php?username=". urlencode($u)>Home</a></li>
                <li>|</li>
                <li><a href="home1.html">Logout</a></li>
            </ul>    
        </nav>
        
         
    </div>
  <form  method="POST" id="form">
    
    <div class="pw">
       
        <center><h2 id="password">Create Your Password</h2></center>
        <div class="inputgroup">
                <label class="label">Username:</label>
                <input class="inp" type="text" id="u" name="u" placeholder="Enter your username" >
                <div class="error" id="pw1"></div>
            </div>
            <div class="inputgroup">
                <label class="label">Old password:</label>
                <input class="inp" type="text" id="o" name="o" placeholder="Enter old password" >
                <div class="error" id="pw1"></div>
            </div>
            <div class="inputgroup">
                <label class="label">New password:</label>
                <input  class="inp" type="password" id="a" name="a" placeholder="Enter new password" >
                <div class="error" id="pw1"></div>
                
            </div>
            <div class="inputgroup">
                <label class="label">Confirm password:</label>
                <input  class="inp" type="password" id="b" name="b" placeholder="Enter confirm password">
                <div class="error" id="pw1"></div>
                
            </div>
            <input type="checkbox" onclick="myFunction()">Show Password
            <div>
                <p id="message"></p>
                <p id="show"></p>
            </div>
        
      
        <button id="btn" type="submit">Update Password</button>
        <br>
        
        <br><br>
        

    </div>
    <div class="head">
        <nav>
        <h3 style="color:Black"><u>Note:</u></h3>
       ->Make sure that your new password should contain atleast 1 uppercase,1 lowercase,1 number and 1 special character.<br>
       ->Make sure that your password should be more than 8 characters.<br>
     ->Make sure that your new password and confirm password should be same.<br>
     ->Make sure that yout new password should not be your old password.<br>
    ->The confirmation message will be sent to your respective email id.<br><br>
        
    </nav>
    </div>
  
</body>
</form>
<script>

const form = document.getElementById("form");
const a= document.getElementById("a");
const b= document.getElementById("b");
const u= document.getElementById("u");
 form.addEventListener("submit", (e) => {
  if (!validateInputs()) {
    e.preventDefault();
  }
  else{
    alert("Password was created successfully");
  }
});

 function validateInputs() {
  let suc = true;
  const us=u.value.trim();
  const password = a.value.trim();
  const repassword = b.value.trim();


  if (us === "") {
    suc = false;
    seterror(u, "Voterid number is required");
  } else if (us.length < 10 || us.length > 10) {
    suc = false;
    seterror(u, "Voter ID number must be 10 characters");
  } else {
    setsuccess(u);
  }

  if (password === "") {
    suc = false;
    seterror(a, "Set your password");
  }
  else if(password .length<8 || !checkpass(password) )
  {
    suc = false;
    seterror(a, "Provide a strong password");
  } 
  else {
    setsuccess(a);
  }

  if (repassword  === "") {
    suc = false;
    seterror(b, "Re-enter your password");
  }
  else if(password .length<8 || !checkpass(password) )
  {
    suc = false;
    seterror(b, "Provide a strong password");
  } 
  else if(password != repassword)
  {
    suc = false;
    seterror(b, "Type the password correctly");
  } 
  else {
    setsuccess(b);
  }
  
  

  return suc;
}
function checkpass(a)
{
  var pass=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
  if(a.match(pass))
  {
    return true;
  }
  else
  {
    return false;
  }


  
}
function seterror(element, msg) {
  const Inputgroup = element.parentElement;
  const errorelement = Inputgroup.querySelector(".error");
  errorelement.innerText = msg;
  Inputgroup.classList.add("error");
  Inputgroup.classList.remove("success");
}
function setsuccess(element) {
  const Inputgroup = element.parentElement;
  const errorelement = Inputgroup.querySelector(".error");
  errorelement.innerText = "";
  Inputgroup.classList.add("success");
  Inputgroup.classList.remove("error");
}

</script>
</html>
