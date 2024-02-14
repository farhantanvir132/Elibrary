
<?php
require('dbcon.php');
$query = "SELECT count(*) FROM `fiction`";
$result = mysqli_query($con, $query);
$count = mysqli_fetch_array($result)[0];
$query1 = "SELECT count(*) FROM `action`";
$result1 = mysqli_query($con, $query1);
$count1 = mysqli_fetch_array($result1)[0];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="notification.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* 
        body{
           
           background-size: 120%;
        } */


          .btn1 {
            margin: 50px;
            width: 510px;
            height: 310px;
            font-size: 32px;
            font-weight: 500;
            padding: 20px;
            width: 350px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            background: #ebeef1;
            color: black;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
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
</head>

<body>
    <main>
        <div>
            <nav>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img style="border-radius:50%"; src="./icons/avatar.png"></a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="admindashboard.php">Home</a></li>
                    <li><a class="dropdown-item" href="admincata.php">Category</a></li>
                        <li><a class="dropdown-item" href="useradmin.php">Users</a></li>
                        <li><a class="dropdown-item" href="comments.php">Comments</a></li>
                        <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <h1>Admin</h1>


            </nav>
        </div>
        <div class="maincontain">
          <div class="buttons">
            <button id="action_btn"><i class="bi bi-file-earmark-plus"></i>Action</button>
           
            <button id="fiction_btn"><i class="bi bi-file-earmark-plus"></i>Fiction</button>

          </div>
          <br>
          <br>
          <div class="blocks">
            <div class="action" id="action">
               
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
            <input type="text" name="publisher" class="form-control">
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
 <label for="sortdes"> Sort Description</label>
  <textarea name="sortdes"class="form-control"></textarea>
 
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
<input type="submit" name="submit1" Value="Insert" class="btn2">
</form>
</div>
</div>

            </div>


            <div class="fiction" id="fiction">
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
            <input type="text" name="publisher" class="form-control" >
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
 <label for="sortdes"> Sort Description</label>
  <textarea name="sortdes"class="form-control"></textarea>
 
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
<br>
<input type="submit" name="submit" Value="Insert" class="btn2">
</form>
</div>
</div>
            </div>

          </div>
          
        </div>
    </main>
 <script>
        var box = document.getElementById('box');
        var down = false;


        function toggleNotifi() {
            if (down) {
                box.style.height = '0px';
                box.style.opacity = 0;
                down = false;
            } else {
                box.style.height = 'auto';
                box.style.opacity = 1;
                down = true;
            }
        }
    </script>
    <script>
      var action_btn = document.getElementById('action_btn');
      var fiction_btn = document.getElementById('fiction_btn');
      var action = document.getElementById('action');
      var fiction = document.getElementById('fiction');
      
      action.style.display = 'block';
      action_btn.style.backgroundColor = 'black';
      action_btn.style.color = 'white';
      
      action_btn.addEventListener('click', () => {
        action.style.display = 'block';
        fiction.style.display = 'none';
        action_btn.style.backgroundColor = 'black';
        action_btn.style.color = 'white';
        fiction_btn.style.backgroundColor = '';
        fiction_btn.style.color = '';
      });
      
      fiction_btn.addEventListener('click', () => {
        action.style.display = 'none';
        fiction.style.display = 'block';
        fiction_btn.style.backgroundColor = 'black';
        fiction_btn.style.color = 'white';
        action_btn.style.backgroundColor = '';
        action_btn.style.color = '';
      });
      



    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>