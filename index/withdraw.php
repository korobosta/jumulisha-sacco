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
	<fieldset >
		<legend>Fill your withdrawal Request Details</legend>
		<form style="text-align: center;font-weight: bold;font-size: 20px;padding: 20px;" method="POST">
			Note:Withdrawal fee is KES 30<br><br><br>
Amount:<input type="number" name="amount" required><br><br>
Disbursement method:<select name="method" required>
	<option value="mpesa">MPESA</option>
	<option value="bank">Bank</option>
	
</select><br><br>
<input type="submit" name="submit" value="Withdraw"><br><br>
</form>
</fieldset>
	<?php
	include '../conn.php';
	$memberID=$_SESSION['memberID'];
if(isset($_POST['submit'])){
	$amount=$_POST['amount'];
	$method=$_POST['method'];
	$result=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
	$row=mysqli_fetch_array($result);
	if(mysqli_num_rows($result)>0){
		$balance=$row[0];
		if($balance<=$amount+30){
			echo "Your balance of ".$balance." KES is insufficient";

		}
		else{
			
			$query=mysqli_query($conn,"INSERT INTO withdrawals (amount,date,paymentMode,memberID) VALUES($amount,NOW(),'$method','$memberID')") or die("ERRORR::".mysqli_error($conn));
			if($query){
				$balance=$balance-$amount-30;
				mysqli_query($conn,"UPDATE balance SET amount='$balance' WHERE memberID='$memberID'") or die("ERROR".mysqli_error($conn));
				echo "<script>
          alert('You have successfully made a withdrawal of KES".$amount.". Your balance is KES ".$balance."We shall process the transaction and sent you the money ');
          window.location.href='withdrawal.php';
          </script>"; 
}
			}
		}

	else{
		echo "Your Balance is zero";
	}	
	}
	
	
	
	 
	?>
	

	
	

</div>


</body>
</html>