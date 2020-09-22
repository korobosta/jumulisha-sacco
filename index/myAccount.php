<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
		
	#active2{
             background-color: wheat;
        }
	</style>
</head>

<body>
   <?php include 'member_nav.php';?>
<div class="displayAccount">

<?php
include '../conn.php';
$username=$_SESSION['username'];
$select_image="select * from images where uploadedBy='$username'";

$var=mysqli_query($conn,$select_image);
if(mysqli_num_rows($var)>0){
	echo "My photo <br>";
while($row=mysqli_fetch_array($var))
{
 $image_name=$row["image"];
 $image_path=$row["folder"];

 echo "<img src=".$image_path."/".$image_name." width=100 height=100>";
}
}
else{
	?>
<fieldset><legend style="color:blue;">Upload Your Image</legend>
<form method="POST" action="myAccount.php" enctype="multipart/form-data">
 <input type="file" name="myimage" required><br><br>
 <input style="color:blue;font-weight: bold;" type="submit" name="upload" value="Upload">
</form>
</fieldset>
	<?php
	if(isset($_POST['upload'])){
$upload_image=$_FILES["myimage"]["name"]; 

$folder="images/";

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

$insert_path="INSERT INTO images(image,uploadedBy,folder) VALUES('$upload_image','$username','$folder')";

$var=mysqli_query($conn,$insert_path);}
}






$select_doc="select * from docs where uploadedBy='$username'";

$var=mysqli_query($conn,$select_doc);
if(mysqli_num_rows($var)>0){
	
while($row=mysqli_fetch_array($var))
{
 $doc_name=$row["doc"];
 $doc_path=$row["folder"];



}
}
else{
	?>
<fieldset><legend style="color:blue;font-weight: bold;padding: 20px">Upload Your ID photocopy</legend>
<form method="POST" action="myAccount.php" enctype="multipart/form-data">
 <input type="file" name="mydoc" required>
 <input style="color:blue;font-weight: bold;" type="submit" name="doc" value="Upload">
</form>
</fieldset>
	<?php
	if(isset($_POST['doc'])){
$upload_doc=$_FILES["doc"]["name"]; 

$folder="docs/";

move_uploaded_file($_FILES["mydoc"]["tmp_name"], "$folder".$_FILES["mydoc"]["name"]);

$insert_path="INSERT INTO docs(doc,uploadedBy,folder) VALUES('$upload_doc','$username','$folder')";

$var=mysqli_query($conn,$insert_path);}
}
?>


<div class="details">
	<fieldset>
		<legend style="color:blue;font-weight: bold;padding: 20px">Personal Details</legend>
	<?php
	 $member_id=$_SESSION['username'];
	 
	 $sql="SELECT * FROM members WHERE username='$member_id'";
	 $result=  mysqli_query($conn,$sql) or die(mysql_error($conn));
	 $rws=  mysqli_fetch_array($result);
	 
	 
	 $surname= $rws[1];
	 $othernames= $rws[2];
	 $dob= $rws[3];
	 $idno= $rws[4];
	 $mobilenumber=$rws[5];
	 $email= $rws[6];
	 $address= $rws[7];
	?>
	<table cellpadding="3">
     <tr><th>Surname</th><td><?php echo $surname;?></td></tr>
	 <tr><th>Other Names</th> <td><?php echo $othernames;?></td></tr>
	 <tr><th>Date Of Birth</th><td><?php echo $dob;?></td></tr>
	 <tr><th>ID Number</th> <td><?php echo $idno;?></td></tr>
	 <tr><th>Mobile Number</th>  <td><?php echo $mobilenumber;?></td></tr>
	 <tr><th>Email</th> <td><?php echo $email;?></td></tr>
	 <tr><th>Address</th><td><?php echo $address;?></td></tr> 

    </table>
	<fieldset>
		
</div>

</div>

   


</body>
</html>