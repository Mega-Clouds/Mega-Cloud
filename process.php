<?php
$conn = require __DIR__ . '/db-connection.php';

$result = array('success' => false);
if (isset($_POST['firstname']) && $_POST['firstname'] != '' && isset($_POST['lastname']) && $_POST['lastname'] != ''
&& isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['password']) && $_POST['password'] != '' ) {

								// INSERT MY VALUES INTO THE CREATED TABLE
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	// Working on my password
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$insert_form = "INSERT INTO customers(firstname, lastname, email, password_hash) VALUES(?, ?, ?, ?)";

	$stmt = mysqli_stmt_init($conn);   		// Preparing the connection for passing user inputs.
	if (!mysqli_stmt_prepare($stmt, $insert_form)) {	// For escaping malicious characters from the user input.
		die("Mysqli error: " . mysqli_error($conn));
	}
	elseif($stmt->bind_param('ssss', $firstname, $lastname, $email, $password)) {
		if (mysqli_execute($stmt)) {
			$select_from = sprintf("SELECT * FROM customers WHERE email = '%s'", mysqli_real_escape_string($conn, $email));
			$reslt = mysqli_query($conn, $select_from);
			$user = mysqli_fetch_assoc($reslt);
			session_start();
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['lastname'] = $user['lastname'];
			$result['success'] = true;
			echo json_encode($result);
		} elseif(mysqli_errno($conn) === 1062) {	// This 1062 returns when it detects a duplicate value for a unique column.
			$result['success'] = false;
			echo json_encode($result);
		}
	}	
}

?>