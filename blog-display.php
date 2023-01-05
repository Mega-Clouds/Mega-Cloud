<?php

	session_start();
	$conn = require_once('db-connection.php');

	if (isset($_GET['title'])) {						// The GET method is for getting the url.
		$basec = parse_url($_SERVER['REQUEST_URI']);	// This line makes the otten url readable by the page.
		$base = $basec['query'];						// This line runs the query.
		echo "$base";
		$separate = explode("=", $base);				// This line separates the values b/w equals signs. And returns or holds an array.
		$gig = $separate['1'];							// This is selecting the string after the equals sign.
		$replace_str = str_replace("%20", ' ', $gig);
		$select = sprintf("SELECT * FROM posts WHERE title = '%s'", mysqli_real_escape_string($conn, $replace_str));
		$result = mysqli_query($conn, $select);
		$row = mysqli_fetch_assoc($result);
	}

	$select1 = "SELECT * FROM pf_images WHERE id_holder=" . $_SESSION['user_id'];
	$result1 = mysqli_query($conn, $select1);
	$row1 = mysqli_fetch_assoc($result1);
	if ($row1 != '') {
		$id1 = $row1['id_holder'];
		$pf_image1 = $row1['image'];
	} else {
		$id1 = '';
		$pf_image1 = '';
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Estancy</title>
	<link rel="stylesheet" type="text/css" href="style.css?2022.08.11.08:44">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="main-container">
		<div class="top-address">
			<div id="top-address-box">
				<div class="top-address-left">
					<span><i class="fa fa-map-marker"></i> &nbsp;S Missouri St, Indianapolis, IN 46225, USA </span> &nbsp; &nbsp; &nbsp; &nbsp;
					<span><i class="fa fa-phone"></i> &nbsp;+009 45756234</span>
				</div>

				<div class="top-address-right">
					<li><a class="fa fa-facebook" href=""></a></li>
					<li><a class="fa fa-twitter" href=""></a></li>
					<li><a class="fa fa-instagram" href=""></a></li>
					<li><a class="fa fa-whatsapp" href=""></a></li>
					<li><a class="fa fa-phone" href=""></a></li>
				</div>
			</div>
		</div>
		<header class="about-header-social">
			<div class="about-logo" id="home-logo">								<!-- The Logo -->
				<div class="logo-actual" id="home-logo-box"><a href=""><img src="main-logo.png"></a></div>
			</div>

			<nav id="home-nav">
				<ul class="main">
					<li class="active"><a id="active-color" href="index.php"><span><i class="fa fa-home"> </i> </span> Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li>
						<a href="#">Listings <span><i class="fa fa-caret-down"></i></span></a>
						<ul class="sub">
							<li>
								<a href="">For Rent <span><i class="fa fa-caret-right"></i></span></a>
								<ul class="sub">
									<li><a href="">House</a></li>
									<li><a href="">Chairs</a></li>
									<li><a href="">House</a></li>
									<li><a href="">Chairs</a></li>
									<li><a href="">House</a></li>
									<li><a href="">Chairs</a></li>
								</ul>
							</li>
							<li>
								<a href="">For Sale</a>
							</li>
						</ul>
					</li>
					<li><a href="#">Address</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>

			<div class="btn-box" id="home-btn-box">
				<div class="myaccount-btn">
					<?php if(isset($_SESSION['user_id'])): ?>					
						<div id="main2" class="user-mat">
							<div class="p-image">
							<?php if($_SESSION['user_id'] == $id1): ?>
								<img id="source" src="<?php echo "images/profile/" . $pf_image1; ?>">
							<?php elseif($_SESSION['user_id'] == $id1): ?>
								<img id="source" src="default-profile-photo.png">
							<?php endif; ?>
							</div>
							<div class="p-name">
								<p><?php echo $_SESSION['lastname']; ?></p>&nbsp;&nbsp;
								<i class="fa fa-caret-down"></i>
							</div>
							<ul id="substy" class="sub">
								<li><a href="profile.php"><i class="fa fa-user">&nbsp;&nbsp;</i>View Profile</a></li>
								<li><a href=""><i class="fa fa-bell">&nbsp;&nbsp;</i>Notifications</a></li>
								<li><a href=""><i class="fa fa-archive">&nbsp;&nbsp;</i>Archive</a></li>
								<li><a href="logout.php"><i class="fa fa-sign-out">&nbsp;&nbsp;</i>Log out</a></li>
							</ul>
						</div>
					<?php else: ?>
						<ul class="main3">	
							<li>
								<button id="btn"><i class="fa fa-sign-in">&nbsp;&nbsp;</i>My Account</button>
								<li id="regist"><a href="register.html">Sign Up</a>&nbsp; | &nbsp;<a href="login.html">Sign In</a></li>
							</li>
						</ul>
					</div>
				<?php endif; ?>
			</div>	
		</header>

		<div class="mem-big"></div>





													<!-- THE BLOG POST DISPLAY -->

<?php

	$image = $row['post_image'];
	$title = $row['title'];
	$author = $row['author'];
	$post_desc = $row['post_desc'];

?>

		<div class="blog-contain-wrapper">
			<div class="blog-contain">
				<div class="blog-contain-inner">
					<div class="img-container">
						<img src="<?php echo($image); ?>">
					</div>
					<div class="date-display">
						<span><i class="fa fa-user"></i></span>
					</div>
					<div class="blog-big-heading">
						<h2><?php echo "$title"; ?></h2>
					</div>
					<div class="name-calender">
						<span><i class="fa fa-user"> &nbsp; <?php echo "$author"; ?></i> <i class="fa fa-car"></i></span>
					</div>
					<div class="d-paragraph">
						<p>
							<?php echo "$post_desc"; ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="mem-big"></div>
	</div>

	








	<!-- THE FOOTER IS NOW DISPLAYED -->

<footer>
		<div class="footer">
			<div class="foot-social">
				<div class="foot-icon"><h2>Logo</h2></div>
				<div class="social-icons">
					<ul>
						<li><a class="fa fa-facebook" href=""></a></li>
						<li><a class="fa fa-twitter" href=""></a></li>
						<li><a class="fa fa-instagram" href=""></a></li>
						<li><a class="fa fa-whatsapp" href=""></a></li>
						<li><a class="fa fa-phone" href=""></a></li>
					</ul>
				</div>
			</div>
			<div class="foot-body">
				<div class="foot-body-boxes">
					<div class="foot-headers"><h3>Popular Searches</h3></div>
					<div class="footlinks">
						<nav>
							<ul>
								<li><a href="">Apartment for rent</a></li>
								<li><a href="">Offices to Buy</a></li>
								<li><a href="">Lands for sale</a></li>
								<li><a href="">Marketing</a></li>
								<li><a class="footer-more" href="">More</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="foot-body-boxes">
					<div class="foot-headers"><h3>Cool Areas On Market</h3></div>
					<div class="footlinks">
						<nav>
							<ul>
								<li><a href="">Ziks Avenue Awka </a></li>
								<li><a href="">Las Vegas Apartment</a></li>
								<li><a href="">Sacramato Townhome</a></li>
								<li><a href="">Modern Villages</a></li>
								<li><a class="footer-more" href="">More</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="foot-body-boxes">
					<div class="foot-headers"><h3>Quick Links</h3></div>
					<div class="footlinks">
						<nav>
							<ul>
								<li><a href="">Ziks Avenue Awka </a></li>
								<li><a href="">Las Vegas Apartment</a></li>
								<li><a href="">Sacramato Townhome</a></li>
								<li><a href="">Modern Villages</a></li>
								<li><a class="footer-more" href="">More</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="foot-body-boxes">
					<div class="foot-headers"><h3>Login</h3></div>
					<div class="foot-login">
						<input type="text" placeholder="Enter E-mail or Username">
						<input type="password" placeholder="Enter Password">
						<input type="submit" value="LOGIN">
					</div>
				</div>
			</div>
			<div class="foot-links">
				<nav>
					<ul>
						<li><a href="">Home</a></li>
						<i> | </i> 
						<li><a href="">Address</a></li>
						<i> | </i>  
						<li><a href="">Blog</a></li>
						<i> | </i> 
						<li><a href="">Portfolio</a></li>
						<i> | </i> 
						<li><a href="">Listings</a></li>
					</ul>
				</nav>
			</div>
			<div class="foot-copyright">Copyright © 2022. <span>&nbsp;Real Estates&nbsp;</span> – Real Estate Website by The Right-People's ventures.</div>
		</div>
	</footer>
<script src="jquery-3.6.0.js"></script>
<script src="js.js"></script>
</body>
</html>