<?php include'header.php' ?>
<div class="main">
  <h1>Enter details to calculate using reducing balance</h1>
    <form class="loancalcform" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
Enter Amount:<input type="number" name="amount" required><br><br>
Enter Interest Rate(%):<input type="number" name="rate" min="1" max="100" maxlength="3" required><br><br>
Select Period in months:<input type="number" name="period" min="1" max="48" maxlength="2" required>
        <br><br>
		<input style="color:green; font-size:20px;" type="submit" name="submit" value="Calculate"><br><br>
		
</form>
<?php
if(isset($_POST['submit'])){
	$loanamount=$_POST['amount'];
	$rate=$_POST['rate']/100;
	$period=$_POST['period'];
	$interest=0;
	$loanbalance=round($loanamount,0);
	$paidamount=0;
	$monthlyprincipal=round($loanamount/$period,0);
	$month=0;
	
	echo "<table border=1 cellpadding=10>";
	echo "<tr><th>Month</th><th>Interest</th><th>Monthly Principal</th><th>Monthly Payment</th><th>Loan Balance</th><th></th></tr>";
	while($loanbalance>$period){
		$month++;
		$interest=$rate*$loanbalance;
    $loanbalance= $loanbalance-$monthlyprincipal;
    $bal=$loanbalance-$monthlyprincipal;
		$monthlypayment=$monthlyprincipal+$interest;
	    
     
    
		$paidamount+=$monthlypayment;
		 echo "<tr>";
		 echo "<td>$month</td>";
		 echo "<td>$interest</td>";
		 echo "<td>$monthlyprincipal</td>";
		 echo "<td>	$monthlypayment</td>";
		 echo "<td>$loanbalance</td>";
		 echo "</tr>";
	}
	echo "</table>";	
}
?>
</div>
<?php include 'footer.php' ?>