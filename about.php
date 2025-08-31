<?php
include 'db.php'; // connects to AnnaPortfolio

// about.php
$pageTitle = "About Me | Anna Mari Portfolio";

$bio = "Hi! I'm Anna Mari, a passionate web developer with experience in PHP, HTML, CSS, JavaScript, and MySQL. I enjoy creating functional and aesthetic web applications that provide great user experiences.";

// Handle contact form
$formMessage = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $conn->real_escape_string($_POST['first_name']);
    $last = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $msg = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (first_name, last_name, email, message) 
            VALUES ('$first', '$last', '$email', '$msg')";

    if ($conn->query($sql)) {
        $formMessage = "<p class='success'>Message sent successfully! Thank you </p>";
    } else {
        $formMessage = "<p class='error'>Something went wrong. Please try again.</p>";
    }
}
$classmates = $conn->query("SELECT * FROM classmates");
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
      background-color: #ffffff;
      color: #333333;
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* Navigation */
    nav {
      background-color: #ffffff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    nav a {
      color: #555555;
      text-decoration: none;
      font-weight: 600;
    }
    nav a:hover {
      color: #e89cae;
    }
    .main-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 5%;
      background: #ffffff;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    .main-nav .logo-container {
      display: flex;
      gap: 20px;
    }
    .main-nav .logo {
      height: 100px;
      width: 100px;
      object-fit: contain;
      float:left;
    }
    .main-nav h2 {
      color: #e89cae;
      font-size: 24px;
      margin: 0;
    }
    .main-nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 40px;
    }
    .main-nav ul li a {
      color: #190909ff;
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
      padding: 60px 10%;
      gap: 5px;
      min-height: 90vh;
      background-color: #ffffff;
      min-height: calc(10vh - 90px);
    }
    .hero-text h1 {
      font-size: 48px;
      font-weight: 700;
      color: #e89cae;
      margin-bottom: 20px;
    }
    .hero-text p {
      font-size: 18px;
      max-width: 550px;
      margin-bottom: 30px;
      color: #151414ff;
    }
    .hero-text a {
      display: inline-block;
      padding: 12px 25px;
      background: #e89cae;
      color: #ffffff;
      font-weight: 600;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s ease;
    }
    .hero-text a:hover {
      background: #fcc7d1;
    }
    .hero img {
      width: 320px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
      object-fit: cover;
    }

    /* Social Icons */
    .social-icons {
      margin-top: 20px;
      display: flex;
      gap: 20px;
    }
    .social-icons a {
      color: #0b0b0bff;
      font-size: 22px;
      transition: color 0.3s, transform 0.2s;
    }
    .social-icons a:hover {
      color: #e89cae;
      transform: translateY(-3px);
    }

      /* ===== CLASSMATES ===== */
    .classmates-section {
      padding: 50px 5%;
      background: #fff5f8;
      text-align: center;
    }
    .classmates-section h2 {
      color: #d46a85;
      margin-bottom: 30px;
    }
    .cards {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }
    .card {
      background: #ffe6ec;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      width: 280px;
      padding: 20px;
    }
    .card h3 {
      margin-bottom: 15px;
      color: #d46a85;
    }
    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 12px;
    }
    .card p {
      color: #444;
      font-size: 14px;
    }

    /* Contact Form Container */
    .contact-form {
      background: #ffe6ec;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      max-width: 900px;
      margin: auto; /* center form */
    }

    .contact-form h2 {
      color: #d46a85;
      margin-bottom: 20px;
      text-align: center;
    }

    /* Flexbox Layout */
    .contact-form form {
      display: flex;
      gap: 20px; /* space between left and right */
    }

    /* Left and Right Columns */
    .form-left, .form-right {
      flex: 1; /* each takes 50% */
      display: flex;
      flex-direction: column;
    }

    /* Labels */
    .contact-form label {
      font-weight: bold;
      color: #444;
      margin-top: 10px;
    }

    /* Inputs & Textarea */
    .contact-form input,
    .contact-form textarea {
      width: 70%;
      padding: 12px;
      margin-top: 8px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 15px;
    }

    /* Textarea */
    textarea {
      height: 100%; /* make it tall */
      resize: vertical;
    }

    /* Button */
    .contact-form button {
      background: #e89cae;
      color: #fff;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      display: block;
      width: 100%;
      margin-top: 15px;
    }

    .contact-form button:hover {
      background: #f7b8c8;
    }

    /* Success & Error Messages */
    .success { 
      color: green; 
      text-align: center; 
    }
    .error { 
      color: red; 
      text-align: center; 
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
        flex-direction: column;
        gap: 5px;
      }
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="main-nav">
    <div class="logo-container">
      <img src="images/Projects/Logo/AnnaMari.png" alt="Anna Mari Logo" class="logo">
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



