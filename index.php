<?php
session_start();
include('dbcon.php');
$query = "SELECT count(*) FROM `fiction`";
$result = mysqli_query($con, $query);
$count = mysqli_fetch_array($result)[0];
$query1 = "SELECT count(*) FROM `action`";
$result1 = mysqli_query($con, $query1);
$count1 = mysqli_fetch_array($result1)[0];
$count2=$count+$count1;
if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])){
  $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $email = $_POST['email'];
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows == 1) {
    // Verify the password
    $row = $result->fetch_assoc();
    if(password_verify($_POST['password'], $row['password'])){
      // Store the user's information in the session
      $_SESSION['email'] = $row['email'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['expiration_date'] = $row['expiration_date'];
      $_SESSION['user_picture'] = $row['user_picture'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['clicks']=$row['clicks'];
      header("location:index1.php");
    } else {
      echo<<<print
        <script>
        alert("Incorrect Password!");
        window.location.href="index.php?";
        </script>
        print;
    }
  } else {
    echo<<<print
    <script>
    alert("An account with this email address does not exist");
    window.location.href="index.php?";
    </script>
    print;
  }
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
                
                <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

                <!-- <link rel="stylesheet" href="pre.css"> -->




                <script src="https://kit.fontawesome.com/90ec6e164b.js" crossorigin="anonymous"></script>


                <style>
                  header {
                    width: 100%;
                    height: 60vh;
                    background-color: rgba(0, 0, 0, 0.5);
                    background-size: cover;
                    background-repeat: no-repeat;
                    
                  }
                  
                  .book-container {
                    display: flex;
                    align-items: center;
                    margin-left: 20px;
                    margin-right: 20px;
                    position: absolute;
                    bottom: 1000%;
                  }
                  .book-image {
                  width: 200px;
                  height: 300px;
                  border-radius: 5px;
                  margin-right: 40px;
                  box-shadow: 7px 5px 6px rgba(0.1, 0.5, 0.8, 0.9);
                  }
                .button1 {
                  color: black;
                  background-color: rgb(219, 38, 38);
                  width: 111px;
                  height: 40px;
                  border-radius: 5px;
                  font-size: 15px;
                  cursor: pointer;
                  margin-right: 1000px;
                  text-decoration: none !important;
                  transition: background-color 0.3s ease;
                }
                .button1:hover {
                  background-color: #3e8e41;
                }
                .owl-carousel .item img {
                  width: 200px;
                  height: 300px;
                  border-radius: 5px;
                  box-shadow: 7px 5px 6px rgba(0.1, 0.5, 0.8, 0.9);
                }
                .carousel-inner {
                  height: 600px; 
                }
                a{
                  text-decoration: none;
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
                  <div class="header-overlay">
                    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="true">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="book img/banner4.jpg" class="d-block w-100 " alt="..." style="filter: blur(9px);">
                          <div class="carousel-caption d-none d-md-block">
                            <div class="book-container">
                              <img class="book-image animate__animated animate__bounceInUp" style="animation-delay: 1s; animation-duration: 0.5s;" src="book img/iron.jpg" alt="Book Cover">
                              <div class="book-description">
                                <h1 class="animated bounceInRight" style="margin-bottom: 20px; color:rgb(233, 221, 221);font-family:poppins; font-size: 35px;text-align:justify;animation-delay: 1s;">IRON MAN</h1>
                                <p id="text" style="font-family: playball;margin-bottom: 40px; font-size:20px;color:white;text-align:justify;">
                                </p>
                                <a href="#">
                                  <button type="submit" class="button1 animated bounceInLeft d-none d-md-block" style="animation-delay: 4s;">
                                    Read More
                                  </button>
                                </a>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="book img/banner4.jpg" class="d-block w-100 " alt="..."style="filter: blur(9px);">
                          <div class="carousel-caption d-none d-md-block">
                            <div class="book-container">
                              <img class="book-image animate__animated animate__bounceInUp" style="animation-delay: 1s; animation-duration: 0.5s;" src="book img/wolvarine.jpg" alt="Book Cover">
                
                              <div class="book-description">
                                <h1 class="animated bounceInRight" style="margin-bottom: 20px; color:rgb(233, 221, 221);font-family:poppins; font-size: 35px;text-align:justify;animation-delay: 1s;">Wolvarine</h1>
                                <p id="text" style="font-family: playball;margin-bottom: 40px; font-size:20px;color:white;text-align:justify;">Wolverine is a fictional superhero who wears a suit of armor. His alter ego is Tony Stark. He was created by Stan Lee, Jack Kirby and Larry Lieber for Marvel Comics in Tales of Suspense #39 in the year 1963 and appears in their comic books. He is also one of the main protagonists in the Marvel Cinematic Universe</p>
                                <a href="#"><button type="submit" class="button1 animated bounceInLeft d-none d-md-block" style="animation-delay: 4s;"> Read More</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="book img/banner4.jpg" class="d-block w-100 " alt="..." style="filter: blur(9px);">
                          <div class="carousel-caption d-none d-md-block">
                            <div class="book-container">
                              <img class="book-image animate__animated animate__bounceInUp" style="animation-delay: 1s; animation-duration: 0.5s;" src="book img/gravity.jpg" alt="Book Cover">
                
                              <div class="book-description">
                                <h1 class="animated bounceInRight" style="margin-bottom: 20px; color:rgb(233, 221, 221);font-family:poppins; font-size: 35px;text-align:justify;animation-delay: 1s;">Gravity</h1>
                                <p id="text" style="font-family: playball;margin-bottom: 40px; font-size:20px;color:white;text-align:justify;">Gravity is a fictional superhero who wears a suit of armor. His alter ego is Tony Stark. He was created by Stan Lee, Jack Kirby and Larry Lieber for Marvel Comics in Tales of Suspense #39 in the year 1963 and appears in their comic books. He is also one of the main protagonists in the Marvel Cinematic Universe</p>
                                <a href="#"><button type="submit" class="button1 animated bounceInLeft d-none d-md-block" style="animation-delay: 4s;"> Read More</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  <div class="nav-section">
                    <h2>E<span>-Library</span></h2>
                    <nav class="navbar">
                      <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdownn">
                          <a href="#">Categories</a>
                          <ul class="dropdownn-menu">
                            <li><a href="fictionnew.php">Fiction</a></li>
                            <li><a href="actionnew.php">Action</a></li>
                            <li><a href="#">Non-fiction</a></li>
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
                      <button class="btnlogin-popup">Login</button>
                    </nav>
                  </div>
                </header>
                <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
                <div class="wrapper">
                  <span class="icon-close"><i class="fa-sharp fa-regular fa-circle-xmark"></i></span>
                  <div class="form-box login">
                    <h2>Login</h2>
                    <?php if(isset($errorMsg)) echo "<p>$errorMsg</p>"; ?>
	                    <form method="post">
                      <div class="input-box">
                        <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email"name="email"id="email" required>
                        <label for="">Email</label>
                      </div>
                      <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password"name="password"id="password" required>
                        <label for="">Password</label>
                      </div>
                      <button type="submit" class="btn-login" name="submit">Login</button>
                      <div class="login-register">
                        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                      </div>
                    </form>
                  </div>


                  <div class="form-box register">
                    <h2>Registration</h2>
                    <form method="post" action="register.php">
                      <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></i></span>
                        <input type="text"name="username" required>
                        <label for="">Username</label>
                      </div>
                      <div class="input-box">
                        <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                      </div>
                      <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-key"></i></span>
                        <input type="password"name="password" required>
                        <label for="">Password</label>
                      </div>
                      <div class="remember-forgot">
                        <label for=""><input type="checkbox">I agree to the terms & conditions</label>
                        
                      </div>
                      <button type="submit"name="submit" class="btn-login">Register</button>
                      <div class="login-register">
                        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                      </div>
                    </form>
                  </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <?php

$sql_action = "SELECT * FROM action ORDER BY id DESC LIMIT 5";
$result_action = mysqli_query($con, $sql_action);
$sql_fiction = "SELECT * FROM fiction ORDER BY id DESC LIMIT 5";
$result_fiction = mysqli_query($con, $sql_fiction);
$fetchsrc = FETCH_SRC;
$new_releases = array();
while ($row = mysqli_fetch_assoc($result_action)) {
    $new_releases[] = $row;
}
while ($row = mysqli_fetch_assoc($result_fiction)) {
    $new_releases[] = $row;
}
shuffle($new_releases);
?>
<h1 style="text-align: center; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:50px;margin-top:50px">New Released</h1>
<div class="owl-carousel owl-theme">
    <?php foreach ($new_releases as $book):
      $link = '';
      if ($book['Catagory'] == 'Action') {
          $link ="book2.php?id=$book[id]";
      } elseif ($book['Catagory'] == 'Fiction') {
        $link ="book1.php?id=$book[id]";
      }
    echo<<<print
                    <div class="item">
                    <img src="$fetchsrc$book[b_img]" alt="Book Image">
                    <div class="card-favorite">
                      <a href="$link" class="read-more-btn ">Read More</a>
                    </div> 
                  </div> 
                  print;
  endforeach; ?>
    </div>
            
              <br><br><br><br><br><br><br><br>
  
              <?php
$sql_action1 = "SELECT * FROM action ORDER BY view DESC LIMIT 5";
$result_action1 = mysqli_query($con, $sql_action1);
$sql_fiction1= "SELECT * FROM fiction ORDER BY view DESC LIMIT 5";
$result_fiction1 = mysqli_query($con, $sql_fiction1);
$fetchsrc = FETCH_SRC;
$new_releases1 = array();
while ($row1 = mysqli_fetch_assoc($result_action1)) {
    $new_releases1[] = $row1;
}
while ($row1 = mysqli_fetch_assoc($result_fiction1)) {
    $new_releases1[] = $row1;
}
shuffle($new_releases1);
?>
              <h1 style="text-align: center; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:50px;margin-top:50px">Famous Books</h1>
              <div class="owl-carousel owl-theme">
              <?php foreach ($new_releases1 as $book1):
      $link1 = '';
      if ($book1['Catagory'] == 'Action') {
          $link1 ="book2.php?id=$book1[id]";
      } elseif ($book1['Catagory'] == 'Fiction') {
        $link1 ="book1.php?id=$book1[id]";
      }
      echo<<<print

                <div class="item">
                  <img src="$fetchsrc$book1[b_img]" alt="Book Image">
                  <div class="card-favorite">
                    <a href="$link1" class=" read-more-btn">Read More</a>
                  </div>
                  
                </div>
                print;
              endforeach; ?>
            </div>
            <br> <br><br><br><br> <br><br><br><br>
            <br><br><br>
            <br><br>
            
            
            
            
            
            
            
            
            
           
           

            <section class="three">
              <div class="nums">
                <div class="outer-circle">
                  <div class="middle-circle">
                    <div class="inner-circle">
                      <div class="num" data-goal="10">0</div>
                    </div>
                  </div>
                </div>
            
                <div class="outer-circle">
                  <div class="middle-circle">
                    <div class="inner-circle">
                      <?php echo"<div class='num' data-goal='$count2'>0</div>";?>
                    </div>
                  </div>
                </div>
                
                
               
              </div>
            </section>
            <section class="sec1">
              <div class="para"><p class="p1">Working year</p></div>
              <div class="para"><p class="p2">Books Published</p></div>
              
            </section>
            <br><br><br><br><br><br><br>
            <h1 style="text-align: center; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:30px;margin-top:50px">Book Of the year</h1>


            <!-- <div class="book_of_year">
                <img src="./book img/gravity.jpg" alt="Book Image">
                <div class="card-favorite">
                  <a href="#" class=" read-more-btn">Read More</a>
                </div>
              </div>
            </div> -->

              <div class="book_of_the_year">

                <div class="card1">
                  <div class="round"></div>
                  <div class="content">
                    <h2>iron Man</h2>
                    <p style="text-align:justify">Iron Man is a fictional superhero who wears a suit of armor. His alter ego is Tony Stark. He was created by Stan Lee, Jack Kirby and Larry Lieber for Marvel Comics in Tales of Suspense #39 in the year 1963 and appears in their comic books.</p>
                    <a href="#">Read More</a>
                  </div>
                  <img src="./book img/iron.jpg">
                </div>

              </div>

              <br><br><br><br><br><br><br>


              <!-- <h1 style="text-align: center; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:20px;margin-top:50px">Our Testimonials</h1>
              <h4 style="text-align: center; font-size: 10px; font-weight: bold; text-transform: uppercase; text-shadow: 1px 1px 2px #000000; letter-spacing: 2px;margin-bottom:30px;margin-top:5px">what our Readers say about the books</h4>
<div class="testimonial">
  <input type="radio" name="nav" id="first" checked/>
  <input type="radio" name="nav" id="second" />
  <input type="radio" name="nav" id="third" />
  
  <label for="first" class="first"></label>
<label for="second"  class="second"></label>
<label for="third" class="third"></label>
 
  <div class="one slide">
    <blockquote>
      <span class="leftq quotes">&ldquo;</span> He promptly completed the task at hand and communicates really well till the project reaches the finishing line. I was pleased with his creative design and will definitely be hiring him again. <span class="rightq quotes">&bdquo; </span>
    </blockquote>
    <img src="./book img/man1.jpg" width="170" height="130" />
    <h2>Steve Kruger</h2>
    <h6>UI/UX Designer at Woof Design Studio</h6>
  </div>
  
  <div class="two slide">
    <blockquote>
      <span class="leftq quotes">&ldquo;</span> He promptly completed the task at hand and communicates really well till the project reaches the finishing line. I recommend him to anyone who wants their work done professionally.<span class="rightq quotes">&bdquo; </span>
    </blockquote>
    <img src="./book img/woman1.jpg" width="170" height="130" />
    <h2>Diana Doe</h2>
    <h6>Developer Relations at Woof Studios</h6>
  </div>
  
  <div class="three slide">
    <blockquote>
      <span class="quotes leftq"> &ldquo;</span> He promptly completed the task at hand and communicates really well till the project reaches the finishing line. I was pleased with his creative design and will definitely be hiring him again. <span class="rightq quotes">&bdquo; </span>
    </blockquote>
    <img src="./book img/man2.jpg" width="170" height="130" />
    <h2>Steve Stevenson</h2>
    <h6>CEO Woof Web Design Studios</h6>
  </div>
  
  
</div>
 -->

              
            
                
                
                
            <br><br><br><br><br><br><br>
            <div class="admin">
              <div class="close"><i class="fa-sharp fa-regular fa-circle-xmark"></i></div>
              <div class="myform">
                <form action="checklogin.php"method="post">
                  <h2>ADMIN LOGIN</h2>
                  <input type="text" name="admin_name" placeholder="Username">
                  <input type="password" name="password" placeholder="password">
                  <button type="submit" name="submit">LOGIN</button>

                </form>
              </div>
              <div class="imageadmin">
                <img src="./book img/image.jpg" width="300px" alt="">
              </div>
            </div>
              <footer>
                <div class="mainfooter">
                  <div class="social-media-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    
                  </div>
                  <div class="copyright">
                    <p>Copyrights@2023 FAA. All rights reserved</p>
                    <p>Are you an Admin? <a href="#" class="admin-link">Admin Login</a></p>
                  </div>
                </div>
                <div class="circle">
                  <h2>E<span>-Library</span></h2>
                  <p><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka,Bangladesh</p>
                  <p><i class="fa fa-phone" aria-hidden="true"></i> 0123456789</p>
                </div>
                
                   
        
              </footer>

              <?php

?>
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





               
              </script>

              <!-- <script src="pre.js" charset="utf-8"></script> -->
              <script src="index.js"></script>
              </body>

         <script>
          
document.querySelector(".admin-link").addEventListener("click", function ()
{
  document.querySelector(".admin").classList.add("active");
});


document.querySelector(".admin .close").addEventListener("click", function ()
{
  document.querySelector(".admin").classList.remove("active");
});
          </script>

              
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <script>
                $('.owl-carousel').owlCarousel({
                  loop:true,
                  margin:0,
                  nav:false,
                  autoplay:true,
                  autoplayTimeout:1000,
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