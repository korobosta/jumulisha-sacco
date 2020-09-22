<header>
	 <header style="background-color: lightblue;height: 100px">
                <h1 style="text-align: center; padding-top: 30px" >JUMULISHA SACCO</h1>
                </header>
	<div class="top-right">
		 <?php
include '../conn.php';
$username=$_SESSION['username'];
$select_image="select * from images where uploadedBy='$username'";

$var=mysqli_query($conn,$select_image);
if(mysqli_num_rows($var)>0){
while($row=mysqli_fetch_array($var))
{
 $image_name=$row["image"];
 $image_path=$row["folder"];

 echo "<img src=".$image_path."/".$image_name." width=100 height=100>";
}
}?>
	</div>
	</header>
   



<div class="vertical-menu">
  <a id="active1" href="member_home.php"  >Dashboard</a>
  <a id="active2" href="myAccount.php">My Account</a>
  <a id="active3" href="kin.php">Beneficiaries</a>
  <a id="active4" href="loans.php">Loans</a>
  <a id="active5" href="guarantor.php">Guarantors</a>
  <a id="active6" href="savings.php">Savings</a>
  <a id="active7" href="logs.php">Logs/Transactions</a>
  <a id="active8" href="contact.php">Contact Us</a>
  <a id="active9" href="withdraw.php">Withdraw Cash</a>
  <a id="active10" href="changepassword.php">Change Password</a>
  <a id="active10" href="logout.php">Logout</a>

</div>