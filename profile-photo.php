<?php 

	session_start();
	$conn = require_once('db-connection.php');

	$stuff_s = array('success' => false);
	$stuff_u = array('update' => 404);
	$image = $_FILES['pfImage'];
	$filename = $image['name'];
	$destination = "images/profile/" . $filename;
	move_uploaded_file($image['tmp_name'], $destination);

	$id = $_SESSION['user_id'];
	echo "$id<br>";

	$select = "SELECT * FROM pf_images WHERE id_holder = $id";
	$sel_res = mysqli_query($conn, $select);
	$num_row = mysqli_num_rows($sel_res);
	echo "$num_row";

	if ($num_row == 0) {
		$insert = "INSERT INTO pf_images(id_holder, image) VALUES(?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $insert)) {
			die('404 not found! :' . mysqli_error($conn));
		} elseif ($stmt->bind_param('ss', $id, $filename)) {
			$result = $stmt->execute();
			if ($result) {
			 	$stuff_s['success'] = true;
			 	echo json_encode($stuff);
			}
		}
	} elseif ($num_row == 1) {
	 	$update = "UPDATE pf_images SET image = ? WHERE id_holder = $id";
	 	$stmt1 = mysqli_stmt_init($conn);
	 	if (!mysqli_stmt_prepare($stmt1, $update)) {
	 		die('404 not found! :' . mysqli_error($conn));
	 	} elseif ($stmt1->bind_param('s', $filename)) {
	 		$result1 = $stmt1->execute();
	 		if ($result1) {
	 			$stuff_u['update'] = 200;
	 			echo json_encode($stuff_u);
	 		}
	 	}
	 	// $upd_res = mysqli_query($conn, $update);
	 	// $row = mysqli_fetch_assoc($upd_res);
	 	// print_r($row);
	 }

	 

	
	

?>