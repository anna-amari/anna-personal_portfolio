<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Query to find the user
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            // Password incorrect - redirect to bleh.php
            header("Location: bleh.php");
            exit;
        }
    } else {
        // Username not found - redirect to bleh.php
        header("Location: bleh.php");
        exit;
    }
} else {
    // Invalid request method - redirect to bleh.php
    header("Location: bleh.php");
    exit;
}
?>