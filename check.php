<?php
require('dbcon.php');
$query = "SELECT book FROM fiction WHERE id=11";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_assoc($result);
//This code Works properly Until I reload the page. Once I reload the page then its Play and pause button Does not Work. Its Play and Pause Button clickable but Unable to play the speech. Fix the problem in thay way if I reload the Page So many time still it should play the Speech properly and Generate me the correct code
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>PDF to Speech</title>
  </head>
  <body>
    <h1>PDF to Speech</h1>
    <div>
      <button id="playBtn">Play</button>
      <button id="pauseBtn">Pause</button>
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
      pdfjsLib.getDocument(pdfUrl).promise.then((doc) => {
        pdfDoc = doc;

        let text = '';

        for (let i = 1; i <= pdfDoc.numPages; i++) {
          pdfDoc.getPage(i).then((page) => {
            page.getTextContent().then((content) => {
              const strings = content.items.map(item => item.str);
              text += strings.join(' ');

              if (i === pdfDoc.numPages) {
                utterance = new SpeechSynthesisUtterance(text);
                utterance.onend = () => {
                  playBtn.disabled = false;
                  pauseBtn.disabled = true;
                };
                playBtn.disabled = false;
              }
            }).catch((error) => {
              console.error('Error getting text content:', error);
              alert('Error getting text content. Please try again.');
            });
          }).catch((error) => {
            console.error('Error getting page:', error);
            alert('Error getting page. Please try again.');
          });
        }
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
    </script>
  </body>
</html>

