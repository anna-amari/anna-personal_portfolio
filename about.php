<?php
// about.php

// Dynamic page title
$pageTitle = "About Me | Anna Mari Portfolio";

// Example data
$bio = "Hi! I'm Anna Mari, a passionate web developer with experience in PHP, HTML, CSS, JavaScript, and MySQL. I enjoy creating functional and aesthetic web applications that provide great user experiences.";
$skills = [
    "HTML & CSS" => 90,
    "JavaScript" => 80,
    "PHP & MySQL" => 85,
    "React.js" => 70,
    "UI/UX Design" => 75
];
$education = [
    [
        "school" => "Camarines Sur Polytechnic Colleges",
        "course" => "Bachelor of Science in Information Technology",
        "gwa" => "1.69",
        "link" => "https://cspc.edu.ph/"
    ],
    [
        "school" => "ACLC College of Iriga",
        "course" => "Senior High - ABM Strand",
        "gwa" => "High Honors",
        "link" => "https://www.facebook.com/ACLCCollegeIRIGA/"
    ],
    [
        "school" => "University of Northeastern Philippines",
        "course" => "Junior High School",
        "gwa" => "With Honors [Grade 7 and 8]",
        "link" => "https://www.unep.edu.ph/"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    /* ---------------- About Section CSS ---------------- */
    body {
        background: #1a1a1a;
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Navigation */
    .main-nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .main-nav ul li a {
      text-decoration: none;
      color: #fff;
      font-size: 18px;
      padding: 8px 12px;
    }

    .main-nav ul li a.active {
      color: #FFD700;
    }

    /* Social Icons */
    .social-icons {
      display: flex;
      gap: 15px;
      margin: 20px 0;
    }

    .social-icons a {
      color: #fff;
      font-size: 24px;
      text-decoration: none;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #FFD700;
    }

    /* About Section */
    .about-section {
        padding: 50px 20px;
    }

    .about-profile {
        display: flex;
        align-items: center;
        gap: 30px;
        flex-wrap: wrap;
        margin-bottom: 40px;
    }

    .profile-img {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .bio h2 {
        margin-bottom: 15px;
    }

    .about-skills ul, .about-education ul {
        list-style: none;
        padding: 0;
    }

    .about-skills li {
        margin-bottom: 15px;
    }

    .skill-bar {
        background: rgba(255,255,255,0.2);
        border-radius: 12px;
        height: 12px;
        overflow: hidden;
    }

    .skill-fill {
        height: 100%;
        background: #FFD700;
        border-radius: 12px;
    }

    .about-education li {
        margin-bottom: 20px;
    }

    .about-education a {
        color: #fff;
        text-decoration: underline;
    }

    /* Responsive */
    @media(max-width: 768px){
        .about-profile {
            flex-direction: column;
            text-align: center;
        }
    }
  </style>
</head>
<body>
  <!-- Theme Toggle -->
  <button id="toggle-theme" title="Toggle light/dark mode">
    <i class="fas fa-moon"></i>
  </button>

  <!-- Navigation -->
  <nav class="main-nav">
    <ul>
      <li><a href="index.html" <?php if(basename($_SERVER['PHP_SELF']) == 'index.html') echo 'class="active"'; ?>>Home</a></li>
      <li><a href="about.php" <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>About</a></li>
      <li><a href="projects.php" <?php if(basename($_SERVER['PHP_SELF']) == 'projects.php') echo 'class="active"'; ?>>Projects</a></li>
      <li><a href="hobbies.php" <?php if(basename($_SERVER['PHP_SELF']) == 'hobbies.php') echo 'class="active"'; ?>>Hobbies</a></li>
      <li><a href="side-hustle.php" <?php if(basename($_SERVER['PHP_SELF']) == 'side-hustle.php') echo 'class="active"'; ?>>Side Hustle</a></li>
    </ul>
  </nav>

  <!-- Social Icons -->
  <div class="social-icons">
    <a href="https://github.com/zaeuamari" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=annamarietaduran44@gmail.com&su=Portfolio Inquiry" target="_blank" title="Email"><i class="fas fa-envelope"></i></a>
    <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
  </div>

  <!-- About Section -->
  <section id="about" class="about-section">
    <div class="about-profile">
        <img src="images/profile.jpg" alt="Anna Mari Profile" class="profile-img">
        <div class="bio">
            <h2>About Me</h2>
            <p><?php echo $bio; ?></p>
        </div>
    </div>

    <div class="about-skills">
        <h2>Skills</h2>
        <ul>
            <?php foreach($skills as $skill => $percent): ?>
                <li>
                    <span><?php echo $skill; ?></span>
                    <div class="skill-bar">
                        <div class="skill-fill" style="width: <?php echo $percent; ?>%;"></div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="about-education">
        <h2>Education</h2>
        <ul>
            <?php foreach($education as $edu): ?>
                <li>
                    <h3><a href="<?php echo $edu['link']; ?>" target="_blank"><?php echo $edu['school']; ?></a></h3>
                    <p><i><?php echo $edu['course']; ?></i></p>
                    <p><b><?php echo $edu['gwa']; ?></b></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
  </section>

</body>
</html>
