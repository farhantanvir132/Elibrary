<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['email'])){
  echo <<<print
        <script>
            alert("You Need To Login To Access This Page!");
            window.location.href = "index.php?";
        </script>
print;
}

if (isset($_GET['id'])) {
  $email = $_SESSION['email'];
  $stmt1 =$con->prepare("UPDATE users SET clicks = clicks + 1 WHERE email = ?");
  $stmt1->bind_param("s",$email);
  $stmt1->execute();
  $_SESSION['clicks']=$_SESSION['clicks']+1; 
}

if (isset($_SESSION['email'])) {
  $profile_picture_url = 'img/'.$_SESSION['user_picture'];
}
if (isset($_GET['id'])) {
$id=$_GET['id'];
$sql = "SELECT * FROM action WHERE id =$id";
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
                <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

                <link rel="stylesheet" href="listen.css" />

                <!-- <link rel="stylesheet" href="pre.css"> -->




                <script src="https://kit.fontawesome.com/90ec6e164b.js" crossorigin="anonymous"></script>


                <style>
                  body{
                    background-color: rgb(245, 243, 239);
                  }
                  .details{
                    margin-top: 100px;
                    margin-right: 250px;
                    
                    
                    
                  }
                  .book-container{
                    display: flex;
                   
                  }
                  .book-details {
                    margin-left: 80px; 
                    margin-top:38px;
                  }
                  .book-container img{
                    margin-left: 345px;
                    width: 300px;
                    height: 430px;
                    border-radius: 15px;
                    /*box-shadow: 5px 5px 10px #555;*/
                    filter: drop-shadow(30px 25px 20px  #555);
          
                                
                    

                  }
                  .book-details h1{
                    padding-top:0;
                    font-size: 50px;
                    font-weight: bold;
                    padding-bottom: 20px;
                    font-family:Candara ;

                  }
                  .book-details h4{
                    font-size: 20px;
                    font-weight: bold;
                    padding-bottom: 15px;
                    font-family:Verdana;
                  }
                  .book-details p{
                    font-size: 18px;
                    font-weight: 500;
                    text-align: justify;
                    padding-bottom: 30px;
                    padding-right: 165px;
                    font-family: ;
                    font-style:italic;
                  }
                  .buttn{
                    display: flex;
                   
                  }
                  .button1{
                    width: 200px;
                    border-radius: 15px;
                    font-size: 16px;
                    background-color: black;
                    color: white;
                    margin-right: 150px;
                    padding: 5px 10px;
                  }
                  .button2{
                    width: 200px;
                    border-radius: 15px;
                    font-size: 16px;
                    background-color: black;
                    color: white;
                    margin-right: 50px;
                    padding: 5px 10px;

                  }
                  .desc{
                    background-color: white;
                    display: flex;
                    flex-wrap: wrap;
                    margin-left: 250px;
                    margin-top: -120px;
                    border-radius: 15px;
                  }
                  .colm1{
                    flex-basis: 50%;
                    flex-grow: 1;
                    min-height:inherit;
                    display: flex;
                    flex-direction: column;
                    padding:60px;
                    margin-top:130px;
                  }
                  .colm1 h3{
                    margin-top: 52px;
                    font-size: 22px;
                    font-weight: bold;
                  }
                  .colm1 p{
                    margin-top: 22px;
                    font-size: 20px;
                    font-weight: 500;
                    text-align: justify;
                    font-family:Verdana;
                  
                  }
                  .down_count{

                    margin-top: 0px;
                    margin-bottom:-15px;
                    font-size:12px;
                    
                  }
                  .colm2{
                    flex-basis: 50%;
                    flex-grow: 1;
                    padding:60px;
                    margin-top:130px;
                  }
                  .colm2 h3{
                    margin-top: 52px;
                    font-size: 22px;
                    font-weight: bold;
                    
                  }
                  .colm2 p{
                    margin-top: 22px;
                    font-size: 20px;
                    font-weight: 500;
                    text-align: justify;
                    font-family:Verdana;
                    

                  }
                  hr{
                    padding-right: 50px;
                    height: 2px;

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
                    width: 40px;
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
                    margin-left: 30px;
                    font-weight: 500;
                    padding-top:10px;
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
                    width: 50%;
                    font-size: 22px;
                    border: 1px solid white;
                    background-color: rgb(245, 243, 239);
                    color: black;
                    border-radius: 10px;
                    font-family:Cambria;
                  }
                  textarea {
                    /*display: block;*/
                    width: 50%;
                    margin-left: 20px;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    padding: 10px;
                    font-size: 18px;
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
                    top: 158%;
                    margin-left: 30px;
                    border-radius: 10px;
                    transition: 0.5s;
                  }
                  .post:hover{
                    background-color: red;
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
                  
.demo{

  width:95%;
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
                            
                            <li><a href="actionnew.php">Action</a></li>
                            <li><a href="#">Non-fiction</a></li>
                            <li><a href="#">Romance</a></li>
                            <li><a href="#">Si-fi</a></li>
                            <li><a href="#">Children's</a></li>
                            <li class="dropdown-submenu">
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
                <?php
                
                echo"<div class='details'>";

                  echo"<div class='book-container'>";
        
                    echo"<img src='$fetchsrc$fetch[b_img]' alt='' >";
                    echo"<div class='book-details'>";
                    echo"<p class='down_count'>Views ($fetch[view])</p>";
                      echo"<h1 >$fetch[b_name]</h1>";
                      echo"<h4>$fetch[b_author]</h4>";
                      echo"<p class='book-description'>Get Ready to Uncover the dark secrets and betrayals in the book.A thrilling adventure awaits you</p>";
                      ?>
                      <br>
                      <br>
                   
                   
                     
                      <div class="buttn">
                        <?php
                         echo"<a href='pdfreaderaction.php?id=$fetch[id]'><button  class='button1'><i class='bi bi-book-half'></i> Start Reading</button></a>";
                      if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                        echo<<<print
                        <a download="img/$fetch[book]" href="img/$fetch[book]"> <button class="button2"><i class="fa-solid fa-cloud-arrow-down"></i> Download</button></a>
      
                        print;
                      }
                        else if(!isset($_SESSION['status']) || (isset($_SESSION['status']) && $_SESSION['status'] ==0)){
                          
                          echo "<a href='subscription.php'> <button  class='button2'><i class='fa-solid fa-cloud-arrow-down'></i> Download</button></a>";
  
                        }
                        
              
                     
    echo "  <button  class='button2' id='listenButton' ><i class='fa-solid fa-headphones'></i> Listen</button>";
    ?>
  </div>
  <?php
  if (isset($_SESSION['status']) || (isset($_SESSION['status']) && $_SESSION['status'] == 1)){
echo<<< print
  <div id="wrapper-listen">
    <div id="popup-listen">
      <button id="closeButton"> <i class="fa-solid fa-xmark"></i></button>
      <button class="startButton" id="playBtn"> <i class="fa-solid fa-play"></i> Start</button>
      <button class="pauseButton" id="pauseBtn"><i class="fa-solid fa-pause"></i> Pause</button>
      
    </div>
  </div>
print;
  }
?>
                      
                    
                      <br>
                      <div class="demo"><hr></div>
                    </div>
                  </div>
                  <div class="desc">
                    <div class="colm1">
                      <h3>Description</h3>
                      <p><?php echo "$fetch[description]";?> </p>
                      <br>
                      <br>
                      <?php
                      $email="$_SESSION[email]";
                      $book_id=$fetch['id'];
                       $query5="SELECT * FROM `fvtaction` where email='$email' and book_id='$book_id'";
                       $result5=mysqli_query($con,$query5);
                       $fetch5=mysqli_fetch_assoc($result5);
                     
                       ?>
                      <form method="post" action="insert.php">
                   <?php
                      if(!isset($fetch5['exist'])||$fetch5['exist']==0){
                        echo<<<print
  <button class="button2" type="submit"name="fvt">
  <i class="bi bi-file-earmark-plus"></i> Add to Favourite
  </button>
  <input type="hidden" name="book_id" value="$book_id">
  <input type="hidden" name="email" value="$email">
  print;
                      }
                      else if(isset($fetch5['exist'])||$fetch5['exist']==1){
                        $fvtid=$fetch5['id'];
                    echo<<<print
                    <button class="button2" type="submit"name="added">
                    <i class="bi bi-file-earmark-check"></i> Added to Favourite
                    </button>
                    <input type="hidden" name="book_id" value="$book_id">
                    <input type="hidden" name="email" value="$email">
                    <input type="hidden" name="id" value="$fvtid">
  print;
                    }
                    ?>
</form>
                      
                    </div>
                    <div class="colm2">
                      <h3>Editor</h3>
                      <?php echo"<p>$fetch[b_author], $fetch[publisher] </p>";?>
                      <h3>Language</h3>
                      <p>English</p>
                      <h3>Year</h3>
                      <p>2023</p>
                      <h3>Catagory</h3>
                      <p>Action</p>
                    </div>
                    
                  </div>
                  <div class="comments">
                   
                  <div class="comment-section">
                    <h2 style="margin-left:25px;"><?php echo "Comments ({$fetch['cment']})"?></h2>
                    <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['email'])) {
                      $book_id = $fetch['id'];
                      echo <<<print
                      <form class="comment-form" method="post" action="insert.php">
                      <input type="hidden" name="book_id" value="$book_id">
                      <input type="hidden" name="comment_id" value="">

                      <textarea name="comment" required></textarea>
                      <button type="submit"class="post" name="action1" value="post">Post</button>
                      <button type="submit"class="post" name="action1" value="edit" style="display:none;">Edit</button>
                      </form>
                      print;
                    }
                    ?>
                    <?php
$book_id = $_GET['id'];
// Get comments from database
$sql = "SELECT * FROM commentaction WHERE book_id=$book_id ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);

// Display comments
while ($row = mysqli_fetch_assoc($result)) {
$comment_id = $row['id'];
$name = $row['name'];
$userimg = $row['userimg'];
$comment = $row['comment'];
$commentTime = $row['created_at'];

date_default_timezone_set('Asia/Dhaka');


// Get current time
$currentTime = new DateTime('now', new DateTimeZone('UTC'));
$currentTime->setTimezone(new DateTimeZone('Asia/Dhaka'));

// Calculate time difference
$timeDiff = $currentTime->diff(new DateTime($commentTime));


if ($timeDiff->y > 0) {
  $diffStr = $timeDiff->format('%y year(s) ago');
} elseif ($timeDiff->m > 0) {
  $diffStr = $timeDiff->format('%m month(s) ago');
} elseif ($timeDiff->d > 6) {
  $weeks = floor($timeDiff->d / 7);
  $diffStr = $weeks . ' week(s) ago';
} elseif ($timeDiff->d > 0) {
  $diffStr = $timeDiff->format('%d day(s) ago');
} elseif ($timeDiff->h > 0) {
  $diffStr = $timeDiff->format('%h hour(s) ago');
} elseif ($timeDiff->i > 0) {
  $diffStr = $timeDiff->format('%i minute(s) ago');
} else {
  $diffStr = $timeDiff->format('%s second(s) ago');
}


                   echo"<div class='comment-list'>";
                      echo"<div class='comment'>";
                        echo"<div class='comment-header'>";
                          echo"<img src='img/$userimg'>";
                          echo"<h2 class='comment-name'>$name</h2>";
                        echo"</div>";
                        echo"<p class='comment-body'>$comment</p>";
                        echo"<div class='edit-delete'>";
                          echo"<p>$diffStr</p>";
                          if(isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['email']) && ($row['email']==$_SESSION['email'])) {
                            echo <<<print

                            <button class="edit-btn" onclick="editComment($comment_id, '$comment')">Edit</button>
                            <button onclick="confirm_delete($comment_id,$book_id)" class="delete-btn">Delete</button>
                            print;
                          }
                          echo<<<print1
        
                          </div>
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
 document.querySelector('form button[name=action1][value=post]').style.display = "none";
 document.querySelector('form button[name=action1][value=edit]').style.display = "inline";
}
</script>

