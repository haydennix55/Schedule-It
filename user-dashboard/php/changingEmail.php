<?php
    session_start();

    $username = $_SESSION['username'];

    include "../connectDB.php";

    $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT password FROM users where (email = '" . $currentEmail . "' and username =  '" . $username . "'";

    $query = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($query);

    if (password_verify($password, $row['password'])){

        $sql = "UPDATE users SET email = '" . $newEmail . "' WHERE (email = '" . $currentEmail . "' and username = '" . $username . "'";
        $query = mysqli_query($conn, $sql);
    }

    header("Location:../index.php");


 ?>
