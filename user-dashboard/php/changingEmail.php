<?php
    session_start();

    include "../connectDB.php";

    //echo "DB Connected";

    $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);
    $username = $_SESSION['username'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT password FROM users WHERE username = '" . $username . "'";

    $query = mysqli_query($conn, $sql);

    $changed = false;

    //echo "Query";

    while ($row = mysqli_fetch_assoc($query)){

        //echo "ROW";

        if(password_verify($password, $row['password'])){

            //echo "Password check";

            $sql = "UPDATE users SET email = '" . $newEmail . "' WHERE username = '" . $username . "'";
            $query = mysqli_query($conn, $sql);
            $changed = true;
        }
    }

 ?>
<html>
<?php if ($changed) {echo '<script language="javascript">';
 echo 'alert("Email Changed");';
 echo 'window.location = "/user-dashboard/index.php";';
echo '</script>';}
if (!$changed) {echo '<script language="javascript">';
 echo 'alert("Sorry, your password or current email are incorrect!")';
echo '</script>';
//header("Location: ../index.php");
} ?>
</html>
