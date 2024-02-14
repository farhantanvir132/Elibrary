<?php
session_start();
include('dbcon.php');
function img_upload($img)
{

	$tmp_location = $img['tmp_name'];
	$img_name = random_int(111, 999) . $img['name'];
	$new_location = UPLOAD_SRC . $img_name;
	if (!move_uploaded_file($tmp_location, $new_location)) {

		header("location:profile.php?alert=img_upload");

		exit;
	} else {
		return $img_name;
	}
}
$email = $_SESSION['email'];
if (isset($_POST['submit'])) {
   $userPicture = img_upload($_FILES['user_picture']);
   $query = "UPDATE `users` SET `user_picture`='$userPicture' WHERE `email`='$email'";

   if(mysqli_query($con,$query)){
	echo<<<print
	<script>
	alert("Profile Picture has been changed Successfully");
	window.location.href="profile.php?";
	</script>
	print;
   }
   else{
    header("location:setting.php?alert=Failed");
   }
   $_SESSION['user_picture'] = $userPicture;
   
}
	
else {
	$errorMsg = "Failed to upload user picture.";
}
$profile_picture_url = 'img/' . $_SESSION['user_picture'];
?>




<!DOCTYPE html>

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>E-Library</title>
	<link rel="stylesheet" href="index.css" />
	<link rel="stylesheet" href="profile.css" />
	<!-- <link rel="stylesheet" href="action.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



	<!-- <link rel="stylesheet" href="pre.css"> -->




	<script src="https://kit.fontawesome.com/90ec6e164b.js" crossorigin="anonymous"></script>


	<style>
		header {
			width: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			background-size: cover;
			background-repeat: no-repeat;

		}

		.pro {
			position: relative;
			display: flex;
			flex-direction: row;
			transform: translateY(50%);
			margin-bottom: 200px;
			margin-left: 500px;



		}

		.normaldiv {
			margin-left: 50px;
			margin-top: -8px;
			font-size: 20px;
		}

		.normaldiv h1 {
			font-size: 30px;
			font-weight: bold;
			margin-bottom: 20px;


		}

		.normaldiv span {

			font-weight: bold;

		}

		.normaldiv p {
			margin-top: 30px;
			/* justify-content: center; */
			/* text-align: center; */
			font-size: 28px;
			font-weight: 600;

		}

		input[type="submit"] {
			font-size: 20px;
			margin-left: 0px;
			padding: 10px 20px;
			background-color: #1f283b;
			border: 1px solid #e33058;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: 0.5s;
		}

		input[type="submit"]:hover {
			background: #CA0832;
		}

		.pass {
			display: flex;
			flex-direction: column;
		}

		.pass label {
			display: flex;
			align-items: center;
			/* justify-content: flex-end; */
			margin-bottom: 5px;
			width: 40%;
		}

		.pass input {
			flex: 1;
			width: 40%;
		}
		.profile-image {
    width: 50px;
    height: 50px;
    background-image: url('icons/profile.png');
    background-repeat: no-repeat;
    background-size: cover;
    text-indent: -9999px;
  }
  .profile-image::after {
    content: "Profile Picture";
    display: inline-block;
    width: 50px;
    height: 50px;
    background-image: url('icons/profile.png');
    background-repeat: no-repeat;
    background-size: cover;
    text-indent: -9999px;
  }

  .profile-image1 {
    width: 45px;
    height: 45px;
    background-image: url('icons/profile.png');
    background-repeat: no-repeat;
    background-size: cover;
    margin-left: 20px;
    text-indent: -9999px;
  }
  .profile-image1::after {
    content: "Profile Picture";
    display: inline-block;
    width: 50px;
    height: 50px;
    background-image: url('icons/profile.png');
    background-repeat: no-repeat;
    background-size: cover;
    margin-left: 20px;
    text-indent: -9999px;
  }
  .profile-image2 {
    width: 150px;
    height: 150px;
    background-image: url('icons/profile.png');
    background-repeat: no-repeat;
    background-size: cover;
    margin-left: 20px;
    text-indent: -9999px;
  }
  .profile-image2::after {
    content: "Profile Picture";
    display: inline-block;
    width: 50px;
    height: 50px;
    background-image: url('icons/profile.png');
    background-repeat: no-repeat;
    background-size: cover;
    margin-left: 20px;
    text-indent: -9999px;
  }
	</style>

</head>

<body>
	<header>
		<div class="nav-section">
			<h2>E<span>-Library</span></h2>
			<nav class="navbar">
				<ul class="nav-links">
					<li><a href="index1.php">Home</a></li>
				</ul>
				<div id="userProfile" class="hidden">
					<img src="<?php echo $profile_picture_url; ?>" alt=""class="profile-image1" class="user-pic" onclick="togglemenu()">
					<div class="sub-menu-wrap" id="subMenu">
						<div class="sub">
							<div class="user-info">
								<img src="<?php echo $profile_picture_url; ?>" alt=""class="profile-image">
								<h3><?php echo $_SESSION['username']; ?></h3>
							</div>
							<hr>
							<a href="setting.php" class="sub-link">
								<img src="./book img/profile.png" alt="">
								<p>Profile setting</p>
								<span> ></span>
							</a>
							<a href="logout.php" class="sub-link">
								<img src="./book img/logout.png" alt="">
								<p>LogOut</p>
								<span> > </span>
							</a>


						</div>
					</div>
				</div>

			</nav>
		</div>
	</header>


	<form method="post" enctype="multipart/form-data">
		<div class="pro">
			<div class="imgdiv">
				<img src="<?php echo $profile_picture_url; ?>"alt="" class="profile-image2" width="200" height="200">
			</div>
			<div class="normaldiv">
				<label>Upload Profile Picture:</label>
				<form method="post"enctype="multipart/form-data">
				<input type="file" name="user_picture" required>
				<input type="submit" name="submit" value="Upload">
	</form>
				<div class=" pass">
					 <P>Change Password</P>
					 <form method="post"action="conpassuser.php">
					<label>Current Password:</label>
					<input type="password" name="cpassword"><br>
					<label>New Password:</label>
					<input type="password" name="npassword"><br>
					<input type="submit" name="submit123" value="Change">
</form>
				</div>
			</div>
		</div>
	</form>


	<br><br><br><br><br><br><br>

	<footer>
		<div class="mainfooter">
			<div class="social-media-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>

			</div>
			<div class="copyright">
				<p>Copyrights@2023 FAA. All rights reserved</p>
			</div>
		</div>
		<div class="circle">
			<h2>E<span>-Library</span></h2>
			<p><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka,Bangladesh</p>
			<p><i class="fa fa-phone" aria-hidden="true"></i> 0123456789</p>
		</div>



	</footer>

	<!-- <script src="index.js"></script> -->
	<script>
		let submenu = document.getElementById("subMenu");

		function togglemenu() {
			submenu.classList.toggle("open-menu");
		}
	</script>
</body>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>