<?php
include_once '/include/connectDB.php';
function isLoggedIn(){
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    return true;
  }
  else {
    return false;
  }
}

function getUser($id, $field){
  $query = mysql_query("SELECT $field FROM users WHERE username=$id");
  $run = mysql_fetch_array($query);
  return $run[$field];
}

?>
