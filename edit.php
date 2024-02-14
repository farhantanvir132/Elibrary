<?php
require("dbcon.php");
function img_upload($img){

     $tmp_location =$img['tmp_name'];
     $img_name = random_int(111,999).$img['name'];
     $new_location = UPLOAD_SRC.$img_name;
   if(!move_uploaded_file($tmp_location,$new_location)){
        
       header("location:admindashboard.php?alert=img_upload");
       exit;
   }
   else{
    return $img_name;
   }
}

if(isset($_POST['update'])){

   foreach($_POST as $key=> $value){
    $_POST[$key]=mysqli_real_escape_string($con,$value);
   }
   if(is_uploaded_file($_FILES['b_img']['tmp_name']) && is_uploaded_file($_FILES['book']['tmp_name'])){
   $img_path = img_upload($_FILES['b_img']);
   $img_path1 = img_upload($_FILES['book']);
   
   $query="UPDATE `fiction` SET
   `b_img`='$img_path',`book`='$img_path1',`b_name`='$_POST[b_name]',`b_author`='$_POST[b_author]',`publisher`='$_POST[publisher]',`year`='$_POST[year]',`description`='$_POST[description]',`lang`='$_POST[lang]',`Catagory`='$_POST[catagory]' WHERE id=$_POST[id]";
   }
  
   else{
    $query="UPDATE `fiction` SET
    `b_name`='$_POST[b_name]',`b_author`='$_POST[b_author]',`publisher`='$_POST[publisher]',`year`='$_POST[year]',`description`='$_POST[description]',`lang`='$_POST[lang]',`Catagory`='$_POST[catagory]' WHERE id=$_POST[id]";
   }
   if(mysqli_query($con,$query)){
    header("location: adminpage1.php?");
   }
}

if(isset($_GET['idfiction'])){
    $query7="DELETE FROM `fiction` WHERE `id`='$_GET[idfiction]'";
    $query8="DELETE FROM `comments` WHERE  book_id='$_GET[idfiction]'";
    mysqli_query($con,$query8);
   if(mysqli_query($con,$query7)){
   header("location: adminpage1.php?");
   }
  else{
   header("location: adminpage1.php?alert=Failed");
  }
}
if(isset($_POST['update1'])){

  foreach($_POST as $key=> $value){
   $_POST[$key]=mysqli_real_escape_string($con,$value);
  }
  if(is_uploaded_file($_FILES['b_img']['tmp_name']) && is_uploaded_file($_FILES['book']['tmp_name'])){
  $img_path = img_upload($_FILES['b_img']);
  $img_path1 = img_upload($_FILES['book']);
  
  $query="UPDATE `action` SET
  `b_img`='$img_path',`book`='$img_path1',`b_name`='$_POST[b_name]',`b_author`='$_POST[b_author]',`publisher`='$_POST[publisher]',`year`='$_POST[year]',`description`='$_POST[description]',`lang`='$_POST[lang]',`Catagory`='$_POST[catagory]' WHERE id=$_POST[id]";
  }
 
  else{
   $query="UPDATE `action` SET
   `b_name`='$_POST[b_name]',`b_author`='$_POST[b_author]',`publisher`='$_POST[publisher]',`year`='$_POST[year]',`description`='$_POST[description]',`lang`='$_POST[lang]',`Catagory`='$_POST[catagory]' WHERE id=$_POST[id]";
  }
  if(mysqli_query($con,$query)){
   header("location: adminpage1.php?");
  }
}
if(isset($_GET['idaction'])){
  $query7="DELETE FROM `action` WHERE `id`='$_GET[idaction]'";
  $query8="DELETE FROM `comments` WHERE  book_id='$_GET[idaction]'";
  mysqli_query($con,$query8);
 if(mysqli_query($con,$query7)){
 header("location: adminpage1.php?");

 }
else{
 header("location: adminpage1.php?alert=Failed");
}
}

if(isset($_GET['idcomfic'])){
 $book_id = $_GET['book_id'];
 $query7="DELETE FROM `comments` WHERE `id`='$_GET[idcomfic]' and book_id='$book_id'";
 mysqli_query($con,$query7);
 $stmt1 = mysqli_prepare($con, "UPDATE fiction SET cment = cment - 1 WHERE id = ?");
  mysqli_stmt_bind_param($stmt1, "i", $book_id);
  mysqli_stmt_execute($stmt1);

   mysqli_stmt_close($stmt1);
  header("Location: book1.php?id=$book_id");
 }


if(isset($_GET['idcomaction'])){
  $book_id = $_GET['book_id'];
  $query7="DELETE FROM `commentaction` WHERE `id`='$_GET[idcomaction]' and book_id='$book_id'";
  mysqli_query($con,$query7);
  $stmt1 = mysqli_prepare($con, "UPDATE action SET cment = cment - 1 WHERE id = ?");
  mysqli_stmt_bind_param($stmt1, "i", $book_id);
  mysqli_stmt_execute($stmt1);
  mysqli_stmt_close($stmt1);
  header("Location: book2.php?id=$book_id");
 }
 if(isset($_GET['comfiction'])){
  $book_id = $_GET['book_id'];
  $query7="DELETE FROM `comments` WHERE `id`='$_GET[comfiction]'";
  $stmt1 = mysqli_prepare($con, "UPDATE fiction SET cment = cment - 1 WHERE id = ?");
  mysqli_stmt_bind_param($stmt1, "i", $book_id);
  mysqli_stmt_execute($stmt1);

  mysqli_stmt_close($stmt1);
  mysqli_query($con,$query7);
  header("Location: comments.php?");
  
 }
 
 if(isset($_GET['comaction'])){
   $book_id = $_GET['book_id'];
   $query7="DELETE FROM `commentaction` WHERE `id`='$_GET[comaction]'";
   mysqli_query($con,$query7);
   $stmt1 = mysqli_prepare($con, "UPDATE action SET cment = cment - 1 WHERE id = ?");
   mysqli_stmt_bind_param($stmt1, "i", $book_id);
   mysqli_stmt_execute($stmt1);

   mysqli_stmt_close($stmt1);
   header("Location: comments.php?");
   }
   if(isset($_GET['iduser'])){
   
    $query7="DELETE FROM `users` WHERE `id`='$_GET[iduser]'";
    if(mysqli_query($con,$query7)){
     header("Location: useradmin.php?");
    }
   else{
   
   } 
   }
   if(isset($_GET['idficfvt'])) {
   
    $email=$_GET['email'];
    $book_id=$_GET['book_id'];
    $query7="DELETE FROM `addtofvt` WHERE `id`='$_GET[idficfvt]' and book_id='$book_id'and email='$email'";
    if(mysqli_query($con,$query7)){
     header("Location: favourite.php?");
    }
  }
  if(isset($_GET['idactfvt'])) {
   
    $email=$_GET['email'];
    $book_id=$_GET['book_id'];
    $query7="DELETE FROM `fvtaction` WHERE `id`='$_GET[idactfvt]' and book_id='$book_id'and email='$email'";
    if(mysqli_query($con,$query7)){
     header("Location: favourite.php?");
    }
  }
 

?>