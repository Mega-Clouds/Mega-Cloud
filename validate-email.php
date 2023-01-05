<?php

$connection = require __DIR__ . '/database-connection.php';

$select = sprintf("SELECT * FROM estate WHERE email = '%s'", mysqli_real_escape_string($connection, $_GET['email']));

$result = mysqli_query($connection, $select);

$is_available = mysqli_num_rows($result) === 0;	// I think we intentionally set it to false to use it to refuse a second usage.		
header("Content-Type: application/json");		// Converting the rest of the program into a JSON file format.

echo json_encode(["It_dey" => $is_available]);	// Returns false in our JSON data. Remember. I was the one who set it to false.
												// Not that it was initially false coz the requested info exists in the database. 