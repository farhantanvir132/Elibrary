<?php
session_start();
include('dbcon.php');

if (isset($_SESSION['email'])) {
  $profile_picture_url = 'img/'.$_SESSION['user_picture'];

}
?>
<!DOCTYPE html>    
<html lang="en">
              <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>E-Library</title>
                <link rel="stylesheet" href="index.css" /> 
                <link rel="stylesheet" href="action.css">
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
                  
               
      
                a{
                  text-decoration: none;
                }
                .catagory {
      display: flex;
      flex-direction: column;
    }
    
    .book-row {
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      margin-left: 0;
      margin-right: 0;
      margin-bottom: 20px;
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
#srch {
    width: 50rem;
    height: 4rem;
    border: 2px solid #646260;
    color: black;
    padding: 1rem;
    border-radius: 0.5rem;
    outline: none;
    background: white;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-right: 0;
    font-size:16px;
    font-style:italic;
    
  }
  .searchbar {
    display: flex;
    align-items: center;
    margin-left: 4rem;
    padding-right:20px;
    
  }
  .nav-links li a {
        color: #fefefe;
        font-size: 1.7rem;
        text-transform: uppercase;
        transition: 0.4s ease;
        padding: 1rem;
        text-decoration: none;
      }
      .card1 .round::before
{
  content: '';
position: absolute;
top: 0;
Left: 0;
width: 100%;
height: 100%;
background: transparent;
clip-path: circle(120px at center);
transition: 0.5s;

}        
                
                </style>
              </head>
              <body>
 
                <header>
                  <div class="nav-section">
                    <h2>E<span>-Library</span></h2>
                    <nav class="navbar">
                      <ul class="nav-links">
                        <?php
                        if (isset($_SESSION['email'])){
                          
                        echo'<li><a href="index1.php">Home</a></li>';
                        }
                        else if(!isset($_SESSION['email'])){
                          echo'<li><a href="index.php">Home</a></li>';
                        }
                        ?>
                        <li class="dropdownn">
                          <a href="#">Categories</a>
                          <ul class="dropdownn-menu">
                            <li><a href="fictionnew.php">Fiction</a></li>
                            <li><a href="#">Non-fiction</a></li>
                            <li><a href="actionnew.php">Action</a></li>
                            <li><a href="#">Romance</a></li>
                            <li><a href="#">Si-fi</a></li>
                            <li><a href="#">Children's</a></li>
                            <li>
                              <a href="#">Comics</a>
                            
                            </li>
                          </ul>
                        </li>
                     
                      </ul>
                      <form method="post"action="search.php">
                      <div class="searchbar">
                        <input type="search"name="search" id="srch" placeholder="Search.." />
                        <button type="submit"class="butn"><i class="fa fa-search"></i></button>
                      </div>
              </form>
                      <!-- <button class="btnlogin-popup">Login</button> -->
                      <!-- <button  class="btnlogin-popup">Login</button> -->
                      <?php
         if (isset($_SESSION['email'])){
          echo<<<print
                      <div id="userProfile">
                        <img src="$profile_picture_url" alt=""class="profile-image1" class="user-pic" onclick="togglemenu()">
                        <div class="sub-menu-wrap" id="subMenu">
                          <div class="sub">
                            <div class="user-info">
                              <img src="$profile_picture_url" alt=""class="profile-image">
                              <h3>$_SESSION[username]</h3>
                            </div>
                            <hr>
                            <a href="profile.php" class="sub-link">
                              <img src="./book img/profile.png" alt="">
                              <p>View Profile</p>
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
                      print;
         }
?>
                    </nav>
                </header>
                <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h1 class="action" style="text-align:right; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:50px;margin-top:128px;margin-right:185px;margin-left:260px">ACTION<hr></h1> 
  <div class="category">
  <?php
    $query = "SELECT * FROM `action`";
    $result = mysqli_query($con, $query);
    $fetchsrc = FETCH_SRC;
    $count = 0;
    while ($fetch = mysqli_fetch_assoc($result)) {
      if ($count % 3 == 0) {
        echo '<div class="book-row">';
      }
      echo <<<print
        <div class="card1">
          <div class="round"></div>
          <div class="content">
            <h2>$fetch[b_name]</h2>
            <p style="text-align:justify">$fetch[sortdes]</p>
            <a href="book2.php?id=$fetch[id]">Read More</a>
          </div>
          <img src="$fetchsrc$fetch[b_img]">
        </div>
      print;
      $count++;
      if ($count % 3 == 0) {
        echo '</div>';
      }
    }
    if ($count % 3 != 0) {
      echo '</div>';
   }
  ?>
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






              <!-- <script>
                var loader= document.getElementById("preloader");
                window.addEventListener("load",function(){
                  loader.style.display = "none";
                });
                

              </script> -->
              <script>
                var i=0,text;
                  text= "Iron Man is a fictional superhero who wears a suit of armor. His alter ego is Tony Stark. He was created by Stan Lee, Jack Kirby and Larry Lieber for Marvel Comics in Tales of Suspense #39 in the year 1963 and appears in their comic books. He is also one of the main protagonists in the Marvel Cinematic Universe";
                  
                  
                function typing(){
                  if(i<text.length){
                    document.getElementById("text").innerHTML += text.charAt(i);
                    i++;
                    setTimeout(typing,20);
                  }
                }
               
                setTimeout(typing, 2000);




                let submenu = document.getElementById("subMenu");
function togglemenu(){
submenu.classList.toggle("open-menu");
}





               
              </script>

              <!-- <script src="pre.js" charset="utf-8"></script> -->
               <script src="index.js"></script>
              </body>



              
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <script>
                $('.owl-carousel').owlCarousel({
                  loop:true,
                  margin:0,
                  nav:false,
                  autoplay:true,
                  autoplayTimeout:2500,
                  stagePadding:110,
                  dots:false,
                  responsive:{
                      0:{
                          items:1
                      },
                      600:{
                          items:4
                      },
                      1000:{
                          items:6
                      }
                  }
              });
              $('.owl-carousel').mouseover(function(){
                $('.owl-carousel').trigger('stop.owl.autoplay');
            });
            
            // Start autoplay again on mouseout
            $('.owl-carousel').mouseout(function(){
                $('.owl-carousel').trigger('play.owl.autoplay');
            });
              </script>
              <script>
                let nums = document.querySelectorAll('.num');
                let section = document.querySelector('.three');
                let started = false;
                
                function startCount(el, goal) {
                  let currentCount = parseInt(el.textContent);
                  let increment = Math.ceil(goal / 50); // Change this number to adjust the speed of the animation
                  let countInterval = setInterval(function() {
                    currentCount += increment;
                    if (currentCount >= goal) {
                      currentCount = goal;
                      clearInterval(countInterval);
                    }
                    el.textContent = currentCount;
                  }, 30); // Change this number to adjust the interval between each increment
                }
                
                function isElementInViewport(el) {
                  let rect = el.getBoundingClientRect();
                  return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                  );
                }
                
                function onScroll() {
                  if (!started && isElementInViewport(section)) {
                    nums.forEach(function(num) {
                      startCount(num, parseInt(num.dataset.goal));
                    });
                    started = true;
                  }
                }
                
                window.addEventListener('scroll', onScroll);
                
              </script>
<script>
        $(document).ready(function(){
         $(".loader-wrapper").fadeOut("slow");
        });
    </script>

            </html>        
