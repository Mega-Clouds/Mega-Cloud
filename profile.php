<?php

	session_start();
	$conn = require_once('db-connection.php');

	$select = "SELECT * FROM pf_images WHERE id_holder=" . $_SESSION['user_id'];
	$result = mysqli_query($conn, $select);
	$row = mysqli_fetch_assoc($result);
	if ($row != '') {
		$id = $row['id_holder'];
		$pf_image = $row['image'];
	} else {
		$id = '';
		$pf_image = '';
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome <?php echo $_SESSION['lastname'] ?></title>
	<link rel="stylesheet" type="text/css" href="style.css?2022.08.11.08:40">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>

	<div class="profile-container">
		<div class="bg-img"></div>
		<div class="m42">
			<div class="profile-info">
				<?php if($_SESSION['user_id'] == $id): ?>
					<img class="pf-image" src="<?php echo "images/profile/" . $pf_image ?>">
				<?php else: ?>
					<img class="pf-image" src="default-profile-photo.png">
				<?php endif; ?>
					<form id="pfForm" method="POST" enctype="multipart/form-data">	
						<label for="pf-image"><i class="fa fa-plus"></i></label>
						<input type="file" name="pfImage" id="pf-image" class="hidden">
					</form>
				<span id="msg"></span>
				<div class="pf-name">
					<?php echo "<h2>Hi " . $_SESSION['lastname'] . "</h2>" ?>
					<h4>UI/UX Developer</h4>
					<p>Write your description here</p>
				</div>
				<div class="pf-name"></div>
			</div>
			<div class="profile-details">
				<div class="ph-links">
					<nav>
						<ul>
							<li class="uploads-link" id="drent">For Rent</li>
							<li class="uploads-link" id="dsale">For Sale</li>
							<li class="uploads-link">My Uploads</li>
							<li class="uploads-link act" id="uploader">Upload Form</li>
						</ul>
					</nav>
				</div>
				<div id="photo-box">
					<h2>Homes For Sale</h2>
					<div id="sale-photos-box">
						<?php 
							$select = "SELECT * FROM customer_images WHERE id_holder =" . $_SESSION['user_id'] ;
							$result = mysqli_query($conn, $select);
							$num_rows = mysqli_num_rows($result);


							if ($num_rows == 0) {
								echo "No Uploads Yet!";
							} else {
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id_holder'];
									$home_type = $row['home_type'];
									$home_address = $row['home_address'];
									$home_image = $row['image'];
									$home_details = $row['home_details'];

									if($_SESSION['user_id'] === $id) {
										echo '<div class="box-hs box-hs-profile">								
										<img class="image" src="' . $home_image . '"/>									
										<div class="desc">
										<div class="desc-add">
											<div class="desc-head"><h4><a href="display.php?home_details=' . $home_details . '">' . $home_type . '</a></h4></div>
											<div class="address"><p>' . $home_address . '</p></div>
										</div>
										<div class="details">
											<div class="det-left">
												<div><p>' . $home_details . '</p></div>
												<!-- <div>This is Good</div> -->
											</div>
											<div class="det-right">
												<div><p>This is Awesome</p></div>
												<!-- <div>This is Good</div> -->
											</div>
										</div>
										<hr>
										<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
										</div>
										</div>';
									}							
								} 
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="jquery-3.6.0.js"></script>
<script src="js.js"></script>
</body>
</html>