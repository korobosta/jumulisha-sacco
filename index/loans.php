<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/style3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        
    #active4{
           background-color: wheat;
        }
    </style>
</head>

<body>

  <?php include 'member_nav.php';?>
<div class="displayAccount">
<h1><strong><a style="text-decoration: none;" href="apply-loan.php">Apply A Loan</a></strong></h1>
	 <?php
include '../conn.php';
$memberID=$_SESSION['memberID'];
if($result=mysqli_query($conn,"SELECT * FROM loans WHERE status='applied' and memberID='$memberID'")){
 echo "<h1 style='color:blue;font-size:15px;'>Applied Loans yet to be approved</h1>";
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
} 
 echo"<br><br><br>";
     echo "<h1 style='color:blue;font-size:15px;'>Approved Loans yet to be disbursed </h1>";
        
if($results=mysqli_query($conn,"SELECT * FROM loans WHERE status='approved'  and memberID='$memberID'")){
    if(mysqli_num_rows($results)>0)
    {
   echo "<table id='customers'>";
        echo "<tr><th>Loan ID</th><th>Member ID</th><th>Name</th><th>Amount</th><th>Months</th><th>Loan Type</th><th>Mode of payment</th><th>Due Date</th><th>Security</th><th>Reason</th><th>Status</th><th>Application</th></tr>";
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
    else{
    echo "No records found";
    }
}

if($result=mysqli_query($conn,"SELECT * FROM loans WHERE status='disapprove' and memberID='$memberID'")){
 echo "<h1 style='color:blue;font-size:15px;'>Disaapproved loans</h1>";
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
} 

if($result=mysqli_query($conn,"SELECT * FROM loans WHERE status='disbursed' and memberID='$memberID'")){
 echo "<h1 style='color:blue;font-size:15px;'>Disbursed loans</h1>";
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
} 
if($result=mysqli_query($conn,"SELECT * FROM loanrepayment WHERE  memberID='$memberID'")){
 echo "<h1 style='color:blue;font-size:15px;'>Loan Repayment</h1>";
    if(mysqli_num_rows($result)>0)
    {
       
        echo "<table id='customers'>";
        echo "<tr><th>Loan ID</th><th>Member ID</th><th>Month</th><th>interest</th><th>Monthly Principal</th><th>Monthly Payment</th><th>Loan Balance</th><th>Status</th></tr>";
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row['loanID']."</td>";
            echo "<td>".$row['memberID']."</td>";
            echo "<td>".$row['month']."</td>";
            echo "<td>".$row['interest']."<t/d>";
            echo "<td>".$row['monthlyPrincipal']."</td>";
            echo "<td>".$row['monthlyPayment']."</td>";
            echo "<td>".$row['loanBalance']."</td>";
            echo "<td>".$row['status']."</td>";
            
           
            
            echo "</tr>";
        }
        echo "</table>";

        
    }
    else{
        echo "No records found!";
       

    }
} 
?>

</div>


</body>
</html>