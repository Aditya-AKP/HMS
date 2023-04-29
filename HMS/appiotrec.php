<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
#adlog{
margin: 0 auto;
background-color:limegreen;
width: 750px;
height: 250px;
border-radius: 10px;
font-size:20px;
padding-top: 5px;
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
}

.top { background-color:#04b861;
;overflow: hidden; }

.top a { float:left;
color: black;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size:17px; }

.top a:hover {
background-color: #302d2d;
color: white; }

.dropdown-content {
display: none;
position: absolute;
}

.dropdown {
float:left;
overflow:hidden;
}


.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  
  min-width: 160px;
  box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  background-color:#029950;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown:hover .dropdown-content {
display: block;
}

</style>
<body style="background-color: rgb(10,100,40); background-image: url(https://img.freepik.com/free-vector/clean-medical-background_53876-97927.jpg?w=2000); background-repeat: repeat; background-size: 100%">
<div class="top">
		  <nav>
		  <img src="hmslogo2.png" height="50px" align="left">
		  <a href="home.html"><b>Home</b></a>
		  <a href="about.html"><b>About</b></a>
		  <a href="contact.html"><b>Contact</b></a>
		  
		  <div  class="dropdown">
		  <button type="button" class="dropbtn"><b>Login</b>
		  <i class="fa fa-caret-down"></i>
		  </button>
		  <div class="dropdown-content">
		  <a href="docLog.html">Doctor's Portal</a>
		  <a href="patLog.html">Patient's Portal</a>
		  <a href="adLog.html">Admin's Portal</a>
		  <a href="reg.html">New Patient Registration</a>
		  </div>
		  </div>
		  
		  </nav>
		  </div>
		  <hr color="black">
		  
<div>
<!--To Do...-->

<?php
$conn = new mysqli("localhost","root","","hms");

if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
$sql="SELECT p_id,doc_id,doc_name,time,date,department,status FROM appoint";
$result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
        ?>
        <table border="1">
        <tr>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Department</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        <?php
        while($row = $result-> fetch_assoc())
        {
            echo "<tr><td>".$row["p_id"]."</td><td>". $row["doc_id"]."</td><td>".$row["doc_name"]."</td><td>".$row["department"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["status"]."</td></tr>";
            
        }
        echo "</table>";
    }
    else{
        echo "No Precription Record";
    }
?>

</div>
</body>
</html>