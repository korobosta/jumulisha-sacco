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
<h1> Add Saving </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="treasurer_home.php">Dashboard</a></li>
    <li><a  href="staff_members.php">Members</a></li>
    <li><a  href="approved-loans.php">Loans</a></li>
	<li><a  href="savings-treasurer.php">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<?php
	if(isset($_POST['add'])){
		$mode=$_POST['money'];
		if(empty($mode)){
			header('location:savings-treasurer.php');
		}
		else{
			if($mode=='mpesa'){
				?>
				<h1 style="font-style: bold;padding:10px; ">Add MPESA Payment</h1>
				<form style="padding: 20px;" method="post" action="savings-processor.php">
					Member ID:<input type="text" name="memberID"><br><br>
					Transaction ID:<input type="text" name="transactionID"><br><br>
					Amount:<input type="number" name="amount"><br><br>
					Phone Number:<input type="number" name="phone"><br><br>
					Date:<input type="date" name="date"><br><br>
					Time:<input type="time" name="time"><br><br>
					<input type="submit" name="mpesa" value="ADD">

<?php

			}
			if($mode=='bank'){
				?>
				<h1 style="font-style: bold;padding:10px; ">Add Bank Payment</h1>
				<form style="padding: 20px; ;" method="post" action="savings-processor.php">
					Member ID:<input type="text" name="memberID"><br><br>
					Account Number:<input type="text" name="acc"><br><br>
					Refference Number:<input type="text" name="transactionID"><br><br>
					Amount:<input type="text" name="amount"><br><br>
					Date:<input type="date" name="date"><br><br>
					Time:<input type="time" name="time"><br><br>
					<input type="submit" name="bank" value="ADD">

<?php

			}
			if($mode=='cash'){
				?>
				<h1 style="font-style: bold;padding:10px; ">Add Cash Payment</h1>
				<form style="padding: 20px; font-style:bold;"method="post" action="savings-processor.php">
					Member ID:<input type="text" name="memberID"><br><br>
					Amount:<input type="text" name="amount"><br><br>
					Date:<input type="date" name="date"><br><br>
					Time:<input type="time" name="time"><br><br>
					<input type="submit" name="cash" value="ADD">

<?php

			}
		}
	}
	else{
		header('location:savings-treasurer.php');
	}
	
	?>
</div>

</body>
</html>