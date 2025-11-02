<?php
include 'd_header.php';
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

<link rel="stylesheet" href="dashboard.css">
<style>
    .centered-form-container {
         display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 80vh;
        padding: 40px 20px;
        width: 100vw; /* Change to viewport width */
        margin: 0;
        margin-left: -50vw; /* Compensate for any parent padding */
        left: 50%;
        position: relative;
    }

    .centered-form {
        background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(232, 156, 174, 0.3);
    }

    .form-header h2 {
        color: #e89cae;
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 10px 0;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(232, 156, 174, 0.1);
        color: #e89cae;
        padding: 10px 20px;
        border: 1px solid rgba(232, 156, 174, 0.3);
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background: rgba(232, 156, 174, 0.2);
        transform: translateX(-3px);
    }

    .centered-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        color: #e89cae;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #e89cae;
        outline: none;
        box-shadow: 0 0 0 3px rgba(232, 156, 174, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .file-input-container {
        background: rgba(255, 255, 255, 0.05);
        border: 2px dashed rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        width: 100%;
    }

    .file-input-container:hover {
        border-color: #e89cae;
        background: rgba(232, 156, 174, 0.05);
    }

    .file-input-container input[type="file"] {
        width: 100%;
        background: transparent;
        border: none;
        color: #ccc;
    }

    .file-input-container small {
        color: #888;
        font-size: 0.85rem;
        display: block;
        margin-top: 8px;
    }

    .alt-text-group {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 10px;
        border-left: 3px solid #e89cae;
        width: 100%;
    }

    .alt-text-group label {
        color: #ccc;
        font-size: 0.9rem;
        margin-bottom: 5px;
    }

    .alt-text-group input {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        width: 100%;
    }

    .submit-btn-container {
        text-align: center;
        margin-top: 30px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #e89cae 0%, #f7b8c8 100%);
        color: white;
        padding: 14px 40px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(232, 156, 174, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(232, 156, 174, 0.4);
        background: linear-gradient(135deg, #f7b8c8 0%, #e89cae 100%);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .centered-form-container {
            padding: 20px 15px;
        }
        
        .centered-form {
            padding: 30px 20px;
        }
        
        .centered-form-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .form-header h2 {
            font-size: 1.5rem;
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