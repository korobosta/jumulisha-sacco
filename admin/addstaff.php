<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Add Staff</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1>Admin Page: Add User</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
<?php
include '../conn.php';
if(isset($_POST['submit'])){
$name=$_POST['name'];
$occupation=$_POST['occupation'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$password=$_POST['password'];
$password=md5($password);
$username=$_POST['username'];
$sql="INSERT INTO users (name,email,occupation,address,phone,dob,doe,username,password) 
VALUES('$name','$email','$occupation','$address','$phone','$dob',NOW(),'$username','$password')";
$result=mysqli_query($conn,$sql) or die("Could not execute querry: ".mysqli_error($conn) );
if($result){
	                      echo "<script>
          alert('You have succcessfully added the user');
          window.location.href='staff.php';
          </script>"; 
}
}
?>

<form class="register" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
<fieldset>
      <legend>Input Staff Details:</legend>
Name:<input type="text" name="name" required><br><br>
Email:<input type="text" name="email" required><br><br>
Occupation:<input type="text" name="occupation" required><br><br>
Postal Address:<input type="text" name="address" required><br><br>
Phone Number:<input type="text" name="phone" required><br><br>
Date of Birth:<input type="date" name="dob" required><br><br>
Username:<input type="text" name="username" required><br><br>
Password:<input type="password" name="password" required><br><br>

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