<?php
require('dbcon.php');
session_start();
if(isset($_POST['submit'])){
    $newpassword=$_POST['newpass'];
    $query="update `admin` set password='$newpassword' where admin_name='$_SESSION[admin_name]'";
  
    if( mysqli_query($con,$query)){
        echo<<<print
        <script>
        alert("Password changed Successfully");
        window.location.href="changepass.php?";
        </script>
        print;
    }
    else{

        header("location: changepass.php?alert=Could not Change the Password");
        exit;
    }
}