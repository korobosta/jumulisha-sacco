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
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($conn, $query) or die("Connection failed: " . $conn->connect_error);
			$row=mysqli_fetch_assoc($results);
			$occupation=$row['occupation'];
			

			 if (mysqli_num_rows($results) == 1) {
				if($occupation=="management"){
				$_SESSION['managementUsername'] = $username;
				$_SESSION['management_login']=1;
				$_SESSION['staffID'] = $row['staffID'];
				header('location: management_home.php');
				}
				elseif ($occupation=="accountant"){
				$_SESSION['accountantUsername'] = $username;
				$_SESSION['accountant_login']=1;
				$_SESSION['staffID'] = $row['userID'];
				header('location:treasurer_home.php');
				}
				elseif ($occupation=="admin"){
				$_SESSION['adminUsername'] = $username;
				$_SESSION['admin_login']=1;
				$_SESSION['staffID'] = $row['userID'];
				header('location:../admin/admin_home.php');

				}

				
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
    }
    ?>