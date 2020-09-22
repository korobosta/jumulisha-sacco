<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	#active7{
             background-color: wheat;
        }
	</style>
</head>

<body>
<?php include 'member_nav.php';?>
<div  class="displayAccount">
	<div style="padding: 30px;" >
	<?php
	include '../conn.php';
	$username=$_SESSION['username'];
	$memberID=$_SESSION['memberID'];
	echo"<h1>Join Date</h1>";
	$result=mysqli_query($conn,"SELECT joinDate from members where username='$username'");
	$row=mysqli_fetch_array($result);
	$joinDate=$row['joinDate'];
	echo "You joined this SACCO on ".$joinDate;

	echo"<h1>Loans Logs</h1>";

	$result=mysqli_query($conn,"SELECT * FROM loans WHERE  memberID='$memberID' ORDER by applicationDate DESC");

    if(mysqli_num_rows($result)>0)
    {
       
        echo "<table id='customers'>";
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
    else{
        echo "No records found!";
       

    }


	echo"<h1>Savings Logs</h1>";
 $memberID=$_SESSION['memberID'];
if($result=mysqli_query($conn,"SELECT * FROM savings WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table id='customers' >";
		echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>date</th><th>Payment Method</th><th>Time</th></tr>";
		$saving=0;
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['savingsID']."</td>";
			echo "<td>".$row['memberID']."<t/d>";
			echo "<td>".$row['amount']."</td>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['paymentmethod']."</td>";
			echo "<td>".$row['time']."</td>";
			echo "</tr>";	
		}
		echo "</table>";
}	
else{
	echo "No records Found!";
}
}

	echo"<h1>Beneficiary Logs</h1>";

	if($result=mysqli_query($conn,"SELECT * FROM nextofkin WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0)
		
	{
		echo "<table id='customers'>";
		echo "<tr><th>Name of kin</th><th>Date Of Birth</th><th>Adress</th><th>Relationship</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['dob']."<t/d>";
			echo "<td>".$row['address']."</td>";
			echo "<td>".$row['relationship']."</td>";
			echo "</tr>";	
		}
		echo "</table>";
	}
	else{
	echo "No records Found!";
}
		}


	echo"<h1>Guarantor Logs</h1>";

	if($result=mysqli_query($conn,"SELECT * FROM guarantors WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0)
		
	{
		echo "<table id='customers'>";
		echo "<tr><th>Name of gurantor</th><th>Date Of Birth</th><th>ID Number</th><th>Phone Number</th><th>Adress</th><th>Occupation</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['dob']."<t/d>";
			echo "<td>".$row['idno']."<t/d>";
			echo "<td>".$row['phone']."<t/d>";
			echo "<td>".$row['address']."</td>";
			echo "<td>".$row['occupation']."</td>";
			
			echo "</tr>";	
		}
		echo "</table>";
}
else{
	echo "No records Found!";
}

}


	?>
</div>
		
</div>

</body>
</html>