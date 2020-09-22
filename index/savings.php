<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Savings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		
	#active6{
            background-color: wheat;
            
        }
        th{
            	background-color: lightblue;
            }
            table{
            	border-collapse: collapse;
            }
	</style>
</head>

<body>
   <?php include 'member_nav.php';?>

<div class="displayAccount">
	 <p>Your savings will earn you an interest of 6% per month</p>
<?php
include '../conn.php';
 $memberID=$_SESSION['memberID'];
if($result=mysqli_query($conn,"SELECT * FROM savings WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0)
	{
		echo "<table border=1 cellpadding=10>";
		echo "<tr><th>Saving ID</th><th>Member ID</th><th>Amount</th><th>date</th><th>Payment Method</th><th>Time</th></tr>";
		$saving=0;
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['savingsID']."</td>";
			echo "<td>".$row['memberID']."<t/d>";
			echo "<td>".$row['amount']."</td>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['paymentmethod']."</td>";
			echo "<td>".$row['time']."</td>";
			echo "</tr>";	
		}
		echo "</table>";
}	
}
?>
<?php 
  $add=mysqli_query($conn,"SELECT SUM(amount) from `savings` WHERE memberID='$memberID'");
  if(mysqli_num_rows($add)>0){
  while($row1=mysqli_fetch_array($add))
  {
    $saving=$row1['SUM(amount)'];
  }
  }
  else{
  	$saving=0;
  }
 ?>
<fieldset style="width:20%;padding:10px;text-align: center;color:blue;"><legend style="padding:10px">Your Total Savings:</legend><?php echo $saving; ?></fieldset>
<fieldset><legend><h1 style="color:darkblue;">Subscribe to monthly Savings with paypal</h1></legend>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" >
<input type="hidden" name="cmd" value="_s-xclick">
<table>
<tr><td><input type="hidden" name="on0" value=""></td></tr><tr><td>Select Amount per month:<select name="os0">
	<option value="Option 1">Option 1 : $1,000.00 USD - monthly</option>
	<option value="Option 1">Option 1 : $2,000.00 USD - monthly</option>
	<option value="Option 1">Option 1 : $5,000.00 USD - monthly</option>
	<option value="Option 4">Option 4 : $10,000.00 USD - monthly</option>
	<option value="Option 5">Option 5 : $20,000.00 USD - monthly</option>
	<option value="Option 6">Option 6 : $50,000.00 USD - monthly</option>
	<option value="Option 7">Option 7 : $100,000.00 USD - monthly</option>
</select> </td></tr>
</table>
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</fieldset>

<fieldset><legend><h1 style="color:darkblue;">Unsubscribe from monthly Savings</h1></legend>
<a style="padding:20px;" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=GXLMPTPSBKRMY ">
<IMG SRC="https://www.paypalobjects.com/en_US/i/btn/btn_unsubscribe_LG.gif" BORDER="0">
</a>
</fieldset>
</div>



</body>
</html>