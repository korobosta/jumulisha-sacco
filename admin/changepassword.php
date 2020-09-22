<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1>Admin Home</h1>
<ul>
<li><a href="changpassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
	<form style="text-align: center;font-weight: bold;font-size: 20px;padding: 20px;" method="POST">
Current Password:<input type="password" name="cp"><br><br>
New Password:<input type="password" name="np"><br><br>
Confirm New Password:<input type="password" name="np1"><br><br>
<input type="submit" name="submit" value="Change"><br>
	<?php
	include '../conn.php';
	$memberID=$_SESSION['memberID'];
if(isset($_POST['submit'])){
	$cp=$_POST['cp'];
	$np=$_POST['np'];
	$np1=$_POST['np1'];
	if($np!==$np1){
		echo "<p style='color:red''>The Confirm passwords do dont match with the new password</p>";
	}
	else{
		$cp=md5($cp);
		$result=mysqli_query($conn,"SELECT password FROM users WHERE occupation='admin'");
	$row=mysqli_fetch_array($result);
	$password=$row['password'];
	if($cp==$password){
		$np=md5($np);
		mysqli_query($conn,"UPDATE users SET password='$np' WHERE memberID='$memberID'") or die("ERROR::".mysqli_error($conn));
		echo "<p style='color:green'>Password changed successfully</p>";
		session_destroy();
	echo "<script>
          alert('Password changed successfully');
          window.location.href='admin_login.php';
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