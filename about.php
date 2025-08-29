<?php
// about.php

// Dynamic page title
$pageTitle = "About Me | Anna Mari Portfolio";

// Example data
$bio = "Hi! I'm Anna Mari, a passionate web developer with experience in PHP, HTML, CSS, JavaScript, and MySQL. I enjoy creating functional and aesthetic web applications that provide great user experiences.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #ffffff; /* White background */
      color: #333333;   /* Dark gray text for readability */
      line-height: 1.6;
    }

    /* Navigation */
    nav {
      background-color: #ffffff; /* White background for nav */
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Subtle shadow */
    }

    nav a {
      color: #555555; /* Darker gray for nav links */
      text-decoration: none;
      font-weight: 600;
    }

    nav a:hover {
      color: #e89cae; /* Soft pink on hover */
    }

    .main-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 10%;
      background: #ffffff; /* White background */
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Subtle shadow for the sticky nav */
    }

    .main-nav .logo-container {
      display: flex;
      gap: 20px; /* Space between logo and text */
    }

    .main-nav .logo {
      height: 100px; /* Adjust logo size as needed */
      width: 100px;
      object-fit: contain;
      float:left;
    }

    .main-nav h2 {
      color: #e89cae; /* Soft pink for the name */
      font-size: 24px;
      margin: 0;
    }

    .main-nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 20px;
    }

    .main-nav ul li a {
      color: #190909ff; /* Dark gray for nav links */
      font-size: 16px;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.3s;
      position: relative;
    }

    .main-nav ul li a::after {
      content: "";
      display: block;
      width: 0%;
      height: 2px;
      transition: width 0.3s;
      margin-top: 4px;
    }

    .main-nav ul li a:hover::after,
    .main-nav ul li a.active::after {
      width: 100%;
    }

    /* Hero Section */
    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      gap: 50px;
      min-height: 90vh;
      background-color: #ffffff; /* White background */
    }

    .hero-text h1 {
      font-size: 48px;
      font-weight: 700;
      color: #e89cae; /* Soft pink for the heading */
      margin-bottom: 20px;
    }

    .hero-text p {
      font-size: 18px;
      max-width: 550px;
      margin-bottom: 30px;
      color: #151414ff; /* Slightly lighter gray for body text */
    }

    .hero-text a {
      display: inline-block; /* Added display property for correct padding */
      padding: 12px 25px;
      background: #e89cae; /* Soft pink button */
      color: #ffffff; /* White text for button */
      font-weight: 600;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s ease;
    }

    .hero-text a:hover {
      background: #fcc7d1; /* Lighter pink on hover */
    }

    .hero img {
      width: 320px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1); /* Lighter shadow for elegant look */
      object-fit: cover;
    }

    /* Social Icons */
    .social-icons {
      margin-top: 20px;
      display: flex;
      gap: 20px;
    }

    .social-icons a {
      color: #0b0b0bff; /* Subtle gray for icons */
      font-size: 22px;
      transition: color 0.3s, transform 0.2s;
    }

    .social-icons a:hover {
      color: #e89cae; /* Soft pink on hover */
      transform: translateY(-3px);
    }

    /* Responsive */
    @media(max-width: 900px) {
      .hero {
        flex-direction: column;
        text-align: center;
      }
      .hero img {
        margin-top: 50px;
      }
      .main-nav {
        flex-direction: column;
        gap: 10px;
        padding: 15px 5%;
      }
      .main-nav .logo-container {
        flex-direction: column; /* Stack logo and text vertically on small screens */
        gap: 5px;
      }
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="main-nav">
    <div class="logo-container">
      <img src="images/Projects/Logo/AnnaMari.png" alt="Anna Mari Logo" class="logo"> <!-- Added logo image -->
    </div>
    <ul>
      <li><a href="index.html" <?php if(basename($_SERVER['PHP_SELF']) == 'index.html') echo 'class="active"'; ?>>Home</a></li>
      <li><a href="about.php" <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>About</a></li>
      <li><a href="projects.php" <?php if(basename($_SERVER['PHP_SELF']) == 'projects.php') echo 'class="active"'; ?>>Projects</a></li>
      <li><a href="hobbies.php" <?php if(basename($_SERVER['PHP_SELF']) == 'hobbies.php') echo 'class="active"'; ?>>Hobbies</a></li>
      <li><a href="side-hustle.php" <?php if(basename($_SERVER['PHP_SELF']) == 'side-hustle.php') echo 'class="active"'; ?>>Side Hustle</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>About Me</h1>
      <p><?php echo $bio; ?></p>
      <a href="projects.php"> View My Work</a>

      <!-- Social Icons -->
      <div class="social-icons">
        <a href="https://github.com/zaeuamari" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="mailto:annamarietaduran44@gmail.com?subject=Portfolio Inquiry" target="_blank" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    <img src="images/amari.jpeg" alt="Anna Mari Profile">
  </section>

</body>
</html>