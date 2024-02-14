
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

        .btn1:hover {
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
       
        body{
           background-size: 120%;
        }
        hr{
            font-weight:bold;
            color: #640127;
        }
      
        main{
            background-size: 1100px;
        }
        .foot{
         height: 70px;
         background-color:#4b0082;
        }
    .top{
       padding-top: 17px;
    }
     .top a{
      color:beige;
      background-color: transparent;
      text-decoration: none;
      font-size: larger;
      background-attachment: fixed;
        }
        .top a:hover{
      color:rgb(148, 255, 86);
      background-color: transparent;
      text-decoration: underline;
        }
        .hov{
            box-sizing: border-box;
            box-shadow: 0px 7px 7px black;
            transition: 0.5s ease-in-out;
        }
        .hov:hover{
            transform:translateY(15px);
    
        }
        table th, td{
            font-size: large;
            font-family:Bahnschrift;
        }
        .tab{
            background-color:#640127;
            color: snow;
        }
        table th{
            color: snow;
        }
        .tab1{
            background-color: rgba(238, 231, 231, 0.945);
            border: 0.5px slategrey;
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
            <button id="action_btn">Action
            <span><?php echo "($count1)";?></span>
            </button>
           
            <button id="fiction_btn">Fiction
            <span><?php echo "($count)";?></span>
            </button>

          </div>
          <div class="blocks">
            <div class="action" id="action">
                        <table  class=" table table-hover text-center">
                         <tr class="tab">
                                <th>Book Image</th>
                                <th>PDF</th>
                                <th>Title</th>
                                <th>Author Name</th>
                                <th>Publisher</th>
                                <th>Year</th>
                                <th>Description</th>
                                <th>Language</th>
                                <th>Catagory</th>
                                <th>Actions</th>


                            </tr>
                            <?php
                               $query="SELECT * FROM `action`";
                               $result=mysqli_query($con,$query);
                               $fetchsrc=FETCH_SRC;
                               while($fetch=mysqli_fetch_assoc($result)){
                               echo<<<print
                                <tr class="tab1 align-middle">
                                <td><img src="$fetchsrc$fetch[b_img]" width="90px" height="20%"></td>
                                <td><a href="actionpdfadmin.php?id=$fetch[id]" class="btn  btn-warning ">View PDF</a></td>
                                <td>$fetch[b_name]</td>
                                <td>$fetch[b_author]</td>
                                <td>$fetch[publisher]</td>
                                <td>$fetch[year]</td>
                                <td>$fetch[description]</td>
                                <td>$fetch[lang]</td>
                                <td>$fetch[Catagory]</td>

                                <td>
                                <a href="editformaction.php?id=$fetch[id]" class="btn  btn-warning "><i class="bi bi-pencil-square"></i></a>
                                <button onclick="confirm_delete($fetch[id])" class="btn  btn-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            print;

                               }

                              ?> 
                           
                          </table>
            </div>
            <div class="fiction" id="fiction">
            <table  class=" table table-hover text-center">
                         <tr class="tab">
                                <th>Book Image</th>
                                <th>PDF</th>
                                <th>Title</th>
                                <th>Author Name</th>
                                <th>Publisher</th>
                                <th>Year</th>
                                <th>Description</th>
                                <th>Language</th>
                                <th>Catagory</th>
                                <th>Actions</th>

                            </tr>
                            <?php
                               $query="SELECT * FROM `fiction`";
                               $result=mysqli_query($con,$query);
                               $fetchsrc=FETCH_SRC;
                               while($fetch=mysqli_fetch_assoc($result)){
                               echo<<<print
                                <tr class="tab1 align-middle">
                                <td><img src="$fetchsrc$fetch[b_img]" width="90px" height="20%"></td>
                                <td><a href="fictionpdfadmin.php?id=$fetch[id]" class="btn  btn-warning ">View PDF</a></td>
                                <td>$fetch[b_name]</td>
                                <td>$fetch[b_author]</td>
                                <td>$fetch[publisher]</td>
                                <td>$fetch[year]</td>
                                <td>$fetch[description]</td>
                                <td>$fetch[lang]</td>
                                <td>$fetch[Catagory]</td>
                                <td>
                                <a href="editformfiction.php?id=$fetch[id]" class="btn  btn-warning "><i class="bi bi-pencil-square"></i></a>
                                <button onclick="confirm_delete1($fetch[id])" class="btn  btn-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            print;

                               }

                              ?> 
                           
                          </table>
    
            </div>

          </div>
          
        </div>
    </main>
    <script>
                        function confirm_delete1(idfiction){

                            if(confirm("Are you sure you want to delete?")){
                                window.location.href="edit.php?idfiction="+idfiction;
                            }
                        }
                        </script>
                          <script>
                        function confirm_delete(idaction){

                            if(confirm("Are you sure you want to delete?")){
                                window.location.href="edit.php?idaction="+idaction;
                            }
                        }
                        </script>

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