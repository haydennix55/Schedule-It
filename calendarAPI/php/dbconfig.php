<?php
class DBConnection{
	function getConnection(){
	  //change to your database server/user_name/pass
		mysql_connect("us-cdbr-iron-east-03.cleardb.net","b93aa055892ff0","a2da8580") or
         die("Could not connect: " . mysql_error());
    //change to your database name
		mysql_select_db("heroku_2dba9b3d9ee490e") or
		     die("Could not select database: " . mysql_error());
	}
}
?>
