<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['email'])){
  header("location:error1.php");
}

if (isset($_GET['id'])) {
  $email = $_SESSION['email'];
  $stmt1 =$con->prepare("UPDATE users SET clicks = clicks + 1 WHERE email = ?");
  $stmt1->bind_param("s",$email);
  $stmt1->execute();
  $_SESSION['clicks']=$_SESSION['clicks']+1; 
}
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $stmt1 =$con->prepare("UPDATE fiction SET view = view + 1 WHERE id = ?");
  $stmt1->bind_param("i",$id);
  $stmt1->execute();
}


if (isset($_SESSION['email'])) {
  $profile_picture_url = 'img/'.$_SESSION['user_picture'];
}
if (isset($_GET['id'])) {
$id=$_GET['id'];
$sql = "SELECT * FROM fiction WHERE id =$id";
$result = mysqli_query($con, $sql);
$fetch = mysqli_fetch_assoc($result);
$fetchsrc=FETCH_SRC;
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
                <link rel="stylesheet" href="action.css" />

                <link
                  rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                />
                <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
                <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
                <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">


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
               
 /* Flex container styles */
 .book-container {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-left: 200px;
                    margin-right: 200px;
                  }
                  
                  /* Image styles */
                  .book-image {
                    
                    margin-right: 50px;
                    margin-top: 100px;
                    margin-bottom: 50px;
                  }
                  img.book-image {
                    height: 340px;
                    width: 444px;
                }
                  
                  /* Description styles */
                  .book-description {
                    flex-grow: 1;
                    font-size: 18px;
                    line-height: 1.5;
                  margin-top:30px;
                  }
                  .button1{
                    color: black;
                    background-color: rgb(56, 179, 250);
                    width: 111px;
                    height: 40px;
                    border-radius: 5px;
                    font-size: 15px;
                    cursor: pointer;
                    margin-right: 25px;
                    

                  }
                  .button1 a{
                    text-decoration:none;

                  }
                  .about{
                    position: relative;
                    width: 950px;
                    height: auto;
                    background-color: rgb(13, 70, 124);
                    left: 15%;
                    border-radius: 5px;
                    margin-bottom: 30px;
                  }

                  .book-details {
                    display: flex;
                    align-items: center;
                    
                    color: white;
                    margin-left: 170px;
                    margin-top: 30px;
                  }
                  
                  /* Vertical line styles */
                  .book-details-divider {
                    border-left: 2px solid white;
                    height: 332px;
                    margin: 0 20px;
                  }
                  
                  /* Title styles */
                  .book-title {
                    font-size: 24px;
                    font-weight: bold;
                    margin-right: 40px;
                  }
                  
                  /* Publisher and year styles */
                  .book-info p {
                    display: flex;
                    flex-direction: column;
                    font-size: 30px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                    margin-left: 30px;
                    font-family: 'Playball', cursive;
                  }
                  .info p{
                    display: flex;
                    flex-direction: column;
                    font-size: 30px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                    margin-right: 100px;
                    font-family: 'Playball', cursive;
                  }
                  
                  .comment {
  margin-bottom: 20px;
  border: 1px solid #ccc;
  padding: 10px;
}
.comment p:first-child {
  margin-top: 0;
}
.comment p:last-child {
  margin-bottom: 0;
}
.comment strong {
  font-weight: bold;
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
.comments{
                    background-color: white;
                    margin-left: 250px; 
                    margin-top: 40px;
                    border-radius: 15px;
                  }
                  .comment-section {
                    margin-top: 20px;
                    border: 1px solid #ddd;
                    padding: 20px;
                    border-radius: 15px;
                  }
                  
                  .comment-form {
                    margin-bottom: 20px;
                  }
                  
                  .comment-list {
                    margin-top: 20px;
                  }
                  
                  .comment {
                    margin-bottom: 20px;
                    padding: 10px;
                    
                  }
                  
                  .comment-header {
                    display: flex;
                    /*justify-content: space-between;
                    align-items: center;*/
                  }
                  .comment-header img{
                    width: 30px;
                    margin-right: 10px;

                  }
                  
                  .comment-name {
                    margin-left: 0px;
                    margin-top: 10px;

                  }
                  .edit-delete{
                    display: flex;
                  }
                  .edit-delete p{
                    font-size: 14px;
                    margin-left: 300px;
                    font-weight: 500;
                  }
                  
                  .edit-btn,
                  .delete-btn {
                    background-color: transparent;
                    border: none;
                    cursor: pointer;
                    font-size: 14px;
                    margin-left: 50px;
                  }
                  
                  .edit-btn:hover,
                  .delete-btn:hover {
                    text-decoration: underline;
                    color: #3AAAFA;
                  }
                  
                  .comment-body {
                    margin: 10px;
                    padding: 10px;
                    width: 40%;
                    font-size: 14px;
                    border: 1px solid white;
                    background-color: rgb(245, 243, 239);
                    color: black;
                    border-radius: 10px;
                  }
                  textarea {
                    /*display: block;*/
                    width: 40%;
                    margin-left: 20px;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    padding: 10px;
                    font-size: 14px;
                    line-height: 1.5;
                   border: 1px solid #ccc;
                    border-radius: 15px;
                    resize: vertical;
                    box-sizing: border-box;
                  }
                  
                  textarea:focus {
                    outline: none;
                    border-color: #0077cc;
                    box-shadow: 0 0 0 2px #0077cc;
                  }
                  .post{
                    background-color: #3AAAFA;
                    color: white;
                    width: 70px;
                    font-size: 18px;
                    position: absolute;
                    top: 142%;
                    margin-left: 30px;
                    border-radius: 10px;
                    transition: 0.5s;
                  }
                  .post:hover{
                    background-color: red;
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
                        <li class="dropdownn">
                          <a href="#">Categories</a>
                          <ul class="dropdownn-menu">
                            <li><a href="fictionnew.php">Fiction</a></li>
                      
                            <li><a href="actionnew.php">Action</a></li>
                            <li><a href="#">Non-fiction</a></li>
                            <li><a href="#">Romance</a></li>
                            <li><a href="#">Si-fi</a></li>
                            <li><a href="#">Children's</a></li>
                            <li class="dropdown-submenu">
                              <a href="#">Comics</a>
                              <ul class="dropdownn-menu">
                                <li><a href="#">DC</a></li>
                                <li><a href="#">Marvel</a></li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#">Authors</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact Us</a></li>
                      </ul>
                      <form method="post"action="search.php">
                      <div class="searchbar">
                        <input type="search"name="search" id="srch" placeholder="Search.." />
                        <button type="submit"class="butn"><i class="fa fa-search"></i></button>
                      </div>
              </form>
                      <?php
         if (isset($_SESSION['email'])){
          echo<<<print
                      <div id="userProfile">
                        <img src="$profile_picture_url" alt=""class="profile-image1" class="user-pic" onclick="togglemenu()">
                        <div class="sub-menu-wrap" id="subMenu">
                          <div class="sub">
                            <div class="user-info">
                              <img src="$profile_picture_url" alt=""class="profile-image">
                              <h3 style="font-size:20px;">$_SESSION[username]</h3>
                            </div>
                            <hr>
                            <a href="profile.php" class="sub-link">
                              <img src="./book img/profile.png" alt="">
                              <p>View Profile</p>
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
               
                <?php
                echo<<<print
                  <div class="book-container">
                    <img class="book-image" src="$fetchsrc$fetch[b_img]" alt="Book Cover">

                    <div class="book-description">
                      <h1 style="margin-bottom: 20px; color:rgb(163, 56, 56);font-family:poppins; font-size: 35px;">$fetch[b_name]</h1><hr>
                      <h1  style="margin-top: 20px;margin-bottom: 20px;">Description</h1>
                      <p style="font-family: playball;margin-bottom: 40px; font-size:20px;">$fetch[description]</p>
               print;

                      if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                        echo<<<print
                        <a download="img/$fetch[book]" href="img/$fetch[book]"> <button  class="button1"><i class="fa-solid fa-cloud-arrow-down"></i> Download</button></a>
                        print;
                
                      }
                      else if(!isset($_SESSION['status']) || (isset($_SESSION['status']) && $_SESSION['status'] ==0)){
                          
                        echo '<a href="subscription.php"> <button  class="button1"><i class="fa-solid fa-cloud-arrow-down"></i> Download</button></a>';

                      }
                      echo<<<print1
                      <a href="pdfreader.php?id=$fetch[id]"><button  class="button1"><i class="fa-solid fa-book-open-reader"></i> Read</button></a>
                    <a href="audiofiction.php?id=$fetch[id]">  <button  class="button1"><i class="fa-solid fa-headphones"></i> Listen</button></a>
                    </div>
                  </div>
                  <h1 style="text-align:center">View ($fetch[view])</h1>
                <h1 style="text-align: center; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:10px;margin-top:50px">Book / Comic Details</h1>
                <div class="about">
                  <div class="book-details">
                    <div class="info">
                      <p>Title</p>
                      <p>Authors</p>
                      <p>Publisher</p>
                      <p>Year</p>
                      <p>Language</p>
                      <p>Catagory</p>

                    </div>
                    <div class="book-details-divider"></div>
                    <div class="book-info">
                      <p>$fetch[b_name]</p>
                      <p>$fetch[b_author]</p>
                      <p>$fetch[publisher]</p>
                      <p>$fetch[year]</p>
                      <p>$fetch[lang]</p>
                      <p>$fetch[Catagory]</p>

                    </div>
                  </div>
                </div>
print1;
?>
<?php
/*
if(isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['email'])) {
  $book_id = $fetch['id'];
  echo <<<print
  <form method="post" action="insert.php">
  <input type="hidden" name="book_id" value="$book_id">
  <input type="hidden" name="comment_id" value="">
  <label>Comment</label>
  <textarea name="comment" required></textarea>
  <button type="submit" name="action" value="post">Post</button>
  <button type="submit" name="action" value="edit" style="display:none;">Edit</button>
  </form>
  print;
}
?>
<?php
echo "<p>Comments ({$fetch['cment']})</p>";
$book_id = $_GET['id'];
// Get comments from database
$sql = "SELECT * FROM comments WHERE book_id=$book_id ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);

// Display comments
while ($row = mysqli_fetch_assoc($result)) {
  $comment_id = $row['id'];
  $name = $row['name'];
  $userimg = $row['userimg'];
  $comment = $row['comment'];
  $created_at = $row['created_at'];
  
  echo "<div class='comment'>";
  echo "<img src='img/$userimg'>";
  echo "<p><strong>$name</strong> on $created_at</p>";
  echo "<p>$comment</p>";
  if(isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['email']) && ($row['name']==$_SESSION['username'])) {
    echo <<<print
    <button onclick="editComment($comment_id, '$comment')">Edit</button>
    print;
  }
  echo "</div>";
}
*/
?>
  <div class="comments">
                   
                   <div class="comment-section">
                     <h2> <?php echo "Comments ({$fetch['cment']})"?></h2>
                     <?php
                     if(isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['email'])) {
                       $book_id = $fetch['id'];
                       echo <<<print
                       <form class="comment-form" method="post" action="insert.php">
                       <input type="hidden" name="book_id" value="$book_id">
                       <input type="hidden" name="comment_id" value="">
                       <label>Comment</label>
                       <textarea name="comment" required></textarea>
                       <button type="submit" name="action" value="post">Post</button>
                       <button type="submit" name="action" value="edit" style="display:none;">Edit</button>
                       </form>
                       print;
                     }
                     ?>
                     <?php
$book_id = $_GET['id'];
// Get comments from database
$sql = "SELECT * FROM comments WHERE book_id=$book_id ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);

// Display comments
while ($row = mysqli_fetch_assoc($result)) {
 $comment_id = $row['id'];
 $name = $row['name'];
 $userimg = $row['userimg'];
 $comment = $row['comment'];
 $created_at = $row['created_at'];
                    echo"<div class='comment-list'>";
                       echo"<div class='comment'>";
                         echo"<div class='comment-header'>";
                           echo"<img src='img/$userimg'>";
                           echo"<h3 class='comment-name'>$name</h3>";
                         echo"</div>";
                         echo"<p class='comment-body'>$comment</p>";
                           if(isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['email']) && ($row['name']==$_SESSION['username'])) {
                             echo <<<print
                              <div class="edit-delete">
                             <button class="edit-btn" onclick="editComment($comment_id, '$comment')">Edit</button>
                             </div>
                             print;
                           }
                           echo<<<print1
                           <p>on  $created_at</p>
                       </div>
                     </div>
                     print1;
                   }
                
                   ?>
                   </div>
                 </div>
                 
<script>
function editComment(comment_id, comment) {
  document.querySelector('form input[name=comment_id]').value = comment_id;
  document.querySelector('form textarea[name=comment]').value = comment;
  document.querySelector('form button[name=action][value=post]').style.display = "none";
  document.querySelector('form button[name=action][value=edit]').style.display = "inline";
}
</script>

                




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
