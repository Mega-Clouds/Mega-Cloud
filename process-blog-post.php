<?php

session_start();
$conn = require_once('db-connection.php');

$success = array('success' => false);
if (isset($_SESSION['user_id'])) {
	$select = 'SELECT * FROM customers WHERE id = ' . $_SESSION['user_id'];
	$result = mysqli_query($conn, $select);
	$row = mysqli_fetch_assoc($result);
	$id = $row['id'];

	if (isset($_POST['submitt']) && ($id == $_SESSION['user_id'])) {
		$title = $_POST['title'];
		$author = $_POST['author'];
		$image = $_FILES['postimage'];
		$name = $image['name'];
		// Uploading The Image File
		$destination = "images/blog/" . $name; 
		$filename = $image['tmp_name'];
		$upload = move_uploaded_file($filename, $destination);
		$desc = $_POST['describe'];

		$insert = 'INSERT INTO posts(id_holder, title, author, post_image, post_desc) VALUES(?, ?, ?, ?, ?)';
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $insert)) {
		 	die('Mysqli Error: ' . mysqli_error($conn));
		} elseif ($stmt->bind_param('sssss',$id, $title, $author, $destination, $desc)) {
		 	$result = mysqli_execute($stmt);

			$success['success'] = true;
			echo json_encode($success);
			header('Location: index.php');
		}
	}
}

?>