<?php
	session_start();

	if(isset($_POST['submit'])) {
		include_once '../include/connectDB.php';

        echo "connected to DB";
		$searhInput = mysqli_real_escape_string($conn, $_POST['Search']);

		$sql = "SELECT first_name, last_name, username from users where username = ". $searchInput;


		$query = mysqli_query($conn, $sql);


		while ($row = mysqli_fetch_assoc($query)){
			echo "Match Found";
		}
	}

 ?>
