<?php

	$url = parse_url(getenv("mysql://b93aa055892ff0:a2da8580@us-cdbr-iron-east-03.cleardb.net/heroku_2dba9b3d9ee490e?reconnect=true"));
	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);
 	$dbcon = mysql_select_db(DBNAME);

?>
