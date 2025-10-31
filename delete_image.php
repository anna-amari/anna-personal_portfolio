<?php
include 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_projects.php");
    exit();
}

$image_id = $conn->real_escape_string($_GET['id']);
$project_id = $conn->real_escape_string($_GET['project_id']);

// Get image path to delete file
$imageQuery = "SELECT image_path FROM project_images WHERE id = '$image_id'";
$imageResult = $conn->query($imageQuery);
$image = $imageResult->fetch_assoc();

// Delete from database
$deleteSql = "DELETE FROM project_images WHERE id = '$image_id'";

if ($conn->query($deleteSql)) {
    // Delete physical file
    if ($image && file_exists($image['image_path'])) {
        unlink($image['image_path']);
    }
    header("Location: edit_project.php?id=$project_id&message=Image deleted successfully&type=success");
} else {
    header("Location: edit_project.php?id=$project_id&message=Error deleting image&type=error");
}
exit();