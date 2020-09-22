<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Reports</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1>Admin Reports Dispaly</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
	<form method="POST">
	<div><a style="color:teal; background-color: white;padding:10px;"href="reports.php">MEMBER REPORTS</a> &nbsp&nbsp&nbsp&nbsp <a href="savingsreport.php">SAVINGS REPORTS</a> &nbsp&nbsp&nbsp&nbsp <a href="loanreports.php">LOAN REPORTS</a><br><br>

	Specific Record Search:<input type="text" name="specific" placeholder="surname/firstname/id number/mobilenumber">
	<input type="submit" name="search" value="Search"><br><br>

	Filter Accodording to:
        <select name="topic">
            <option value="surname">Surname</option>
            <option value="othernames">First Name</option>
            <option value="gender">Gender</option>
            <option value="email">Email</option>
             <option value="idno">ID Number</option>
              <option value="phone">Phone Number</option>
        </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <select name="datetype">
       <option value="dob">Date of Birth</option>
        <option value="joinDate">Join Date</option>
        </select>
        date from<input type="date" name="datefrom">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       date to<input type="date" name="dateto">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" name="submit" value="Filter"><br><br><br>
    </form>

	<?php
	 include '../conn.php';


	 
	 if(isset($_POST['search'])){
	 	$specific=$_POST['specific'];

	$query=mysqli_query($conn,"SELECT * FROM members WHERE surname='$specific' or othernames='$specific' or idno='$specific' or mobilenumber='$specific' or othernames='$specific' or email='$specific' or address='$specific'or memberID='$specific'");
	if(mysqli_num_rows($query)>0)

	{
		echo "<table id='customers'";
		echo "<tr><th>member ID</th><th>surname</th><th>othernames</th><th>Date of Birth</th><th>ID No</th><th>Mobile Number</th><th>Email Address</th><th>Address</th><th>Join Date</th></tr>";
		while($row=mysqli_fetch_array($query))
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
	else{
		echo "No Record Found";
	}
}
if(isset($_POST['submit']))
{
	$datetype=$_POST['datetype'];
	$datefrom=$_POST['datefrom'];
	$dateto=$_POST['dateto'];
	if($datetype=='dob'){

		$query=mysqli_query($conn,"SELECT * FROM members WHERE dob BETWEEN '$datefrom' AND '$dateto'");
	if(mysqli_num_rows($query)>0)

	{
		echo "<table id='customers'";
		echo "<tr><th>member ID</th><th>surname</th><th>othernames</th><th>Date of Birth</th><th>ID No</th><th>Mobile Number</th><th>Email Address</th><th>Address</th><th>Join Date</th></tr>";
		while($row=mysqli_fetch_array($query))
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
	else{
		echo "No Record Found";
	}

	}else{
			$query=mysqli_query($conn,"SELECT * FROM members WHERE joinDate BETWEEN '$datefrom' AND '$dateto'");
	if(mysqli_num_rows($query)>0)

	{
		echo "<table id='customers'";
		echo "<tr><th>member ID</th><th>surname</th><th>othernames</th><th>Date of Birth</th><th>ID No</th><th>Mobile Number</th><th>Email Address</th><th>Address</th><th>Join Date</th></tr>";
		while($row=mysqli_fetch_array($query))
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
	else{
		echo "No Record Found";
	}


	}

}

	 echo "<br>ALL RECORDS";
if($result=mysqli_query($conn,"SELECT * FROM members ")){
	if(mysqli_num_rows($result)>0)

	{
		echo "<table id='customers'";
		echo "<tr><th>member ID</th><th>surname</th><th>othernames</th><th>Date of Birth</th><th>ID No</th><th>Mobile Number</th><th>Email Address</th><th>Address</th><th>Join Date</th></tr>";
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

<div class="container">
	</div>
	<div class="members">
		
	</div>
	<div class="savings"></div>
	<div class="loans"></div>


</body>
</html>