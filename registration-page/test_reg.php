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
</body>
