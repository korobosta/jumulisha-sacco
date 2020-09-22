<?php include('processRegistration.php');
include 'header.php';
 ?>

	<div class="h">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Surname</label>
			<input type="text" name="surname" onkeypress="return onlyAlphabets(event,this);" value="<?php echo $surname; ?>" required>
			<div id="validator"></div>
		</div>
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="othernames" onkeypress="return onlyAlphabets(event,this);" value="<?php echo $othernames; ?>" required>
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="dob" value="<?php echo $dob; ?>" required>
		</div>
		<div class="input-group">
			<label>ID Number</label>
			<input type="number" name="idno"  value="<?php echo $idno; ?>"  required maxlength="10">
		</div>
		<div class="input-group">
			<label>Adress</label>
			<input type="text" name="address" value="<?php echo $address; ?>" required>
		</div>
		<div class="input-group">
			<label>Mobile Number</label>
			<input type="number" name="mobilenumber" minlength="10"  value="<?php echo $mobilenumber; ?>"  required>
		</div>

		
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>"  minlength="5" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" minlength="5" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Log in</a>
		</p>
	</form>
	
<?php include 'footer.php'; ?>