<script>
                        function confirm_delete(id,book_id){

                            if(confirm("Are you sure you want to delete?")){
                              window.location.href = "edit.php?idcomaction=" + id + "&book_id=" + book_id;
                            }
                            else {
                              window.location.href = window.location.href;
  }
                        }
                        </script>          



                         
            <br><br><br><br><br><br><br>
            
            <footer style="width:120%";>
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

            <script>
           
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.7.570/pdf.min.js"></script>
    <script>
      const playBtn = document.getElementById('playBtn');
      const pauseBtn = document.getElementById('pauseBtn');
      let audio = null;
      let pdfDoc = null;
      let utterance = null;

      playBtn.disabled = true;
      pauseBtn.disabled = true;

      // Load the PDF file from URL
      const pdfUrl = 'img/<?php echo $fetch['book']; ?>';
      pdfjsLib.getDocument(pdfUrl).promise.then(async (doc) => {
        pdfDoc = doc;

        let text = '';

        const pageTextPromises = [];

        for (let i = 1; i <= pdfDoc.numPages; i++) {
          const pageTextPromise = pdfDoc.getPage(i).then((page) => {
            return page.getTextContent().then((content) => {
              const strings = content.items.map(item => item.str);
              return strings.join(' ');
            }).catch((error) => {
              console.error('Error getting text content:', error);
              alert('Error getting text content. Please try again.');
              return '';
            });
          }).catch((error) => {
            console.error('Error getting page:', error);
            alert('Error getting page. Please try again.');
            return '';
          });

          pageTextPromises.push(pageTextPromise);
        }

        const pageTexts = await Promise.all(pageTextPromises);
        text = pageTexts.join(' ');

        utterance = new SpeechSynthesisUtterance(text);
        utterance.onend = () => {
          playBtn.disabled = false;
          pauseBtn.disabled = true;
        };
        playBtn.disabled = false;
      }).catch((error) => {
        console.error('Error loading PDF:', error);
        alert('Error loading PDF. Please try again.');
      });

      playBtn.addEventListener('click', () => {
        if (utterance) {
          if (!speechSynthesis.speaking) {

speechSynthesis.speak(utterance);
playBtn.disabled = true;
pauseBtn.disabled = false;
} else if (speechSynthesis.paused) {
speechSynthesis.resume();
playBtn.disabled = true;
pauseBtn.disabled = false;
}
}
});
pauseBtn.addEventListener('click', () => {
if (utterance && speechSynthesis.speaking) {
speechSynthesis.pause();
playBtn.disabled = false;
pauseBtn.disabled = true;
}
});
  // Re-enable buttons on window unload
  window.addEventListener('beforeunload', () => {
    if (speechSynthesis.speaking) {
      speechSynthesis.cancel();
    }
    playBtn.disabled = true;
    pauseBtn.disabled = true;
  });
</script>
           
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
             
            </script>

<script>
        $(document).ready(function(){
         $(".loader-wrapper").fadeOut("slow");
        });
    </script>
    <script src="listen.js"></script>
          </html>        
          