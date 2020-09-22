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
    <li><a  href="management_members.php">Members</a></li>
    <li><a  href="loan-staff.php">Loans</a></li>
	<li><a  href="savings-managment.php">Savings</a></li>
	<li><a style="background-color: wheat;"  href="management-messages.php">Messages</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<?php
		include '../conn.php';
		
			$result=$conn->query("SELECT * FROM contact WHERE sentto='management' or sentto='other'");
			if(mysqli_num_rows($result)>0){
				echo "
				<table id='customers'>
				
				<th>Full Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Message</th>
				<th>Reply</th>
				

				";
				while($row=mysqli_fetch_array($result))
					echo"
				<tr>
				<td>".$row['name']."</td>
				<td>".$row['email']."</td>
				<td>".$row['subject']."</td>
				<td>".$row['message']."</td>
				<td>".$row['reply']."</td>

				<td><a href='management-reply.php?id=".$row['id']."'>Reply</a></td>

				
				</tr>

				";
			}
			else{
				echo "No Feedback records found";
			}
			echo "</table>"
			?>
</div>

</body>
</html>