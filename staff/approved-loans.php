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
<h1> Accountant Page:Approved Loans </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="treasurer_home.php">Dashboard</a></li>
    <li><a  href="staff_members.php">Members</a></li>
    <li><a style="background-color: wheat;"   href="approved-loans.php">Loans</a></li>
	<li><a  href="savings-treasurer.php">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
<?php
include '../conn.php';
if($result=mysqli_query($conn,"SELECT * FROM loans WHERE status='approved'")){
	if(mysqli_num_rows($result)>0)
	{
		echo "<h1 style='color:blue;font-size:15px;'>Approved Loans yet to be disbursed</h1>";
		echo "<table id='customers'>";
		echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th><th></th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['loanID']."</td>";
			echo "<td>".$row['memberID']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['amount']."<t/d>";
			echo "<td>".$row['months']."</td>";
			echo "<td>".$row['loantype']."</td>";
			echo "<td>".$row['modeOfPayment']."</td>";
			echo "<td>".$row['dueDate']."</td>";
			echo "<td>".$row['security']."</td>";
			echo "<td>".$row['reason']."</td>";
			echo "<td>".$row['status']."</td>";
			echo "<td>".$row['applicationDate']."</td>";
			echo "<td> <a href='disburse.php?loanID=".$row['loanID']."'</a>Process Payment</td>";
			
			echo "</tr>";
		}
		echo "</table>";
	}
}

?>
</div>

</body>
</html>