<?php
require("dbcon.php");
session_start();
if(isset($_POST['comment'])){
   $book_id = $_POST['book_id'];
   $name = $_SESSION['username'];
   $dp = $_SESSION['user_picture'];
   $comment = mysqli_real_escape_string($con, $_POST['comment']);
   
   // Prepare statement
   $stmt = mysqli_prepare($con, "INSERT INTO commentaction (book_id, name, userimg, comment) VALUES (?, ?, ?, ?)");
   mysqli_stmt_bind_param($stmt, "isss", $book_id, $name, $dp, $comment);
   mysqli_stmt_execute($stmt);
   
   $stmt1 = mysqli_prepare($con, "UPDATE action SET cment = cment + 1 WHERE id = ?");
   mysqli_stmt_bind_param($stmt1, "i", $book_id);
   mysqli_stmt_execute($stmt1);
   
   mysqli_stmt_close($stmt);
   mysqli_stmt_close($stmt1);
   
   header("Location: book2.php?id=$book_id");
   exit;
   
}
if(isset($_POST['fvt'])) {
   $exist=1;
   $email=$_POST['email'];
   $book_id=$_POST['book_id'];
   $stmt1 = $con->prepare("INSERT INTO addtofvt (email,book_id,exist) VALUES ( ?,?,?)");
   $stmt1->bind_param("sss",$email,$book_id,$exist);
   $stmt1->execute();
   header("Location: book1.php?id=$book_id");
 }


 if(isset($_POST['added'])){
   $email=$_POST['email'];
   $book_id=$_POST['book_id'];
   $id=$_POST['id'];
   $query7="DELETE FROM `addtofvt` WHERE `id`='$id' and book_id='$book_id' and email='$email'";
   if(mysqli_query($con,$query7)){
   header("Location: book1.php?id=$book_id");
   }
  else{
  
  } 
  }

?>