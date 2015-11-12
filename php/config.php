<?php
	$db_username = 'root';
	$db_password = 'root';
	$db_name = 'tp1';
	$db_host = 'localhost';
	//$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

	try {
		$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
?>