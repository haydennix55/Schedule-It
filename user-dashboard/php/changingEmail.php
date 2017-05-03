<?php
    session_start();

    if(isset($_POST['submit'])) {
        $server = "us-cdbr-iron-east-03.cleardb.net";
    	$username = "b93aa055892ff0";
    	$password = "a2da8580";
    	define('DBNAME', 'heroku_2dba9b3d9ee490e');

    	$conn = new mysqli($server, $username, $password, DBNAME);


        $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
        $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "UPDATE users SET email = 'hani2284@colorado.edu' WHERE email = 'hayden.nix@colorado.edu';

        $query = mysqli_query($conn, $sql);

    }

    header("Location:../index.php");


 ?>
