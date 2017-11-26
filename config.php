<?php 

// directory
define( "ROOT_DIR", __DIR__ . "/" );

// files
define( "DB_CONNECT", ROOT_DIR . "db_connection.php" );

//database constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

// client body message
define('CLIENT_MESSAGE', array(
		// informational
		1001 => "user not found",
		1002 => "user already created",
		1003 => "action unavailable",
		// success
		2001 => "registration successful",
		2002 => "login successful",
		// client error
		4001 => "invalid email",
		4002 => "invalid password",
		4003 => "invalid email and password",
		4005 => "password is incorrect"
	)
);

