<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tech_name = mysqli_real_escape_string($conn, $_POST['tech_name']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    
    // If alt_text is empty, use tech_name
    if (empty($alt_text)) {
        $alt_text = $tech_name;
    }
    
    $query = "INSERT INTO tech_stack (tech_name, image_url, alt_text) 
              VALUES ('$tech_name', '$image_url', '$alt_text')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Technology added successfully!";
    } else {
        $_SESSION['error'] = "Error adding technology: " . mysqli_error($conn);
    }
    
    header("Location: dashboard.php");
    exit();
}
?>