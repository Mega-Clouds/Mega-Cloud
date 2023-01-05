<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$conn = require __DIR__ . "/db-connection.php";

	$response = array('success' => 300);
	$email = $_POST['email'];			// From formInfor.
	$password = $_POST['password'];		// From formInfor.
	if (isset($email) && $email != '' && isset($password) && $password != '') {
		$select = sprintf("SELECT * FROM customers WHERE email = '%s'", mysqli_real_escape_string($conn, $email));
		$result = mysqli_query($conn, $select);			// Remember that this line is used to execute the just above code. 
		$user_infos = mysqli_fetch_assoc($result);		// For fetching other details related to the input.
		if ((mysqli_num_rows($result) != 0) && password_verify($password, $user_infos['password_hash'])) {	
			session_start();
			$_SESSION['lastname'] = $user_infos['lastname'];
			$_SESSION['user_id'] = $user_infos['id'];		
			$response['success'] = 200;				// This line is used for connecting to the JavaScript AJAX. 
			echo json_encode($response);
		} else if((mysqli_num_rows($result) != 0) && !password_verify($password, $user_infos['password_hash'])) {
			$response['success'] = 201;				// This line is used for connecting to the JavaScript AJAX. 
			echo json_encode($response);
		} elseif(mysqli_num_rows($result) == 0) {
			$response['success'] = 300;	 
			echo json_encode($response);
		}
	} 
}



?>