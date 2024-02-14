<?php
session_start();
include('dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
                   position:relative;
                   display:flex;
                   flex-direction:column;
                   transform: translateY(50%);
                   margin-bottom:200px;
                   margin-left:100px;
                   
        }
        .ab{
         
                margin-left:140px;
                margin-top:60px;
                font-size:20px;
    }
    .abc{
                margin-left:140px;
                margin-top:20px;
                font-size:30px;
    }



  h1{

    font-size: 35px;
    color:red;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    


  }

    </style>
</head>
<body>
    <div class="ab"><h1>Please Login First to Access this page!!</h1></div>
    <?php
    if (isset($_SESSION['email'])) {
     echo<<<print
      <div class="abc"><a href="index1.php">Home</a></div>
      print;

}
else if(!isset($_SESSION['email'])){
  echo<<<print
  <div class="abc"><a href="index.php">Home</a></div>
  print;
}
?>

</body>
</html>