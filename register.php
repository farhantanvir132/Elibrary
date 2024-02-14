<?php
session_start();
include('dbcon.php');
if(isset($_POST['submit'])){
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $email = $_POST['email'];
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        echo <<<print
        <script>
            alert("An account with this email address already exists.");
            window.location.href = "index.php?";
        </script>
print;

    } else {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Calculate the expiration date (30 days from the current date)
        $expirationDate = date('Y-m-d', strtotime('+30 days'));

        // Prepare and execute the SQL statement to insert the new user's information into the database
        $stmt = $con->prepare("INSERT INTO users (email, username, password, expiration_date, status, clicks) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssii", $email, $username, $hashedPassword, $expirationDate, $status, $clicks);
        $email = $_POST['email'];
        $username = $_POST['username'];
        $status = 0;
        $clicks = 0;
        $stmt->execute();

        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['expiration_date'] = $expirationDate;
        $_SESSION['status'] = $status;
        $_SESSION['clicks'] = $clicks;

        echo <<<print
        <script>
            alert("Your Registration has been Successful");
            window.location.href = "index.php?";
        </script>
print;
    }
}
?>
