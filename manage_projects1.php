<?php
include 'd_header.php';
include 'db.php';
include 'activity_logger.php'; // Make sure this file exists

$pageTitle = "Manage Projects";

// Log page access
logActivity($conn, 'view_projects', "Accessed manage projects page", 'projects');

// Handle delete action
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Get project info before deleting for logging
    $project_query = $conn->query("SELECT title FROM projects WHERE id = $delete_id");
    if ($project_query && $project_query->num_rows > 0) {
        $project_data = $project_query->fetch_assoc();
        $project_title = $project_data['title'];
        
        // Delete project images first
        $conn->query("DELETE FROM project_images WHERE project_id = $delete_id");
        
        // Delete project
        if ($conn->query("DELETE FROM projects WHERE id = $delete_id")) {
            logActivity($conn, 'delete_project', "Deleted project: $project_title", 'projects', $delete_id);
            $_SESSION['message'] = "Project '$project_title' deleted successfully!";
        } else {
            $_SESSION['error'] = "Error deleting project: " . $conn->error;
        }
    } else {
        $_SESSION['error'] = "Project not found!";
    }
    
    header("Location: manage_projects.php");
    exit();
}
?>

<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    /* Fix for main content area - REMOVED SIDEBAR SPACING */
    .dashboard-main {
        margin-left: 0 !important;
        width: 100% !important;
        padding: 40px !important;
        min-height: 100vh;
        background-color: #000000;
    }

    .projects-management {
        background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        width: 100% !important;
        max-width: none !important;
        margin: 0 !important;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(232, 156, 174, 0.3);
        width: 100%;
    }

    .header-section h2 {
        color: #e89cae;
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .add-project-btn {
        background: linear-gradient(135deg, #e89cae 0%, #f7b8c8 100%);
        color: white;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(232, 156, 174, 0.3);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .add-project-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(232, 156, 174, 0.4);
        background: linear-gradient(135deg, #f7b8c8 0%, #e89cae 100%);
    }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 25px;
        margin-top: 20px;
        width: 100%;
    }

    .project-card {
        background: linear-gradient(145deg, #2a2a2a, #1f1f1f);
        border-radius: 16px;
        padding: 25px;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
    }

    .project-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #e89cae, #f7b8c8);
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        border-color: rgba(232, 156, 174, 0.3);
    }

    .project-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .project-title {
        color: #e89cae;
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0;
        line-height: 1.3;
        flex: 1;
    }

    .project-actions {
        display: flex;
        gap: 10px;
        margin-left: 15px;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .edit-btn {
        background: rgba(59, 130, 246, 0.2);
        color: #3b82f6;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .edit-btn:hover {
        background: rgba(59, 130, 246, 0.3);
        transform: scale(1.1);
    }

    .delete-btn {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .delete-btn:hover {
        background: rgba(239, 68, 68, 0.3);
        transform: scale(1.1);
    }

    .project-details {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .detail-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .detail-label {
        color: #e89cae;
        font-weight: 600;
        min-width: 80px;
        font-size: 0.9rem;
    }

    .detail-value {
        color: #cccccc;
        flex: 1;
        line-height: 1.4;
    }

    .description-text {
        background: rgba(255, 255, 255, 0.05);
        padding: 12px;
        border-radius: 8px;
        border-left: 3px solid #e89cae;
        font-style: italic;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .status-active {
        background: rgba(34, 197, 94, 0.2);
        color: #22c55e;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .status-inactive {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .image-count {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(99, 102, 241, 0.2);
        color: #6366f1;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .project-footer {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .created-date {
        color: #888;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .no-projects {
        text-align: center;
        padding: 60px 20px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        border: 2px dashed rgba(255, 255, 255, 0.2);
        width: 100%;
    }

    .no-projects h3 {
        color: #e89cae;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .no-projects p {
        color: #ccc;
        margin-bottom: 20px;
    }

    .empty-state-icon {
        font-size: 3rem;
        color: #e89cae;
        margin-bottom: 15px;
        opacity: 0.7;
    }

    /* Message Styles */
    .message {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .message.success {
        background: rgba(34, 197, 94, 0.15);
        color: #22c55e;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .message.error {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-main {
            padding: 20px !important;
        }
        
        .projects-grid {
            grid-template-columns: 1fr;
        }
        
        .header-section {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        
        .project-header {
            flex-direction: column;
            gap: 15px;
        }
        
        .project-actions {
            align-self: flex-end;
        }
    }
</style>

<main class="dashboard-main">
    <div class="projects-management">
        <!-- Header Section -->
        <div class="header-section">
            <h2>📁 Manage Projects</h2>
            <a href="add_project.php" class="add-project-btn">
                <i class="fas fa-plus-circle"></i>
                Add New Project
            </a>
        </div>

        <!-- Messages Display -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message success">
                <i class="fas fa-check-circle"></i>
                <?= $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="message error">
                <i class="fas fa-exclamation-circle"></i>
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php
        // Fetch all projects
        $projectsQuery = "
            SELECT p.*, 
                   COUNT(pi.id) as image_count
            FROM projects p
            LEFT JOIN project_images pi ON p.id = pi.project_id
            GROUP BY p.id
            ORDER BY p.created_at DESC
        ";
        $projectsResult = $conn->query($projectsQuery);
        ?>

        <!-- Projects Grid -->
        <?php if ($projectsResult && $projectsResult->num_rows > 0): ?>
            <div class="projects-grid">
                <?php while($project = $projectsResult->fetch_assoc()): ?>
                    <div class="project-card">
                        <!-- Project Header with Actions -->
                        <div class="project-header">
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <div class="project-actions">
                                <a href="edit_project.php?id=<?php echo $project['id']; ?>" class="action-btn edit-btn" title="Edit Project">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="manage_projects.php?delete_id=<?php echo $project['id']; ?>" class="action-btn delete-btn" title="Delete Project" onclick="return confirm('Are you sure you want to delete the project \"<?php echo addslashes($project['title']); ?>\"? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="project-details">
                            <div class="detail-item">
                                <span class="detail-label">📝 Subtitle:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($project['subtitle']); ?></span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">👤 Role:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($project['role']); ?></span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">💬 Description:</span>
                                <div class="detail-value description-text">
                                    <?php echo htmlspecialchars($project['description']); ?>
                                </div>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">🛠️ Tools:</span>
                                <span class="detail-value"><?php echo htmlspecialchars($project['programming_language']); ?></span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">📷 Images:</span>
                                <span class="image-count">
                                    <i class="fas fa-image"></i>
                                    <?php echo $project['image_count']; ?> images
                                </span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">📊 Status:</span>
                                <span class="status-badge <?php echo $project['status'] == 'active' ? 'status-active' : 'status-inactive'; ?>">
                                    <i class="fas fa-circle"></i>
                                    <?php echo ucfirst($project['status']); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Project Footer -->
                        <div class="project-footer">
                            <span class="created-date">
                                <i class="far fa-clock"></i>
                                Created: <?php echo date('M j, Y g:i A', strtotime($project['created_at'])); ?>
                            </span>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
          
            <div class="no-projects">
                <div class="empty-state-icon">
                    <i class="fas fa-folder-open"></i>
                </div>
                <h3>No Projects Yet</h3>
                <p>Start building your portfolio by adding your first project.</p>
                <a href="add_project.php" class="add-project-btn">
                    <i class="fas fa-plus-circle"></i>
                    Create Your First Project
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<button onclick="goBack()" style="
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #e89cae;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 4px 15px rgba(232, 156, 174, 0.3);
">
    <i class="fas fa-arrow-left"></i> Back to Dashboard
</button>

<script>
function goBack() {
    window.location.href = 'dashboard.php';
}
</script>