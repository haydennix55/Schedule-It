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

    $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = 'UPDATE users SET email = "' . $newEmail . '" WHERE email = "' . $currentEmail .'"';


    $query = mysqli_query($conn, $sql);


    header("Location:../index.php");


 ?>
