<?php
$pageTitle = "Projects";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">
   </head>
<body>
    <?php include 'nav.php'; ?>
<section class="edu-cert-section">
  <div class="tab-header">
    <button class="tab-btn active" data-tab="education">EDUCATION</button>
    <button class="tab-btn" data-tab="certification">CERTIFICATION</button>
    <button class="tab-btn" data-tab="webinar">WEBINARS</button>
  </div>

  <!-- EDUCATION TAB -->
  <div id="education" class="tab-content active">
    <div class="edu-grid">
      <div class="edu-card">
        <div class="edu-image">
          <img src="images/college.jfif" alt="College">
        </div>
        <div class="edu-text">
          <h3>
            <b>
              <a href="https://cspc.edu.ph/" target="_blank"
                style="color: inherit; text-decoration: underline; text-decoration-thickness: 2px; text-underline-offset: 4px;">
                Camarines Sur Polytechnic Colleges
              </a>
            </b>
          </h3>
          <p><b><i>Bachelor of Science in Information Technology</i></b></p>
          <p><b>GWA: 1.69</b></p>
          <div class="edu-details">
            <span class="year">2021 - Present</span>
            <span class="status">Undergraduate</span>
          </div>
        </div>
      </div>

      <div class="edu-card">
        <div class="edu-image">
          <img src="images/shs.png" alt="Senior High Graduation">
        </div>
        <div class="edu-text">
          <h3>
            <b>
              <a href="https://www.facebook.com/ACLCCollegeIRIGA/" target="_blank"
                style="color: inherit; text-decoration: underline; text-decoration-thickness: 2px; text-underline-offset: 4px;">
                ACLC College of Iriga
              </a>
            </b>
          </h3>
          <p><b><i>Senior High - ABM Strand</i></b></p>
          <p><b>With High Honors</b></p>
          <div class="edu-details">
            <span class="year">2019 - 2021</span>
            <span class="status">Completed</span>
          </div>
        </div>
      </div>

      <div class="edu-card">
        <div class="edu-image">
          <img src="images/jhs.png" alt="Junior High Graduation">
        </div>
        <div class="edu-text">
          <h3>
            <b>
              <a href="https://www.unep.edu.ph/" target="_blank"
                style="color: inherit; text-decoration: underline; text-decoration-thickness: 2px; text-underline-offset: 4px;">
                University of Northeastern Philippines
              </a>
            </b>
          </h3>
          <p><b><i>Junior High School</i></b></p>
          <p><b>With Honors [Grade 7 and 8]</b></p>
          <div class="edu-details">
            <span class="year">2015 - 2019</span>
            <span class="status">Completed</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CERTIFICATION TAB -->
  <div id="certification" class="tab-content">
    <div class="cert-gallery">
      <div class="cert-item">
        <img src="images/webinar/c1.jpg" alt="Certification 1">
        <div class="cert-overlay">
          <span>Web Development Fundamentals</span>
        </div>
      </div>
      <div class="cert-item">
        <img src="images/webinar/c2.png" alt="Certification 2">
        <div class="cert-overlay">
          <span>JavaScript Mastery</span>
        </div>
      </div>
      <div class="cert-item">
        <img src="images/webinar/c3.jpg" alt="Certification 3">
        <div class="cert-overlay">
          <span>UI/UX Design Principles</span>
        </div>
      </div>
      <div class="cert-item">
        <img src="images/webinar/c4.jfif" alt="Certification 4">
        <div class="cert-overlay">
          <span>Database Management</span>
        </div>
      </div>
    </div>
  </div>

  <!-- WEBINAR TAB -->
  <div id="webinar" class="tab-content">
    <div class="webinar-grid">
      <div class="webinar-card">
        <div class="webinar-header">
          <h3>Advanced Web Development</h3>
          <span class="webinar-date">March 15, 2024</span>
        </div>
        <div class="webinar-content">
          <p>Deep dive into modern web development practices including React, Node.js, and database integration.</p>
          <div class="webinar-tags">
            <span>Web Development</span>
            <span>JavaScript</span>
            <span>React</span>
          </div>
        </div>
        <div class="webinar-footer">
          <span class="webinar-duration">2 hours</span>
          <span class="webinar-attendees">150 attendees</span>
        </div>
      </div>

      <div class="webinar-card">
        <div class="webinar-header">
          <h3>UI/UX Design Workshop</h3>
          <span class="webinar-date">February 28, 2024</span>
        </div>
        <div class="webinar-content">
          <p>Learn the fundamentals of user interface and experience design with practical examples and case studies.</p>
          <div class="webinar-tags">
            <span>Design</span>
            <span>UI/UX</span>
            <span>Figma</span>
          </div>
        </div>
        <div class="webinar-footer">
          <span class="webinar-duration">3 hours</span>
          <span class="webinar-attendees">200 attendees</span>
        </div>
      </div>

      <div class="webinar-card">
        <div class="webinar-header">
          <h3>Cloud Computing Basics</h3>
          <span class="webinar-date">January 20, 2024</span>
        </div>
        <div class="webinar-content">
          <p>Introduction to cloud services, deployment models, and hands-on experience with AWS and Azure.</p>
          <div class="webinar-tags">
            <span>Cloud</span>
            <span>AWS</span>
            <span>Azure</span>
          </div>
        </div>
        <div class="webinar-footer">
          <span class="webinar-duration">2.5 hours</span>
          <span class="webinar-attendees">180 attendees</span>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.edu-cert-section {
  padding: 60px 5%;
  background-color: #000000;
  color: #ffffff;
  min-height: 100vh;
}

