<?php
session_start();
require('dbcon.php');

if(isset($_POST['submit'])){

    $username=$_POST['admin_name'];
    $password=$_POST['password'];
    $query="SELECT * FROM `admin` WHERE admin_name='$username' and password='$password'";
    $result= mysqli_query($con,$query);
       $row=mysqli_num_rows($result);
         if($row==1){
            $_SESSION['admin_name']=$username;
            header("location: admindashboard.php?alert=Login Successful");
       
       }
       else{
        echo<<<print
        <script>
        alert("Username and Password are Incorrect!");
        window.location.href="index.php?";
        </script>
        print;
       }
}
?>
