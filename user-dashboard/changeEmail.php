<?php
    ob_start();
    session_start();

    include_once "../include/connectDB.php";


 ?>


<!DOCTYPE html>
<html>
    <form method ="post" action="php/changingEmail.php">
        <div>
            <label>Current Email: </label></br>
            <input class="currentEmail" type="text" placeholder="Current Email" name="currentEmail" id="currentEmail"></br>

            <label>New Email: </label></br>
            <input class="newEmail" type="text" placeholder="New Email" name="newEmail" id="newEmail"></br>

            <label>Password: </label></br>
            <input class="currentPass" type="password" placeholder="Password" name="password" id="password"></br>

            <button name="submit" value="submit" type="submit">
        </div>
    </form>

</html>
