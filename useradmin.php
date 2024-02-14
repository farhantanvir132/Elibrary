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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
.group{
            display: flex;
    
        }
        body{
           background-size: 120%;
        }
        hr{
            font-weight:bold;
            color: #640127;
        }
        .gro{
            font-weight:bold;
            color:snow;
            margin-top: 30px;
            text-align: right;
            padding-right:130px ;
            font-family:cursive
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

    .profile-image {
    width: 65px;
    height: 65px;
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
                        <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <h1>Admin</h1>

            </nav>
        </div>
                       <div class="container">
                       <h3 style="color:#640127; text-align: center; margin-top:30px; font-weight: bold;">User Information<hr></h1>
                        <table  class=" table table-hover text-center">
                         <tr class="tab">
                                <th>User Picture</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Expiration Date</th>
                                <th>Activated Plan</th>
                                <th>View Counts</th>
                                <th>Actions</th>


                            </tr>
                            <?php
                               $query="SELECT * FROM `users`";
                               $result=mysqli_query($con,$query);
                               $fetchsrc=FETCH_SRC;
                               while($fetch=mysqli_fetch_assoc($result)){
                               echo<<<print
                                <tr class="tab1 align-middle">
                                <td><img src="$fetchsrc$fetch[user_picture]" alt=""class="profile-image" width="90px" height="20%"></td>
                                <td>$fetch[id]</td>
                                <td>$fetch[username]</td>
                                <td>$fetch[email]</td>
                                print;
                                if(isset($fetch['status'])&& $fetch['status']==1){
                                    echo<<<print1
                                    <td>$fetch[expiration_date]</td>
                                    print1;
                                }
                                else if(isset($fetch['status'])&& $fetch['status']==0){
                                    echo '<td>Do not Have Subscription</td>';
                                }
                             if(isset($fetch['type'])&& $fetch['type']!=''){
                                    echo "<td>$fetch[type]</td>";
                                }
                                else{
                                    echo "<td>None</td>";
                                }
                                echo<<<print
                                <td>$fetch[clicks]</td>
                                <td>
            
                                <button onclick="confirm_delete($fetch[id])" class="btn  btn-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            print;

                               }

                              ?> 
                           
                          </table>
                      </div>
                            </main>
                      <script>
                        function confirm_delete(id){

                            if(confirm("Are you sure you want to delete?")){
                                window.location.href="edit.php?iduser="+id;
                            }
                        }
                        </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</body>
</html>