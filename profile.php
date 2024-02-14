<?php
session_start();
include('dbcon.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
	header("Location: index.php");
	exit();
}

$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$email = $_SESSION['email'];
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if(isset($_POST['subs30'])){
  if(isset($_POST['ammount1']) && $_POST['ammount1']==40){
	$expirationDate = date('Y-m-d', strtotime("+30 days"));
	$status=1;
  $type="Advanced";
	$stmt = $con->prepare("UPDATE users SET status=?, expiration_date = ?,type=? WHERE email = ?");
	$stmt->bind_param("isss",$status, $expirationDate,$type, $_SESSION['email']);
	$stmt->execute();

  $username=$_SESSION['username'];
  $type1="40$/7days Plan";
  $message=" Has subscribed us for";


  $stmt1 = $con->prepare("INSERT INTO notification (user,message,type) VALUES (  ?, ?, ?)");
  $stmt1->bind_param("sss",$username,$message,$type1);
  $stmt1->execute();

	$_SESSION['expiration_date'] = $expirationDate;
	$_SESSION['status']=$status;
	$expirationDate = strtotime($expirationDate);
	$currentDate = time();
	$daysLeft = round(($expirationDate - $currentDate) / (60 * 60 * 24));
  echo<<<print
	<script>
	alert("Congratulation your Subscription of 40$/1month has been Successful");
	window.location.href="profile.php?";
	</script>
	print;
  }
  else{
    echo<<<print
    <script>
    alert("The Amount is Inappropriate");
    window.location.href="subscription.php?";
    </script>
    print;
  }
}
else if(isset($_POST['subs7'])){
  if(isset($_POST['ammount']) && $_POST['ammount']==15){
  $expirationDate = date('Y-m-d', strtotime("+7 days"));
	$status=1;
  $username=$_SESSION['username'];
  $type1="15$/7days";
  $type="Basic";
  $message=" Has subscribed us for";
	$stmt = $con->prepare("UPDATE users SET status=?, expiration_date = ?,type=? WHERE email = ?");
	$stmt->bind_param("isss",$status, $expirationDate,$type,$_SESSION['email']);
	$stmt->execute();
  $stmt1 = $con->prepare("INSERT INTO notification (user,message,type) VALUES ( ?,?, ?)");
  $stmt1->bind_param("sss",$username,$message,$type1);
  $stmt1->execute();
	$_SESSION['expiration_date'] = $expirationDate;
	$_SESSION['status']=$status;
	$expirationDate = strtotime($expirationDate);
	$currentDate = time();
	$daysLeft = round(($expirationDate - $currentDate) / (60 * 60 * 24));
  echo<<<print
	<script>
	alert("Congratulation your Subscription of 15$/7days has been Successful");
	window.location.href="profile.php?";
	</script>
	print;
  }
  else{
    echo<<<print
	<script>
	alert("The Amount is Inappropriate");
	window.location.href="subscription.php?";
	</script>
	print;
  }
  
}
if(isset($_POST['extend7'])){
  if(isset($_POST['amount']) && $_POST['amount']==15){
  $expirationDate = strtotime($row['expiration_date']) + 7 * 24 * 60 * 60; // Add 7 days in seconds
  if ($expirationDate !== false) {
    $username = $_SESSION['username'];
    $type1 = "15$/7days";
    $message = "Has extended the plan";
    $expirationDateFormatted = date('Y-m-d', $expirationDate);
    $stmt = $con->prepare("UPDATE users SET expiration_date = ? WHERE email = ?");
    $stmt->bind_param("ss", $expirationDateFormatted, $_SESSION['email']);
    $stmt->execute();
    
    $stmt1 = $con->prepare("INSERT INTO notification (user, message, type) VALUES (?, ?, ?)");
    $stmt1->bind_param("sss", $username, $message, $type1);
    $stmt1->execute();

    $_SESSION['expiration_date'] = date('Y-m-d', $expirationDate);
    $currentDate = time();
    $daysLeft = round(($expirationDate - $currentDate) / (60 * 60 * 24));
  } 
}
else{
  echo<<<print
	<script>
	alert("The Amount is Inappropriate");
	window.location.href="extendplan.php?";
	</script>
	print;
}
}
else if(isset($_POST['extend30'])){
  if(isset($_POST['amount1']) && $_POST['amount1']==40){
  $expirationDate = strtotime($row['expiration_date']) + 30 * 24 * 60 * 60; 
  if ($expirationDate !== false) {
    $username = $_SESSION['username'];
    $type1 = "15$/7days";
    $message = "Has extended the plan";
    $expirationDateFormatted = date('Y-m-d', $expirationDate);
    $stmt = $con->prepare("UPDATE users SET expiration_date = ? WHERE email = ?");
    $stmt->bind_param("ss", $expirationDateFormatted, $_SESSION['email']);
    $stmt->execute();
    
    $stmt1 = $con->prepare("INSERT INTO notification (user, message, type) VALUES (?, ?, ?)");
    $stmt1->bind_param("sss", $username, $message, $type1);
    $stmt1->execute();

    $_SESSION['expiration_date'] = date('Y-m-d', $expirationDate);
    $currentDate = time();
    $daysLeft = round(($expirationDate - $currentDate) / (60 * 60 * 24));
  } 
}
else{
  echo<<<print
	<script>
	alert("The Amount is Inappropriate");
	window.location.href="extendplan.php?";
	</script>
	print;
}
}
$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$email = $_SESSION['email'];
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$expirationDate = strtotime($row['expiration_date']);
$currentDate = time();
$daysLeft = round(($expirationDate - $currentDate) / (60 * 60 * 24));
if(isset($_SESSION['status']) && $_SESSION['status']==1){
if($daysLeft <= 0){
  $status=0;
  $type="Subscription Expired";
	$stmt = $con->prepare("UPDATE users SET status = ?,type=? WHERE email = ?");
	$stmt->bind_param("iss", $status,$type, $_SESSION['email']);
	$stmt->execute();
  $_SESSION['status']=$status;
  header("location:subscription.php");
}
}
$_SESSION['expiration_date'] = date('Y-m-d', strtotime($row['expiration_date']));
 
