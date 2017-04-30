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

    /* echo "connected to DB\n"; */
	$searchInput = mysqli_real_escape_string($conn, $_POST['friends-search']);

    /* echo $searchInput . "\n"; */
	$sql = "SELECT first_name, last_name, username FROM users WHERE username = \"" . $searchInput . "\"";
    /* echo $sql . "\n"; */
	$query = mysqli_query($conn, $sql);


    if($query){
        if ($row = mysqli_fetch_assoc($query)){
    		echo $searchInput "found!";
				if(isset($_GET["add"])) {
				$query2 = mysql_query("SELECT uid FROM users WHERE id = '" . $_GET["add"] . "'");
				if(mysql_num_rows($query2) > 0) {
						$_query = mysql_query("SELECT * FROM friend_req WHERE from = '" . $_SESSION["username"] . "' AND to = '" . $_GET["add"] . "'");
				if(mysql_num_rows($_query) == 0) {
						mysql_query("INSERT INTO friend_req SET from = '" . $_SESSION["username"] . "', to = '" . $_GET["add"] . "'");
						}
					}
				}
  	}
  }

 ?>
