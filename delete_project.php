<?php
include 'db.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_projects.php");
    exit();
}

$project_id = $conn->real_escape_string($_GET['id']);

// Delete project images first (due to foreign key constraint)
$deleteImagesSql = "DELETE FROM project_images WHERE project_id = '$project_id'";
$conn->query($deleteImagesSql);

// Delete project
$deleteProjectSql = "DELETE FROM projects WHERE id = '$project_id'";

if ($conn->query($deleteProjectSql)) {
    header("Location: manage_projects.php?message=Project deleted successfully&type=success");
} else {
    header("Location: manage_projects.php?message=Error deleting project&type=error");
}
exit();