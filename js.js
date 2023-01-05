$(function() {
			$('.fa-bars').on('click', function(e) {
				e.preventDefault();
				$('nav').toggleClass('active');
			});

		});

		// Dropdowns
		$(function() {
			$('.main li').hover(function() {
				$('>ul.sub', this).slideDown(100);
			}, function() {
				$('>ul.sub', this).slideUp(100);
			});
		});

		$(function() {
			$('#main2').hover(function() {
				$('>ul.sub', this).slideToggle(100).delay();
			});
		})

		$(function() {
			$('.main3').hover(function() {
				$('#regist').slideToggle(300);
			})
		});

		let texts = [
			'<h2>This is one</h2>This will take your life experience so into what you want it to become.<br> A Splendid experience</p>',
			'<h2>222</h2><p>Sell your properties to the perfect person in town.<br> A Splendid experience</p>',	
			'<h2>333</h2><p>sdfndskjfsdufuisdfuidfas.<br> A Splendid experience</p>'
		];
		let dbox = $('.fad-text');
		let i = 0;
		setInterval(function() {
			i = (i + 1) % texts.length;
			$(function() {
				dbox.fadeOut(2000, function() {
					dbox.html(texts[i]).fadeIn(2000);
				});
			});
		}, 3000);


// THE REGISTRATION JS CODES
	function register() {
		$(function() {
			var firstname = $('input[name=firstname]').val();
			var lastname = $('input[name=lastname]').val();
			var email = $('input[name=emailr]').val();
			var password = $('input[name=passwordr]').val();

			if (firstname != '' && lastname != '' && email != '' && password != '') {
				formInfo = {firstname: firstname, lastname: lastname, email: email, password: password};
				$('#message').html('<p style="color: orange;">Processing ... please wait ...</p>');
				$.ajax({
					url: 'process.php',
					type: 'POST',
					data: formInfo,
					success: function(reply) {
						var res = JSON.parse(reply);
						console.log(res);
						if (res.success == true) {
							window.location.replace('index.php');
						} else if(res.success == false) {
							$('#message').html('<p style="color: red;">Email already taken</p>');
						}
			
					}
				});
			} else {
				$('#message').html('<p style="color: crimson;">Please Fill out all the Fields.</p>');
			}
		});
	}

// THE LOGIN JS CODES


function login() {
	var email = $('input[name=emaile').val();
	var password = $('input[name=passworde').val();
	if (email != '' && password != '') {
		formInfor = {email: email, password: password};
		$.ajax({
			url: 'process-login.php',
			type: 'POST',
			data: formInfor,
			success: function(rep) {
				var re = JSON.parse(rep);		// re here now holds the value 
				console.log(re);
				if (re.success == 200) {		// This == is s a checker and not an assigner.
					window.location.replace('index.php');  // Remember. This JS is just a messenger.
				} else if(re.success == 201) {
					$('#message-lg').html('<p id="warning">E-mail and password must match.</p>')
				} else if(re.success == 300) {
					$('#message-lg').html('<p id="warning">Invalid E-mail! Please check email again or <a href=\'register.html\'>Sign Up.</a></p>');
				}
			}
		});
	} else {
		$('#message-lg').html('<p id="warning">Please fill out the form.</p>')
	}
}





// THE PROFILE PAGE STUFFS START HERE

$(function () {
	$rent = '<div id="rent-photos-box"><div><h2>My Rent Images</h2></div><div class="the-pixes"></div><div class="the-pixes"></div><div class="the-pixes"></div><div class="the-pixes"></div><div class="the-pixes"></div><div class="the-pixes"></div></div>';
	$upload = '<div class="upload-form-box">' + 
					'<h1>Upload Form</h1>'+
					'<form action="process-upload.php" method="POST" enctype="multipart/form-data">' +
						'<div class="lg-in red-box">' +
							'<div class="straight-box" id="house-name">' +
								'<input type="text" name="home-type" placeholder="Upload Home-type (eg. 4-bedroom bungalow)" required>' +
							'</div>' +
						'</div>' +
						'<div class="lg-in red-box">' +
							'<div class="straight-box" id="house-name">' +
								'<input type="text" name="home-address" placeholder="Enter Home Address (eg. No. 15 Aliza, texas)" required>' +
							'</div>' +
						'</div>' +
						'<div class="lg-in red-box">' +
							'<div class="straight-box inp-file" id="house-name">' +
								'<input id="mix" type="file" name="image"  placeholder="Please select a file" name="image" required>' +
							'</div>' +
						'</div>' +
						'<img src="#" width="200" height="200" id="myImage">' +
						'<div>' +
							'<textarea type="textarea" name="home-details" placeholder="Enter Detailed Description" required></textarea>' +
						'</div>' +
						'<div class="lg-in red-box">' +
							'<div class="straight-box" id="house-name">' +
								'<input id="upload-btn" type="submit" value="Upload Details" name="submit">' +
							'</div>' +
						'</div>' +
					'</form>' +
				'</div>';	


	$('#drent').on('click', function() {
		$('#photo-box').empty();
		$('#photo-box').html($rent);
	})

	$('#uploader').on('click', function() {
		$('#photo-box').empty();
		$('#photo-box').html($upload);
	})

	$("body").delegate("#mix", "change", (function() {
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#myImage').attr('src', e.target.result).width(200).height(150);
			}
			reader.readAsDataURL(this.files[0]);
		}
	}));


// FOR PROFILE IMAGE UPLOAD

	$('#pf-image').on('change', function() {
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.pf-image').attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		}



		fetch('profile-photo.php', {
			method: 'POST',
			body: new FormData(document.getElementById('pfForm'))
		}).then(function(response) {
			var res = response.json();
			console.log(res);
			if (res.success = true) {
				$('#img').html('<p style="color: lightgreen;">Upload was Successful</p>');
			}
		});
	});
});









// THE BLOG POST HOLDER

$(function() {

	$('#create-post').on('click', function() {
		$('#boxing').removeClass('d_none');
		$('#boxing').addClass('d_block');
		
		function noScroll() {
			window.scrollTo(0, 0);
		}
		window.addEventListener("scroll", noScroll);

	});

	$('#login').on('click', function() {
		$('#login-code').removeClass('d_none');
		$('#login-code').addClass('d_block');

		window.addEventListener("scroll", function() {
			window.scrollTo(0, 0);
		});
	});
});

