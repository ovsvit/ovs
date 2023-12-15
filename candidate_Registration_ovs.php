<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']== 'POST')
{
  $firstname= $_POST['firstname'];
  $lastname= $_POST['lastname'];
  $candid=$_POST['candid'];
   $Aadharnumber= $_POST['Aadharnumber'];
  $DOB= $_POST['DOB'];
  $Age=$_POST['Age'];
  $gender=$_POST['gender'];
   $phno= $_POST['phno'];
  $email= $_POST['email'];
  $dno=$_POST['dno'];
  $street=$_POST['street'];
   $city= $_POST['city'];
  $pincode= $_POST['pincode'];
  $nationality=$_POST['nationality'];
  $img_name=$_FILES['photo']['name'];
   //echo "  $img_name";
   $img_tmp_name=$_FILES['photo']['tmp_name'];
   //echo " $img_tmp_name";
   move_uploaded_file($img_tmp_name,"uploads/ $img_name");


  $query="insert into candidate_register(Firstname,Lastname,Candidateid_number,Aadhar_number,DOB,Age,Gender,Phone_number,Email,Door_number,Street,City,Pincode,Nationality,Photo) 
 values('$firstname','$lastname','$candid','$Aadharnumber','$DOB','$Age','$gender','$phno','$email','$dno','$street','$city','$pincode','$nationality','$img_name')";
  mysqli_query($conn,$query);

  header("Location:party_register.php");
 
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Registration</title>
 
    <link rel="stylesheet" href="./candidatereg.css" />
   <style>
    * {
    margin: 0;
    padding: 0;
    font-family: "Roboto", "sams-serif";
  }
  body
  {
    background-image: url("background3.jpeg");
    
  }
  #formc {
    align-items: center;
    height:1390px;
    width: 600px;
    margin: 10vh auto 0 auto;
    background-color: rgb(143, 210, 236);
    border-radius: 30px;
    padding: 60px;
    
  }
  #form1 {
    align-items: center;
    height:800px;
    width: 600px;
    margin: 10vh auto 0 auto;
    background-color: rgb(143, 210, 236);
    border-radius: 30px;
    padding: 60px;
    
  }
  #home
  {
    margin-top:40px;
  }
  #login
  {
    margin-top:5px;
    margin-bottom:20px;
  }
 
  #topic {
        text-align:center;
        height:45px;
        width:1300px;
        background-color: rgb(6, 224, 240);
        padding:10px;
        border-color:black;
        border-radius:10px;
        margin-left:10px;
        border-style:double;
      
}
  #formc h2 {
    text-align: center;
    color: rgb(9, 94, 105);
    margin-top:2px;
  }
  
#btn {
  border: 1px solid;
  padding: 4px;
  margin: 10px 0px;
  cursor: pointer;
  border-radius: 10px;
  font-size: 20px;
  width: 50%;
  margin-left:150px;
  margin-top: 45px;
  background-color:aqua;
  border:2px solid blue;
  
  }
  .next
  {
    
    border: 1px solid;
    padding: 4px;
    margin: 10px 0px;
    cursor: pointer;
    border-radius: 10px;
    font-size: 20px;
    width: 30%;
    margin-left:200;
    margin-top: 26px;
    background-color:aqua;
    border:2px solid blue;
    
  }
  
  .inputgroup label {
    margin-left: 5%;
    margin-top:30px;
    color: black;
  }
  .inputgroup.error {
    color: rgb(238, 25, 25);
  }
  .inputgroup.error #pw {
    color: rgb(238, 25, 25);
    margin-left: 15%;
  }
  #Principle{
    outline: 0;
    
    font-size: 13px;
    width: 450px;
    height:300px;
    padding: 5px;
    margin-left: 15%;
   
  }
  #personnal
  {
    text-align: right;
    margin-bottom:10px;
  }
  
  .inputgroup input {
    outline: 0;
    display: flex;
    font-size: 13px;
    width: 50%;
    padding: 5px;
    margin-left: 15%;
    margin-bottom:5px;
  }
 
  .inputgroup input:focus {
    outline: 0;
  }
  
  .inputgroup.success input {
    
    border:2px solid rgb(11, 197, 11)
  }
  .inputgroup.error input {
    
    border:2px solid red;
  }
  
  #formc .genderoption {
    display:flex;
    column-gap: 50px;
    margin-top: 15px;
    margin-bottom: 15px;
    margin-left: 8%;
  }
 
  #formc .genderchoose {
    margin-left: 5%;
  }
  
  #formc h4 {
    text-align: right;
    margin-right: 5%;
  }
  
  #address {
    margin-left: 5%;
  }
  
  .required::after {
    content: " *";
    color: red;
  }

