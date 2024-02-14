<?php
session_start();
require('dbcon.php');
if (isset($_GET['id'])) {
	$email = $_SESSION['email'];
  }
  if(isset($_SESSION['status']) && $_SESSION['status'] == 0 || !isset($_SESSION['email'])){
    header("location:subscription.php");
   }
$query = "SELECT book FROM fiction WHERE id=$_GET[id]";
$query1 = "SELECT * FROM fiction WHERE id=$_GET[id]";
$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);
$fetch = mysqli_fetch_assoc($result);
$fetch1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>E-Library</title>
                <link rel="stylesheet" href="index.css" />
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

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
                <script src="https://kit.fontawesome.com/90ec6e164b.js" crossorigin="anonymous"></script>
    <style>
            .blink {
                animation: blinker 1.5s linear infinite;
                color: Black;
                font-family: sans-serif;
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
            .buttonaudio{

              position:absolute;
              top:40%;
              left:36%;


            }
            .buttonaudio1{

               position:absolute;
               top:30%;
               right:25%;
               left:25%;
               color:snow;
           

                }
           
            .button1{
                    color: white;
                    background-color: var(--nav-color);
                    width: 111px;
                    height: 40px;
                    border-radius: 5px;
                    font-size: 15px;
                    cursor: pointer;
                    margin-right: 25px;
                    box-shadow: 5px 5px 10px rgba(0, 0, 0.5, 0.9);
                    

                  }
                  .bck {

               margin: 100px;
              margin-left: 220px;
              width: 900px;
            height: 450px;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.bck::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url("book img/banner.jpg");
  background-size: cover;
  filter: blur(3px);
  z-index: -1;
}

.bck h1, .bck p {
  position: relative;
  z-index: 1;
}
                  
        </style>
  </head>
  <body>
  <div class="bck"> 
  <marquee class="blink buttonaudio1">
  <?php
    echo<<<print
    <h1>You are Listening "$fetch1[b_name]"</h1>
  print;
  ?>
  </marquee>
  
    <div class="buttonaudio">
     <button class="button1"id="playBtn"><i class="bi bi-play-fill"> Play</i></button>
     <button class="button1"id="pauseBtn"><i class="bi bi-pause-circle-fill"> Pause</i></button>

    </div>
                </div>
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
</body>
</html>