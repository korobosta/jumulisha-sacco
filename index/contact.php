<?php 
session_start();
        
if(!isset($_SESSION['member_login'])) 
    header('location:login.php');   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member contact page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
	#active8{
            background-color: wheat;
        }
	</style>
</head>

<body>
<?php include 'member_nav.php';?>
<div class="displayAccount">
	<fieldset >
		<legend style="color:blue;font-size: 20px;">Fill the form below to contact us</legend>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  
    Contact who?:
     <select name="who">
         <option value="admin">Admin</option>
         <option value="management">Management</option>
         <option value="accountant">Acountant</option>
         <option value="any">Any of the Above</option>
        
     </select><br><br>
    Subject:
     <select name="subject">
         <option value="loans">Loans</option>
         <option value="membership">Membership</option>
         <option value="savings">Savings</option>
         <option value="jobs">Jobs and Vacancies</option>
         <option value="other">Other</option>
     </select><br><br>
     Message:
     <br><textarea name="message" rows="5" cols="20" required></textarea> <br><br>
     <input style="color:blue; font-size:20px;" type="submit" name="submit" value="Submit" >
     <?php
    include '../conn.php';

    if(isset($_POST['submit'])){

    	$memberID=$_SESSION['memberID'];
    	$result=mysqli_query($conn,"SELECT * FROM members WHERE memberID='$memberID'");
    	$row=mysqli_fetch_array($result);

        $name=$row['surname']." ".$row['othernames'];
        $who=$_POST['who'];

        $email=$row['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $sql="INSERT INTO contact (name,email,subject,message,sentto) VALUES('$name','$email','$subject','$message','$who')";
$result=mysqli_query($conn,$sql) or die("ERROR::".mysqli_error($conn));
if($result){
	echo "<script>
          alert('Message Sent Successfully');
          window.location.href='contact.php';
          </script>"; 
}
else{
 echo "Something went wrong";
}
    }
    ?>
    </form>
	<fieldset>
		



</div>

</body>
</html>