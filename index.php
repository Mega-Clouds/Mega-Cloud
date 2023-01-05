<?php

	session_start();
	$conn = require_once('db-connection.php');

	


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Estancy</title>
	<link rel="stylesheet" type="text/css" href="style.css?2022.08.11.08:49">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="wrap-it">
		<div class="main-container">
			<div class="top-address">
				<div id="top-address-box">
					<div class="top-address-left">
						<span><i class="fa fa-map-marker"></i> &nbsp;S Missouri St, Indianapolis, IN 46225, USA </span> &nbsp; &nbsp; &nbsp; &nbsp;
						<span><i class="fa fa-phone"></i> &nbsp;+009 45756234</span>
					</div>

					<div class="top-address-right">
						<b>Like Us On :</b>
						<li><a class="fa fa-facebook" href=""></a></li>
						<li><a class="fa fa-twitter" href=""></a></li>
						<li><a class="fa fa-instagram" href=""></a></li>
						<li><a class="fa fa-whatsapp" href=""></a></li>
						<li><a class="fa fa-phone" href=""></a></li>
					</div>
				</div>
			</div>
			
			<div class="header-container">
				<header class="about-header-social">
					<div class="about-logo" id="home-logo">								<!-- The Logo -->
						<div class="logo-actual" id="home-logo-box"><a href=""><img src="main-logo.png"></a></div>
					</div>

					<nav id="home-nav">
						<ul class="main">
							<li class="active"><a id="active-color" href="index.html"><span><i class="fa fa-home"> </i> </span> Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li>
								<a href="#">Listings <span><i class="fa fa-caret-down all-good"></i></span></a>
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
							<li><a href="service.php">Services</a></li>

							<?php if(isset($_SESSION['user_id'])): ?>
								<li>
									<a>Blog <span><i class="fa fa-caret-down all-good"></i></span></a>
									<ul class="sub">
										<li>
											<a id="create-post">Create</a>						
										</li>
										<li>
											<a href="blog.php">View</a>						
										</li>
									</ul>
								</li>
							<?php elseif(!isset($_SESSION['user_id'])): ?>
								<li><a href="blog.php">Blog</a></li>
							<?php endif; ?>

							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>

					<div class="btn-box" id="home-btn-box">
						<div class="myaccount-btn">
							<?php if(isset($_SESSION['user_id'])): ?>		
							<?php

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
								<div id="main2" class="user-mat">
									<div class="p-image">
										<?php if($_SESSION['user_id'] == $id1): ?>
											<img id="source" src="<?php echo "images/profile/" . $pf_image1; ?>">
										<?php elseif($_SESSION['user_id'] != $id1): ?>
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
										<li id="regist"><a href="register.html">Sign Up</a>&nbsp; | &nbsp;<a id="login">Sign In</a></li>
									</li>
								</ul>
							</div>
							<?php endif; ?>
						</div>	
					</header>
				<span class="d-ba"><i class="fa fa-bars"></i></span>
			</div>
		</div>


	 <!-- THE TEXT FADER AND SEARCH AREA -->

		<div class="container">
			<div class="search-fad">
				<div class="fad">
					<div class="fad-text">
						<h2>This is one</h2>
						<p>This will take your life experience so into what you want it to become.<br> A Splendid experience</p>
					</div>
				</div>			
			</div>
		</div>
		<div class="down-search">
			<div id="search-box">
				<form action="search.php" method="POST">
					<div class="input-label">Find Your House Or Property</div>
					<input id="search-input" type="text" name="house-search" placeholder="Enter Your Search Details Here" required>
					<input type="submit" value="Search" name="search">
				</form>
			</div>

			<div class="home-about-us">
				<h4>WELCOME TO THE</h4>
				<h2>Best Real Estate Agency</h2>
				<p>
					Estancy is a full-service, luxury real estate brokerage and lifestyle company representing clients worldwide in a broad spectrum of classes, including residential, new development, resort real estate, residential leasing and luxury vacation rentals. Since our inception in 2011, we have redefined the business of real estate, modernizing and advancing the industry by fostering a culture of partnership, in which all clients and listings are represented by our agents.
				</p>
				<div id="home-about-link" class="read-more">
					<a href="about.html"><input type="submit" value="More About Us"></a>
				</div>
			</div>
		</div>

	<!-- THE BANNER ENDS HERE AND SERVICES BEGIN -->

		<section>
			<div class="neighbourhood-container">
				<div class="services-head"><h1>Explore New Neighbourhoods</h1></div>
				<div class="services">
					<div class="box">
						<iframe width="450"height="250"frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAblu_hetYzsBN2DSZfSOgn4XAKe6tycvw&q=Eiffel+Tower,Paris+France" allowfullscreen>
						</iframe>
					</div>
					<div class="box"></div>
					<div class="box"></div>
					<div class="box hidden"></div>
				</div>
			</div>

	<!-- THE HOUSE CONTAINER -->

			<div class="hs-container">
				<div class="services-head"><h1>Explore New Houses For Sale</h1></div>
				<div class="services">
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<hr>
				</div>
				<div class="services-head"><h1>Explore Recent Houses For Rent</h1></div>
				<div class="services">
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-hs">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
				</div>
			</div>

	<!-- THE PROPERTIES CONTAINER -->

			<div class="ps-container">
				<div class="services-head"><h1>Explore New Properties For Sale</h1></div>
				<div class="services">
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<hr>
				</div>
				<div class="services-head"><h1>Explore Properties For Rent</h1></div>
				<div class="services">
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
					<div class="box-ps">
						<div class="image">
							<div class="image-top">
								<div class="rent-box"><a href="#">RENT</a></div>
								<div class="sold-box"><a href="#">SOLD</a></div>
							</div>
						</div>
						<div class="desc">
							<div class="desc-add">
								<div class="desc-head"><h4>A Two Bedroom Flat.</h4></div>
								<div class="address"><p>No. 2 Offiaku Street, Eke Awka Avenue.</p></div>
							</div>
							<div class="price"><p><strike>$29,000/mo</strike> $26,000/mo</p></div>
						</div>
					</div>
				</div>
			</div>
			<br><br><br><br><br>
		</section>

	<!-- THE WANNA BUY AND WANNA SELL SECTION -->

		<section>
			<div class="fixed-bg-image">
				<div class="the-three">
					<div class="one">
						<div class="fore"></div>
						<a href="">
							<div class="enlight">
								<h3>Looking for the new home?</h3>
								<p>10 new offers everyday. 350 offers on site, trusted by a community of thousands of users</p>
							</div>
						</a>
					</div>
					<div class="two">
						<div class="fore"></div>
						<a href="">
							<div class="enlight">
								<h3>Looking for the new home?</h3>
								<p>10 new offers everyday. 350 offers on site, trusted by a community of thousands of users</p>
							</div>
						</a>
					</div>
					<div class="three">
					<div class="fore"></div>
					<a href="#">
						<div class="enlight">
							<h3>Want to sell your home?</h3>
							<p>10 new offers everyday. 350 offers on site, trusted by a community of thousands of users</p>
						</div>
					</a>
				</div>
				</div>
			</div>
		</section>

	<!-- THE WHY CHOOSE US SECTION -->

		<section>
			<div class="why-choose-container">
				<div class="why-head"><h1>Why Choose Us</h1></div>
				<div class="why-body">
					<div class="why-1">
						<div class="why-icon"></div>
						<div class="why-text">
							<h3>Trusted by Thousands</h3>
							<p>10 new offers every day. 350 offers on site, trusted by a community of thousands of users.</p>
						</div>
					</div>
					<div class="why-1">
						<div class="why-icon"></div>
						<div class="why-text">
							<h3>Wide Range of Properties</h3>
							<p>With a robust selection of popular properties on hand, as well as leading properties from real estate experts.</p>
						</div>
					</div>
					<div class="why-1">
						<div class="why-icon"></div>
						<div class="why-text">
							<h3>Financing Made Easy</h3>
							<p>Our stress-free finance department that can find financial solutions to save you money.</p>
						</div>
					</div>
				</div>
			</div>

			<!-- BECOME AN AGENT -->

			<div class="become-box">
				<div class="become-icon"></div>
				<div class="become-text">
					<h1>Become a Real Estate Agent</h1>
				</div>
				<div class="become-register">
					<a href=""><input type="button" id="btn1" value="REGISTER NOW"></a>
				</div>
			</div>
		</section>

	<!-- PARTNERSHIP LOGOS -->

		<section>
			<div class="partner-container">
				<div class="part-heading"><h1>Our Partners</h1></div>
				<div class="partners">
					<div id="i" class="boxes"><a href=""></a></div>
					<div id="ii" class="boxes"><a href=""></a></div>
					<div id="iii" class="boxes"><a href=""></a></div>
					<div id="iv" class="boxes"><a href=""></a></div>
				</div>
			</div>
		</section>

	<!-- THE FOOTER IS HERE -->

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
							<form>
								<input type="text" placeholder="Enter E-mail or Username">
								<input type="password" placeholder="Enter Password">
								<input type="submit" value="LOGIN">
							</form>
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
	</div>






