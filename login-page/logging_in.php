<?php
	session_start();

	if(isset($_POST['submit'])) {
		inlcude_once '../include/connectDB.php';

		//pulls the log in information to check with database
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT uid, first_name, last_name, email, username, password FROM users where username = $username";

		$query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($query)){
			if($username == $row['username'] and password_verify($password, $row['password'])){
				$user = $row;
				$login = 1;
				$_SESSION['login'] = 1;
				$_SESSIOM['first'] = $row['first_name'];
				$_SESSIOM['last'] = $row['last_name'];
				$_SESSIOM['email'] = $row['email'];
				$_SESSIOM['username'] = $row['username'];
				echo "login successful";
			}
			else {
				$login = 0;
				echo "login failed";
			}
		}
	}

	//below is the html for the page
 ?>
