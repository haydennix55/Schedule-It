<?php
    ob_start();
    session_start();

    include_once "../include/connectDB.php";


 ?>


<!DOCTYPE html>
<html>
    <body>
        <link rel="stylesheet" type="text/css" href="css/changeEmail.css"/>
        <form method ="post" action="php/changingEmail.php">
            <div class="inputs">
                <label class="label">Current Email: </label></br>
                <input class="currentEmail" type="text" placeholder="Current Email" name="currentEmail" id="currentEmail"></br>

                <label class="label">New Email: </label></br>
                <input class="newEmail" type="text" placeholder="New Email" name="newEmail" id="newEmail"></br>

                <label class="label">Password: </label></br>
                <input class="currentPass" type="password" placeholder="Password" name="password" id="password"></br>

                <button class="submitbutton" name="submit" value="submit" type="submit">
            </div>
        </form>
    </body>

</html>
