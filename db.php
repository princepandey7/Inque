<?php
	//set timezone
	date_default_timezone_set("Asia/Kolkata");

	//database credentials
	define('DBHOST','localhost');
	define('DBUSER','root');
	define('DBPASS','');
	define('DBNAME','inque');


	// define('DBHOST','localhost');
	// define('DBUSER','inque');
	// define('DBPASS','71{zt#!LTxWF');
	// define('DBNAME','inque');

	//application address
	define('DIR','http://localhost/Inque/');
	// define('DIR','http://inque.co.in/beta/');

	try {
		$conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
    }
	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }

	include_once 'connect.php';
	$connection = new Connect($conn);

?>