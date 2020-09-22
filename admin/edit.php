
<html>
<head>
<title>Edit Record</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Admin Page: Edit Members</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php
include "../conn.php";
$id=$_REQUEST['memberID'];
$sql="SELECT * FROM members WHERE memberID='$id'";
$result=mysqli_query($conn,$sql) or die("". mysqli_error($conn));
$row=mysqli_fetch_array($result);


?>
<?php include 'adminsidebar.php'; ?>
<div style="font-size:15px; padding:10px;" class="admindisplay">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<input type="hidden" name="memberID" value="<?php echo $id;?>">
Surname:<input type="text" name="surname" value="<?php echo $row['surname']; ?>"><br><br>
Other Names:<input type="text" name="othernames" value="<?php echo $row['othernames']; ?>"><br><br>
Date of Birth:<input type="text" name="dob" value="<?php echo $row['dob']; ?>"><br><br>
ID Number:<input type="text" name="idno" value="<?php echo $row['idno']; ?>"><br><br>
Mobile Number:<input type="text" name="mobilenumber" value="<?php echo $row['mobilenumber']; ?>"><br><br>
Email Address:<input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
Address:<input type="text" name="address" value="<?php echo $row['address']; ?>"><br><br>



<input type="submit" name="submit" value="Submit">
</form>
</div>

<?php
if (isset($_POST['submit']))
{
	$id=$_POST['memberID'];
	$surname=$_POST['surname'];
	$othernames=$_POST['othernames'];
	$dob=$_POST['dob'];
	$idno=$_POST['idno'];
	$mobilenumber=$_POST['mobilenumber'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$sql="UPDATE members SET surname='$surname',othernames='$othernames',dob='$dob',idno='$idno',mobilenumber='$mobilenumber',email='$email',address='$address' WHERE memberID='$id'";
	$result=mysqli_query($conn,$sql) or die("Error".mysqli_error($conn));
header('location:members.php');
	
}
?>
</body>
</html>

