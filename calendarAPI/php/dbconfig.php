<?php
class DBConnection{
	function getConnection(){
	  //change to your database server/user_name/pass
		mysql_connect("127.0.0.1","root","momandpop") or
         die("Could not connect: " . mysql_error());
    //change to your database name
		mysql_select_db("Schedule") or 
		     die("Could not select database: " . mysql_error());
	}
}
?>
