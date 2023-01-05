<?php

	if (isset($_POST['search']) OR (($_POST['house-search']) !== '') OR (($_POST['house-search']) == '')) {
		$conn = require_once('db-connection.php');
		$house_search = $_POST['house-search'];
	
		$select = "SELECT * FROM customer_images WHERE home_type LIKE '%$house_search%' OR home_address LIKE '%$house_search%' OR 
		home_details LIKE '%$house_search%'";
		$result = mysqli_query($conn, $select);
		$num_rows = mysqli_num_rows($result);
	}
		
?>



<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="style.css?2022.08.11.08:45">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="search-container">	
		<div class="topp">
			<div class="top-up">
				<div id="top-l">
					<div class="about-logo">								<!-- The Logo -->
						<div class="logo-actual" id="home-logo-box"><a href=""><img src="main-logo.png"></a></div>
					</div> 
					<button class="home-btn"><a href="index.php"><span><i class="fa fa-home"></i></span> Home</a></button>
				</div>
				<div id="top-r">
					<button>Contact Us</button>
					<button>SIgn In</button>
				</div>
			</div>

			<div class="top-b">
				<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
					<div id="search-b">
						<input id="ser" type="text" name="house-search" placeholder="Enter Your Desired Home Details Here Please">
						<span><i name="search" class="fa fa-search"></i></span>
					</div>
				<label for="ser"><?php echo "Returned <b>" . $num_rows . "</b> results for \"" . $house_search . "\"."; ?></label> 
				</form>
			</div>

		</div>
		<div class="below">
		<?php
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['id_holder'];
				$home_type = $row['home_type'];
				$home_address = $row['home_address'];
				$home_image = $row['image'];
				$home_details = $row['home_details'];

				echo '<div class="box-hs box-hs-profile">								
				<img class="image" src="' . $home_image . '"/>									
				<div class="desc">
				<div class="desc-add">
					<div class="desc-head"><h4>' . $home_type . '</h4></div>
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
		?>
		</div>
	</div>	

	
</body>
</html>
