<?php

	errror_reporting( ~E_DEPRECATED & ~E_NOTICE );
	define('DBHOST', 'us-cdbr-iron-east-03.cleardb.net');
	define('DBUSER', 'b93aa055892ff0');
	define('DBPASS', 'a2da8580');
	define('DBNAME', 'users');

	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 	$dbcon = mysql_select_db(DBNAME);
 
 	if ( !$conn ) {
  		die("Connection failed : " . mysql_error());
 	}
 
 	if ( !$dbcon ) {
  		die("Database Connection failed : " . mysql_error());
	}
?>
	
