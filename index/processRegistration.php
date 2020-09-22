<?php 
	
	// variable declaration
	$username = "";
	$email    = "";
	$surname    = "";
	$othernames    = "";
	$idno    = "";
	$dob    = "";
	$address   = "";
	$mobilenumber= "";
	$errors = array(); 



	include '../conn.php';

	
	if (isset($_POST['reg_user'])) {
		
		$surname = mysqli_real_escape_string($conn, $_POST['surname']);
		$othernames = mysqli_real_escape_string($conn, $_POST['othernames']);
	    $dob= mysqli_real_escape_string($conn, $_POST['dob']);
		$idno = mysqli_real_escape_string($conn, $_POST['idno']);
		$mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

		
		if (empty($username)) { array_push($errors, "Username is required"); }
		$q="SELECT memberID,username FROM members WHERE username='$username'";
		$re=mysqli_query($conn,$q) or die("Error:".mysqli_error($conn));
		if (mysqli_num_rows($re)>0){array_push($errors, "Username already exists");}
		if (empty($email)) { array_push($errors, "Email is required"); }
		$em="SELECT email FROM members WHERE email='$email'";
		$rst=mysqli_query($conn,$em) or die("Error:".mysqli_error($conn));
		if (mysqli_num_rows($rst)>0){array_push($errors, "Email already exists");}
		$dob=strtotime($dob);
		$date=strtotime('30/07/2018');
		if($dob<$date){array_push($errors, "Invalid date");}
		
		if($dob<'20/03/2010'){array_push($errors, "Invalid date");}

		if (empty($idno)) { array_push($errors, "ID Number is required"); }
		if (empty($dob)) { array_push($errors, "Date of birth is required"); }
		if (empty($othernames)) { array_push($errors, "Other Names are required"); }
		if (empty($mobilenumber)) { array_push($errors, "Mobile Number is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO members (surname,othernames,idno,dob,email,address,mobilenumber,username, password) 
					  VALUES('$surname', '$othernames', '$idno', '$dob', '$email', '$address', '$mobilenumber', '$username',  '$password')";
			$result=mysqli_query($conn, $query);
$to = $email;
$subject = "Registration to Jumulisha SACCO";
$txt = "Thank you for joining Jumulisha SACCO https://jumulisha-sacco.codenet.co.ke";
$headers = "From: admin@jumulisha-sacco.codenet.co.ke" . "\r\n" .
 "";

mail($to,$subject,$txt,$headers);
			
			if($result){
	echo "<script>
          alert('Successfully registered, check your email for our notification');
          window.location.href='login.php';
          </script>"; 
}
		
		}

	}


	
?>