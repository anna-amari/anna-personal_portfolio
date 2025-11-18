<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio | Anna Mari</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="index.css">
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

  <!-- NEW: Testimonial Submission Modal -->
   
  <div id="testimonialModal" class="testimonial-modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Share Your Experience</h2>
        <button class="close-modal" id="closeModal">&times;</button>
      </div>
      
      <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i> Thank you for your testimonial! It has been submitted successfully.
      </div>
      
      <form id="testimonialForm">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" required placeholder="Enter your name">
        </div>
        
        <div class="form-group">
          <label for="position">Your Position/Title</label>
          <input type="text" id="position" name="position" required placeholder="e.g., Web Developer, Student, etc.">
        </div>
        
        <div class="rating-group">
          <span class="rating-label">Rating:</span>
          <div class="star-rating" id="starRating">
            <span class="star" data-rating="1">☆</span>
            <span class="star" data-rating="2">☆</span>
            <span class="star" data-rating="3">☆</span>
            <span class="star" data-rating="4">☆</span>
            <span class="star" data-rating="5">☆</span>
          </div>
          <input type="hidden" id="rating" name="rating" required>
        </div>
        
        <div class="form-group">
          <label for="testimonial">Your Testimonial</label>
          <textarea id="testimonial" name="testimonial" required placeholder="Share your experience working with Anna Mari..."></textarea>
        </div>
        
        <button type="submit" class="submit-btn" id="submitBtn">
          <i class="fas fa-paper-plane"></i> Submit Testimonial
        </button>
      </form>
    </div>
  </div>

  <section class="testimonials-section">
    <h1 class="testimonials-title">Testimonials</h1>
    
    <!-- MOVED: Add Testimonial Button inside testimonials section -->
    <button class="add-testimonial-btn" id="addTestimonialBtn">
      <i class="fas fa-plus"></i>
    </button>
    
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
    // Existing gallery and typewriter functions remain the same
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

    // NEW: Testimonial Submission Functionality
    document.addEventListener('DOMContentLoaded', function() {
      const addTestimonialBtn = document.getElementById('addTestimonialBtn');
      const testimonialModal = document.getElementById('testimonialModal');
      const closeModal = document.getElementById('closeModal');
      const testimonialForm = document.getElementById('testimonialForm');
      const starRating = document.getElementById('starRating');
      const ratingInput = document.getElementById('rating');
      const stars = starRating.querySelectorAll('.star');
      const successMessage = document.getElementById('successMessage');
      const submitBtn = document.getElementById('submitBtn');

      let selectedRating = 0;

      // Open modal
      addTestimonialBtn.addEventListener('click', function() {
        testimonialModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
      });

      // Close modal
      closeModal.addEventListener('click', function() {
        closeTestimonialModal();
      });

      // Close modal when clicking outside
      testimonialModal.addEventListener('click', function(e) {
        if (e.target === testimonialModal) {
          closeTestimonialModal();
        }
      });

      // Close modal with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && testimonialModal.style.display === 'flex') {
          closeTestimonialModal();
        }
      });

      // Star rating functionality
      stars.forEach(star => {
        star.addEventListener('click', function() {
          selectedRating = parseInt(this.getAttribute('data-rating'));
          ratingInput.value = selectedRating;
          
          // Update star display
          stars.forEach((s, index) => {
            if (index < selectedRating) {
              s.textContent = '★';
              s.classList.add('active');
            } else {
              s.textContent = '☆';
              s.classList.remove('active');
            }
          });
        });

        // Hover effect
        star.addEventListener('mouseover', function() {
          const hoverRating = parseInt(this.getAttribute('data-rating'));
          stars.forEach((s, index) => {
            if (index < hoverRating) {
              s.textContent = '★';
            } else {
              s.textContent = '☆';
            }
          });
        });

        // Reset to selected rating on mouseout
        star.addEventListener('mouseout', function() {
          stars.forEach((s, index) => {
            if (index < selectedRating) {
              s.textContent = '★';
            } else {
              s.textContent = '☆';
            }
          });
        });
      });
// Form submission
testimonialForm.addEventListener('submit', function(e) {
  e.preventDefault();
  
  console.log('Form submitted - Starting validation');
  
  // Validate rating
  if (selectedRating === 0) {
    alert('Please select a rating');
    console.log('Validation failed - No rating selected');
    return;
  }

  // Get form values for debugging
  const name = document.getElementById('name').value;
  const position = document.getElementById('position').value;
  const testimonial = document.getElementById('testimonial').value;
  
  console.log('Form data:', {
    name: name,
    position: position,
    rating: selectedRating,
    testimonial: testimonial
  });

  // Disable submit button
  submitBtn.disabled = true;
  submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';

  // Create FormData object
  const formData = new FormData(testimonialForm);
  
  // Log FormData contents
  console.log('FormData contents:');
  for (let [key, value] of formData.entries()) {
    console.log(key + ': ' + value);
  }

  // Send AJAX request to submit_testimonials.php
  console.log('Sending fetch request to submit_testimonials.php');
  
  fetch('submit_testimonials.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    console.log('Response received, status:', response.status, response.statusText);
    if (!response.ok) {
      throw new Error('HTTP error! status: ' + response.status);
    }
    return response.json();
  })
  .then(data => {
    console.log('Response data:', data);
    if (data.success) {
      // Show success message
      successMessage.style.display = 'block';
      successMessage.innerHTML = `<i class="fas fa-check-circle"></i> ${data.message}`;
      console.log('Success - testimonial submitted');
      
      // Reset form
      testimonialForm.reset();
      stars.forEach(star => {
        star.textContent = '☆';
        star.classList.remove('active');
      });
      selectedRating = 0;
      
      // Refresh the page after 2 seconds to show the new testimonial
      setTimeout(function() {
        console.log('Refreshing page...');
        location.reload();
      }, 2000);
      
    } else {
      // Show error message
      console.error('Server error:', data.message);
      alert('Error: ' + data.message);
      submitBtn.disabled = false;
      submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Testimonial';
    }
  })
  .catch(error => {
    console.error('Fetch Error:', error);
    alert('Network error occurred. Please check console for details. Error: ' + error.message);
    submitBtn.disabled = false;
    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Testimonial';
  });
});
 



      function closeTestimonialModal() {
        testimonialModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        
        // Reset form
        testimonialForm.reset();
        stars.forEach(star => {
          star.textContent = '☆';
          star.classList.remove('active');
        });
        selectedRating = 0;
        successMessage.style.display = 'none';
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Testimonial';
      }
    });
  </script>
        
     

</body>
</html>
