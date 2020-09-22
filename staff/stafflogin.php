
<?php
session_start();

?>
<?php include('staffauthenticate.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
	<body style="background-color: lightblue;">
	<img style ="height:120px;width:100%;" src="../images/kensacco.png">

	<div class="header">
		<h2>User Login</h2>
	</div>
	
	<form method="post" action="stafflogin.php">

		<?php include('../index/errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		
	</form>


</body>
</html>