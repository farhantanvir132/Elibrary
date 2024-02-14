<?php

 $con = mysqli_connect("localhost","root","","elibrary");


 if(mysqli_connect_errno()){
    die("Cannot Connect to Database");

 }


   define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/Elibrary/img/");

   define("FETCH_SRC","http://127.0.0.1/Elibrary/img/");

?>