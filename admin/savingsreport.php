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
	<div><a href="reports.php">MEMBER REPORTS</a> &nbsp&nbsp&nbsp&nbsp <a style="color:teal; background-color: white;padding:10px;" href="savingsreport.php">SAVINGS REPORTS</a> &nbsp&nbsp&nbsp&nbsp <a href="loanreports.php">LOAN REPORTS</a><br><br>

	Specific Record Search:<input type="text" name="specific" placeholder="savingID/amount/date/payment method">
	<input type="submit" name="search" value="Search"><br><br>

	Filter Accodording to mode of paying:
        <select name="topic">
            <option value="bBANK">Bank</option>
            <option value="CASH">Cash</option>
            <option value="MPESA">MPESA</option>
             <option value="MPESA">NONE</option>
            
        </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       
        date from<input type="date" name="datefrom">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       date to<input type="date" name="dateto">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" name="submit" value="Filter"><br><br><br>
    </form>

	<?php
	 include '../conn.php';

if(isset($_POST['search'])){
$specific=$_POST['specific'];
	
	

	if($result=mysqli_query($conn,"SELECT * FROM savings WHERE memberID='$specific' or savingsID='$specific' or paymentmethod='$specific' or amount='$specific' or date='$specific'")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>Payment Method</th><th>date</th><th>Time</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "<td>".$row['date']."</td>";
             echo "<td>".$row['time']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}

	
}
if(isset($_POST['submit'])){
	$topic=$_POST['topic'];
	$datefrom=$_POST['datefrom'];
	$dateto=$_POST['dateto'];
	if($topic=='CASH'){
 if($result=mysqli_query($conn,"SELECT * FROM savings WHERE paymentmethod='CASH' AND date BETWEEN '$datefrom' AND  '$dateto' ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>Payment Method</th><th>date</th><th>Time</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "<td>".$row['date']."</td>";
             echo "<td>".$row['time']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}
	}elseif ($topic='BANK') {
		 if($result=mysqli_query($conn,"SELECT * FROM savings WHERE paymentmethod='BANK' AND date BETWEEN '$datefrom' AND  '$dateto' ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>Payment Method</th><th>date</th><th>Time</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "<td>".$row['date']."</td>";
             echo "<td>".$row['time']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}
	}
	elseif($topic=='MPESA'){
	 if($result=mysqli_query($conn,"SELECT * FROM savings WHERE paymentmethod='MPESA' AND date BETWEEN '$datefrom' AND  '$dateto' ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>Payment Method</th><th>date</th><th>Time</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "<td>".$row['date']."</td>";
             echo "<td>".$row['time']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}
	}
	else{
			 if($result=mysqli_query($conn,"SELECT * FROM savings WHERE date BETWEEN '$datefrom' AND  '$dateto' ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>Payment Method</th><th>date</th><th>Time</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "<td>".$row['date']."</td>";
             echo "<td>".$row['time']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}
	}

}
		
	 echo "<br>ALL RECORDS";
 if($result=mysqli_query($conn,"SELECT * FROM savings ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>Payment Method</th><th>date</th><th>Time</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "<td>".$row['date']."</td>";
             echo "<td>".$row['time']."</td>";
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