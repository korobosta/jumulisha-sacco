
<html>
<head>
<title>Edit Staff Record</title>
<link rel="stylesheet" href="../css/style3.css">
</head>
<body>
<div class="welcome">
<h1> Admin Page: Edit Staff</h1>
<ul>
<li><a href="changepassword.php">Change Password</a></li>
<li><a href="admin_logout.php">Logout</a></li>
</ul>
</div>
<?php
include "../conn.php";
$id=$_REQUEST['email'];
$sql="SELECT * FROM users WHERE email='$id'";
$result=mysqli_query($conn,$sql) or die("". mysqli_error($conn));
$row=mysqli_fetch_array($result);


?>
<?php include 'adminsidebar.php'; ?>
<div class="admindisplay">
<form style="text-align: center;
    font-size: 20px;
    padding: 20px;" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
Name:<input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
Email Address:<input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
Address:<input type="text" name="address" value="<?php echo $row['address']; ?>"><br><br>
ID Number:<input type="text" name="idno" value="<?php echo $row['idno']; ?>"><br><br>
Mobile Number:<input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br><br>
Date of Birth:<input type="text" name="dob" value="<?php echo $row['dob']; ?>"><br><br>

<input type="submit" name="submit" value="Submit">
</form>
</div>

<?php
if (isset($_POST['submit']))
{
    $id=$_POST['id'];
	$name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $idno=$_POST['idno'];
    $dob=$_POST['dob'];
   
	$sql="UPDATE users SET name='$name',dob='$dob',idno='$idno',phone='$phone',email='$email',address='$address' WHERE email='$id'";
    mysqli_query($conn,$sql) or die("Error".mysqli_error($conn));
    echo "<script>
          alert('Loan details received,you will receive feedback soon,check your email for our notification');
          window.location.href='staff.php';
          </script>"; 
	
}
?>
</body>
</html>