<?php
	//This sets off all errors for security purposes.
	error_reporting(0);


	//Define some constants.
	define( "DB_DSN", "mysql:host=localhost;dbname=codecalltut" ); //This constant is used as our connectionstring/dsn.

	define( "DB_USERNAME", "root" ); //The username of the database.
	define( "DB_PASSWORD", "" ); //The password of the database.
	define( "CLS_PATH", "class" ); //The class path of our project.
	
	//This includes the Users class.
	include_once( CLS_PATH . "/user.php" );

?>