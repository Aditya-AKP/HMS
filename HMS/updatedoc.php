<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
#DocReg{
margin: 0 auto;
background-color: lightgray;
width: 400px;
height: auto;
border-radius: 10px;
font-size:20px;
padding-top: 5px;
padding-left:10px;
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
}

#submit, #reset {
background-color: #4CAF50;
color: black;
border: none;
cursor: pointer;
margin: 4px 2px;
font-size:20px;
border-radius: 5px;
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
}

#submit:hover, #reset:hover{
background-color: #302d2d;
color: white;
box-shadow: none;
}

.top { background-color:#04b861;
;overflow: hidden; }

.top a { float:left;
color: black;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size:17px; }

.top a:hover {background-color: #302d2d;
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

#info:hover{
    color:darkslategray;
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
    <a href="doclog.html">Doctor's Portal</a>
    <a href="patLog.html">Patient's Portal</a>
    <a href="adLog.html">Admin's Portal</a>
    <a href="reg.html">New Patient Registration</a>
    </div>
    </div>
    </nav>
		  </div>
		  <hr>

<div id="DocReg">
<h1>Update Doctor</h1>
<?php

$id=$_POST['did'];

$conn = mysqli_connect("localhost","root","","hms");
    if($conn-> connect_error)
    {
        die("connection failed:". $conn-> connect_error);
    }
    $sql="SELECT name,dob,age,address,mobile,gender,department,experience,college,email FROM doctor WHERE doc_id=$id";
    $result=$conn->query($sql);
    $row=$result-> fetch_assoc();

?>
<form action="updoctorf.php" method="post">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>">
Name: <input type="text" name="name" placeholder="<?php echo $row['name']; ?>" >
<br><br>

<label for="gender">Gender:</label>
  <select name="gender" id="gender" >
  <option value="" disabled selected hidden><?php echo $row['gender']; ?></option>
    <option value="M">Male</option>
    <option value="F">Female</option>
    <option value="Oth">Other</option>
  </select>
  <br><br>
  
Age: <input type="age" id="age" name="age" placeholder="<?php echo $row['age']; ?>">
<br><br>

Date of Birth:<input type="date" id="dob" name="dob" min="1900-01-01" placeholder="<?php echo $row['dob']; ?>">
<script>
dob.max = new Date().toISOString().split("T")[0];
</script>
  <br>
  <br>

  <label for="">Department:</label>
  <select name="department" id="depa" >
  <option value="" disabled selected hidden><?php echo $row['department']; ?></option>
    <option value="Pathology">Pathology</option>
    <option value="Neurology">Neurology</option>
    <option value="ENT">ENT</option>
	<option value="Cardiologist">Cardiologist</option>
	<option value="Dental">Dental</option>
	<option value="Psychiatrist">Psychiatrist</option>
	<option value="Orthopedic">Orthopedic</option>
  </select>
  <br>
  <br>
  Experience: <input type="exp" name="experience" placeholder="<?php echo $row['experience']; ?>">
<a class="fas fa-info-circle [&#xf05a]" id="info" data-toggle="tooltip" title="Enter Number of Years"></a>
<br><br>

Education: <input type="edu" name="college" placeholder="<?php echo $row['college']; ?>" >
<a class="fas fa-info-circle [&#xf05a]" id="info" data-toggle="tooltip" title="Name of the Institute from where the highest
qualification-degree/marksheet is received"></a>
<br><br>

Address:
<br>
<textarea name="address" id="address" placeholder="<?php echo $row['address']; ?>"></textarea>
<br><br>
Mobile Number: <input type="number" id="mnum" name="mobile" maxlength="10" placeholder="<?php echo $row['mobile']; ?>" >
<br><br>  
 Email: <input type="email" id="email" name="email" placeholder="<?php echo $row['email']; ?>">
<br><br>
<input type="submit" id="submit" value="Submit">
</form>
</div>
</body>

</html>