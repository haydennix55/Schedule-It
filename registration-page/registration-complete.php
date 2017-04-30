<?php
	session_start();

	if(isset($_POST['submit'])){
		include_once '../include/connectDB.php';



		// Saves the input from the registration page to variables, it also parses out any strange characters to prevent injection
		$first_name = mysqli_real_escape_string($conn, $_POST['first']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password_1 = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT);
		$password_2 = mysqli_real_escape_string($conn, $_POST['rePassword']);

		//check to make sure the passwords match
		// this could be altered to use password verify as well instead of just comparing the two hashed passwords.
		// it might need to be changed

		//$confim = passCheck($password_1, $password_2);

		$check = password_verify($password_2, $password_1);

		if($check){
			//$reg = regUser($firstname, $last_name, $email, $username, $password_1);
			$sql = "INSERT INTO users(first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password_1')";

			if(mysqli_query($conn, $sql)) {
				return "You successfully registered";
			}
			else {
				return "Error: Not able to execute $sql. " . mysqli_error($conn);
			}
			//echo $reg;
		}
		else {
			echo "The two passwords you typed did not match";
		}

		require_once 'vendor/autoload.php';

		$from = new SendGrid\Email(null, "test@example.com");
		$subject = "Hello World from the SendGrid PHP Library!";
		$to = new SendGrid\Email(null, $email);
		$content = new SendGrid\Content("text/plain", "Hello, Email");
		$email = new SendGrid\Mail($from, $subject, $to, $content);

		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);

		$response = $sg->client->mail()->send()->post($mail);
		echo $response->statusCode();
		echo $response->headers();
		echo $response->body();

	}

 ?>
 <!DOCTYPE html>
 <html>
 <link rel="stylesheet" type="text/css" href="registration-complete.css" media="screen" />
    <body>
        <div>
            <h1 class="message">Thanks for Registering!</h1>
        </div>
        <div class="buttons">
            <form action="http://schedule-it.herokuapp.com/user-dashboard/index.html">
                <button type="submit" class="linkButton">Continue to Dashboard</button>
            </form>
            <form action="http://schedule-it.herokuapp.com/login-page/index.php">
                <button type="submit" class="linkButton">Login Page</button>
            </form>

        </div>

    </body>
 </html>
