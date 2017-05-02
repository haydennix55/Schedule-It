<?php
    ob_start();
    session_start();

    include_once "../include/connectDB.php";


 ?>


<!DOCTYPE html>
<html>
    <div>
        <label>Current Email: </label>
        <input class="currentEmail" type="text" placeholder="Current Email" id="currentEmail">
    </div>
    <div>
        <label>New Email: </label>
        <input class="newEmail" type="text" placeholder="New Email" id="newEmail">
    </div>
    <div>
        <label>Password: </label>
        <input class="currentPass" type="password" placeholder="Password" id="password">
    </div>
    <form action="php/changingEmail.php" >
        <button type="submit">
    </form>

</html>
