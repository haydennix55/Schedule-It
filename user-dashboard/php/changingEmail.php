<?php
    session_start();

    include "../connectDB.php";

    $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "UPDATE users SET email = '" . $newEmail . "' WHERE email = '" . $currentEmail . "'";


    $query = mysqli_query($conn, $sql);


    header("Location:../index.php");


 ?>
