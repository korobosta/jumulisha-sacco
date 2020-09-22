<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Savings</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Admin Page: Savings</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php include 'adminsidebar.php'; ?>
<div>
<div class="admindisplay">
    <?php
    include '../conn.php';
    if($result=mysqli_query($conn,"SELECT * FROM savings ")){
    if(mysqli_num_rows($result)>0)
    {
        echo "<table id='customers'>";
        echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>date</th></tr>";
        $saving=0;
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['savingsID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['amount']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "</tr>";   
        }
        echo "</table>";
}   
}
?>
</div>

</body>
</html>