<!-- THE LOGIN SECTION -->
<div id="login-code" class="login-container d_none">
	<div class="lg-body">
		<div id="lg-box">
			<div id="lg-box-head">
				<h3>LOGIN FORM</h3>
				<h6>Please Fill Out This Form To Login!</h6>
			</div>
			<form action="" method="POST">
				<div id="message-lg"></div>
				<div class="lg-in">
					<div class="straight-box">
						<span><i class="fa fa-envelope"></i></span><input type="email" name="emaile" placeholder="Enter Email" required>
					</div>
				</div>
				<div class="lg-in">
					<div class="straight-box">
						<span><i class="fa fa-lock"></i></span><input type="password" name="passworde" placeholder="Enter Password" required>
					</div>
				</div>
				<div class="lg-forg">
					<p><a href="">Forgot Password?</a></p>
				</div>
				<div class="lg-in">
					<div class="straight-box" id="lg-proper">
						<input onclick="login();" class="btn" id="btn-lg" type="button" value="Sign In" name="btn">
					</div>
				</div>
				<div id="div-first-lastname" class="signup-input-divs">
					<div class="first-lastname-box aye">
						<div id="first-lastname-box1"></div>
					</div>
					<div id="or">Or</div>
					<div class="first-lastname-box aye">
						<div id="first-lastname-box1"></div>
					</div>
				</div>
				<div class="lg-in">
					<div class="straight-box" id="lg-proper">
						<button class="btn" id="btn2" type="button" name="btn2"><img src="gn.png">Continue With Google</button>
					</div>
				</div>
				<div class="lg-in" style="margin-top: 8px;">
					<div class="straight-box" id="lg-proper">
						<button class="btn" id="btn3" type="button" name="btn3"><img src="f32.ico">&nbsp;&nbsp;Continue With Facebook</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>






