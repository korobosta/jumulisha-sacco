<?php 
session_start();
include '../conn.php';
        
if(!isset($_SESSION['accountant_login'])) 
    header('location:stafflogin.php');   
?>
<html>
<head>
<title>Disbursment Page</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Accounting Disbursement Page </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="treasurer_home.php">Dashboard</a></li>
    <li><a  href="staff_members.php">Members</a></li>
    <li><a style="background-color: wheat;"  href="approved-loans.php">Loans</a></li>
	<li><a  href="">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<?php
	$loanID=$_GET['loanID'];
	echo "LoanID: &nbsp".$loanID;
	echo "<BR><br> Amount:";
	
	
	$res=mysqli_query($conn,"SELECT amount FROM loans WHERE loanID='$loanID'");
	$row=mysqli_fetch_array($res);
	$amount=$row[0];
	echo $amount."<br>";

	?>
	<br>
	<form action="pesa.php?loanID=<?php echo $loanID;?>" method="POST">Disburse By:<input type="radio" name="money" value="mpesa">MPESA &nbsp&nbsp&nbsp&nbsp&nbsp  <input type="radio" name="money" value="cash">CASH &nbsp&nbsp&nbsp&nbsp&nbsp  <input type="radio" name="money" value="bank">BANK &nbsp&nbsp&nbsp&nbsp&nbsp<br><br><input type="submit" name="Disburse" value="Disburse"></form>
</div>

</body>
</html>