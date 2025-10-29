<!-- sidebar.php -->
<div class="sidebar">
  <h2><i class="fas fa-user-circle"></i> Dashboard</h2>
  <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>"><i class="fas fa-home"></i> Overview</a>
    <a href="manage_home/tech-stack/tech_stack.php"><i class="fas fa-briefcase"></i> Manages Home</a>
 
  <a href="projects.php"><i class="fas fa-briefcase"></i> Manage Projects</a>
  <a href="places.php"><i class="fas fa-map-marker-alt"></i> Manage Places</a>
  <a href="education.php"><i class="fas fa-graduation-cap"></i> Manage Education</a>
  <a href="about.php"><i class="fas fa-user"></i> About Me</a>
  <a href="portfolio.php"><i class="fas fa-globe"></i> View Portfolio</a>
  <hr>
  <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
