<?php 
session_start();
        
if(!isset($_SESSION['management_login'])) 
    header('location:stafflogin.php');   
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Management Homepage </h1>
<ul>
<li><a href="management-changepassword.php">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a href="management_home.php">Dashboard</a></li>
    <li><a  href="management_members.php">Members</a></li>
    <li><a  href="loan-staff.php">Loans</a></li>
	<li><a style="background-color: wheat;"  href="savings-managment.php">Savings</a></li>
    <li><a  href="management-messages.php">Messages</a></li
	
</ul>
</div>
<div>
<div class="admindisplay">

		    <?php
    include '../conn.php';
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

</body>
</html>