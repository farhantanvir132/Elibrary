<?php
session_start();
require('dbcon.php');

if (isset($_POST['submit123'])) {
  $email = $_SESSION['email'];
  $currentpass = $_POST['cpassword'];
  $newpassword = $_POST['npassword'];

  $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  if ($row && password_verify($currentpass, $row['password'])) {
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    $query = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $hashedPassword, $email);
    $stmt->execute();

    echo <<<print
    <script>
      alert("Password changed successfully");
      window.location.href = "profile.php";
    </script>
    print;
  } else {
    header("location: conpassuser.php?alert=Could not change the password");
    exit;
  }
}
?>