<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>View Staff Records</title>
<link rel="stylesheet" href="../css/style3.css">
	<script type="text/javascript">
		
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>
</head>
<body>
<div class="welcome">
<h1> Admin Page: Users Display</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
<h1><a href="addstaff.php" >Add User</a></h1>
<?php
include '../conn.php';
if($result=mysqli_query($conn,"SELECT * FROM users ")){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table id='customers'>";
		echo "<tr><th>User ID</th><th> Name</th><th>Email</th><th>Address</th><th>Phone Number</th><th>ID Number</th><th>Date of Birth</th><th>Date of Employment</th><th></th><th></th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['userID']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['email']."<t/d>";
			echo "<td>".$row['address']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['idno']."</td>";
			echo "<td>".$row['dob']."</td>";
			echo "<td>".$row['doe']."</td>";
			echo "<td> <a href='editstaff.php?email=".$row['email']."'</a>Edit</td>";
			echo "<td> <a onclick='return confirmDelete();'href='deletestaff.php?email=".$row['email']."'</a>Delete</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}	
?>


</body>
</html>