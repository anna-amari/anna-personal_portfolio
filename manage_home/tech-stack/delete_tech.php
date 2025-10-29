<?php
// delete_tech.php
session_start();
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $query = "DELETE FROM tech_stack WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Technology deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting technology: " . mysqli_error($conn);
    }
}

header("Location: dashboard.php");
exit();
?>