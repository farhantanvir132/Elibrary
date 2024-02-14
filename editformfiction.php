<?php
require('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            padding-top: 120px;
            font-size:20px;
        }

        .btn2{

            margin: 50px;
            margin-left:220px;
            width: 100px;
            height: 100px;
            font-size: 20px;
            font-weight: 500;
            padding: 20px;
            width: 350px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            background: grey;
            color: black;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
        }

        .btn1:hover {
            transform: scale(1.2);
            /* z-index: 1.2; */
            color: white;
            background-color: black;
        }
        .btn2:hover {
            transform: scale(1.2);
            /* z-index: 1.2; */
            color: white;
            background-color: black;
        }

        nav {
            display: flex;
            font-size: 1rem;
            background-color: #032f4dbf;
            height: 5rem;
            align-items: center;
        }

        nav img {
            height: 3.5rem;
            margin: 8px 30px;
        }

        nav h1 {
            margin: 20px 0px;
            font-size: 30px;
        }
        .maincontain{
          
          margin: 50px auto;
          background: white;
          width: 80%;
          height: auto;
        }
        .buttons {
  display: flex;
  gap: 50px;
  margin: 20px;
}

.buttons button {
  border-radius: 10px;
  color: black;
  font: small-caps bold 24px/1 sans-serif;
  font-size: 40px;
  margin: 10px;
  padding: 20px;
  width: 300px;
  height: 150px;
  background-color: white;
  text-align: left;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  
}

.buttons button span {
  font-size: 24px;
  margin-top: 10px;
}

        
        .blocks{
          display: flex;
          width: 100%;
          height: 100%;
          margin-left: 30px;
        }
        .action{
          width: 100%;
          height: auto;
         
          display: block;
        }
        .fiction{
          display: none;
          width: 100%;
          height: auto;
        
        }
 .container{


    font-size: 20px;
 }
 .container input{
    font-size: 20px;
    

 }
    </style>

    </style>
</head>
<body>
<nav>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./book img/user.png"></a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <h1>Admin</h1>

            </nav>
    <div class="blocks">
            <div class="action" id="action">
    <?php
        $query = "SELECT * FROM `fiction` WHERE id=$_GET[id]";
        $result = mysqli_query($con, $query);
        $fetch = mysqli_fetch_assoc($result);
        $fetchsrc = FETCH_SRC;
        ?>
        <?php
            echo <<<print
        <div class="container">
            <div class="col-8">
                <form action="edit.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                     <label for="b_img">Book Image </label>
                    <input type="file" name="b_img" value="$fetchsrc$fetch[b_img]" class="form-control" accept=".jpg,.png,.svg">
                  
                </div>
                <br>
                <div class="form-group">
                    <label for="book">Book pdf </label>
                    <input type="file" name="book"value="img/$fetch[book]" class="form-control" accept=".pdf">
                </div>
                <br>
<div class="form-group">
            <label for="b_name">Book Name </label>
            <input type="text" name="b_name" value="$fetch[b_name]" class="form-control">
</div>
<br>
<div class="form-group">
            <label for="b_author">Author Name </label>
            <input type="text" name="b_author" value="$fetch[b_author]" class="form-control">
</div>
<br>
<div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher"value="$fetch[publisher]" class="form-control">
</div>
<br>
<div class="form-group">
            <label for="year">Year </label>
            <input type="text" name="year" value="$fetch[year]" class="form-control">
           
</div>
<br>
<div class="form-group">
 <label for="description">Description</label>
  <textarea style="font-size:18px;" name="description"class="form-control">$fetch[description]</textarea>
</div>
<br>
<div class="form-group">
            <label for="lang">Language</label>
            <input type="text" name="lang" value="$fetch[lang]" class="form-control">
</div>
<br>
<div class="form-group">
            <label for="catagory">Catagory</label>
            <input type="text" name="catagory" value="$fetch[Catagory]" class="form-control">
</div>
<br>
<div class="form-group">
            <input type="hidden" name="id" value="$fetch[id]" class="form-control">
</div>
<input type="submit" name="update" Value="Save" class="btn2">
</form>
</div>
</div>
print;
        ?>
        </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
