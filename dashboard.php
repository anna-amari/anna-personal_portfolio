<?php
// dashboard.php
session_start();
include 'db.php'; 

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

// Fetch recent activities
$activity_query = "SELECT * FROM activity_logs ORDER BY created_at DESC LIMIT 10";
$activity_result = mysqli_query($conn, $activity_query);

// Count data for summary cards
$projects_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM projects WHERE status='active'"))['count'];
$places_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM visited_places"))['count'];
$certifications_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM certifications WHERE is_active=1"))['count'];
$messages_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM contact_messages"))['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Dashboard</title>

  <!-- Font & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #0d0d0d;
      color: #fff;
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar Styles */
    .sidebar {
      width: 250px;
      background: #1a1a1a;
      padding: 20px;
      position: fixed;
      height: 100vh;
      overflow-y: auto;
    }

    .sidebar h2 {
      color: #e89cae;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #ccc;
      text-decoration: none;
      padding: 12px 15px;
      margin: 5px 0;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar a:hover, .sidebar a.active {
      background: #e89cae;
      color: #000;
    }

    .sidebar hr {
      border: none;
      height: 1px;
      background: #333;
      margin: 20px 0;
    }

    /* Main Content */
    .dashboard-main {
      flex: 1;
      margin-left: 250px;
      padding: 30px;
    }

    /* Message Styles */
    .message {
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-weight: 500;
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

    /* Cards */
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin: 30px 0;
    }

    .card {
      background: rgba(255, 255, 255, 0.05);
      padding: 25px;
      border-radius: 12px;
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      border-color: #e89cae;
    }

    .card i {
      font-size: 2.5rem;
      color: #e89cae;
      margin-bottom: 15px;
    }

    .card h3 {
      margin-bottom: 10px;
      color: #fff;
    }

    .card p {
      color: #94a3b8;
      font-size: 1.5rem;
      font-weight: 600;
    }

    /* Sections */
    .section {
      background: rgba(255, 255, 255, 0.05);
      padding: 25px;
      border-radius: 12px;
      margin-bottom: 25px;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .section h2 {
      color: #e89cae;
      margin-bottom: 10px;
    }

    .section p {
      color: #94a3b8;
      margin-bottom: 20px;
    }

    /* Buttons */
    .btn {
      background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(232, 156, 174, 0.3);
    }

    /* Activity Log Styles */
    .activity-list {
      margin-top: 20px;
    }

    .activity-item {
      background: rgba(255, 255, 255, 0.03);
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 10px;
      border-left: 4px solid #e89cae;
    }

    .activity-description {
      color: #fff;
      margin-bottom: 5px;
    }

    .activity-meta {
      display: flex;
      justify-content: space-between;
      color: #94a3b8;
      font-size: 0.85rem;
    }

    .activity-type {
      background: #e89cae;
      color: #000;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 0.75rem;
      font-weight: 600;
    }

    .empty-activity {
      text-align: center;
      color: #94a3b8;
      padding: 40px 20px;
      font-style: italic;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      
      .dashboard-main {
        margin-left: 0;
      }
      
      .cards {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2><i class="fas fa-user-circle"></i> Dashboard</h2>
    <a href="dashboard.php" class="active"><i class="fas fa-home"></i> Overview</a>
    <a href="manage_tech_stack.php"><i class="fas fa-briefcase"></i> Manage Home</a>
    <a href="manage_projects.php"><i class="fas fa-briefcase"></i> Manage Projects</a>
    <a href="manage_places.php"><i class="fas fa-map-marker-alt"></i> Manage Places</a>
    <a href="manage_certifications.php"><i class="fas fa-graduation-cap"></i> Manage Education</a>
    <a href="message_form.php"><i class="fas fa-user"></i> Messages</a>
    <a href="index.php"><i class="fas fa-globe"></i> View Portfolio</a>
    <hr>
    <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <main class="dashboard-main">
    <!-- Message Display Section -->
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
    
    <h1>Welcome, Anna Mari 🌙</h1>

    <!-- Summary Cards -->
    <div class="cards">
      <div class="card">
        <i class="fas fa-briefcase"></i>
        <h3>Projects</h3>
        <p><?= $projects_count ?> active projects</p>
      </div>
      <div class="card">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Places</h3>
        <p><?= $places_count ?> places added</p>
      </div>
      <div class="card">
        <i class="fas fa-graduation-cap"></i>
        <h3>Certifications</h3>
        <p><?= $certifications_count ?> records</p>
      </div>
      <div class="card">
        <i class="fas fa-envelope"></i>
        <h3>Messages</h3>
        <p><?= $messages_count ?> total messages</p>
      </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="section">
      <h2>Quick Actions</h2>
      <p>Quick links for your portfolio content.</p>
      <button class="btn" onclick="window.location.href='about1.php'" style="margin-right: 10px;">
        <i class="fas fa-user"></i> About
      </button>
      <button class="btn" onclick="window.location.href='projects1.php'" style="margin-right: 10px;">
        <i class="fas fa-briefcase"></i> Projects
      </button>
      <button class="btn" onclick="window.location.href='places1.php'" style="margin-right: 10px;">
        <i class="fas fa-map-marker-alt"></i> Places
      </button>
      <button class="btn" onclick="window.location.href='education1.php'">
        <i class="fas fa-graduation-cap"></i> Education
      </button>
    </div>

    <!-- Recent Activity Section -->
    <div class="section">
      <h2>Recent Activity</h2>
      <p>Your latest portfolio updates and activities.</p>
      
      <div class="activity-list">
        <?php if ($activity_result && mysqli_num_rows($activity_result) > 0): ?>
          <?php while ($activity = mysqli_fetch_assoc($activity_result)): ?>
            <div class="activity-item">
              <div class="activity-description">
                <?= htmlspecialchars($activity['description']) ?>
              </div>
              <div class="activity-meta">
                <span class="activity-type"><?= htmlspecialchars($activity['action_type']) ?></span>
                <span><?= date('M j, Y g:i A', strtotime($activity['created_at'])) ?></span>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <div class="empty-activity">
            <i class="fas fa-info-circle" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;"></i>
            <h3>No Recent Activity</h3>
            <p>Your activities will appear here as you manage your portfolio.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>

</body>
</html>