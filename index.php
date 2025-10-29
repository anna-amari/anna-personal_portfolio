<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Anna Mari</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>

  <?php include 'nav.php'; ?>
  <?php
    include 'db.php';
    $query = "SELECT * FROM tech_stack ORDER BY tech_name ASC";
    $result = mysqli_query($conn, $query);
    ?>
  
  <section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Hi, I'm Anna Mari</h1>
            <h3 class="title-role"></h3>
            <p>📍 Iriga City, Philippines</p>
            <p>I've been into coding since 18, building projects in C++, thinking of new innovative ideas,
                and exploring web development. My goal is to create solutions to real-world problems.
            </p>

            <a href="Resume.docx" download class="cv-button">
                <img src="images/cvdl.png" alt="Download CV" class="cv-icon">
                Download CV
            </a>

            <!-- Move social icons here -->
            <div class="social-icons">
                <a href="https://github.com/anna-amari" target="_blank" title="GitHub">
                    <i class="fab fa-github"></i>
                </a>
                <a href="mailto:annamarietaduran44@gmail.com" target="_blank" title="Email">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

        <div class="hero-image">
            <img src="images/Profile.jpeg" alt="Anna Mari" id="profileImage">
        </div>
    </div>
  </section>


  <section class="tech-section">
  <div class="tech-header">
   <h1 class="featured-title">Tech Stack</h1>
<p style="text-align: center;"><i>Currently Learning</i></p>
  </div>

  <div class="tech-grid">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="tech-card">
        <img src="<?= htmlspecialchars($row['image_url']); ?>"
             alt="<?= htmlspecialchars($row['alt_text']); ?>">
        <span><?= htmlspecialchars($row['tech_name']); ?></span>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<h1 class="featured-title">Featured Work</h1>

<section class="portfolio-section">
  <div class="project-grid">
    
    <div class="project">
      <img src="images/petPatrol.png" alt="Pet Patrol">
      <h3>Pet Patrol System</h3>
      <p>Adopters can apply for adoption and fill out the form for the foundation to verify</p>
      <div class="tags">
        <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>SQL</span>
      </div>
      <button class="view-btn" onclick="openImage('images/petPatrol.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

    <div class="project">
      <img src="images/CyberControl.png" alt="CyberControl">
      <h3>CyberControl</h3>
      <p>It emphasizes awareness of cyber behavior and device protection</p>
      <div class="tags">
        <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>SQL</span>
      </div>
      <button class="view-btn" onclick="openImage('images/CyberControl.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

    <div class="project">
      <img src="images/blog.png" alt="BLOG">
      <h3>Personal Blog</h3>
      <p>Highlights the remnant of the scattered kept emotions somewhere south</p>
      <div class="tags">
        <span>HTML</span><span>CSS</span><span>JavaScript</span>
      </div>
      <button class="view-btn" onclick="openImage('images/blog.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

    <div class="project">
      <img src="images/StudLife.png" alt="StudLife">
      <h3>StudLife: Student Productivity WebApp</h3>
      <p>It consists of Pomodoro Timer, To-Do List, Calendar, and Career Path descriptions.</p>
      <h4>Framework: CodeIgniter 4</h4>
      <div class="tags">
        <span>JavaScript</span><span>PHP</span><span>SQL</span>
      </div>
      <button class="view-btn" onclick="openImage('images/StudLife.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

    <div class="project">
      <img src="images/cspcWebsite.png" alt="CSPC">
      <h3>CSPC Website</h3>
      <p>It showcases my journey as an IT student in the university</p>
      <div class="tags">
        <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>SQL</span>
      </div>
      <button class="view-btn" onclick="openImage('images/cspcWebsite.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

    <div class="project">
      <img src="images/Mimo.png" alt="Mimo">
      <h3>Mimo</h3>
      <p>Compilation of audio that motivates and uplifts the listener</p>
      <div class="tags">
        <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>SQL</span>
      </div>
      <button class="view-btn" onclick="openImage('images/Mimo.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

    <div class="project">
      <img src="images/PersonalPink.png" alt="Poem and Stories">
      <h3>Poem and Stories</h3>
      <p>Compilation of words, concepts, and thoughts in total</p>
      <div class="tags">
        <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span>
      </div>
      <button class="view-btn" onclick="openImage('images/PersonalPink.png')">
        <i class="fas fa-image"></i> Screenshot
      </button>
    </div>

  </div>
</section>

<!-- Image Popup -->
<div id="lightbox" class="lightbox" onclick="closeImage()">
  <img id="lightbox-img" src="" alt="Project Screenshot">
</div>


  <script>
    function openImage(src) {
  document.getElementById('lightbox-img').src = src;
  document.getElementById('lightbox').style.display = 'flex';
}
function closeImage() {
  document.getElementById('lightbox').style.display = 'none';
}

    // Typewriter effect for title-role      
    const roles = [
      "3rd Year IT Student",
      "Aspiring Web Developer",
      "Aim to be in CyberSecurity Industry",
      "Woman in Tech"
    ];

    const roleElement = document.querySelector(".title-role");
    let roleIndex = 0;
    let charIndex = 0;
    let isDeleting = false;

    function typeEffect() {
      const currentRole = roles[roleIndex];

      if (!isDeleting) {
        roleElement.textContent = currentRole.substring(0, charIndex + 1);
        charIndex++;

        if (charIndex === currentRole.length) {
          isDeleting = true;
          setTimeout(typeEffect, 1500); // pause after full word
          return;
        }
      } else {
        roleElement.textContent = currentRole.substring(0, charIndex - 1);
        charIndex--;

        if (charIndex === 0) {
          isDeleting = false;
          roleIndex = (roleIndex + 1) % roles.length; // next role
        }
      }

      const speed = isDeleting ? 80 : 120;
      setTimeout(typeEffect, speed);
    }

    typeEffect();

    const tabBtns = document.querySelectorAll(".tab-btn");
    const contents = document.querySelectorAll(".tab-content");

    tabBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        tabBtns.forEach(b => b.classList.remove("active"));
        contents.forEach(c => c.classList.remove("active"));

        btn.classList.add("active");
        document.getElementById(btn.dataset.tab).classList.add("active");
      });
    });

    //photo double click to dashboard
    document.addEventListener('DOMContentLoaded', function() {
      const profileImage = document.getElementById('profileImage');
      if (profileImage) {
        profileImage.addEventListener('dblclick', function() {
          window.location.href = 'dashboard.php';
        });
      }
    });
  </script>

</body>
</html>