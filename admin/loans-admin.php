<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<html>
<head>
<title>Loans</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1>Admin Page: Loans</h1>
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

if($result=mysqli_query($conn,"SELECT * FROM loans WHERE status='applied'")){
 echo "<h1 style='color:blue;font-size:15px;'>Applied Loans</h1>";
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
        echo "<table id='customers'>";
        echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th></tr>";
        echo "<tr ><th style='background-color: white;'></th><th style='background-color: white;'></th><th style='background-color: white;'></th><th style='background-color: white;'></th><th style='background-color: white;'></th><th style='background-color: white;'></th><th style='background-color: white;'></th><th style='background-color: white;'></th style='background-color: white;'><th style='background-color: white;'></th><th style='background-color: white;'></th style='background-color: white;'><th style='background-color: white;'></th><th style='background-color: white;'></th></tr>";
         echo "</table>";

    }
} 
 
     echo "<h1 style='color:blue;font-size:15px;'>Approved Loans </h1>";
        echo "<table id='customers'>";
        echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th></tr>";
if($results=mysqli_query($conn,"SELECT * FROM loans WHERE status='approved'")){
    if(mysqli_num_rows($results)>0)
    {
   
        while($rows=mysqli_fetch_array($results))
        {
            echo "<tr>";
            echo "<td>".$rows['loanID']."</td>";
            echo "<td>".$rows['memberID']."</td>";
            echo "<td>".$rows['name']."</td>";
            echo "<td>".$rows['amount']."<t/d>";
            echo "<td>".$rows['months']."</td>";
            echo "<td>".$rows['loantype']."</td>";
            echo "<td>".$rows['modeOfPayment']."</td>";
            echo "<td>".$rows['dueDate']."</td>";
            echo "<td>".$rows['security']."</td>";
            echo "<td>".$rows['reason']."</td>";
            echo "<td>".$rows['status']."</td>";
            echo "<td>".$rows['applicationDate']."</td>";
           
            
            echo "</tr>";
        }
        echo "</table>";
    }
}

     echo "<h1 style='color:blue;font-size:15px;'>Dibursed Loans </h1>";
        echo "<table id='customers'>";
        echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th></tr>";
if($results=mysqli_query($conn,"SELECT * FROM loans WHERE status='disbursed'")){
    if(mysqli_num_rows($results)>0)
    {
   
        while($rows=mysqli_fetch_array($results))
        {
            echo "<tr>";
            echo "<td>".$rows['loanID']."</td>";
            echo "<td>".$rows['memberID']."</td>";
            echo "<td>".$rows['name']."</td>";
            echo "<td>".$rows['amount']."<t/d>";
            echo "<td>".$rows['months']."</td>";
            echo "<td>".$rows['loantype']."</td>";
            echo "<td>".$rows['modeOfPayment']."</td>";
            echo "<td>".$rows['dueDate']."</td>";
            echo "<td>".$rows['security']."</td>";
            echo "<td>".$rows['reason']."</td>";
            echo "<td>".$rows['status']."</td>";
            echo "<td>".$rows['applicationDate']."</td>";
           
            
            echo "</tr>";
        }
        echo "</table>";
    }
}

echo"<br><br><br>";
     echo "<h1 style='color:blue;font-size:15px;'>Dibursed Loans </h1>";
        echo "<table id='customers'>";
        echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th></tr>";
if($results=mysqli_query($conn,"SELECT * FROM loans WHERE status='disapprove'")){
    if(mysqli_num_rows($results)>0)
    {
   
        while($rows=mysqli_fetch_array($results))
        {
            echo "<tr>";
            echo "<td>".$rows['loanID']."</td>";
            echo "<td>".$rows['memberID']."</td>";
            echo "<td>".$rows['name']."</td>";
            echo "<td>".$rows['amount']."<t/d>";
            echo "<td>".$rows['months']."</td>";
            echo "<td>".$rows['loantype']."</td>";
            echo "<td>".$rows['modeOfPayment']."</td>";
            echo "<td>".$rows['dueDate']."</td>";
            echo "<td>".$rows['security']."</td>";
            echo "<td>".$rows['reason']."</td>";
            echo "<td>".$rows['status']."</td>";
            echo "<td>".$rows['applicationDate']."</td>";
           
            
            echo "</tr>";
        }
        echo "</table>";
    }
}



?>
</div>

</body>
</html>