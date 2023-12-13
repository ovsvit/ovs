<?php
require_once('resdb.php');
$query="Select * from candidate  order by Vote_count desc";
$result=mysqli_query($con,$query);
$query2="Select * from candidate";
$res= mysqli_query($con,$query2);
$test=array();

$count=0;
while($row=mysqli_fetch_array($res)){
    $test[$count]["label"]=$row["Party_name"];
    $test[$count]["y"]=$row["Vote_count"];
    $count=$count+1;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Update password</title>
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
        h1{
          
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


        table, td, th {
               border: 3px solid black;
               /*background-color: #f2f2f2;*/
         }
         th{
            background-color: blue;
            font-weight:bold;
             color:white;
             height:55px;

         }
         h4{
            color:Blue;
         }

        table {
               border-collapse: collapse;
               width: 80%;

            }

       td {
            text-align: center;
            height:45px;
         /*background-color: powderblue;*/
          }
          tr{
            background-color: rgb(6, 224, 240);
          }
        tr:nth-child(2){
            background:#99FFFF;
            height:65px;
}
      
        </style>
       <script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "blue",
	title:{
		text: "Vote Chart"
	},
	axisY: {
		title: "Vote count"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Votes",
        //indexLabelBackgroundColor: "lightblue"
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>,
        datasets: [{
                   // label: 'Your Chart Title',
                   // data: data.data,
                    backgroundColor: 'blue', // Set your custom background color here
                    borderColor: 'rgba(75, 192, 192, 1)',
                    //borderWidth: 1
                }]
        
	}
]
  
});
chart.render();
 
}
</script>         
 
</head>
<body>
    <div class="head">
        <nav>
            <h1> ONLINE VOTING SYSTEM</h1>
            
            <ul >
                <li ><a href="home.html">Home</a></li>
                <li>|</li>
                <li><a href="logout.html">Logout</a></li>
            </ul>    
        </nav>     
    </div>


                         <center><h2 style="color:powderblue;">RESULT</h2></center> 
                       </div>
                       <div class="card-body">
                        <center>
                        <table >
                                <tr><h2>
                                    <th>Candidate ID</th>
                                    <th>Candidate Name</th>
                                    <th>Party Name</th>
                                    <th>Party Symbol</th>
                                    <th>Description</th>
                                    <th>Vote count</th></h2>
                                </tr>
                                <tr>
                                    <?php
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            ?>
                                              <td><?php echo $row['Cand_id']; ?></td>
                                              <td><?php echo $row['Cand_name']; ?></td>
                                              <td><?php echo $row['Party_name']; ?></td>
                                              <td><?php echo $row['Party_Symbol']; ?></td>
                                              <td><?php echo $row['Description']; ?></td>
                                              <td><?php echo $row['Vote_count']; ?></td>
                                              </tr>     
 
                                            <?php
                                        }
                                    ?>
                                
                             </table>
                        </center>
                        <br><br>
                             
                       </div>
                       <center><div id="chartContainer" style="height: 270px; width: 40%;"></div></center>
                       
                       <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    
</body>
                                    </html>