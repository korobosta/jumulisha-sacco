<?php 
session_start();
        
if(!isset($_SESSION['management_login'])) 
    header('location:stafflogin.php');   
?>
<html>
<head>
<title>Process Loan</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Staff Process loan page </h1>
<ul>
<li><a href="">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="management_home.php">Dashboard</a></li>
    <li><a  href="management_members.php">Members</a></li>
    <li><a  href="loan-staff.php">Loans</a></li>
	<li><a  href="savings-managment.php">Savings</a></li>
	
</ul>
</div>
<div class="admindisplay">
	<p style="color:blue; font-style: bold; font-size: 30px;">Loan application details</p>
	<?php
include '../conn.php';
$loanID=$_GET['loanID'];
if($result=mysqli_query($conn,"SELECT * FROM loans WHERE loanID='$loanID' ")or die("Died".mysqli_error($conn))){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table id='customers'";
		echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th></tr>";
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
			
			
			echo "</tr>";
		}
		echo "</table>";
	}
}	
?>
<br><br>
	<p style="color:blue; font-style: bold; font-size: 30px;">Loan applicants details</p>

<?php
$result1=mysqli_query($conn,"SELECT memberID FROM loans WHERE loanID='$loanID' ");
$r=mysqli_fetch_array($result1);
$memberID=$r['memberID'];
$result=mysqli_query($conn,"SELECT * FROM members WHERE memberID='$memberID'");
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
		?>
	<p style="color:blue; font-style: bold; font-size: 20px;">Total Savings of the Applicant:
		
<?php

if($result=mysqli_query($conn,"SELECT * FROM savings WHERE memberID='$memberID'")){

	if(mysqli_num_rows($result)>0){
		$add=mysqli_query($conn,"SELECT SUM(amount) from `savings` WHERE memberID='$memberID'");
		while($row1=mysqli_fetch_array($add))
		{
		  $saving=$row1['SUM(amount)'];
		}
		echo $saving;
	}
	else{$saving=0;}
	
}
?>
</p>
<p style="color:blue; font-style: bold; font-size: 20px;">Has the member defaulted any other loan?
	<?php

$result=mysqli_query($conn,"SELECT idno FROM members WHERE memberID='$memberID'");
$idno=$row['idno'];
if($results=mysqli_query($conn,"SELECT * FROM defaulters WHERE idNo='$idno'")){

	if(mysqli_num_rows($results)>0){
	
		echo "YES";
	}
	else{echo "NO";}
	
}

?>
</p>
<form method="post" action="process-loan.php?loanID=<?php echo $loanID;?>">
<input style="color:blue;font-size: 30px;" type="submit" name="approve" value="Approve">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input style="color:blue;font-size: 30px;" type="submit" name="disapprove" value="Disapprove">
<?php
if (isset($_POST['approve'])) {
$loanID=$_GET['loanID'];
$sql4="UPDATE loans SET status='approved' WHERE loanID='$loanID'";
$resu1=mysqli_query($conn,$sql4) or die("Died".mysqli_error($conn));
if ($resu1) {
		echo "<script>
alert('You have approved the loan,disbursement will be done in due course');
window.location.href='loan-staff.php';
</script>";
}
}

if(isset($_POST['disapprove'])) {
	$loanID=$_GET['loanID'];
$sql4="UPDATE loans SET status='disapproved' WHERE loanID='$loanID'";
$resu=mysqli_query($conn,$sql4) or die("Died".mysqli_error($conn));
if ($resu) {
		echo "<script>
alert('You have disapproved the loan');
window.location.href='loan-staff.php';
</script>";
}

}
?>

</div>
</body>
</html>