/* Tab Header */
.tab-header {
  display: flex;
  justify-content: center;
  margin-bottom: 40px;
  border-bottom: 2px solid #333333;
  padding-bottom: 10px;
}

.tab-btn {
  background: transparent;
  color: #cccccc;
  border: none;
  padding: 12px 30px;
  margin: 0 10px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  border-radius: 8px 8px 0 0;
}

.tab-btn.active {
  color: #ffffff;
  background: #333333;
  border-bottom: 3px solid #ffffff;
}

.tab-btn:hover:not(.active) {
  color: #ffffff;
  background: #222222;
}

/* Tab Content */
.tab-content {
  display: none;
}

.tab-content.active {
  display: block;
}

/* Education Grid */
.edu-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
}

.edu-card {
  background: #111111;
  border-radius: 15px;
  padding: 25px;
  display: flex;
  gap: 20px;
  box-shadow: 0 4px 15px rgba(255,255,255,0.05);
  border: 1px solid #333333;
  transition: all 0.3s ease;
}

.edu-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(255,255,255,0.1);
  border-color: #555555;
}

.edu-image {
  flex-shrink: 0;
  width: 100px;
  height: 100px;
  border-radius: 10px;
  overflow: hidden;
  border: 2px solid #333333;
}

.edu-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.edu-text {
  flex: 1;
}

.edu-text h3 {
  margin: 0 0 10px 0;
  font-size: 1.3rem;
  color: #ffffff;
}

.edu-text h3 a {
  color: #ffffff !important;
  text-decoration: underline !important;
  text-decoration-thickness: 2px !important;
  text-underline-offset: 4px !important;
  transition: color 0.3s ease;
}

.edu-text h3 a:hover {
  color: #cccccc !important;
}

.edu-text p {
  margin: 5px 0;
  color: #cccccc;
}

.edu-details {
  margin-top: 15px;
  display: flex;
  gap: 15px;
  flex-wrap: wrap;
}

.edu-details span {
  background: #333333;
  color: #ffffff;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
}

/* Certification Gallery */
.cert-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 25px;
  max-width: 1200px;
  margin: 0 auto;
}

.cert-item {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(255,255,255,0.05);
  border: 1px solid #333333;
  transition: all 0.3s ease;
}

.cert-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(255,255,255,0.1);
}

.cert-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  display: block;
}

.cert-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.8);
  color: #ffffff;
  padding: 15px;
  transform: translateY(100%);
  transition: transform 0.3s ease;
}

.cert-item:hover .cert-overlay {
  transform: translateY(0);
}

/* Webinar Grid */
.webinar-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 25px;
  max-width: 1200px;
  margin: 0 auto;
}

.webinar-card {
  background: #111111;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 4px 15px rgba(255,255,255,0.05);
  border: 1px solid #333333;
  transition: all 0.3s ease;
}

.webinar-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(255,255,255,0.1);
  border-color: #555555;
}

.webinar-header {
  display: flex;
  justify-content: between;
  align-items: flex-start;
  margin-bottom: 15px;
  gap: 15px;
}

.webinar-header h3 {
  margin: 0;
  color: #ffffff;
  font-size: 1.2rem;
  flex: 1;
}

.webinar-date {
  background: #333333;
  color: #ffffff;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 500;
  white-space: nowrap;
}

.webinar-content p {
  color: #cccccc;
  margin-bottom: 15px;
  line-height: 1.6;
}

.webinar-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 15px;
}

.webinar-tags span {
  background: #222222;
  color: #cccccc;
  padding: 4px 10px;
  border-radius: 15px;
  font-size: 0.8rem;
  border: 1px solid #333333;
}

.webinar-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 15px;
  border-top: 1px solid #333333;
}

.webinar-footer span {
  color: #999999;
  font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
  .tab-header {
    flex-direction: column;
    align-items: center;
    gap: 10px;
  }
  
  .tab-btn {
    width: 200px;
    margin: 5px 0;
  }
  
  .edu-grid,
  .webinar-grid {
    grid-template-columns: 1fr;
  }
  
  .cert-gallery {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  
  .edu-card {
    flex-direction: column;
    text-align: center;
  }
  
  .edu-image {
    align-self: center;
  }
  
  .webinar-header {
    flex-direction: column;
    gap: 10px;
  }
}

@media (max-width: 480px) {
  .edu-cert-section {
    padding: 40px 5%;
  }
  
  .cert-gallery {
    grid-template-columns: 1fr;
  }
  
  .edu-grid,
  .webinar-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<script>
// Tab functionality
document.addEventListener('DOMContentLoaded', function() {
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');
  
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Remove active class from all buttons and contents
      tabBtns.forEach(b => b.classList.remove('active'));
      tabContents.forEach(c => c.classList.remove('active'));
      
      // Add active class to clicked button
      btn.classList.add('active');
      
      // Show corresponding content
      const tabId = btn.getAttribute('data-tab');
      document.getElementById(tabId).classList.add('active');
    });
  });
});
</script>
</body>
  
</html>