$profile_picture_url = 'img/'.$_SESSION['user_picture'];
$stmt->close();

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
                <link
                  rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                />
                <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
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
                  
                 .pro{
                   position:relative;
                   display:flex;
                   flex-direction:row;
                   transform: translateY(50%);
                   margin-bottom:200px;
                   margin-left:100px;
                   

                 }
               .normaldiv{
                  margin-left:50px;
                  margin-top:80px;
                  font-size:20px;
               }
                .normaldiv h1{


                  font-size:30px;
                  font-weight:bold;
                  margin-bottom:20px;


                }
                .normaldiv span{

                  font-weight:bold;

                }
                input[type="submit"] {
      font-size: 20px;
      margin-left: 20px;
      padding: 10px 20px;
      background-color: red;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.5s;
    }

    input[type="submit"]:hover {
      transform: translateY(7px);
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
    width: 285px;
    height: 285px;
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
  .mainfooter1{
              display: flex;
              justify-content: center;
              flex-direction: column;
              align-items: center;
            
              position: relative;
              left: 0%;
            }

            body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background-color: #eee;
}
.loader-wrapper {
  width: 100%;
  height: 100%;
  position:fixed;
  top: 0;
  left: 0;
  background-color: #242f3f;
  display:flex;
  justify-content: center;
  align-items: center;
  opacity: 3;
  transition: opacity 3s, visibility 3s;
  z-index: 9999;
}
.loader {
  display: inline-block;
  width: 55px;
  height: 55px;
  position: relative;
  border: 4px solid #fff;
  animation: loader 1s infinite ease;

}
.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #fff;
  animation: loader-inner 1s infinite ease-in;
}

@keyframes loader {
  0% { transform: rotate(0deg);}
  25% { transform: rotate(180deg);}
  50% { transform: rotate(180deg);}
  75% { transform: rotate(360deg);}
  100% { transform: rotate(360deg);}
}

@keyframes loader-inner {
  0% { height: 0%;}
  25% { height: 0%;}
  50% { height: 100%;}
  75% { height: 100%;}
  100% { height: 0%;}
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
                              <h3><?php echo $_SESSION['username'];?></h3>
                            </div>
                            <hr>
                            <a href="setting.php" class="sub-link">
                              <img src="./book img/profile.png" alt="">
                              <p>Profile setting</p>
                              <span> ></span>
                            </a>
                            <a href="favourite.php" class="sub-link">
                              <img src="./book img/fvt.png" alt="">
                              <p>Favourites</p>
                              <span> > </span>
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
                <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
				<div class="pro">
          <div class="imgdiv">
  <img src="<?php echo $profile_picture_url; ?>" alt=""class="profile-image2" width="300" height="300">
                </div>
   <div class="normaldiv"> 
	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
	<p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
  <?php

  if(isset($_SESSION['status']) && $_SESSION['status'] == 1) {
    $exdate=date('F j, Y', strtotime($_SESSION['expiration_date']));
    echo <<<print_block
  <p>Your membership will expire on $exdate. You have <span>$daysLeft days left.</span></p>
  <a href="extendplan.php?id=$row[id]"><input style="font-size:20px; margin-left:0px;" type="submit" value="Extend Plan"></a>
  print_block;

}
  else if(isset($_SESSION['status']) && $_SESSION['status'] == 0){
 echo<<<print_block
 <label style="font-size:20px; margin-left:0px; font-weight:500;">Now You Are Not Using Any Plan,<br> Subscribe Us To Read Your Desired Books</label>
 <a href="subscription.php?id=$row[id]"><input style="font-size:20px; margin-left:20px;" type="submit" value="subscribe Now"></a>
print_block;
 }
  ?>
    </div>
  </div>
	<br><br><br><br><br><br><br>
				
			<footer>
			  <div class="mainfooter1">
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
function togglemenu(){
submenu.classList.toggle("open-menu");
}
			</script>
			</body>


    
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        $(document).ready(function(){
         $(".loader-wrapper").fadeOut("slow");
        });
    </script>

		  </html>        



