<?php
session_start();
require('dbcon.php');
if (!isset($_SESSION['email'])) {
header("location:error.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Library</title>
  <link rel="stylesheet" href="action.css">
  <link rel="stylesheet" href="previousnext.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <script src="https://kit.fontawesome.com/90ec6e164b.js" crossorigin="anonymous"></script>


  <style>
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
    .searchdiv{


    }
    hr{
      margin-right:185px;
      margin-left:255px ;
      margin-bottom:20px;  

    }
   
  </style>
</head>

<body>
  <div id="preloader"></div>
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
              <li><a href="#">Action</a></li>
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
                    
                      <div id="userProfile">
                        <img src="<?php echo $profile_picture_url; ?>" alt="User Profile" class="user-pic" onclick="togglemenu()">
                        <div class="sub-menu-wrap" id="subMenu">
                          <div class="sub">
                            <div class="user-info">
                              <img src="<?php echo $profile_picture_url; ?>" alt="">
                              <h3><?php echo $_SESSION['username'];?></h3>
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

                    </nav>
                
                </header>
      
  
  
  <br>
  <br>



  <h1 class="action" id="searchstyle" style="text-align:center; font-size: 36px; font-weight: bold; text-transform: uppercase; text-shadow: 2px 2px 4px #000000; letter-spacing: 2px;margin-bottom:50px;margin-top:128px;margin-right:185px;margin-left:260px"></h1><hr> 
  <div class="category">
  <?php
    $search = $_POST['search'] ?? '';
    if ($search != '') {
	$sql = "SELECT * FROM fiction WHERE b_name LIKE '%$search%' OR year = '$search' OR publisher LIKE '%$search%' OR b_author LIKE '%$search%'
          UNION ALL 
          SELECT * FROM action WHERE b_name LIKE '%$search%' OR year = '$search' OR publisher LIKE '%$search%' OR b_author LIKE '%$search%'";

	$result = mysqli_query($con, $sql);
    $fetchsrc = FETCH_SRC;
    $count = 0;
	if (mysqli_num_rows($result) > 0) {
        while ($fetch = mysqli_fetch_assoc($result)) {
            if ($count % 3 == 0) {
              echo '<div class="book-row">';
            }
            echo <<<print
              <div class="card1">
                <div class="round"></div>
                <div class="content">
                  <h2>$fetch[b_name]</h2>
                  <p style="text-align:justify">$fetch[description]</p>
                  <a href="book1.php?id=$fetch[id]">Read More</a>
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
	} else {
        echo'<div class="searchdiv">';
        echo'<h1 style="text-align:center;">No results found</h1>';
        echo'</div>';
    
	}
}
  ?>
</div>
 <br>

  <footer style="margin-top:290px;">
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
    var loader= document.getElementById("preloader");
    window.addEventListener("load",function(){
      loader.style.display = "none";
    });
    

  </script>



</body>






<script src="index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
  integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
  integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    autoplay: true,
    autoplayTimeout: 2000,
    stagePadding: 100,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  })
</script>
<script>
  let nums = document.querySelectorAll('.num');
  let section = document.querySelector('.three');
  let started = false;

  function startCount(el, goal) {
    let currentCount = parseInt(el.textContent);
    let increment = Math.ceil(goal / 50); // Change this number to adjust the speed of the animation
    let countInterval = setInterval(function () {
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
      nums.forEach(function (num) {
        startCount(num, parseInt(num.dataset.goal));
      });
      started = true;
    }
  }

  window.addEventListener('scroll', onScroll);

</script>
<script>
                var i=0,text;
                  text= 'The Search Result of "<?php echo $_POST['search'];?>"'
                  
                  
                function typing(){
                  if(i<text.length){
                    document.getElementById("searchstyle").innerHTML += text.charAt(i);
                    i++;
                    setTimeout(typing,20);
                  }
                }
               
                setTimeout(typing, 2000);





               
              </script>

</html>