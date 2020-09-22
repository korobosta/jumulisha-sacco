<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guarantors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	#active5{
             background-color: wheat;
        }
	</style>
</head>

<body>
   <div id="wrap">
		  <?php include 'member_nav.php';?>
<div class="displayAccount">
	
<?php
	include '../conn.php';
	$feedback="";
	$memberID=$_SESSION['memberID'];
if(isset($_POST['submit'])){
	
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$idno=$_POST['idno'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$occupation=$_POST['occupation'];
	
	
	$sql="INSERT INTO guarantors(memberID,name,dob,idno,phone,address,occupation) VALUES('$memberID','$name','$dob','$idno','$phone','$address','$occupation')";
 $result=mysqli_query($conn,$sql) or die("ERROR".mysqli_error($conn));
			if($result){
	echo "<script>
          alert('Successfully added a guarantot');
          window.location.href='guarantor.php';
          </script>"; 
}
}
?>
<?php
$rownumber="";
$memberID=$_SESSION['memberID'];
if($result=mysqli_query($conn,"SELECT * FROM guarantors WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0)
		$rownumber=mysqli_num_rows($result);
	{
		echo "<table id='customers'";
		echo "<tr><th>Name of gurantor</th><th>Date Of Birth</th><th>ID Number</th><th>Phone Number</th><th>Adress</th><th>Occupation</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['dob']."<t/d>";
			echo "<td>".$row['idno']."<t/d>";
			echo "<td>".$row['phone']."<t/d>";
			echo "<td>".$row['address']."</td>";
			echo "<td>".$row['occupation']."</td>";
			
			echo "</tr>";	
		}
		echo "</table>";
}
}
if($rownumber<=5){
?>

	

	<h1>Fill in the details to add guarantor</h1>
	<span style="color:green; font-size:20px;"><?php echo $feedback;?></span>
	<form class="kin"action="guarantor.php" method="POST" required>
		Name:<input type="text" name="name" required><br><br>
		Date of Birth:<input type="date" name="dob" required><br><br>
		ID Number:<input type="number" name="idno" required><br><br>
		Phone:<input type="number" name="phone" required><br><br>
        Address:<input type="text" name="address" required><br><br>
		Occupation:<input type="text" name="occupation"required><br><br>
		<input type="submit" name="submit" value="Submit">

	</form>
<?php
}
else{

}
?>
</div>


</body>
</html>