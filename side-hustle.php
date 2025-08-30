<?php
// project.php

// Dynamic Page Title
$pageTitle = "Projects | Anna Mari Portfolio";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* General Body */
    body {
      background-color: #0d0d0d;
      color: white;
      font-family: 'Segoe UI', sans-serif;
      padding: 20px;
      transition: background-color 0.3s, color 0.3s;
    }

    /* Navigation Menu */
    .main-nav ul {
      list-style: none;
      margin: 20px;
      display: flex;
      flex-direction: row;
      gap: 15px;
      padding-left: 850px;
    }

    .main-nav ul li a {
      text-decoration: underline;
      color: white;
      font-size: 18px;
      padding: 8px 12px;
      transition: color 0.3s;
    }

    .main-nav ul li a:hover {
      color: #ebeae6;
    }

    /* Social Icons */
    .social-icons {
      margin-top: 20px;
    }

    .social-icons a {
      color: white;
      font-size: 22px;
      margin-right: 15px;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #ebeae6;
    }

    /* Theme Toggle Button */
    #toggle-theme {
      background: none;
      border: none;
      color: white;
      font-size: 22px;
      cursor: pointer;
      position: fixed;
      top: 15px;
      right: 20px;
    }

    /* Light Mode */
    body.light-mode {
      background-color: #f9f9f9;
      color: #111;
    }

    body.light-mode .main-nav ul li a {
      color: #111;
    }

    body.light-mode .social-icons a {
      color: #111;
    }

    body.light-mode #toggle-theme {
      color: #111;
    }
  </style>
</head>
<body>
  <!-- Theme Toggle Button -->
  <button id="toggle-theme" title="Toggle light/dark mode">
    <i class="fas fa-moon"></i>
  </button>

  <!-- Navigation Menu -->
  <nav class="main-nav">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="projects.php">Projects</a></li>
      <li><a href="hobbies.php">Hobbies</a></li>
      <li><a href="side-hustle.php">Side Hustle</a></li>
    </ul>
  </nav>

  <!-- Page Content -->
  <main>
    <h1>My Projects</h1>
    <p>Welcome to my projects page! Here I will showcase some of my works and achievements.</p>
  </main>

  <!-- Social Icons -->
  <div class="social-icons">
    <a href="https://github.com/zaeuamari" target="_blank" title="GitHub">
      <i class="fab fa-github"></i>
    </a>
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=annamarietaduran44@gmail.com&su=Portfolio Inquiry" target="_blank" title="Email">
      <i class="fas fa-envelope"></i>
    </a>
    <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn">
      <i class="fab fa-linkedin"></i>
    </a>
  </div>

  <!-- Theme Toggle Script -->
  <script>
    const toggleBtn = document.getElementById('toggle-theme');
    const body = document.body;
    const icon = toggleBtn.querySelector('i');

    toggleBtn.addEventListener('click', () => {
      body.classList.toggle('light-mode');
      if (body.classList.contains('light-mode')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
      } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
      }
    });
  </script>
</body>
</html>
