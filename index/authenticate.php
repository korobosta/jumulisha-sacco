<?php
$username = "";
$email    = "";
$errors = array(); 
$db = mysqli_connect('localhost', 'root', '', 'kenversity');

if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM members WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query) or die("Connection failed: " . $db->connect_error);
			$row=mysqli_fetch_assoc($results);

			if (mysqli_num_rows($results) == 1) {

				$_SESSION['username'] = $username;
				$_SESSION['member_login']=1;
				$_SESSION['memberID'] = $row['memberID'];

				header('location: member_home.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	?>