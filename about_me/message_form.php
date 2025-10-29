<?php include 'header.php'; ?>
<link rel="stylesheet" href="dashboard.css">

<div class="dashboard-container">
  <?php include 'sidebar.php'; ?>

  <main class="dashboard-main">
    <h1>Welcome to Your Dashboard</h1>
    <p>Here’s an overview of your portfolio activities.</p>

    <!-- Summary Cards Section -->
    <?php include 'includes/summary.php'; ?>

    <!-- Quick Actions Section -->
    <?php include 'includes/quick-actions.php'; ?>

    <!-- Recent Activity Section -->
    <?php include 'includes/recent-activity.php'; ?>
  </main>
</div>

<?php include 'footer.php'; ?>
