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
    html, body {
    overflow: auto; /* Keep scrolling functionality */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    html::-webkit-scrollbar,
    body::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    html, body {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
 .testimonials-section {
  padding: 20px 20px;
  margin-top: 10px;
  background: black;
}

.testimonials-title {
  text-align: center;
  background: black;
  font-size: 3rem;
  color: #ffffffff;
  margin-bottom: 50px;
  font-family: 'Pixelify Sans', sans-serif;
  text-shadow: 0 4px 8px rgba(232, 156, 174, 0.3);
}

.testimonials-container {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
    background: black;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  padding: 20px;
}

.testimonial-card {
  background: rgba(255, 255, 255, 0.05);
  border: 2px solid #f2f1f2ff;
  border-radius: 16px;
  padding: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.testimonial-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #e6c6cdff, #ddbdc5ff);
}

.testimonial-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(232, 156, 174, 0.2);
  border-color: #f7b8c8;
}

.testimonial-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 20px;
}

.testimonial-info h3 {
  color: #e89cae;
  font-size: 1.4rem;
  margin: 0 0 5px 0;
  font-weight: 600;
}

.testimonial-position {
  color: #b0b0b0;
  font-size: 0.9rem;
  margin: 0;
  font-style: italic;
}

.testimonial-rating {
  text-align: right;
}

.stars {
  color: #ffd700;
  font-size: 1.2rem;
  letter-spacing: 2px;
}

.rating-number {
  color: #b0b0b0;
  font-size: 0.8rem;
  display: block;
  margin-top: 5px;
}

.testimonial-content {
  margin-bottom: 20px;
}

.testimonial-text {
  color: #ffffff;
  font-size: 1.1rem;
  line-height: 1.6;
  margin: 0;
  font-style: italic;
  text-align: justify;
}

.testimonial-footer {
  border-top: 1px solid rgba(232, 156, 174, 0.3);
  padding-top: 15px;
  text-align: right;
}

.no-testimonials {
  grid-column: 1 / -1;
  text-align: center;
  padding: 60px 20px;
  color: #b0b0b0;
  font-size: 1.2rem;
}

/* Responsive Design */
@media (max-width: 768px) {
  .testimonials-container {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .testimonial-header {
    flex-direction: column;
    gap: 15px;
  }
  
  .testimonial-rating {
    text-align: left;
  }
  
  .testimonials-title {
    font-size: 2.5rem;
  }
}

@media (max-width: 480px) {
  .testimonial-card {
    padding: 20px;
  }
  
  .testimonials-title {
    font-size: 2rem;
  }
  
  .testimonial-text {
    font-size: 1rem;
  }
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


  <section class="testimonials-section">
  <h1 class="testimonials-title">Testimonials</h1>
  
  <div class="testimonials-container">
    <?php
    // Fetch testimonials from database
    $testimonial_query = "SELECT name, position, testimonials_text, rating, created_at 
                         FROM testimonials 
                         ORDER BY created_at DESC";
    $testimonial_result = mysqli_query($conn, $testimonial_query);
    
    if(mysqli_num_rows($testimonial_result) > 0):
      while($testimonial = mysqli_fetch_assoc($testimonial_result)):
        $stars = str_repeat('★', $testimonial['rating']) . str_repeat('☆', 5 - $testimonial['rating']);
        $date = date('F j, Y', strtotime($testimonial['created_at']));
    ?>
    
    <div class="testimonial-card">
      <div class="testimonial-header">
        <div class="testimonial-info">
          <h3 class="testimonial-name"><?= htmlspecialchars($testimonial['name']) ?></h3>
          <p class="testimonial-position"><?= htmlspecialchars($testimonial['position']) ?></p>
        </div>
        <div class="testimonial-rating">
          <span class="stars"><?= $stars ?></span>
          <span class="rating-number">(<?= $testimonial['rating'] ?>/5)</span>
        </div>
      </div>
      
      <div class="testimonial-content">
        <p class="testimonial-text">"<?= htmlspecialchars($testimonial['testimonials_text']) ?>"</p>
      </div>
      
    </div>
    
    <?php endwhile; ?>
    
    <?php else: ?>
    <div class="no-testimonials">
      <p>No testimonials yet. Be the first to share your experience!</p>
    </div>
    <?php endif; ?>
  </div>
</section>


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
      "INFJ girly",
      "Aiming to be in CyberSecurity Industry",
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
          window.location.href = 'login.php';
        });
      }
    });

  </script>

</body>
</html>