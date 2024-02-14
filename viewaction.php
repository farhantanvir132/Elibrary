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
            font-family:Georgia, 'Times New Roman', Times, serif;
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
            background-color: #ffd500;
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

    
        
        </style>
</head>
<body>
<nav>
            <a href="./admindashboard.php"><img src="book img/admin.png" alt=""></a>
            <h1>Admin</h1>
        </nav>
    <div style="margin-top: 40px; margin-bottom: 70px;" class="container">
    <div>
    <h3 style="color:#640127; text-align: center; font-weight: bold;">FICTION<hr></h1>
    </div>
                       <div>
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
                      <script>
                        function confirm_delete(id){

                            if(confirm("Are you sure you want to delete?")){
                                window.location.href="edit.php?idaction="+id;
                            }
                        }
                        </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</body>
</html>