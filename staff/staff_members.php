<?php 
session_start();
        
if(!isset($_SESSION['accountant_login'])) 
    header('location:stafflogin.php');   
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>

<div class="welcome">
<h1> Accountant Page: Members Display </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="treasurer_home.php">Dashboard</a></li>
    <li><a style="background-color: wheat;"   href="staff_members.php">Members</a></li>
    <li><a  href="approved-loans.php">Loans</a></li>
	<li><a  href="savings-treasurer.php">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
<?php
include '../conn.php';
if($result=mysqli_query($conn,"SELECT * FROM members ")){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table id='customers'>";
		echo "<tr><th>member ID</th><th>surname</th><th>othernames</th><th>Date of Birth</th><th>ID No</th><th>Mobile Number</th><th>Email Address</th><th>Address</th></tr>";
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
			
			echo "</tr>";
		}
		echo "</table>";
	}
}	
?>
</div>

</body>
</html>