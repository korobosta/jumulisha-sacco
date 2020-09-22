<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Members</title>
<link rel="stylesheet" href="../css/style3.css">

<script type="text/javascript">
		
function confirmDelete()
{
   return confirm("Are you sure you want to delete this member?");
}
</script>
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
<div>
<div class="admindisplay">
	<?php
	include '../conn.php';
if($result=mysqli_query($conn,"SELECT * FROM members ")){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table id='customers'";
		echo "<tr><th>member ID</th><th>surname</th><th>othernames</th><th>Date of Birth</th><th>ID No</th><th>Mobile Number</th><th>Email Address</th><th>Address</th><th></th><th></th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			
			echo "<td>".$row['memberID']."</td>";
			echo "<td>".$row['surname']."</td>";
			echo "<td>".$row['othernames']."<t/d>";
			echo "<td>".$row['dob']."</td>";
			echo "<td>".$row['idno']."</td>";
			echo "<td>".$row['mobilenumber']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['address']."</td>";
			echo "<td> <a href='edit.php?memberID=".$row['memberID']."'</a>Edit</td>";
			echo "<td> <a onclick='return confirmDelete();' href='delete.php?memberID=".$row['memberID']."'</a>Delete</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}	
?>
</div>

</body>
</html>