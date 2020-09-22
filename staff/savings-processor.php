<?php
include '../conn.php';
if(isset($_POST['mpesa'])){
	$memberID=$_POST['memberID'];
	$transactionID=$_POST['transactionID'];
	$amount=$_POST['amount'];
	$phone=$_POST['phone'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$result1=mysqli_query($conn,"INSERT INTO savings (savingsID,memberID,amount,paymentmethod,date,phone,time) VALUES('$transactionID','$memberID','$amount','BANK','$date','$phone','$time')") or die("Error::::".mysqli_error($conn));
	if($result1){
		$res=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
		$fetch=mysqli_fetch_array($res);
		if(mysqli_num_rows($res)>0){
			$balance=$fetch[0];
			$balance=$balance+$amount;
			mysqli_query($conn,"UPDATE balance SET amount='$balance'  WHERE memberID='$memberID'");


		}
		else{
			mysqli_query($conn,"INSERT INTO balance (memberID,amount) VALUES('$memberID','$amount') ");

		}
				echo "<script>
alert('Added successfully');
window.location.href='savings-treasurer.php';
</script>";
	}

}



elseif(isset($_POST['cash'])){
	$memberID=$_POST['memberID'];
	$amount=$_POST['amount'];
	
	$date=$_POST['date'];
	$time=$_POST['time'];
	$ID=time();
	$result2=mysqli_query($conn,"INSERT INTO savings(savingsID,memberID,amount,paymentmethod,date,time) VALUES('$ID','$memberID','$amount','CASH','$date','$time')")or die("Error::::".mysqli_error($conn));
	if($result2){
		$res=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
		$fetch=mysqli_fetch_array($res);
		if(mysqli_num_rows($res)>0){
			$balance=$fetch[0];
			$balance=$balance+$amount;
			mysqli_query($conn,"UPDATE balance SET amount='$balance'  WHERE memberID='$memberID'");


		}
		else{
			mysqli_query($conn,"INSERT INTO balance (memberID,amount) VALUES('$memberID','$amount') ");

		}
		
				echo "<script>
alert('Added successfully');
window.location.href='savings-treasurer.php';
</script>";
	}

}


elseif(isset($_POST['bank'])){
	$memberID=$_POST['memberID'];
	$transactionID=$_POST['transactionID'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$acc=$_POST['acc'];
	$result3=mysqli_query($conn,"INSERT INTO savings (savingsID,memberID,amount,paymentmethod,date,accountNumber,time) VALUES('$transactionID','$memberID','$amount','MPESA','$date','$acc','$time')") or die("Error::::".mysqli_error($conn));
	if($result3){
		$res=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
		$fetch=mysqli_fetch_array($res);
		if(mysqli_num_rows($res)>0){
			$balance=$fetch[0];
			$balance=$balance+$amount;
			mysqli_query($conn,"UPDATE balance SET amount='$balance' WHERE memberID='$memberID'");


		}
		else{
			mysqli_query($conn,"INSERT INTO balance (memberID,amount) VALUES('$memberID','$amount') ");

		}
						echo "<script>
alert('Added successfully');
window.location.href='savings-treasurer.php';
</script>";

	}

}
?>