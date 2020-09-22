<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="welcome">
<h1> Staff Homepage </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="#">Dashboard</a></li>
    <li><a  href="staff_members.php">Members</a></li>
    <li><a  href="#">Loans</a></li>
	<li><a  href="#">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
<?php
if(isset($_POST['submit'])){
include 'conn.php';
$surname=$_POST['surname'];
$othernames=$_POST['othernames'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$idno=$_POST['idno'];
$mobilenumber=$_POST['mobilenumber'];
$address=$_POST['address'];
$password=$_POST['password'];
$username=$_POST['username'];
$sql="INSERT INTO members (surname,othernames,dob,email,idno,mobilenumber,address,username,password) 
VALUES('$surname','$othernames','$dob','$email','$idno','$mobilenumber','$address','$username','$password')";
$result=mysql_query($sql) or die("Could not execute querry: ".mysql_error() );
if($result){
	echo "Member Registered";
	
}
}
?>

<form class="register" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
<fieldset>
      <legend>Input Member Details:</legend>
Surname:<input type="text" name="surname"><br><br>
Other Names:<input type="text" name="othernames"><br><br>
Date Of Birth:<input type="text" name="dob"><br><br>
ID No:<input type="text" name="idno"><br><br>
Email Address:<input type="text" name="email"><br><br>
Mobile Number:<input type="text" name="mobilenumber"><br><br>
Adress:<input type="text" name="address"><br><br>
Username:<input type="text" name="username"><br><br>
Password:<input type="password" name="password"><br><br>

<input type="submit" name="submit" value="Submit">
</fieldset>
</form>
</div>

</body>
</html>