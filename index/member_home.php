<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	#active1{
            background-color: wheat;
        }
	</style>
</head>

<body>
<?php include 'member_nav.php';?>
<div class="displayAccount">
	<fieldset class="savings">
		<legend>Amount/Balance</legend>
		<?php
include '../conn.php';
 $memberID=$_SESSION['memberID'];
if($result=mysqli_query($conn,"SELECT * FROM balance WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_array($result);
		$saving=$row['amount'];
		echo $saving;
	
}
else {echo $saving=0;}
}
?>
	</fieldset>
	
	<fieldset class="loansNo">
		<legend>Total number of loans</legend>
			Applied(To be processed):
			<?php
			$result1=mysqli_query($conn,"Select * from loans where status='applied' and memberID='memberID'");
			$no=mysqli_num_rows($result1);
			echo $no;
			?>
			Awarded:
			<?php
			$result1=mysqli_query($conn,"Select * from loans where status='approved' and memberID='memberID'");
			$no=mysqli_num_rows($result1);
			echo $no;
			?>
	</fieldset>
	<fieldset class="loanBalance">
		<legend>Total Loan Balance</legend>
			<?php
			$result2=mysqli_query($conn,"select * FROM loanrepayment where memberID='$memberID'");
			if(mysqli_num_rows($result2)>0){
				 $add=mysqli_query($conn,"SELECT SUM(monthlypayment) from loanrepayment WHERE memberID='$memberID'") or die("error:".mysqli_error($conn));
  if(mysqli_num_rows($add)>0){
  while($row1=mysqli_fetch_array($add))
  {
    $loanbalance=$row1['SUM(monthlypayment)'];
  }
   echo $loanbalance;
}
 
			}
			else{
				echo 0;
			}
			
			?>
	</fieldset>
	<div class="details">
	<fieldset>
		<legend style="color:blue;">Personal Details</legend>
	<?php
	 $member_id=$_SESSION['username'];
	 include '../conn.php';
	 $sql="SELECT * FROM members WHERE username='$member_id'";
	 $result=  mysqli_query($conn,$sql) or die(mysqli_error($conn));
	 $rws=  mysqli_fetch_array($result);
	 
	 
	 $surname= $rws[1];
	 $othernames= $rws[2];
	 $dob= $rws[3];
	 $idno= $rws[4];
	 $mobilenumber=$rws[5];
	 $email= $rws[6];
	 $address= $rws[7];
	?>
	<table cellpadding="3">
     <tr><th>Surname</th><td><?php echo $surname;?></td></tr>
	 <tr><th>Other Names</th> <td><?php echo $othernames;?></td></tr>
	 <tr><th>Date Of Birth</th><td><?php echo $dob;?></td></tr>
	 <tr><th>ID Number</th> <td><?php echo $idno;?></td></tr>
	 <tr><th>Mobile Number</th>  <td><?php echo $mobilenumber;?></td></tr>
	 <tr><th>Email</th> <td><?php echo $email;?></td></tr>
	 <tr><th>Address</th><td><?php echo $address;?></td></tr> 

    </table>
	<fieldset>
		
</div>

</div>


</body>
</html>