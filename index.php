<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Anna Mari</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
  <style>
    /* Screenshot Gallery Styles */
    .screenshot-gallery {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.95);
      z-index: 1000;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .gallery-container {
      width: 90%;
      max-width: 1000px;
      height: 80vh;
      background: #1a1a1a;
      border-radius: 16px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      border: 2px solid #e89cae;
    }

    .gallery-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 2px solid #e89cae;
    }

    .gallery-title {
      color: #e89cae;
      font-size: 1.5rem;
      margin: 0;
    }

    .close-gallery {
      background: none;
      border: none;
      color: #e89cae;
      font-size: 2rem;
      cursor: pointer;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .close-gallery:hover {
      background: rgba(232, 156, 174, 0.2);
    }

    .gallery-images {
      flex: 1;
      overflow-y: auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 15px;
      padding: 10px;
    }

    .gallery-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #333;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .gallery-image:hover {
      transform: scale(1.05);
      border-color: #e89cae;
      box-shadow: 0 5px 20px rgba(232, 156, 174, 0.3);
    }

    .gallery-nav {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .nav-btn {
      background: #e89cae;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .nav-btn:hover {
      background: #f7b8c8;
      transform: translateY(-2px);
    }

    .nav-btn:disabled {
      background: #666;
      cursor: not-allowed;
      transform: none;
    }

    /* Custom scrollbar for gallery */
    .gallery-images::-webkit-scrollbar {
      width: 12px;
    }

    .gallery-images::-webkit-scrollbar-track {
      background: #2a2a2a;
      border-radius: 6px;
    }

    .gallery-images::-webkit-scrollbar-thumb {
      background: #e89cae;
      border-radius: 6px;
    }

    .gallery-images::-webkit-scrollbar-thumb:hover {
      background: #f7b8c8;
    }
  </style>
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
        <button class="view-btn" onclick="openScreenshotGallery('Pet Patrol System', 'a', 19)">
          <i class="fas fa-images"></i> View Screenshots
        </button>
      </div>

      <div class="project">
        <img src="images/CyberControl.png" alt="CyberControl">
        <h3>CyberControl</h3>
        <p>It emphasizes awareness of cyber behavior and device protection</p>
        <div class="tags">
          <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>SQL</span>
        </div>
        <button class="view-btn" onclick="openScreenshotGallery('CyberControl', 'b', 7)">
          <i class="fas fa-images"></i> View Screenshots
        </button>
      </div>

      <div class="project">
        <img src="images/blog.png" alt="BLOG">
        <h3>Personal Blog</h3>
        <p>Highlights the remnant of the scattered kept emotions somewhere south</p>
        <div class="tags">
          <span>HTML</span><span>CSS</span><span>JavaScript</span>
        </div>
        <button class="view-btn" onclick="openScreenshotGallery('Personal Blog', 'c', 2)">
          <i class="fas fa-images"></i> View Screenshots
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
        <button class="view-btn" onclick="openScreenshotGallery('StudLife', 'd', 4)">
          <i class="fas fa-images"></i> View Screenshots
        </button>
      </div>

      <div class="project">
        <img src="images/cspcWebsite.png" alt="CSPC">
        <h3>CSPC Website</h3>
        <p>It showcases my journey as an IT student in the university</p>
        <div class="tags">
          <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span><span>SQL</span>
        </div>
        <button class="view-btn" onclick="openScreenshotGallery('CSPC Website', 'e', 4)">
          <i class="fas fa-images"></i> View Screenshots
        </button>
      </div>

      <div class="project">
        <img src="images/PersonalPink.png" alt="Poem and Stories">
        <h3>Poem and Stories</h3>
        <p>Compilation of words, concepts, and thoughts in total</p>
        <div class="tags">
          <span>HTML</span><span>CSS</span><span>JavaScript</span><span>PHP</span>
        </div>
        <button class="view-btn" onclick="openScreenshotGallery('Poem and Stories', 'g', 7)">
          <i class="fas fa-images"></i> View Screenshots
        </button>
      </div>
    </div>
  </section>

  <!-- Screenshot Gallery Modal -->
  <div id="screenshotGallery" class="screenshot-gallery">
    <div class="gallery-container">
      <div class="gallery-header">
        <h2 class="gallery-title" id="galleryTitle">Project Screenshots</h2>
        <button class="close-gallery" onclick="closeScreenshotGallery()">&times;</button>
      </div>
      
      <div class="gallery-images" id="galleryImages">
        <!-- Images will be loaded here dynamically -->
      </div>
      
      <div class="gallery-nav">
        <button class="nav-btn" onclick="loadMoreScreenshots()" id="loadMoreBtn">
          <i class="fas fa-plus"></i> Load More
        </button>
      </div>
    </div>
  </div>

  <script>
    let currentGallery = { prefix: '', count: 0, loaded: 0 };
    const imagesPerLoad = 6;

    // Open screenshot gallery
    function openScreenshotGallery(projectName, prefix, totalCount) {
      currentGallery = { prefix: prefix, count: totalCount, loaded: 0 };
      
      // Update gallery title
      document.getElementById('galleryTitle').textContent = `${projectName} - Screenshots`;
      
      // Clear previous images
      document.getElementById('galleryImages').innerHTML = '';
      
      // Load initial batch of images
      loadMoreScreenshots();
      
      // Show gallery
      document.getElementById('screenshotGallery').style.display = 'flex';
    }

    // Close screenshot gallery
    function closeScreenshotGallery() {
      document.getElementById('screenshotGallery').style.display = 'none';
      currentGallery.loaded = 0;
    }

    // Load more screenshots
    function loadMoreScreenshots() {
      const gallery = document.getElementById('galleryImages');
      const startIndex = currentGallery.loaded + 1;
      const endIndex = Math.min(currentGallery.loaded + imagesPerLoad, currentGallery.count);
      
      for (let i = startIndex; i <= endIndex; i++) {
        const img = document.createElement('img');
        img.src = `images/${currentGallery.prefix}${i}.png`;
        img.alt = `Screenshot ${i}`;
        img.className = 'gallery-image';
        img.onclick = () => openFullImage(`images/${currentGallery.prefix}${i}.png`);
        gallery.appendChild(img);
      }
      
      currentGallery.loaded = endIndex;
      
      // Hide load more button if all images are loaded
      const loadMoreBtn = document.getElementById('loadMoreBtn');
      if (currentGallery.loaded >= currentGallery.count) {
        loadMoreBtn.style.display = 'none';
      } else {
        loadMoreBtn.style.display = 'block';
      }
    }

    // Open full image view (you can reuse your existing lightbox)
    function openFullImage(src) {
      // You can reuse your existing lightbox functionality here
      // For now, let's just open the image in a new tab
      window.open(src, '_blank');
    }

    // Close gallery when clicking outside
    document.getElementById('screenshotGallery').addEventListener('click', function(e) {
      if (e.target === this) {
        closeScreenshotGallery();
      }
    });

    // Close gallery with Escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeScreenshotGallery();
      }
    });

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
          setTimeout(typeEffect, 1500);
          return;
        }
      } else {
        roleElement.textContent = currentRole.substring(0, charIndex - 1);
        charIndex--;

        if (charIndex === 0) {
          isDeleting = false;
          roleIndex = (roleIndex + 1) % roles.length;
        }
      }

      const speed = isDeleting ? 80 : 120;
      setTimeout(typeEffect, speed);
    }

    typeEffect();

    // Photo double click to dashboard
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