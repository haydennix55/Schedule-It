<?php
include_once '../include/connectDB.php';

function isLoggedIn(){
  if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
    return true;
  }
  else {
    header("Location:/login-page/index.php");
    return false;
  }
  $username = $_SESSION['username'];
}

/**
*@param int $id for a user in the database
*@param string $field columns in the database needed
*@return array $run contains the user information fetched from the database
*/
function getUser($id, $field){
  $query = mysql_query("SELECT $field FROM users WHERE username=$id");
  $run = mysql_fetch_array($query);
  return $run[$field];
}

?>
