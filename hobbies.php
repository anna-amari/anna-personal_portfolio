<?php 
// project.php

// Dynamic Page Title
$pageTitle = "Hobbies | Anna Mari Portfolio"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: #fff;
      color: #333;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      text-align: center; /* Center text globally */
    }

    /* Navigation */
    .main-nav ul {
      list-style: none;
      display: flex;
      justify-content: right; /* Center menu */
      padding: 20px;
      margin: 0;
      background: #f9f9f9;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .main-nav ul li a {
      text-decoration: none;
      color: #333;
      font-size: 18px;
      padding: 8px 12px;
      transition: color 0.3s;
    }
    .main-nav ul li a:hover {
      color: #edccddff;
    }

    /* Page Content */
    main {
      padding: 40px;
      max-width: 1100px;
      margin: auto;
    }

    h2 {
      font-size: 28px;
      margin-top: 40px;
      color: #222;
      display: inline-block;
      border-left: 5px solid #eeb7d3ff;
      padding-left: 10px;
    }

    h3 {
      margin-top: 30px;
      color: #444;
    }

    p.description {
      font-size: 16px;
      color: #555;
      margin: 10px auto 20px;
      max-width: 700px;
    }

    /* Gallery Grid */
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      justify-items: center; /* Center images inside grid */
      margin: 0 auto 40px;
      max-width: 1000px;
    }

    .gallery img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .gallery img:hover {
      transform: scale(1.05) rotate(-1deg);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    /* Social Icons */
    .social-icons {
      text-align: center;
      padding: 30px;
      border-top: 1px solid #eee;
    }
    .social-icons a {
      color: #333;
      font-size: 24px;
      margin: 0 12px;
      transition: color 0.3s;
    }
    .social-icons a:hover {
      color: #ff69b4;
    }

    /* Scroll Animation */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body>
  <!-- Navigation Menu -->
  <nav class="main-nav">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="projects.php">Projects</a></li>
      <li><a href="hobbies.php">Hobbies</a></li>
      <li><a href="side-hustle.php">Side Hustle</a></li>
    </ul>
  </nav>

  <!-- Page Content -->
  <main>
    <h2>DIY as a Hobby</h2>
    <p class="description">I enjoy creating things with my hands. DIY projects help me relax and also spark creativity.</p>
    <div class="gallery fade-in">
      <img src="images/diy1.jpg" alt="DIY project 1">
      <img src="images/diy2.jpg" alt="DIY project 2">
    </div>

    <h2>Scrapbook</h2>
    <p class="description">Collecting memories and designing scrapbooks brings joy and nostalgia.</p>
    <div class="gallery fade-in">
      <img src="images/scrap1.jpg" alt="Scrapbook 1">
      <img src="images/scrap2.jpg" alt="Scrapbook 2">
      <img src="images/scrap3.jpg" alt="Scrapbook 3">
      <img src="images/scrap4.jpg" alt="Scrapbook 4">
    </div>

    <h2>Devotional Journal</h2>
    <p class="description">Writing reflections and prayers keeps me grounded and spiritually connected.</p>
    <div class="gallery fade-in">
      <img src="images/dev1.jpg" alt="Devotional 1">
      <img src="images/dev2.jpg" alt="Devotional 2">
      <img src="images/dev3.jpg" alt="Devotional 3">
    </div>

    <h2>Coding Projects</h2>
    <p class="description">I love building useful projects and experimenting with web technologies.</p>
    <div class="gallery fade-in">
      <img src="images/code1.jpg" alt="Code Project 1">
      <img src="images/code2.jpg" alt="Code Project 2">
      <img src="images/code3.jpg" alt="Code Project 3">
      <img src="images/code4.jpg" alt="Code Project 4">
      <img src="images/code5.jpg" alt="Code Project 5">
    </div>

    <h2>Poetry</h2>
    <p class="description">Through poems and writings, I express emotions and create art with words.</p>
    <div class="gallery fade-in">
      <img src="images/poem1.jpg" alt="Poetry 1">
      <img src="images/poem2.jpg" alt="Poetry 2">
      <img src="images/poem3.jpg" alt="Poetry 3">
      <img src="images/poem4.jpg" alt="Poetry 4">
      <img src="images/poem5.jpg" alt="Poetry 5">
      <img src="images/poem6.jpg" alt="Poetry 6">
    </div>

    <h2>Travel Locations</h2>
    <p class="description">Exploring different places broadens my perspective and inspires creativity.</p>
    
    <?php for($i=1; $i<=10; $i++): ?>
      <h3>Location <?php echo $i; ?></h3>
      <p class="description">A memorable place that gave me inspiration and joy.</p>
      <div class="gallery fade-in">
        <img src="images/location<?php echo $i; ?>-1.jpg" alt="Location <?php echo $i; ?> Pic 1">
        <img src="images/location<?php echo $i; ?>-2.jpg" alt="Location <?php echo $i; ?> Pic 2">
        <img src="images/location<?php echo $i; ?>-3.jpg" alt="Location <?php echo $i; ?> Pic 3">
      </div>
    <?php endfor; ?>
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

  <!-- Scroll Animation Script -->
  <script>
    const faders = document.querySelectorAll('.fade-in');
    const appearOptions = { threshold: 0.2 };

    const appearOnScroll = new IntersectionObserver(function(entries, observer) {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('show');
        observer.unobserve(entry.target);
      });
    }, appearOptions);

    faders.forEach(fader => {
      appearOnScroll.observe(fader);
    });
  </script>
</body>
</html>
