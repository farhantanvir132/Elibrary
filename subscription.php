<?php
session_start();
include('dbcon.php');
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit();
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
  <link rel="stylesheet" href="subscription.css" />
  <link rel="stylesheet" href="payment.css" />
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
      margin-left: 100px;


    }

    .normaldiv {
      margin-left: 50px;
      margin-top: 80px;
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

    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background-color: #eee;
    }

    .loader-wrapper {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #242f3f;
      display: flex;
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
      0% {
        transform: rotate(0deg);
      }

      25% {
        transform: rotate(180deg);
      }

      50% {
        transform: rotate(180deg);
      }

      75% {
        transform: rotate(360deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes loader-inner {
      0% {
        height: 0%;
      }

      25% {
        height: 0%;
      }

      50% {
        height: 100%;
      }

      75% {
        height: 100%;
      }

      100% {
        height: 0%;
      }
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
          <img src="<?php echo $profile_picture_url; ?>" alt="" class="profile-image1" class="user-pic" onclick="togglemenu()">
          <div class="sub-menu-wrap" id="subMenu">
            <div class="sub">
              <div class="user-info">
                <img src="<?php echo $profile_picture_url; ?>" alt="" class="profile-image1">
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
  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>

  <div class="subs">
    <div class="colm-1" style="background-image:url(./book img/banner4.jpg);">
      <h2>E<span>-Library</span></h2>
      <ul>
        <li><img src="img/icon.png" alt="">Unlimited Books Access </li>
        <li><img src="img/icon.png" alt="">Download Any Book</li>
        <li><img src="img/icon.png" alt="">Read Online Any Book</li>
        <li><img src="img/icon.png" alt="">Audio Books</li>
        <li><img src="img/icon.png" alt="">Listen Any Books</li>
      </ul>


    </div>
    <div class="colm-2">
      <h2>Choose Your Plan</h2>
      <div class="price-row">
        <div class="price-col">
          <p>Starter</p>
          <h3>15$ <span>/7Days</span></h3>
          <button type="submit" id="done-btn" name="subs7">Subscribe</button>

        </div>
        <div class="price-col">
          <p>Advanced</p>
          <h3>40$ <span>/month</span></h3>
          <button type="submit" id="done-btn2" name="subs30">Subscribe</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <div id="wrapper-popup-pay">
  <div id="popup-content-pay">

  </div>
</div> -->

  <div id="wrapper-listen">
    <div id="popup-listen">
      <button id="closeButton"> <i class="fa-solid fa-xmark"></i></button>
      <p>Confirm Payment</p>
      <form id="payment-form" method="post"action="profile.php">
        <label for="account-number">Account Number:</label>
        <input type="text" id="account-number" required>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="ammount" required>
        <button type="submit" name="subs7">Pay</button>
        <button type="reset">Clear</button>
      </form>
    </div>
  </div>

  <div id="wrapper-listen">
    <div id="popup-listen2">
      <button id="closeButton2"> <i class="fa-solid fa-xmark"></i></button>
      <p>Confirm Payment </p>
      <form id="payment-form" method="post" action="profile.php">
        <label for="account-number">Account Number:</label>
        <input type="text" id="account-number" required>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="ammount1" required>
        <button type="submit"name="subs30">Pay</button>
        <button type="reset" >Clear</button>
      </form>
    </div>
  </div>







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
  <script src="payment.js"></script>
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

<script>
  $(document).ready(function() {
    $(".loader-wrapper").fadeOut("slow");
  });
</script>

</html>