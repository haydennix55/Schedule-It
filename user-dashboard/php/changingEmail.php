<?php
    session_start();

    if(isset($_POST['submit'])) {
        include_once '../include/connectDB.php';


        $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
        $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "UPDATE users SET email = 'hani2284@colorado.edu' where email = 'hayden.nix@colorado.edu'";

        $query = mysqli_query($conn, $sql);

    }

    //header("Location:../index.php");


 ?>
