<?php 
session_start();
        
if(!isset($_SESSION['accountant_login'])) 
    header('location:stafflogin.php');   
?>
<html>
<head>
<title>Accountant Homepage</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Accountant Homepage </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a style="background-color: wheat;"  href="treasurer_home.php">Dashboard</a></li>
    <li><a  href="staff_members.php">Members</a></li>
    <li><a  href="approved-loans.php">Loans</a></li>
	<li><a  href="savings-treasurer.php">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
</div>

</body>
</html>