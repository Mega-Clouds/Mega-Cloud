<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = '';

$conn = mysqli_connect($host, $user, $password, $db);


										// CREATE A NEW DATABASE

$sql_db = "CREATE DATABASE estate";

	if (mysqli_query($conn, $sql_db)) {
		echo "Database created successfully.<br>";
	} elseif (mysqli_connect_error()) {
		echo "Could not create a database :" . mysqli_connect_error($conn, $sql_db) . "<br>";
	}

										// CREATE A NEW TABLE

	$sql_table = 'CREATE TABLE customers(' . 
	'id INT NOT NULL AUTO_INCREMENT, ' . 
	'firstname VARCHAR(150) NOT NULL, ' . 
	'lastname VARCHAR(150) NOT NULL, ' .
	'email VARCHAR(150) NOT NULL UNIQUE, ' . 
	'password_hash VARCHAR(255) NOT NULL, ' . 
	'primary key (id))';

	mysqli_select_db($conn, 'estate');

	if(mysqli_query($conn, $sql_table)) {
		echo "table created";
	}

						// THE IMAGES TABLE

	$sql_image_tables = 'CREATE TABLE customer_images(' .
	'id_holder INT NOT NULL, ' .
	'lastname_holder VARCHAR(150) NOT NULL, ' .
	'home_type VARCHAR(255) NOT NULL, ' .
	'home_address VARCHAR(250) NOT NULL, ' .
	'image VARCHAR(255) NOT NULL, ' .
	'home_details VARCHAR(10000) NOT NULL)';

	mysqli_select_db($conn, 'estate');

	if(mysqli_query($conn, $sql_image_tables)) {
		// die(mysqli_error($conn));
	}

	$sql_profile_image_table = 'CREATE TABLE pf_images(' .
	'id_holder INT NOT NULL, ' .
	'image VARCHAR(255) NOT NULL)';

	mysqli_select_db($conn, 'estate');

	if(mysqli_query($conn, $sql_profile_image_table)) {
		// die(mysqli_error($conn));
	}


	$sql_post = 'CREATE TABLE posts(' .
	'id_holder INT NOT NULL, ' .
	'title VARCHAR(255) NOT NULL, ' .
	'author VARCHAR(255) NOT NULL, ' .
	'post_image VARCHAR(255) NOT NULL, ' .
	'post_desc VARCHAR(1000000) NOT NULL)';

	mysqli_select_db($conn, 'estate');

	if(mysqli_query($conn, $sql_post)) {
		// die(mysqli_error($conn));
	}


return $conn;

// Note that this works synchronously. For it to get to this point means that the above codes have ran.

?>