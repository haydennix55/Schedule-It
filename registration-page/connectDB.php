<?php

	$url = parse_url(getenv("mysql://b93aa055892ff0:a2da8580@us-cdbr-iron-east-03.cleardb.net/heroku_2dba9b3d9ee490e?reconnect=true"));
	$server = $url["us-cdbr-iron-east-03.cleardb.net"];
	$username = $url["b93aa055892ff0"];
	$password = $url["a2da8580"];
	define('DBNAME', 'users');

	$conn = new mysqli($server, $username, $password, DBNAME);

	if(!$conn){
		die("connection failed : " . mysql_error());
	}
?>
