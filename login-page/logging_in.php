
<?php
	session_start();

	if(isset($_POST['submit'])) {
		include_once '../include/connectDB.php';

		//echo "submit was clicked";

		//pulls the log in information to check with database
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT uid, first_name, last_name, email, username, password FROM users";

		//echo $sql;

		$query = mysqli_query($conn, $sql);

		//echo mysqli_fetch_assoc($query);

		while ($row = mysqli_fetch_assoc($query)){
			//echo "checking the database";
			//echo $row['username'];
			echo password_verify($password, $row['password']);
			//echo $username;

			if($username == $row['username'] and password_verify($password, $row['password'])){

				echo "confirming log in info";
				$user = $row;
				$login = 1;
				$_SESSION['login'] = 1;
				$_SESSION['first'] = $row['first_name'];
				$_SESSION['last'] = $row['last_name'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['username'] = $row['username'];
				echo "login successful";
				header("Location:/user-dashboard/index.php");
			}
			else {
				$login = 0;
				echo "login failed";
			}
		}
	}

	//below is the html for the page
 ?>
