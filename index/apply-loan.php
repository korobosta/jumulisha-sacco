<?php
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apply Loan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body >
	<?php include 'member_nav.php';?>
<?php
include '../conn.php';
	$feedback="";
$username=$_SESSION['username'];
if(isset($_POST['submit'])){
	
	$loantype=$_POST['loantype'];
	$amount=$_POST['amount'];
	$months=$_POST['months'];
	$mode=$_POST['mode'];
	$security=$_POST['security'];
	$reason=$_POST['application-reason'];
	$sql="SELECT * FROM members WHERE username='$username' ";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$email=$row['email'];
	$memberID=$row['memberID'];
	$name=$row['surname']." ".$row['othernames'];
	$loanid=uniqid();

	$startDate=date('Y-m-d');
    $addMonths=$months;
    $dueDate = date('Y-m-d', strtotime($startDate.' +'.$addMonths.' months')); 

	$loan="INSERT INTO loans(loanID,memberID,name,amount,months,loantype,modeOfPayment,security,reason,status,applicationDate,dueDate) VALUES('$loanid','$memberID','$name','$amount','$months','$loantype','$mode','$security','$reason','applied',NOW(),'	$dueDate')";
 $rst=mysqli_query($conn,$loan) or die("ERROR".mysqli_error($conn));
 if($rst){
	$to = $email;
	$subject = "Loan Applicaion";
	$txt = "Thank you for applying our loan,we will process it and communicate to you. https://jumulisha-sacco.codenet.co.ke/";
	$headers = "From: admin@jumulisha-sacco.codenet.co.ke" . "\r\n" .
	"";
	
	mail($to,$subject,$txt,$headers);
	echo "<script>
          alert('Loan details received,you will receive feedback soon,check your email for our notification');
          window.location.href='loans.php';
          </script>"; 
}
	 $feedback="We have received your details,we will inform you if your application was successful...";
 } 
?>

<h2 style="color:blue; ">Fill in the form to apply for a loan</h2>
<span style="color:green; font-size:20px;"><?php echo $feedback;?></span>
<form class="register" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
<fieldset>
      <legend>Loan Application Details:</legend>
Loan Type:
        <select name="loantype">
            <option value="Normal Loan">Normal Loan</option>
            <option value="School Fee Loan">School Fees Loan</option>
            <option value="Emergency">Emergency</option>
            <option value="Super">Super Loan</option>
        </select><br><br>
Amount Applied For:<input type="number" name="amount" value="1000" min="1000" max="1000000"><br><br>
Months To Pay For:<input type="number" name="months" value="1" min="1" max="100"><br><br>
Mode of paymement
 <select name="mode">
            <option value="Cash">Cash</option>
            <option value="Check">Check</option>
            <option value="Online Transaction">Online Transaction</option>
            <option value="super">M PESA</option>
        </select><br><br>
		Loan Security
		 <select name="security">
            <option value="Salary">Salary</option>
            <option value="Shares">Shares</option>
            <option value="Guarantors">Guarantors</option>
            <option value="Other">Other</option>
        </select><br><br>
		<label for="t3">Reason For Applying loan</label>
    <textarea id="t3" name="application-reason" maxlength="140" rows="3" required></textarea><br><br>

<input type="submit" name="submit" value="Apply">
</fieldset>
</form>
<?php include 'footer.php' ?>