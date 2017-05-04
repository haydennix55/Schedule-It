<?php
    session_start();

    include "../connectDB.php";

    echo "DB Connected";

    $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $username = $_SESSION['username'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT password FROM users WHERE username = '" . $username . "'";

    $query = mysqli_query($conn, $sql);

    echo "Query";

    while ($row = mysqli_fetch_assoc($query)){

        if($username == $row['username'] and password_verify($password, $row['password'])){

            echo "Password check";

            $sql = "UPDATE users SET email = '" . $newEmail . "' WHERE (email = '" . $currentEmail . "' and $username = '" . $username . "'";
            $query = mysqli_query($conn, $sql);
        }
    }

    //header("Location:../index.php");


 ?>
