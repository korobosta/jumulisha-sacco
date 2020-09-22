<?php 

session_start();
        
if(!isset($_SESSION['management_login'])) 
    header('location:stafflogin.php');  
    include '../conn.php'; 
?>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Management Homepage </h1>
<ul>
<li><a href="management-changepassword.php">Change Password</a></li>
<li><a href="staff_logout.php">Logout</a></li>
</ul>
</div>
<div class="adminnav">
<ul  >
    <li><a style="background-color: wheat;"  href="management_home.php">Dashboard</a></li>
    <li><a  href="management_members.php">Members</a></li>
    <li><a  href="loan-staff.php">Loans</a></li>
	<li><a  href="savings-managment.php">Savings</a></li>
	<li><a  href="management-messages.php">Messages</a></li>
	
</ul>
</div>
<div>
<div class="admindisplay">
	<fieldset style="width:25%;float:left;"><legend style="color:blue;text-align: center;font-weight: bold;">Total Number of loans disbursed</legend>
		<?php
		$result1=mysqli_query($conn,"SELECT * FROM loans WHERE status='disbursed' ");
		$count1=mysqli_num_rows($result1);
		echo $count1;

		?>
	</fieldset>
	<fieldset style="width:25%;float:left"><legend style="color:blue;text-align: center;font-weight: bold;">Total Number of Members</legend>
      <?php
      $result=mysqli_query($conn,"SELECT * FROM members ");
      $count=mysqli_num_rows($result);
      echo $count;

      ?>

	</fieldset>
	<fieldset style="width:25%;float:left"><legend style="color:blue;text-align: center;font-weight: bold;">Total Amount of Members Savings</legend>
      <?php 

  $add=mysqli_query($conn,"SELECT SUM(amount) from balance") or die("error".mysqli_error($conn));
  if(mysqli_num_rows($add)>0){
  while($row1=mysqli_fetch_array($add))
  {
    $saving=$row1['SUM(amount)'];
  }
  }
  else{
  	$saving=0;
  }
  echo $saving;
 ?>
	</fieldset>

	<fieldset style="width:25%;float:left"><legend style="color:blue;text-align: center;font-weight: bold;">Bank Account Balance</legend>
		<?php
		$fetch=mysqli_query($conn,"SELECT bankBalance FROM kenversityaccount");
		$obj=mysqli_fetch_array($fetch);
		$bankBalance=$obj[0];
		echo $bankBalance;
		 ?>

	</fieldset>
	<fieldset style="width:25%;float:left"><legend style="color:blue;text-align: center;font-weight: bold;">Cash Balance</legend>
		<?php
		$fetch=mysqli_query($conn,"SELECT cashBalance FROM kenversityaccount");
		$obj=mysqli_fetch_array($fetch);
		$cashBalance=$obj[0];
		echo $cashBalance;
		 ?>
	</fieldset>
	<fieldset style="width:25%;float:left;"><legend style="color:blue;text-align: center;font-weight: bold;">Total Amount of loans disbursed</legend>
		<?php
		
  $add=mysqli_query($conn,"SELECT SUM(amount) from loans where status='disbursed'") or die("error".mysqli_error($conn));
  if(mysqli_num_rows($add)>0){
  while($row1=mysqli_fetch_array($add))
  {
    $saving=$row1['SUM(amount)'];
  }
  }
  else{
  	$saving=0;
  }
  echo $saving;
 ?>

		
	</fieldset>
</div>

</body>
</html>