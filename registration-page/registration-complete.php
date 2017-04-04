<?php
	session_start();

	if(isset($_POST['submit'])){
		include_once '/include/connectDB.php';

		// Saves the input from the registration page to variables, it also parses out any strange characters to prevent injection
		$first_name = mysqli_real_escape_string($conn, $_POST['first']);
		$last_name = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password_1 = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT);
		$password_2 = mysqli_real_escape_string($conn, $_POST['rePassword']);

		echo $first_name;
		echo $last_name;
		echo $email;
		echo $username;

		//check to make sure the passwords match
		// this could be altered to use password verify as well instead of just comparing the two hashed passwords.
		// it might need to be changed
		if(password_verify($password_2, $password_1)){
			echo $first_name;
			echo $last_name;
			echo $email;
			echo $username;
			/*$sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password_1')";

			if(mysqli_query($conn, $sql)) {
				echo "You successfully registered";
			}
			else {
				echo "Error: Not able to execute $sql. " . mysqli_error($conn);
			}*/
		}
		else{
			echo "The two passwords you typed did not match";
		}
	}

 ?>
