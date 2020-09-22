<?php 
session_start();
        
if(!isset($_SESSION['accountant_login'])) 
    header('location:stafflogin.php');   
?>
<html>
<head>
<title>Savings</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Accountant:: Savings Page</h1>
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
	<li><a style="background-color: wheat;"   href="savings-treasurer.php">Savings</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<form style="padding:20px; background-color: wheat;"method="post" action="addSaving.php">
	Add a saving by: <input type="radio" name="money" value="mpesa">MPESA &nbsp&nbsp&nbsp&nbsp&nbsp  <input type="radio" name="money" value="cash">CASH &nbsp&nbsp&nbsp&nbsp&nbsp  <input type="radio" name="money" value="bank">BANK &nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" name="add" value="Add">
</form>
	    <?php
    include '../conn.php';
    if($result=mysqli_query($conn,"SELECT * FROM savings ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>date</th><th>Payment Method</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['paymentmethod']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}
?>
</div>

</body>
</html>