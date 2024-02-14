<?php
require('dbcon.php');
session_start();
if(!isset($_SESSION['admin_name'])){
  header("location:error.html?");
}

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
        /* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
        /* 
        body{
           
           background-size: 120%;
        } */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;

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

table{ 
  color: black; 
  font-size: 28px; 
  font-style: normal;
  text-align:justify; 
  border-radius: 10px;
}
th,td {
    padding: 12px 7px 12px 7px;
  }
  .container{
    padding-left: 50px;
  }
  span.msg{
    color:red;
    font-size:14px;
  }

    </style>
</head>
<body>
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
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <h1>Admin</h1>


            </nav>
        </div>
        <div class="container">
            <form action="confirmpass.php" onsubmit="return checkvalidation()" method="post">
<table>
<tr>
<td>New Password</td>
<td> <input  type="password" id="newpassword" name="newpass"> <span class= "msg" id="n"></span><br>
</td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input  type="password" id="confirmpassword" name="conpass"> <span class="msg" id="c"></span><br>
</td>
</tr>
<br>
<tr>
<td colspan="2" align="center">
<button style= "border-radius: 10px; position: justified;" type="submit" name="submit" class="btn btn-dark"> Save </button>
<button style= "border-radius: 10px; position: justified;" type="reset" name="reset"class="btn btn-dark"> Cancel </button>
</td>
</tr>
<tr>
</table>
</form>       
        </div>
    <script>
      function checkvalidation(){
        var a=document.getElementById('newpassword').value;
        var b=document.getElementById('confirmpassword').value;
        if(a==''){
            document.getElementById('n').innerHTML="Please Enter new Password";
            return false;
        }
        if(b!=a){
            document.getElementById('c').innerHTML="Password Could not match!";
            return false;
        }
      }
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
