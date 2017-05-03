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
            <input class="currentEmail" type="text" placeholder="Current Email" id="currentEmail"></br>

            <label>New Email: </label></br>
            <input class="newEmail" type="text" placeholder="New Email" id="newEmail"></br>

            <label>Password: </label></br>
            <input class="currentPass" type="password" placeholder="Password" id="password"></br>
            
            <button type="submit">
        </div>
    </form>

</html>
