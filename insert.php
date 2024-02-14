<?php
require("dbcon.php");
session_start();

function file_upload($fileup){
     $tmp_location =$fileup['tmp_name'];
     $file_name = random_int(111,999).$fileup['name'];
     $new_location = UPLOAD_SRC.$file_name;
   if(!move_uploaded_file($tmp_location,$new_location)){
        
       header("location:fictionformadmin.php?alert=img_upload");
       exit;
   }
   else{
    return $file_name;
   }
}

if(isset($_POST['submit'])){

   foreach($_POST as $key=> $value){
    $_POST[$key]=mysqli_real_escape_string($con,$value);

   }
   $comment=0;
   $file_path1 = file_upload($_FILES['b_img']);
   $file_path2 = file_upload($_FILES['book']);
   $query="INSERT INTO `fiction`(`b_img`, `book`, `b_name`, `b_author`, `publisher`, `year`, `description`,`sortdes`, `lang`, `Catagory`, `cment`) VALUES
   ('$file_path1','$file_path2','$_POST[b_name]','$_POST[b_author]','$_POST[publisher]','$_POST[year]','$_POST[description]','$_POST[sortdes]','$_POST[lang]','$_POST[catagory]','$comment')";
   
   if(mysqli_query($con,$query)){
   header("location: adminpage1.php?");
  // header("location:fictionformadmin.php?alert=success");
   }
   else{
    header("location:adminpage2.php?alert=Failed");
   }
}
if(isset($_POST['submit1'])){
   $comment1=0;
   foreach($_POST as $key=> $value){
    $_POST[$key]=mysqli_real_escape_string($con,$value);

   }
   $file_path1 = file_upload($_FILES['b_img']);
   $file_path2 = file_upload($_FILES['book']);
   $query="INSERT INTO `action`(`b_img`, `book`, `b_name`, `b_author`, `publisher`, `year`, `description`,`sortdes`,`lang`,`Catagory`, `cment`) VALUES
   ('$file_path1','$file_path2','$_POST[b_name]','$_POST[b_author]','$_POST[publisher]','$_POST[year]','$_POST[description]','$_POST[sortdes]','$_POST[lang]','$_POST[catagory]','$comment1')";
   
   if(mysqli_query($con,$query)){
    header("location: adminpage1.php?");
 
   }
   else{
    header("location:adminpage2.php?alert=Failed");
   }
}
if(isset($_POST['action'])) {
  $book_id = $_POST['book_id'];
  $name = $_SESSION['username'];
  $email = $_SESSION['email'];
  $userimg = $_SESSION['user_picture'];
  $comment = mysqli_real_escape_string($con, $_POST['comment']);
  
  if($_POST['action'] == "post") {
    // Prepare statement
    $stmt = mysqli_prepare($con, "INSERT INTO comments (book_id, name,email, userimg, comment) VALUES (?,?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issss", $book_id, $name,$email, $userimg, $comment);
    mysqli_stmt_execute($stmt);
    $stmt1 = mysqli_prepare($con, "UPDATE fiction SET cment = cment + 1 WHERE id = ?");
    mysqli_stmt_bind_param($stmt1, "i", $book_id);
    mysqli_stmt_execute($stmt1);
    $username=$_SESSION['username'];
    $type1="a Fiction book";
    $message=" Has Commented on ";
  $stmt2 = $con->prepare("INSERT INTO notification (user,message,type) VALUES ( ?, ?, ?)");
  $stmt2->bind_param("sss",$username,$message,$type1);
  $stmt2->execute();
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt1);

  } else if($_POST['action'] == "edit") {
    $comment_id = $_POST['comment_id'];
    // Prepare statement
    $stmt = mysqli_prepare($con, "UPDATE comments SET comment=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "si", $comment, $comment_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
  
  
  header("Location: book1.php?id=$book_id");
  exit;
}
if(isset($_POST['action1'])) {
  $book_id = $_POST['book_id'];
  $name = $_SESSION['username'];
  $email = $_SESSION['email'];
  $userimg = $_SESSION['user_picture'];
  $comment = mysqli_real_escape_string($con, $_POST['comment']);
  
  if($_POST['action1'] == "post") {
    // Prepare statement
    $stmt = mysqli_prepare($con, "INSERT INTO commentaction (book_id, name,email, userimg, comment) VALUES (?,?,?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issss", $book_id, $name,$email, $userimg, $comment);
    mysqli_stmt_execute($stmt);
    $stmt1 = mysqli_prepare($con, "UPDATE action SET cment = cment + 1 WHERE id = ?");
    mysqli_stmt_bind_param($stmt1, "i", $book_id);
    mysqli_stmt_execute($stmt1);
  
 
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt1);

  } else if($_POST['action1'] == "edit") {
    $comment_id = $_POST['comment_id'];
    // Prepare statement
    $stmt = mysqli_prepare($con, "UPDATE commentaction SET comment=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "si", $comment, $comment_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
  
  
  header("Location: book2.php?id=$book_id");
  exit;
}

if(isset($_POST['fvt'])) {
  $exist=1;
  $email=$_POST['email'];
  $book_id=$_POST['book_id'];
  $stmt1 = $con->prepare("INSERT INTO fvtaction (email,book_id,exist) VALUES ( ?,?,?)");
  $stmt1->bind_param("sss",$email,$book_id,$exist);
  $stmt1->execute();
  header("Location: book2.php?id=$book_id");
}


if(isset($_POST['added'])){
  $email=$_POST['email'];
  $book_id=$_POST['book_id'];
  $id=$_POST['id'];
  $query7="DELETE FROM `fvtaction` WHERE `id`='$id' and book_id='$book_id' and email='$email'";
  if(mysqli_query($con,$query7)){
  header("Location: book2.php?id=$book_id");
  }
 else{
 
 } 
 }
?>

