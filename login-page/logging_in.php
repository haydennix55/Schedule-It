
<?php
	session_start();

	if(isset($_POST['submit'])) {
		include_once '../include/connectDB.php';

		echo "submit was clicked";

		//pulls the log in information to check with database
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT uid, first_name, last_name, email, username, password FROM users";

		$query = mysqli_query($conn, $sql);
<<<<<<< HEAD
		echo mysqli_fetch_assoc($query);
=======

>>>>>>> a2b25694015036d665a35940a75cb4e5eea3369a
		while ($row = mysqli_fetch_assoc($query)){
			echo "checking the database";
			if($username == $row['username'] and password_verify($password, $row['password'])){

				echo "confirming log in info";
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
