<?php
$username = "";
$email    = "";
$errors = array(); 
include '../conn.php';

if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$results = mysqli_query($conn, $query) or die("Connection failed: " . $conn->connect_error);
			$row=mysqli_fetch_assoc($results);

			if (mysqli_num_rows($results) == 1) {

				$_SESSION['adminUsername'] = $username;
				$_SESSION['admin_login']=1;
				$_SESSION['adminID'] = $row['adminID'];

				header('location: admin_home.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
    }  
    ?>