
<?php
    include '../conn.php';
    include 'header.php';
	$feedback="";
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $sql="INSERT INTO contact (name,email,subject,message) VALUES('$name','$email','$subject','$message')";
$result=mysqli_query($conn,$sql);
if($result){
    $feedback="Your Data has been submitted,we will send you feedback within the shortest time possible";
}
else{
    $feedback="Something went wrong".mysqli_error($conn);
}
    }
    ?>
<div class="main">
    <div class="feedback"> 
        <h1 style=" font-style: bold;color:blue">Fill this form to contact Us</h1><br>
      </div>
		<span style="color:red; font-style:bold;"><?php echo $feedback;?></span>
    <form class="contact-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
     <br><br><br><br><br>Name:
    <input type="text" name="name" required><br><br>
    Email:
     <input type="email" name="email" required><br><br>
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
    </form>
</div>
<?php include 'footer.php' ?>