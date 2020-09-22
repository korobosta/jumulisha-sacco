<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Logs</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1>Admin Page: Logs</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
<div style="padding: 20px; font-size:19px;">
	<?php
	include '../conn.php';

	echo"<h1>Member Joining Logs</h1>";
	$result=mysqli_query($conn,"SELECT * from members ");
	if(mysqli_num_rows($result)>0){
		 echo "<table id='customers'>";
        echo "<tr><th>Member ID</th><th>Full Name</th><th>Join Date</th></tr>";
	
	while($row=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$row['memberID']."</td>";
			echo "<td>".$row['surname']." ".$row['othernames']."<t/d>";
			
			echo "<td>".$row['joinDate']."</td>";
			
			echo "</tr>";	
		}
		echo "</table>";
	
	
	}


	echo"<h1>Loans Logs</h1>";

	$result=mysqli_query($conn,"SELECT * FROM loans ORDER by applicationDate DESC");

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
if($result=mysqli_query($conn,"SELECT * FROM savings ")){
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

	if($result=mysqli_query($conn,"SELECT * FROM nextofkin ")){
	if(mysqli_num_rows($result)>0)
		
	{
		echo "<table id='customers'>";
		echo "<tr><th>Member ID</th><th>Name of kin</th><th>Date Of Birth</th><th>Adress</th><th>Relationship</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['memberID']."</td>";
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

	if($result=mysqli_query($conn,"SELECT * FROM guarantors ")){
	if(mysqli_num_rows($result)>0)
		
	{
		echo "<table id='customers'>";
		echo "<tr><th>Member ID</th><th>Name of gurantor</th><th>Date Of Birth</th><th>ID Number</th><th>Phone Number</th><th>Adress</th><th>Occupation</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['memberID']."</td>";
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