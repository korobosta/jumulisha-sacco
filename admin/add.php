<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Add Member</title>
<link rel="stylesheet" href="style3.css">
</head>
<body>
<div class="welcome">
<h1>Admin Members Dispaly</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
<?php
if(isset($_POST['submit'])){
include '../conn.php';
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
<footer>
<div class="footer">
<ul>
                   
                   <div class="footer_content">
                   <li><a href="features.php">SACCO operations </a></li>
                   <li><a href="contact.php"> Contact</a></li>
                 
                   <li><a href="safeonlinebanking.php">Offline Services</a></li>
                   
                   <li style="padding-left:450px;">Copyright@Kenversity SACCO 2018</li>
                   
                   </div>
                   </ul>                    
       
    
    
 </div>
           </div> 
</footer>
</body>
</html>