<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Next of kin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	#active3{
            background-color: wheat;
        }
	</style>
</head>

<body>
  <?php include 'member_nav.php';?>
<div class="displayAccount">

<?php
	include '../conn.php';
	
	$memberID=$_SESSION['memberID'];
	$feedback="";
if(isset($_POST['submit'])){
	
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$relationship=$_POST['relationship'];
	
	
	$sql="INSERT INTO nextofkin(memberID,name,dob,address,relationship) VALUES('$memberID','$name','$dob','$address','$relationship')";
 $result=mysqli_query($conn,$sql) or die("ERROR".mysql_error($conn));
			if($result){
	echo "<script>
          alert('Successfully added next of kin');
          window.location.href='kin.php';
          </script>"; 
}else{
 echo "An error occured";
}
}
?>
<?php
$rownumber=0;

$memberID=$_SESSION['memberID'];
if($result=mysqli_query($conn,"SELECT * FROM nextofkin WHERE memberID='$memberID'")){
	if(mysqli_num_rows($result)>0)
		$rownumber=mysqli_num_rows($result);
	{
		echo "<table id='customers'>";
		echo "<tr><th>Name of kin</th><th>Date Of Birth</th><th>Adress</th><th>Relationship</th></tr>";
		while($row=mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['dob']."<t/d>";
			echo "<td>".$row['address']."</td>";
			echo "<td>".$row['relationship']."</td>";
			echo "</tr>";	
		}
		echo "</table>";
}	
}
if($rownumber<=1)
{
?>

	

	<h1>Fill in the details to add a beneficiary</h1>
	<span style="color:green; font-size:20px;"><?php echo $feedback;?></span>
	<form class="kin"action="kin.php" method="POST" required>
		Name:<input type="text" name="name" required><br><br>
		Date of Birth:<input type="date" name="dob" required><br><br>
		Address:<input type="text" name="address" required><br><br>
		Relationship:<input type="text" name="relationship"required><br><br>
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