.info #p
  {
  margin-top:10px;
 text-align:center;
 margin-bottom:22px;

  }
  
 #Principle::placeholder 
  {
   text-align:center;
   font-size: 15px;
  }

  
   </style>
    <script defer src="./candidatereg.js"></script>
  </head>
  <body>
    <h2 id="topic">Welcome to Online Voting..</h2>
    <div class="container">
      <form  method="POST" id="formc"  enctype="multipart/form-data">
        <h2 id="acc">Create Your Account..</h2>
        
        <h4 id="home">
          Go to
          <a
            href="home1.html"
            
            >Home</a
          >
        </h4>
        <h4 id="login">
          Already have an account?
          <a
            href="voterlogin.php"
            
            >Login</a
          >
        </h4>
        <hr>
        
        <div class="info">
            <h4 id="p">Personnal details</h4>
        </div>
        

        <div class="inputgroup">
          <label class="required" for="firstname">Firstname</label>
          <input
            type="text"
            id="firstname"
            name="firstname"
            placeholder="Enter your firstname"
          />
          <div class="error" id="pw"><br></div>
        </div>
        <br>
        <div class="inputgroup">
          <label class="required" for="Lastname">Lastname </label>
          <input
            type="text"
            id="lastname"
            name="lastname"
            placeholder="Enter your lastname"
          />
          <div class="error" id="pw"></div>
        </div>
       <br>
        <div class="inputgroup">
          <label class="required" for="Candidate ID number">Candidate ID number </label>
          <input
            type="int"
            id="candid"
            name="candid"
            placeholder="Enter your candidate ID number"
          />
          <div class="error" id="pw"></div>
        </div>
        <br>
        <div class="inputgroup">
          <label class="required" for="aadhar">Aadhar number</label>
          <input
            type="int"
            id="Aadharnumber"
            name="Aadharnumber"
            placeholder="Enter your Aadhar number"
          />
          <div class="error" id="pw"></div>

        </div>
        <br>
        <div class="inputgroup">
          <label class="required" for="DOB">DOB</label>
          <input
            type="date"
            id="dob"
            name="DOB"
            onmouseleave="getyr()" 
            placeholder="Enter your Date of birth"
          />
        </div>
        <br>
        <div class="inputgroup">
          <label class="required" for="age">Age</label>
          <input type="int" id="age" name="Age" placeholder="Enter your age" value="NaN"/>
          <div class="error" id="pw"></div>
        </div>
        <br>
        <div class="genderchoose">
          <label class="required" for="gender">Gender</label>
          <div class="genderoption" id="gender">
            <div class="gender">
              <input type="radio" id="male" name="gender" value="M"/>
              <label for="gender">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="female" name="gender" value="F"/>
              <label for="gender">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="others" name="gender" value="O"/>
              <label for="gender">Others</label>
            </div>
          </div>
        </div>
        <br>
        <div class="inputgroup">
          <label class="required" for="phno">Phone number</label>
          <input
            type="int"
            id="phno"
            name="phno"
            placeholder="Enter your phone number"
          />
          <div class="error" id="pw"></div>
        </div>
        <br>
        <div class="inputgroup">
          <label class="required" for="email">Email ID</label>
          <input
            type="text"
            id="email"
            name="email"
            placeholder="Enter your Email address"
          />
          <div class="error" id="pw"></div>
        </div>
        <br>

        <label class="required" for="text" id="Address"> Address</label>
        <div class="inputgroup">
          <input type="text" id="dno" name="dno" placeholder="Enter door no." />
          <div class="error" id="pw"></div>
        </div>
        <div class="inputgroup">
          <input
            type="text"
            id="street"
            name="street"
            placeholder="Enter Street name"
          />
          <div class="error" id="pw"></div>
        </div>
        <div class="inputgroup">
          <input
            type="text"
            id="city"
            name="city"
            placeholder="Enter city name"
          />
          <div class="error" id="pw"></div>
        </div>
        <div class="inputgroup">
          <input
            type="int"
            id="pincode"
            name="pincode"
            placeholder="Enter pincode"
          />
          <div class="error" id="pw"></div>
        </div>
<br>
        <div class="inputgroup">
          <label class="required" for="nationality">Nationality</label>
          <input
            type="text"
            id="nationality"
            name="nationality"
            placeholder="Enter your Nationality"
          />
          <div class="error" id="pw"></div>
        </div>
<br>
        <div class="inputgroup">
          <label class="required" for="photo">Photo</label>
          <input
            type="file"
            id="photo"
            name="photo"
            
          />
          <div class="error" id="pw"></div>
        </div>
    
  <button type="submit" class="next">Next</button>

       
         
      </form>
    </div>

  </body>

  <script>
    const formc = document.getElementById("formc");
