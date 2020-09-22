<?php 

session_start();
        
if(!isset($_SESSION['management_login'])) 
    header('location:stafflogin.php');  
    include '../conn.php'; 
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Management Homepage </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a  href="management_home.php">Dashboard</a></li>
    <li><a  href="management_members.php">Members</a></li>
    <li><a  href="loan-staff.php">Loans</a></li>
	<li><a  href="savings-managment.php">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<fieldset style="width:25%;float:left;"><legend style="color:blue;text-align: center;font-weight: bold;">Total Number of loans disbursed</legend>
		<form style="text-align: center;font-weight: bold;font-size: 20px;padding: 20px;" method="POST">
Current Password:<input type="password" name="cp"><br><br>
New Password:<input type="password" name="np"><br><br>
Confirm New Password:<input type="password" name="np1"><br><br>
<input type="submit" name="submit" value="Change"><br>
</fieldset>
	<?php
	include '../conn.php';
	$username=$_SESSION['managementUsername'];
if(isset($_POST['submit'])){
	$cp=$_POST['cp'];
	$np=$_POST['np'];
	$np1=$_POST['np1'];
	if($np!==$np1){
		echo "<p style='color:red''>The two passwords do dont match</p>";
	}
	else{
		$cp=md5($cp);
		$result=mysqli_query($conn,"SELECT password FROM users WHERE username='$username'");
	$row=mysqli_fetch_array($result);
	$password=$row['password'];
	if($cp==$password){
		$np=md5($np);
		mysqli_query($conn,"UPDATE users SET password='$np' WHERE username='$username'") or die("ERROR::".mysqli_error($conn));
		echo "<p style='color:green'>Password changed successfully</p>";
		session_destroy();
	echo "<script>
          alert('Password changed successfully');
          window.location.href='stafflogin.php';
          </script>"; 
}
else{
		echo "<p style='color:red'>The password you entered does not match the one in the database!</p>";
	}

}

	}
	?>
		
	
</div>

</body>
</html>