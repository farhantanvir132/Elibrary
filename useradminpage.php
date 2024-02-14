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
    <link rel="stylesheet" href="notification.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
      
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
                        <li><a class="dropdown-item" href="changepass.php">Change Password</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                <h1>Admin</h1>

            </nav>
        </div>
          <div class="blocks">
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