<?php
include 'd_header.php';
include 'd_sidebar.php';
include 'db.php';

$pageTitle = "Add New Project";

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $subtitle = $conn->real_escape_string($_POST['subtitle']);
    $programming_language = $conn->real_escape_string($_POST['programming_language']);
    $role = $conn->real_escape_string($_POST['role']);
    $description = $conn->real_escape_string($_POST['description']);
    $status = $conn->real_escape_string($_POST['status']);

    // Insert project
    $sql = "INSERT INTO projects (title, subtitle, programming_language, role, description, status) 
            VALUES ('$title', '$subtitle', '$programming_language', '$role', '$description', '$status')";
    
    if ($conn->query($sql)) {
        $project_id = $conn->insert_id;
        
        // Handle image uploads
        if (!empty($_FILES['images']['name'][0])) {
            $uploadDir = "images/presentation/";
            
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    $fileName = uniqid() . '_' . basename($_FILES['images']['name'][$key]);
                    $filePath = $uploadDir . $fileName;
                    
                    if (move_uploaded_file($tmp_name, $filePath)) {
                        $altText = $conn->real_escape_string($_POST['alt_texts'][$key] ?? $title);
                        $displayOrder = $key + 1;
                        
                        $imageSql = "INSERT INTO project_images (project_id, image_path, alt_text, display_order) 
                                    VALUES ('$project_id', '$filePath', '$altText', '$displayOrder')";
                        $conn->query($imageSql);
                    }
                }
            }
        }
        
        $message = "Project added successfully!";
        $messageType = "success";
    } else {
        $message = "Error adding project: " . $conn->error;
        $messageType = "error";
    }
}
?>

<link rel="stylesheet" href="dashboard.css">

<main class="dashboard-main">
    <div class="messages-section">
        <div class="flex justify-between items-center mb-6">
            <h2>Add New Project</h2>
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
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="subtitle">Subtitle *</label>
                    <input type="text" id="subtitle" name="subtitle" required>
                </div>

                <div class="form-group">
                    <label for="programming_language">Programming Language/Tools *</label>
                    <input type="text" id="programming_language" name="programming_language" required>
                </div>

                <div class="form-group">
                    <label for="role">Your Role *</label>
                    <input type="text" id="role" name="role" required>
                </div>

                <div class="form-group full-width">
                    <label for="description">Project Description *</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group full-width">
                    <label for="images">Project Images</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*">
                    <small>You can select multiple images</small>
                </div>

                <div id="alt-text-container" class="form-group full-width">
                    <!-- Alt text inputs will be added dynamically -->
                </div>
            </div>

            <button type="submit" class="btn-primary">Add Project</button>
        </form>
    </div>
</main>

<script>
document.getElementById('images').addEventListener('change', function(e) {
    const container = document.getElementById('alt-text-container');
    container.innerHTML = '';
    
    for (let i = 0; i < this.files.length; i++) {
        const div = document.createElement('div');
        div.className = 'alt-text-group';
        div.innerHTML = `
            <label for="alt_text_${i}">Alt Text for ${this.files[i].name}</label>
            <input type="text" id="alt_text_${i}" name="alt_texts[]" placeholder="Enter alt text for ${this.files[i].name}">
        `;
        container.appendChild(div);
    }
});
</script>

<style>
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.alt-text-group {
    margin-bottom: 10px;
}

.alt-text-group label {
    font-size: 0.9rem;
    color: #ccc;
    margin-bottom: 5px;
}

.alt-text-group input {
    background: #1a1a1a;
    border: 1px solid #333;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
}

.btn-primary {
    background: #e89cae;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.3s ease;
}

.btn-primary:hover {
    background: #f7b8c8;
}
</style>

<?php include 'd_footer.php'; ?>