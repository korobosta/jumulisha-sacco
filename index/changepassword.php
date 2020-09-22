<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	#active10{
            background-color: wheat;
        }
	</style>
</head>

<body>
<?php include 'member_nav.php';?>
<div class="displayAccount">
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
		echo "<p style='color:red''>The two passwords do dont match</p>";
	}
	else{
		$cp=md5($cp);
		$result=mysqli_query($conn,"SELECT password FROM members WHERE memberID='$memberID'");
	$row=mysqli_fetch_array($result);
	$password=$row['password'];
	if($cp==$password){
		$np=md5($np);
		mysqli_query($conn,"UPDATE members SET password='$np' WHERE memberID='$memberID'") or die("ERROR::".mysqli_error($conn));
		echo "<p style='color:green'>Password changed successfully</p>";
		session_destroy();
	echo "<script>
          alert('Password changed successfully');
          window.location.href='login.php';
          </script>"; 
}
else{
		echo "<p style='color:red'>The password you entered does not match the one in the database!</p>";
	}

}

	}
	

?>
	</form>	

</div>


</div>

</body>
</html>