<!-- THE CREATE BLOG POST SECTION -->

<div id="boxing" class="d_none">
	<div class="container-cr">
		<div class="contain">
			<div class="create-post-heading">
				<h3>Create New Post</h3>
			</div>
			<div class="create-post-body">
				<form action="process-blog-post.php" method="post" enctype="multipart/form-data" class="create-post-inner-body">
					<div class="sects">
						<p>Add your post details in the form below. They will be displayed on the main blog page.</p>
					</div>
					<div class="sects">
						<label for="doug">Title</label>
						<input id="doug" type="text" name="title" placeholder="Enter Post Title" required>
					</div>
					<div class="sects">
						<label for="doug">Author</label>
						<input id="doug" type="text" name="author" placeholder="Enter Author's name" required>
					</div>
					<div class="sect">
						<label for="mix">Post Main Image - (Click To Add Image)</label>
						<input id="mix" type="file" class="hidden" name="postimage" required>
						<img src="#" width="200" height="150" id="myImage">
					</div>
					<div class="sect no-line">
						<label id="de" for="de">Enter Detailed Description</label>
						<textarea name="describe" placeholder="Enter Your Detailed Decscription Here" id="de" required></textarea>
					</div>
					<div class="submiting">
						<input type="submit" name="submitt" value="Done">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="jquery-3.6.0.js"></script>
<script src="js.js"></script>
</body>
</html>