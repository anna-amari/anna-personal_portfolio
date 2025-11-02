<?php
// dashboard.php
session_start();
include 'db.php'; // database connection

// Fetch all technologies
$query = "SELECT * FROM tech_stack ORDER BY tech_name ASC";
$result = mysqli_query($conn, $query);
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
  <link rel="stylesheet" href="dashboard.css">

</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2><i class="fas fa-user-circle"></i> Dashboard</h2>
    <a href="dashboard.php" class="active"><i class="fas fa-home"></i> Overview</a>
    <a href="manage_home/tech-stack/tech_stack.php"><i class="fas fa-briefcase"></i> Manage Home</a>
    <a href="manage_projects.php"><i class="fas fa-briefcase"></i> Manage Projects</a>
    <a href="places.php"><i class="fas fa-map-marker-alt"></i> Manage Places</a>
    <a href="manage_education/webinar.php"><i class="fas fa-graduation-cap"></i> Manage Education</a>
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
        <?= $_SESSION['message']; unset($_SESSION['message']); ?>
      </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
      <div class="message error">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>
    
    <h1>Welcome, Anna Mari 🌙</h1>

    <!-- Summary Cards -->
    <div class="cards">
      <div class="card">
        <i class="fas fa-briefcase"></i>
        <h3>Projects</h3>
        <p>5 active projects</p>
      </div>
      <div class="card">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Places</h3>
        <p>8 places added</p>
      </div>
      <div class="card">
        <i class="fas fa-graduation-cap"></i>
        <h3>Education</h3>
        <p>3 records</p>
      </div>
      <div class="card">
        <i class="fas fa-eye"></i>
        <h3>Profile Views</h3>
        <p>1,245 total views</p>
      </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="section">
      <h2>Quick Actions</h2>
      <p>Quick links for your portfolio content.</p>
      <button class="btn" onclick="window.location.href='about.php'" style="margin-right: 10px;">
        <i class="fas fa-user"></i> About
      </button>
      <button class="btn" onclick="window.location.href='projects.php'" style="margin-right: 10px;">
        <i class="fas fa-briefcase"></i> Projects
      </button>
      <button class="btn" onclick="window.location.href='places.php'" style="margin-right: 10px;">
        <i class="fas fa-map-marker-alt"></i> Places
      </button>
      <button class="btn" onclick="window.location.href='education.php'">
        <i class="fas fa-graduation-cap"></i> Education
      </button>
    </div>

    <!-- Recent Activity Section -->
    <div class="section">
      <h2>Recent Activity</h2>
      <p>Your latest portfolio updates and activities will appear here.</p>
      <div style="color: #cccccc; font-style: italic; padding: 20px; text-align: center; background: #1a1a1a; border-radius: 8px;">
        <i class="fas fa-info-circle"></i> No recent activity to display
      </div>
    </div>
  </main>

</body>
</html>