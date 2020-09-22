<?php
include '../conn.php';
if(isset($_POST['Disburse'])){
	$loanID=$_GET['loanID'];
	$mode=$_POST['money'];
	if(empty($mode)){
			header('location:approved-loans.php');
		}
		else{

			if($mode=='cash'){

				$res1=mysqli_query($conn,"UPDATE loans SET status='disbursed' WHERE loanID='$loanID'")or die("Error::::".mysqli_error($conn));;

	$res2=mysqli_query($conn,"SELECT amount,memberID,months FROM loans WHERE loanID='$loanID'") or die("Error::::".mysqli_error($conn));;

	$row1=mysqli_fetch_array($res2);
	$amount=$row1[0];
	$memberID=$row1[1];
    $months=$row1[2];

    if($months==1){
    	$month=1;
    	$interest=6*$amount/100;
    	$monthlyprincipal=$amount;
    	$monthlypayment=$monthlyprincipal+$interest;
    	$loanbalance=$monthlyprincipal;

	$res4=mysqli_query($conn,"INSERT INTO loanrepayment (month,interest,monthlyPrincipal,monthlyPayment,loanBalance,memberID,loanID) VALUES('$month','$interest','$monthlyprincipal','$monthlypayment','$loanbalance','$memberID','$loanID ')") or die("Error::::".mysqli_error($conn));

    }
    else{

    $loanamount=$amount;
	$rate=6/100;
	$period=$months;
	$interest=0;
	$loanbalance=$loanamount;
	$paidamount=0;
	
	$monthlyprincipal=$loanamount/$period;
	$month=0;
	while($loanbalance>0){
		$month++;
		$interest=$rate*$loanbalance;
		$monthlypayment=$monthlyprincipal+$interest;
	    $loanbalance= $loanbalance-$monthlyprincipal;
		$paidamount+=$monthlypayment;
		if($loanbalance<0){
			$loanbalance=0;
		}

	$res4=mysqli_query($conn,"INSERT INTO loanrepayment (month,interest,monthlyPrincipal,monthlyPayment,loanBalance,memberID,loanID) VALUES('$month','$interest','$monthlyprincipal','$monthlypayment','$loanbalance','$memberID','$loanID ')") or die("Error::::".mysqli_error($conn));
		 
	}
	}
	


	$result1=mysqli_query($conn,"SELECT cashBalance from kenversityaccount");
	$row2=mysqli_fetch_array($result1);
	$cash=$row2[0];
	$cashBalance=$cash-$amount;

	$result3=mysqli_query($conn,"UPDATE kenversityaccount SET cashBalance='$cashBalance'") or die("Error::::".mysqli_error($conn));

/*	$res=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
	$row=mysqli_fetch_array($res);
	$balance=$row[0];
	$totalBalance=$balance+$amount;
	
	$result2=mysqli_query($conn,"UPDATE balance SET amount='$totalBalance'") or die("Error::::".mysqli_error($conn));*/


	if($result3){
				echo "<script>
alert('Loan Disbursed successfully by Cash, hand over the cash to the member');
window.location.href='approved-loans.php';
</script>";

	}



			}
			elseif($mode=='mpesa'){
					$res1=mysqli_query($conn,"UPDATE loans SET status='disbursed' WHERE loanID='$loanID'")or die("Error::::".mysqli_error($conn));;

	$res2=mysqli_query($conn,"SELECT amount,memberID,months FROM loans WHERE loanID='$loanID'") or die("Error::::".mysqli_error($conn));;

	$row1=mysqli_fetch_array($res2);
	$amount=$row1[0];
	$memberID=$row1[1];
    $months=$row1[2];

    if($months==1){
    	$month=1;
    	$interest=6*$amount/100;
    	$monthlyprincipal=$amount;
    	$monthlypayment=$monthlyprincipal+$interest;
    	$loanbalance=$monthlyprincipal;

	$res4=mysqli_query($conn,"INSERT INTO loanrepayment (month,interest,monthlyPrincipal,monthlyPayment,loanBalance,memberID,loanID) VALUES('$month','$interest','$monthlyprincipal','$monthlypayment','$loanbalance','$memberID','$loanID ')") or die("Error::::".mysqli_error($conn));

    }
    else{

    $loanamount=$amount;
	$rate=6/100;
	$period=$months;
	$interest=0;
	$loanbalance=$loanamount;
	$paidamount=0;
	
	$monthlyprincipal=$loanamount/$period;
	$month=0;
	while($loanbalance>0){
		$month++;
		$interest=$rate*$loanbalance;
		$monthlypayment=$monthlyprincipal+$interest;
	    $loanbalance= $loanbalance-$monthlyprincipal;
		$paidamount+=$monthlypayment;
		if($loanbalance<0){
			$loanbalance=0;
		}

	$res4=mysqli_query($conn,"INSERT INTO loanrepayment (month,interest,monthlyPrincipal,monthlyPayment,loanBalance,memberID,loanID) VALUES('$month','$interest','$monthlyprincipal','$monthlypayment','$loanbalance','$memberID','$loanID ')") or die("Error::::".mysqli_error($conn));
		 
	}
	}
	


	$result1=mysqli_query($conn,"SELECT bankBalance from kenversityaccount");
	$row2=mysqli_fetch_array($result1);
	$bank=$row2[0];
	$bankBalance=$bank-$amount;

	$result3=mysqli_query($conn,"UPDATE kenversityaccount SET bankBalance='$bankBalance'") or die("Error::::".mysqli_error($conn));

/*	$res=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
	$row=mysqli_fetch_array($res);
	$balance=$row[0];
	$totalBalance=$balance+$amount;
	
	$result2=mysqli_query($conn,"UPDATE balance SET amount='$totalBalance'") or die("Error::::".mysqli_error($conn));*/


	if($result3){
				echo "<script>
alert('Loan Disbursed successfully by MPESA');
window.location.href='approved-loans.php';
</script>";

	}



			}
			elseif($mode=='bank'){
					$res1=mysqli_query($conn,"UPDATE loans SET status='disbursed' WHERE loanID='$loanID'")or die("Error::::".mysqli_error($conn));;

	$res2=mysqli_query($conn,"SELECT amount,memberID,months FROM loans WHERE loanID='$loanID'") or die("Error::::".mysqli_error($conn));;

	$row1=mysqli_fetch_array($res2);
	$amount=$row1[0];
	$memberID=$row1[1];
    $months=$row1[2];
    if($months==1){
    	$month=1;
    	$interest=6*$amount/100;
    	$monthlyprincipal=$amount;
    	$monthlypayment=$monthlyprincipal+$interest;
    	$loanbalance=$monthlyprincipal;

	$res4=mysqli_query($conn,"INSERT INTO loanrepayment (month,interest,monthlyPrincipal,monthlyPayment,loanBalance,memberID,loanID) VALUES('$month','$interest','$monthlyprincipal','$monthlypayment','$loanbalance','$memberID','$loanID ')") or die("Error::::".mysqli_error($conn));

    }
    else{

    $loanamount=$amount;
	$rate=6/100;
	$period=$months;
	$interest=0;
	$loanbalance=$loanamount;
	$paidamount=0;
	
	$monthlyprincipal=$loanamount/$period;
	$month=0;
	while($loanbalance>0){
		$month++;
		$interest=$rate*$loanbalance;
		$monthlypayment=$monthlyprincipal+$interest;
	    $loanbalance= $loanbalance-$monthlyprincipal;
		$paidamount+=$monthlypayment;
		if($loanbalance<0){
			$loanbalance=0;
		}

	$res4=mysqli_query($conn,"INSERT INTO loanrepayment (month,interest,monthlyPrincipal,monthlyPayment,loanBalance,memberID,loanID) VALUES('$month','$interest','$monthlyprincipal','$monthlypayment','$loanbalance','$memberID','$loanID ')") or die("Error::::".mysqli_error($conn));
		 
	}
	}
	


	$result1=mysqli_query($conn,"SELECT bankBalance from kenversityaccount");
	$row2=mysqli_fetch_array($result1);
	$bank=$row2[0];
	$bankBalance=$bank-$amount;

	$result3=mysqli_query($conn,"UPDATE kenversityaccount SET bankBalance='$bankBalance'") or die("Error::::".mysqli_error($conn));

/*	$res=mysqli_query($conn,"SELECT amount FROM balance WHERE memberID='$memberID'");
	$row=mysqli_fetch_array($res);
	$balance=$row[0];
	$totalBalance=$balance+$amount;
	
	$result2=mysqli_query($conn,"UPDATE balance SET amount='$totalBalance'") or die("Error::::".mysqli_error($conn));*/


	if($result3){
				echo "<script>
alert('Loan Disbursed successfully by through bank, hand over the cheque to the member');
window.location.href='approved-loans.php';
</script>";

	}



			}


			}
		}

	


?>