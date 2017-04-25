<?php
	session_start();

    $server = "us-cdbr-iron-east-03.cleardb.net";
    $username = "b93aa055892ff0";
    $password = "a2da8580";
    define('DBNAME', 'heroku_2dba9b3d9ee490e');

    $conn = new mysqli($server, $username, $password, DBNAME);

    if(mysqli_ping($conn) == false){
        echo "Connection did not work";
    }

    echo "connected to DB";
	$searhInput = mysqli_real_escape_string($conn, $_POST['Search']);

	$sql = "SELECT first_name, last_name, username FROM users WHERE username = \"" . $searchInput . "\"";

	$query = mysqli_query($conn, $sql);


    if($query){
        if ($row = mysqli_fetch_assoc($query)){
    		echo "Match Found";
    	}
    }

 ?>
