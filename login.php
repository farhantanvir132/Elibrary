<?php
session_start();
include('dbcon.php');
if(isset($_POST['email']) && isset($_POST['password'])){
  $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $email = $_POST['email'];
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows == 1) {
    // Verify the password
    $row = $result->fetch_assoc();
    if(password_verify($_POST['password'], $row['password'])){
      // Store the user's information in the session
      $_SESSION['email'] = $row['email'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['expiration_date'] = $row['expiration_date'];
      $_SESSION['user_picture'] = $row['user_picture'];
      $_SESSION['status']=$row['status'];
      $_SESSON['clicks']=$row['clicks'];
      echo "success";
    } else {
      echo "Incorrect password.";
    }
  } else {
    echo "An account with this email address does not exist.";
  }
  // Close the database connection
  $stmt->close();
  $con->close();
}
?>