//const form1 = document.getElementById("form1");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const voterid = document.getElementById("candid");
const aadharnumber = document.getElementById("Aadharnumber");
//const dob =document.getElementById('dob');
const age = document.getElementById("age");
const phno = document.getElementById("phno");
const email = document.getElementById("email");
const nationality = document.getElementById("nationality");
const gender = document.getElementById("gender");
const dno = document.getElementById("dno");
const street = document.getElementById("street");
const city = document.getElementById("city");
const pincode = document.getElementById("pincode");
const dob=document.getElementById("dob");
var photo=document.getElementById("photo")




function getyr()
{
  var inputdate=document.getElementById("dob").value;
  var dateobj=new Date(inputdate);
  var yr=dateobj.getFullYear();
  if(yr!="")
  {
    setage(yr);
  }
  //console.log(yr);
}
function setage(yr)
{
  var a=document.getElementById("age")
  var curr=new Date().getFullYear();
  var AGE=curr-yr;
  a.value=AGE;
 

}



formc.addEventListener("submit", (e) => {
  if (!validateInputs()) {
    e.preventDefault();
  }
});



function validateInputs() {
  
  let suc = true;
  const newfns = firstname.value.trim();
  const newlns = lastname.value.trim();

  const candids = candid.value.trim();
  const emails = email.value.trim();

  const aadharnumbers = aadharnumber.value.trim();
  const ages = age.value.trim();

 
  const phnos = phno.value.trim();
  const dnos = dno.value.trim();
  const streets = street.value.trim();
  const citys = city.value.trim();
  const pincodes = pincode.value.trim();

  const nationalitys = nationality.value.trim();

 
  var filepath=photo.value;
  var allowedex=/(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if(filepath==="")
  {
    suc=false;
    seterror(photo,"Photo should be required");
  }
  else if(!allowedex.exec(filepath))
  {
    suc=false;
    seterror(photo,"Provide valid file type");
  }
  else{
    
    setsuccess(photo);
  }


 

  if (newfns === "") {
    suc = false;
    seterror(firstname, "Firstname is required");
  } else {
    
    setsuccess(firstname);
  }
  if (newlns === "") {
    suc = false;
    seterror(lastname, "Lastname is required");
  } else {
    
    setsuccess(lastname);
  }

  if (candids === "") {
    suc = false;
    seterror(candid, "Candidateid number is required");
  } else if (candids.length < 10 || candids.length > 10) {
    suc = false;
    seterror(candid, "Candidate ID number must be 10 characters");
  } else {
    
    setsuccess(candid);
  }

  if (emails === "") {
    suc = false;
    seterror(email, "Email is required");
  } else if (!valideemail(emails)) {
    suc = false;
    seterror(email, "Please enter a valid email");
  } else {
    
    setsuccess(email);
  }

  if (aadharnumbers === "") {
    suc = false;
    seterror(aadharnumber, "Aadhar number is required");
  } else if (aadharnumbers.length < 12 || voterids.length > 12) {
    suc = false;
    seterror(aadharnumber, "Aadhar number must be 12 numbers");
  } else {
   
    setsuccess(aadharnumber);
  }
  if (phnos === "") {
    suc = false;
    seterror(phno, "Phone number is required");
  } else if (phnos.length < 10 || phnos.length > 10) {
    suc = false;
    seterror(phno, "Phone number should be 10 numbers");
  } else {
    
    setsuccess(phno);
  }
  if (dnos === "") {
    suc = false;
    seterror(dno, "Door no is required");
  } else {
    
    setsuccess(dno);
  }
  if (streets === "") {
    suc = false;
    seterror(street, "Street name is required");
  } else {
    
    setsuccess(street);
  }
  if (citys === "") {
    suc = false;
    seterror(city, "City name is required");
  } else {
   
    setsuccess(city);
  }
  if (pincodes === "") {
    suc = false;
    seterror(pincode, "Pincode is required");
  } else if (pincodes.length != 6) {
    suc = false;
    seterror(pincode, "Provide valid pincode");
  } else {
  
    setsuccess(pincode);
  }

  if (ages === "NaN") {
    suc = false;
    seterror(age, "Age is required");
  } else if (ages < 18) {
    suc = false;
    seterror(age, "Age should be above 18");
  } else {
    
    setsuccess(age);
  }

  if (nationalitys === "") {
    suc = false;
    seterror(nationality, "Please provide your nationality");
  } else if (
    nationalitys.toLowerCase() != "indian" &&
    nationalitys.toLowerCase() != "india"
  ) {
    suc = false;
    seterror(nationality, "You are not eligible to vote");
  } else 
  {
   
    setsuccess(nationality);
  }
 

  

  return suc;
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
const valideemail = (email) => {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};





  </script>

</html>
