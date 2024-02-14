<?php
require('dbcon.php');
session_start();
if(isset())
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
    <style>
        .container_main {
            position: absolute;
            left: 60%;
            top: 50%;
            width: 100vh;
            transform: translate(-50%, -30%);
        }

        nav {
            display: flex;
            font-size: 1rem;
            background-color: #B9B9B8;
            height: 5rem;
            align-item: center;
        }

        nav img {
            height: 3.5rem;
            margin: 8px 30px;
        }

        nav h1 {
            margin: 20px 0px;
            font-size: 30px;

        }

        .btn1 {
            margin: 10px;
            font-size: 14px;
            font-weight: 500;
            padding: 20px;
            width: 70px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            background: #ebeef1;
            color: black;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            position: absolute;
            top: 98%;
            left: 30%;
        

        }

        .btn1:hover {
            transform: scale(1.2);
            z-index: 2;
        }

    </style>
</head>
<body>
<nav>
        <a href="admindashboard.php"><img src="book img/admin.png" alt=""></a>
        <h1>Admin</h1>
    </nav>
<div class="container_main">
        <?php
            echo <<<print
        <div class="container">
            <div class="col-8">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                     <label for="b_img">Book Image </label>
                    <input type="file" name="b_img" class="form-control" accept=".jpg,.png,.svg" required>
                  
                </div>
                <br>
                <div class="form-group">
                    <label for="book">Book pdf </label>
                    <input type="file" name="book" class="form-control" accept=".pdf" required>
                </div>
                <br>
<div class="form-group">
            <label for="b_name">Book Name </label>
            <input type="text" name="b_name" class="form-control" required>
</div>
<br>
<div class="form-group">
            <label for="b_author">Author Name </label>
            <input type="text" name="b_author" class="form-control" required>
</div>
<br>
<div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" class="form-control" required>
</div>
<br>
<div class="form-group">
            <label for="year">Year </label>
            <input type="text" name="year" class="form-control" required>
           
</div>
<br>
<div class="form-group">
 <label for="description">Description</label>
  <textarea name="description"class="form-control"></textarea>
 
</div>
<br>
<div class="form-group">
            <label for="lang">Language</label>
            <input type="text" name="lang" class="form-control" required>
</div>
<br>
<div class="form-group">
            <label for="catagory">Catagory</label>
            <input type="text" name="catagory" class="form-control" required>
</div>
<input type="submit" name="submit1" Value="Add" class="btn1">
</form>
</div>
</div>
print;
        ?>
        </div>
</body>
</html>
  