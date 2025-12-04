<?php
include 'db.php';

$pageTitle = "Add New Project";

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
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
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
        
        $_SESSION['message'] = "Project added successfully!";
        header("Location: manage_projects.php");
        exit();
    } else {
        $_SESSION['error'] = "Error adding project: " . $conn->error;
    }
}
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body {
        background: #000;
        font-family: 'Poppins', sans-serif;
        color: white;
        margin: 0;
        padding: 0;
    }

    .centered-form-container {
        display: flex;
        justify-content: center;
        align-items: start;
        padding: 50px 20px;
        width: 100%;
        min-height: 100vh;
        background: #000;
    }

    .centered-form {
        background: #0f0f0f;
        border-radius: 18px;
        padding: 45px;
        width: 100%;
        max-width: 850px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.6);
    }

    .form-header {
        text-align: center;
        margin-bottom: 35px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(232, 156, 174, 0.25);
    }

    .form-header h2 {
        color: #ffb7cb;
        font-size: 2.1rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 183, 203, 0.12);
        color: #ffb7cb;
        padding: 10px 20px;
        border-radius: 10px;
        border: 1px solid rgba(255, 183, 203, 0.3);
        text-decoration: none;
        font-weight: 500;
        transition: 0.25s ease-in-out;
    }

    .back-button:hover {
        background: rgba(255, 183, 203, 0.25);
        transform: translateX(-4px);
    }

    .centered-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
        margin-bottom: 25px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        color: #ffb7cb;
        font-weight: 500;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        background: #141414;
        border: 1px solid #333;
        color: #f2f2f2;
        padding: 12px 15px;
        border-radius: 10px;
        font-size: 1rem;
        transition: 0.25s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #ffb7cb;
        box-shadow: 0 0 0 3px rgba(255, 183, 203, 0.2);
        outline: none;
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .file-input-container {
        background: #121212;
        border: 2px dashed rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        transition: 0.3s ease;
    }

    .file-input-container:hover {
        border-color: #ffb7cb;
        background: rgba(255, 183, 203, 0.06);
    }

    .file-input-container input[type="file"] {
        width: 100%;
        border: none;
        background: transparent;
        color: #ccc;
    }

    .file-input-container small {
        color: #888;
        margin-top: 8px;
        display: block;
        font-size: 0.85rem;
    }

    .alt-text-group {
        background: #151515;
        border-radius: 10px;
        padding: 14px;
        margin-bottom: 12px;
        border-left: 3px solid #ffb7cb;
    }

    .alt-text-group label {
        color: #ddd;
        margin-bottom: 6px;
    }

    .submit-btn-container {
        text-align: center;
        margin-top: 5px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #ffb7cb 0%, #ff8aae 100%);
        color: white;
        padding: 15px 45px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
        transition: 0.25s;
        box-shadow: 0 4px 18px rgba(255, 183, 203, 0.35);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(255, 183, 203, 0.5);
    }

    @media (max-width: 768px) {
        .centered-form {
            padding: 30px 22px;
        }

        .centered-form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<main class="dashboard-main">
    <div class="centered-form-container">
        <div class="centered-form">
            <!-- Form Header -->
            <div class="form-header">
                <h2>➕ Add New Project</h2>
                <a href="manage_projects.php" class="back-button">
                    <i class="fas fa-arrow-left"></i> Back to Projects
                </a>
            </div>

            <!-- Centered Form -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="centered-form-grid">
                    <div class="form-group">
                        <label for="title">Project Title *</label>
                        <input type="text" id="title" name="title" placeholder="Enter project title" required>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subtitle *</label>
                        <input type="text" id="subtitle" name="subtitle" placeholder="Enter project subtitle" required>
                    </div>

                    <div class="form-group">
                        <label for="programming_language">Programming Language/Tools *</label>
                        <input type="text" id="programming_language" name="programming_language" placeholder="e.g., HTML, CSS, JavaScript, PHP" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Your Role *</label>
                        <input type="text" id="role" name="role" placeholder="e.g., Full Stack Developer, Designer" required>
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Project Description *</label>
                        <textarea id="description" name="description" rows="5" placeholder="Describe your project, its features, and your contributions..." required></textarea>
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
                        <div class="file-input-container">
                            <input type="file" id="images" name="images[]" multiple accept="image/*">
                            <small>📁 Drag & drop or click to select multiple images (PNG, JPG, JPEG)</small>
                        </div>
                    </div>

                    <div id="alt-text-container" class="form-group full-width">
                        <!-- Alt text inputs will be added dynamically -->
                    </div>
                </div>

                <div class="submit-btn-container">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-plus-circle"></i> Add Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
document.getElementById('images').addEventListener('change', function(e) {
    const container = document.getElementById('alt-text-container');
    container.innerHTML = '';
    
    if (this.files.length > 0) {
        const header = document.createElement('div');
        header.innerHTML = '<label style="color: #e89cae; margin-bottom: 15px; display: block;">📝 Alt Text for Images:</label>';
        container.appendChild(header);
    }
    
    for (let i = 0; i < this.files.length; i++) {
        const div = document.createElement('div');
        div.className = 'alt-text-group';
        div.innerHTML = `
            <label for="alt_text_${i}">${this.files[i].name}</label>
            <input type="text" id="alt_text_${i}" name="alt_texts[]" placeholder="Enter descriptive alt text...">
        `;
        container.appendChild(div);
    }
});

// Add drag and drop styling
const fileInput = document.getElementById('images');
const fileContainer = fileInput.parentElement;

fileInput.addEventListener('dragenter', function() {
    fileContainer.style.borderColor = '#e89cae';
    fileContainer.style.background = 'rgba(232, 156, 174, 0.1)';
});

fileInput.addEventListener('dragleave', function() {
    fileContainer.style.borderColor = 'rgba(255, 255, 255, 0.2)';
    fileContainer.style.background = 'rgba(255, 255, 255, 0.05)';
});

fileInput.addEventListener('drop', function() {
    fileContainer.style.borderColor = 'rgba(255, 255, 255, 0.2)';
    fileContainer.style.background = 'rgba(255, 255, 255, 0.05)';
});
</script>