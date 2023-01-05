<?php
	session_start();
	$conn = require_once('./db-connection.php');
	if (!$conn) {
		die(mysqli_error());
	}

	$home_type = mysqli_real_escape_string($conn, $_POST['home-type']);
	$home_address = mysqli_real_escape_string($conn, $_POST['home-address']);
	$image = $_FILES['image'];
	$home_details = mysqli_real_escape_string($conn, $_POST['home-details']);

	if ($image) {
		$filename = $image['name'];
		$server_tmp_name = $image['tmp_name'];
		echo "$filename<br>" . $image['error'] . "<br>" . $image['type'] . "<br>" . $server_tmp_name . "<br>";
		$filename_separate = explode('.', $filename);
		print_r($filename_separate);
		echo "<br>";
		$file_extension = strtolower($filename_separate[1]);
		print_r($file_extension);
		echo "<br>";
		$extensions = array("jpeg", "jpg", "png");

		if (in_array($file_extension, $extensions)) {
			$destination = "images/uploads/" . $filename;
			$move = move_uploaded_file($server_tmp_name, $destination);

			$select = "SELECT * FROM customers WHERE id =" . $_SESSION['user_id'];
			$result = mysqli_query($conn, $select);
			$user = mysqli_fetch_assoc($result);
			if (isset($_POST['submit']) && (isset($home_type) && $home_type != '') && (isset($home_address) && $home_address != '') && (isset($image) && $image != '') && (isset($home_details) && $home_details != '')) {
				$id = $_SESSION['user_id'];
				$lastname = $user['lastname'];	

				$insert = "INSERT INTO customer_images(id_holder, lastname_holder, home_type, home_address, image, home_details) VALUES
				(?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);   		// Preparing the connection for passing user inputs.
					if (!mysqli_stmt_prepare($stmt, $insert)) {	// For escaping malicious characters from the user input.
						die("Mysqli error: " . mysqli_error($conn));
					} elseif($stmt->bind_param('ssssss', $id, $lastname, $home_type, $home_address, $destination, $home_details)) {
					$result = mysqli_execute($stmt);

					if ($result) {
						 header("Location: profile.php");
					} else {
						echo "Not Done!";
					}

				}
			}
		}
	}

	
?>