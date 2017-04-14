<?php

function passCheck($p1, $p2) {
	$check = password_verify($p2, $p1);

	return $check;
}

function regUser($first_name, $last_name, $email, $username, $password){
	$sql = "INSERT INTO users(first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password_1')";

	if(mysqli_query($conn, $sql)) {
		return "You successfully registered";
	}
	else {
		return "Error: Not able to execute $sql. " . mysqli_error($conn);
	}
}

 ?>
