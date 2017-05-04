<?php
	ob_start();
	session_start();

	include_once '../include/connectDB.php';

	$error = false;

?>

<!DOCTYPE html>
<html>
<head>

	<link rel = "stylesheet" type="text/css" href="registration-page.css" media="screen" />
</head>
<body>
	<a href="http://schedule-it.herokuapp.com/"><img class="logo-header" src="logo.jpeg" alt="Logo"></a>

	<form method="post" action="test.php">
		<div class="fields">
			<label>First Name</label>
			<input class="field" type="text"
			placeholder="Enter your first name" name="first" id="first" required maxlength="40"></br>

			<label>Last Name</label></br>
			<input class="field" type="text" placeholder="Enter your last name" name="last" id="last" required maxlength="40"></br>

			<label>Email></label></br>
			<input class="field" type="text" placeholder="Enter your email address" name="email" id="email" required maxlength="40"></br>

			<label>Username</label></br>
			<input class="field" type="text" placeholder="Create a username" name="username" id="username" required maxlength="40"></br>

			<label>Password</label></br>
			<input class="field" type="password" placeholder="Create a password" name="password" id="password" required maxlength="40"></br>

			<label>Re-Enter Password</label></br>
			<input class="field" type="password" placeholder="Re-enter your password" name="rePassword" id="rePassword" required maxlength="40"></br>

			<input type="submit" name="submit" value="submit"></br>
			<button class="cancelButton" type="reset">Cancel</button>
		</div>
	</form>

</body>
</html>

<?php ob_end_flush(); ?>
