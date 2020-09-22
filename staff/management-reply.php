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
<li><a href="management-changepassword.php">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a  href="management_home.php">Dashboard</a></li>
    <li><a  href="management_members.phsp">Members</a></li>
    <li><a  href="loan-staff.php">Loans</a></li>
	<li><a  href="savings-managment.php">Savings</a></li>
	<li><a style="background-color: wheat;"  href="management-messages.php">Messages</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<?php
		include '../conn.php';
		$id=$_REQUEST['id'];
		
			$result=$conn->query("SELECT * FROM contact WHERE id='$id'");
			$row=mysqli_fetch_array($result);
			echo "Name: ".$row['name']."<br>";
			echo "Email: ".$row['email']."<br>";
			echo "Subject: ".$row['subject']."<br>";
			echo "Message: ".$row['message']."<br>";

		?>
		<form method="POST">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			Reply:<textarea name="reply" required></textarea><br><br>
			<input type="submit" name="submit" value="Reply">
		</form>
		<?php
		if(isset($_POST['submit'])){
		$id=$_POST['id'];
		$reply=$_POST['reply'];
		$res=$conn->query("UPDATE contact SET reply='$reply' WHERE id='$id'");
			if($res){


				$to = $row['email'];
$subject = $row['subject'];
$txt = $reply;
$headers = "From: kevinkorobosta@gmail.com" . "\r\n" .
 "CC: kevinongulu@gmail.com";

mail($to,$subject,$txt,$headers);
	
	echo "<script>

alert('Reply Sent');
window.location.href='management-messages.php';
</script>";

}
}
		
			?>
</div>

</body>
</html>