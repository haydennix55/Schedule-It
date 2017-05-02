<?php
	ob_start();
	session_start();

	include_once '../include/connectDB.php';

	$error = false
 ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="login.css" media="screen" />
<script type="text/javascript" src="login.js"></script>

<body>
    <a href="http://schedule-it.herokuapp.com/"><img class="logo-header" src="logo.jpeg" alt="Logo"></a>

    <!-- This form is the information required for login -->
    <form method="post" action="logging_in.php">
        <div class="fields">
            <label>Username:</label>
            <input type="text" id ="username" placeholder="Enter Username" name="username" required>

            <label>Password:</label>
            <input type="password" id ="password" placeholder="Enter Password" name="password" required>

            <!--This can be changed to a type="submit", but it exposes password in URL-->
            <input id="submit" type="submit" name="submit" value="Submit" class="button">
        </div>
			</form>

        <!--Contains reset button and forgot pass button in aesthetic border-->
        <div class="container">
					<button type="cancel" onclick="window.location='https://schedule-it.herokuapp.com/';return false;">Cancel</button>
            <a class="linkButton" href="http://schedule-it.herokuapp.com/registration-page/registration-page.php">New? Create Account</a>
            <span class="linkButton"><a href="#">Forgot password?</a></span>
        </div>




</body>


</html>