<div style="display: flex; gap: 20px; justify-content: center; margin-top: 30px;">
  <?php while($row = $classmates->fetch_assoc()): ?>
    <div style="width: 250px; text-align: center; border: 2px solid #f4c2c2; border-radius: 10px; padding: 15px; background: #fff0f5;">
      
      <!-- Section Title -->
      <h3 style="color:#d46a85;"><?php echo htmlspecialchars($row['section']); ?></h3>
      
      <!-- Image -->
      <img src="<?php echo htmlspecialchars($row['file_path']); ?>" alt="<?php echo htmlspecialchars($row['section']); ?>" 
           style="width:100%; height:150px; object-fit:cover; border-radius:8px; margin-bottom:10px;">
      
      <!-- Description -->
      <p style="color:#444;"><?php echo htmlspecialchars($row['description']); ?></p>
    </div>
  <?php endwhile; ?>
</div>

<!-- Bestfriends Section -->
<!-- Bestfriends Section -->
<section class="bestfriends-section" style="margin-top:50px; padding:40px; background-color:#fff0f5;">
  <h2 style="text-align:center; color:#d46a85; margin-bottom:30px;">My SHS Bestfriends</h2>

  <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; max-width: 1000px; margin: auto;">
    <?php
      $bestfriends = $conn->query("SELECT * FROM shs_bestfriends");
      if ($bestfriends && $bestfriends->num_rows > 0):
        while($row = $bestfriends->fetch_assoc()):
    ?>
      <div style="background:#ffffff; border: 2px solid #f4c2c2; border-radius: 12px; padding: 20px; text-align:center; box-shadow:0 4px 8px rgba(0,0,0,0.1);">
        
        <!-- Portrait Image -->
        <img src="<?php echo htmlspecialchars($row['file_path']); ?>" 
             alt="<?php echo htmlspecialchars($row['name']); ?>" 
             style="width:100%; height:300px; object-fit:cover; border-radius:10px; margin-bottom:15px;">
        
        <!-- Name -->
        <h3 style="color:#d46a85; margin:10px 0;"><?php echo htmlspecialchars($row['name']); ?></h3>
        
        <!-- Description -->
        <p style="color:#444; font-size: 14px;"><?php echo htmlspecialchars($row['description']); ?></p>
      </div>
    <?php 
        endwhile;
      else:
        echo "<p style='text-align:center;'>No bestfriends found.</p>";
      endif;
    ?>
  </div>
</section>



  <h1 style="color:#d46a85; text-align:center; background-color:#ffe6ec; padding:10px; border-radius:8px;">REACH ME</h1>

<!-- Contact Form Section -->
<div class="contact-form">
  <?php echo $formMessage; ?> <!-- success/error message -->
  <form action="" method="POST"> <!-- action empty = same page -->
    <div class="form-left">
      <label for="first_name">First Name</label>
      <input type="text" id="first_name" name="first_name" required>

      <label for="last_name">Last Name</label>
      <input type="text" id="last_name" name="last_name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-right">
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="12" required></textarea>
      
      <!-- Submit Button inside the form -->
      <button type="submit">Send Message</button>
    </div>
  </form>
</div>



</body>
</html>
