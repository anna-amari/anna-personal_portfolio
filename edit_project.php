<?php
include 'd_header.php';
include 'db.php';

$pageTitle = "Edit Project";

$message = "";
$messageType = "";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_projects.php");
    exit();
}

$project_id = $conn->real_escape_string($_GET['id']);

// Fetch project data
$projectQuery = "SELECT * FROM projects WHERE id = '$project_id'";
$projectResult = $conn->query($projectQuery);
$project = $projectResult->fetch_assoc();

if (!$project) {
    header("Location: manage_projects.php");
    exit();
}

// Fetch project images
$imagesQuery = "SELECT * FROM project_images WHERE project_id = '$project_id' ORDER BY display_order";
$imagesResult = $conn->query($imagesQuery);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']);
    $programming_language = $conn->real_escape_string($_POST['programming_language']);
    $role = $conn->real_escape_string($_POST['role']);
    $description = $conn->real_escape_string($_POST['description']);
    $status = $conn->real_escape_string($_POST['status']);

    // Update project
    $sql = "UPDATE projects SET 
            title = '$title',
            subtitle = '$subtitle',
            programming_language = '$programming_language',
            role = '$role',
            description = '$description',
            status = '$status',
            updated_at = CURRENT_TIMESTAMP
            WHERE id = '$project_id'";
    
    if ($conn->query($sql)) {
        // Handle new image uploads
        if (!empty($_FILES['images']['name'][0])) {
            $uploadDir = "images/presentation/";
            $currentMaxOrder = $imagesResult->num_rows;
            
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $fileName = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                    $filePath = $uploadDir . $fileName;
                    
                    if (move_uploaded_file($tmp_name, $filePath)) {
                        $altText = $conn->real_escape_string($_POST['alt_texts'][$key] ?? $title);
                        $displayOrder = $currentMaxOrder + $key + 1;
                        
                        $imageSql = "INSERT INTO project_images (project_id, image_path, alt_text, display_order) 
                                    VALUES ('$project_id', '$filePath', '$altText', '$displayOrder')";
                        $conn->query($imageSql);
                    }
                }
            }
        }
        
        $message = "Project updated successfully!";
        $messageType = "success";
    } else {
        $message = "Error updating project: " . $conn->error;
        $messageType = "error";
    }
    
    // Refresh project data
    $projectResult = $conn->query($projectQuery);
    $project = $projectResult->fetch_assoc();
    $imagesResult = $conn->query($imagesQuery);
}
?>

<link rel="stylesheet" href="dashboard.css">

<main class="dashboard-main">
    <div class="messages-section">
        <div class="flex justify-between items-center mb-6">
            <h2>Edit Project</h2>
            <a href="manage_projects.php" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>

        <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" class="message-form">
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Project Title *</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="subtitle">Subtitle *</label>
                    <input type="text" id="subtitle" name="subtitle" value="<?php echo htmlspecialchars($project['subtitle']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="programming_language">Programming Language/Tools *</label>
                    <input type="text" id="programming_language" name="programming_language" value="<?php echo htmlspecialchars($project['programming_language']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="role">Your Role *</label>
                    <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($project['role']); ?>" required>
                </div>

                <div class="form-group full-width">
                    <label for="description">Project Description *</label>
                    <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($project['description']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="active" <?php echo $project['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo $project['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

                <!-- Existing Images -->
                <?php if ($imagesResult->num_rows > 0): ?>
                <div class="form-group full-width">
                    <label>Existing Images</label>
                    <div class="existing-images">
                        <?php while($image = $imagesResult->fetch_assoc()): ?>
                            <div class="image-item">
                                <img src="<?php echo htmlspecialchars($image['image_path']); ?>" alt="<?php echo htmlspecialchars($image['alt_text']); ?>" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                <div>
                                    <p><?php echo htmlspecialchars($image['alt_text']); ?></p>
                                    <a href="delete_image.php?id=<?php echo $image['id']; ?>&project_id=<?php echo $project_id; ?>" class="text-red-500" onclick="return confirm('Delete this image?')">Delete</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-group full-width">
                    <label for="images">Add More Images</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*">
                    <small>Select additional images</small>
                </div>

                <div id="alt-text-container" class="form-group full-width">
                    <!-- Alt text inputs for new images -->
                </div>
            </div>

            <button type="submit" class="btn-primary">Update Project</button>
        </form>
    </div>
</main>

<script>
document.getElementById('images').addEventListener('change', function(e) {
    const container = document.getElementById('alt-text-container');
    container.innerHTML = '<label>Alt Text for New Images</label>';
    
    for (let i = 0; i < this.files.length; i++) {
        const div = document.createElement('div');
        div.className = 'alt-text-group';
        div.innerHTML = `
            <input type="text" name="alt_texts[]" placeholder="Alt text for ${this.files[i].name}" style="margin-top: 5px;">
        `;
        container.appendChild(div);
    }
});
</script>

<style>
.existing-images {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 15px;
    margin-top: 10px;
}

.image-item {
    text-align: center;
}

.image-item p {
    font-size: 0.8rem;
    margin: 5px 0;
    color: #ccc;
}

.image-item a {
    font-size: 0.8rem;
}
</style>

<?php include 'd_footer.php'; ?>