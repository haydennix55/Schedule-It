<?php

/**
*@param hashed password $p1
*@param string $p2 to be verified with $p1
*@param boolean $check for true if the passwords match and false otherwise.
*/

function passCheck($p1, $p2) {
	$check = password_verify($p2, $p1);

	return $check;
}

/**
*@param string $first_name is from the first name input in sign up
*@param string $last_name is from the last name input in the sign up
*@param string $email is from the email address input in sign up
*@param string $username is from the username input in the sign up
*@param string $password is from the password input in sign up
*@return string for if the registration was a success or an error message for failure
*/
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
