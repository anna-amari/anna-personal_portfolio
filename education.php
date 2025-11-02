<?php
$pageTitle = "Education & Certifications";
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
  <!-- Hero Header -->

  <!-- Education Section -->
  <div class="section-container" id="education">
    <div class="section-header">
      <div class="section-icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <h2>Education</h2>
      <p>My academic background and achievements</p>
    </div>

    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-marker">
          <div class="school-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Camarines_Sur_Polytechnic_Colleges_Logo.png/250px-Camarines_Sur_Polytechnic_Colleges_Logo.png" alt="CSPC Logo">
          </div>
          <div class="marker-dot"></div>
          <div class="marker-line"></div>
        </div>
        <div class="timeline-content">
          <div class="edu-card">
            <div class="edu-text">
              <h3>
                <a href="https://cspc.edu.ph/" target="_blank">
                  Camarines Sur Polytechnic Colleges
                </a>
              </h3>
              <p class="edu-degree">Bachelor of Science in Information Technology</p>
              <p class="edu-honors">GWA: 1.69</p>
              <div class="edu-details">
                <span class="year">2021 - Present</span>
                <span class="status undergraduate">Undergraduate</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-marker">
          <div class="school-logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaXVnPyeRUXo6MFAX_A5ExqS2z25zE9spKWQ&s" alt="ACLC Logo">
          </div>
          <div class="marker-dot"></div>
          <div class="marker-line"></div>
        </div>
        <div class="timeline-content">
          <div class="edu-card">
            <div class="edu-text">
              <h3>
                <a href="https://www.facebook.com/ACLCCollegeIRIGA/" target="_blank">
                  ACLC College of Iriga
                </a>
              </h3>
              <p class="edu-degree">Senior High - ABM Strand</p>
              <p class="edu-honors">With High Honors</p>
              <div class="edu-details">
                <span class="year">2019 - 2021</span>
                <span class="status completed">Completed</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="timeline-item">
        <div class="timeline-marker">
          <div class="school-logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnHxYpzSOQJhcFuxG0Hr1joAjBiw5u9aYBNg&s" alt="UNEP Logo">
          </div>
          <div class="marker-dot"></div>
        </div>
        <div class="timeline-content">
          <div class="edu-card">
            <div class="edu-text">
              <h3>
                <a href="https://www.unep.edu.ph/" target="_blank">
                  University of Northeastern Philippines
                </a>
              </h3>
              <p class="edu-degree">Junior High School</p>
              <p class="edu-honors">With Honors [Grade 7 and 8]</p>
              <div class="edu-details">
                <span class="year">2015 - 2019</span>
                <span class="status completed">Completed</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Certifications Section -->
  <div class="section-container" id="certifications">
    <div class="section-header">
      <div class="section-icon">
        <i class="fas fa-certificate"></i>
      </div>
      <h2>Certifications</h2>
      <p>Professional certifications and achievements</p>
    </div>

    <div class="cert-grid">
      <div class="cert-card">
        <div class="cert-image">
          <img src="images/webinar/c1.jpg">
      </div>
</div>

      <div class="cert-card">
        <div class="cert-image">
          <img src="images/webinar/c2.png">
        </div>
      </div>

      <div class="cert-card">
        <div class="cert-image">
          <img src="images/webinar/c3.jpg">

        </div>
      </div>

      <div class="cert-card">
        <div class="cert-image">
          <img src="images/webinar/c4.jfif">
        </div>
      </div>
    </div>
  </div>

  <!-- Webinars Section -->
  <div class="section-container" id="webinars">
    <div class="section-header">
      <div class="section-icon">
        <i class="fas fa-video"></i>
      </div>
      <h2>Webinars & Workshops</h2>
      <p>Professional development and continuous learning</p>
    </div>

    <div class="webinar-grid">
      <div class="webinar-card">
        <div class="webinar-badge">Latest</div>
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
          <div class="webinar-stats">
            <span class="duration"><i class="far fa-clock"></i> 2 hours</span>
            <span class="attendees"><i class="fas fa-users"></i> 150 attendees</span>
          </div>
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
          <div class="webinar-stats">
            <span class="duration"><i class="far fa-clock"></i> 3 hours</span>
            <span class="attendees"><i class="fas fa-users"></i> 200 attendees</span>
          </div>
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
          <div class="webinar-stats">
            <span class="duration"><i class="far fa-clock"></i> 2.5 hours</span>
            <span class="attendees"><i class="fas fa-users"></i> 180 attendees</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.edu-cert-section {
  padding: 15px 3%;
  min-height: auto;
  color: #ffffff;
}

/* Hero Section */
.section-hero {
  text-align: center;
  padding: 30px 20px;
  margin-bottom: 20px;
}

.hero-title {
  font-size: 2.5rem;
  font-weight: 700;
  background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 0.5rem;
}

.hero-subtitle {
  font-size: 1.1rem;
  color: #94a3b8;
  font-weight: 300;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.5;
}

/* Section Containers */
.section-container {
  max-width: 1100px;
  margin: 0 auto 25px;
  padding: 25px;
  border-radius: 20px;
  border: 1px solid rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
}

.section-header {
  text-align: center;
  margin-bottom: 30px;
}

.section-icon {
  width: 70px;
  height: 70px;
  background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 15px;
  font-size: 1.8rem;
}

.section-header h2 {
  font-size: 2rem;
  color: #ffffff;
  margin-bottom: 8px;
  background: linear-gradient(135deg, #ffffff 0%, #e89cae 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.section-header p {
  color: #94a3b8;
  font-size: 1rem;
  margin: 0;
}

/* Timeline */
.timeline {
  position: relative;
  max-width: 900px;
  margin: 0 auto;
}

.timeline-item {
  display: flex;
  margin-bottom: 25px;
  position: relative;
  align-items: flex-start;
}

.timeline-marker {
  position: relative;
  width: 80px;
  margin-right: 20px;
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.school-logo {
  width: 60px;
  height: 60px;
  border-radius: 12px;
  overflow: hidden;
  border: 2px solid rgba(255, 255, 255, 0.1);
  background: rgba(255, 255, 255, 0.05);
  margin-bottom: 10px;
}

.school-logo img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.marker-dot {
  width: 16px;
  height: 16px;
  background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
  border-radius: 50%;
  border: 3px solid #1a1a1a;
  z-index: 2;
  position: relative;
}

.marker-line {
  position: absolute;
  top: 86px;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  height: calc(100% + 10px);
  background: linear-gradient(to bottom, #e89cae, #60a5fa);
  z-index: 1;
}

.timeline-item:last-child .marker-line {
  display: none;
}

.timeline-content {
  flex: 1;
  padding-bottom: 10px;
}

/* Education Cards */
.edu-card {
  border-radius: 16px;
  padding: 20px;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
  min-height: 140px;
}

.edu-card:hover {
  transform: translateY(-3px);
  border-color: rgba(232, 156, 174, 0.3);
  box-shadow: 0 8px 25px rgba(232, 156, 174, 0.15);
}

.edu-text h3 {
  margin: 0 0 10px 0;
  font-size: 1.3rem;
}

.edu-text h3 a {
  color: #ffffff;
  text-decoration: none;
  background: linear-gradient(135deg, #ffffff 0%, #e89cae 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  transition: all 0.3s ease;
}

.edu-text h3 a:hover {
  text-shadow: 0 0 20px rgba(232, 156, 174, 0.5);
}

.edu-degree {
  color: #e89cae;
  font-size: 1rem;
  font-weight: 600;
  margin: 6px 0;
}

.edu-honors {
  color: #60a5fa;
  font-weight: 500;
  margin: 6px 0;
  font-size: 0.95rem;
}

.edu-details {
  margin-top: 12px;
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.edu-details span {
  padding: 6px 12px;
  border-radius: 16px;
  font-size: 0.85rem;
  font-weight: 500;
}

.year {
  background: rgba(96, 165, 250, 0.15);
  color: #60a5fa;
  border: 1px solid rgba(96, 165, 250, 0.3);
}

.status {
  border: 1px solid;
}

.status.undergraduate {
  background: rgba(232, 156, 174, 0.15);
  color: #e89cae;
  border-color: rgba(232, 156, 174, 0.3);
}

.status.completed {
  background: rgba(34, 197, 94, 0.15);
  color: #22c55e;
  border-color: rgba(34, 197, 94, 0.3);
}

/* Certifications Grid */
.cert-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  max-width: 1000px;
  margin: 0 auto;
}

.cert-card {
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
  position: relative;
}

.cert-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 35px rgba(232, 156, 174, 0.25);
  border-color: rgba(232, 156, 174, 0.3);
}

.cert-image {
  position: relative;
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.cert-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.cert-card:hover .cert-image img {
  transform: scale(1.08);
}

.cert-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(232, 156, 174, 0.9) 0%, rgba(96, 165, 250, 0.9) 100%);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.cert-card:hover .cert-overlay {
  opacity: 1;
}

.cert-info {
  text-align: center;
  color: white;
  padding: 15px;
}

.cert-info h4 {
  margin: 0 0 8px 0;
  font-size: 1.1rem;
}

.cert-info p {
  margin: 0;
  font-size: 0.85rem;
  opacity: 0.9;
}

/* Webinar Grid */
.webinar-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 20px;
  max-width: 1000px;
  margin: 0 auto;
}

.webinar-card {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 14px;
  padding: 20px;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
  position: relative;
  backdrop-filter: blur(10px);
}

.webinar-card:hover {
  transform: translateY(-3px);
  border-color: rgba(232, 156, 174, 0.3);
  box-shadow: 0 8px 25px rgba(232, 156, 174, 0.15);
}

.webinar-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
  color: white;
  padding: 3px 10px;
  border-radius: 10px;
  font-size: 0.75rem;
  font-weight: 600;
}

.webinar-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 15px;
  gap: 12px;
}

.webinar-header h3 {
  margin: 0;
  color: #ffffff;
  font-size: 1.2rem;
  flex: 1;
}

.webinar-date {
  background: rgba(96, 165, 250, 0.15);
  color: #60a5fa;
  padding: 5px 12px;
  border-radius: 16px;
  font-size: 0.8rem;
  font-weight: 500;
  border: 1px solid rgba(96, 165, 250, 0.3);
  white-space: nowrap;
}

.webinar-content p {
  color: #cbd5e1;
  margin-bottom: 15px;
  line-height: 1.5;
  font-size: 0.95rem;
}

.webinar-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin-bottom: 15px;
}

.webinar-tags span {
  background: rgba(255, 255, 255, 0.08);
  color: #cbd5e1;
  padding: 4px 10px;
  border-radius: 12px;
  font-size: 0.75rem;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
}

.webinar-card:hover .webinar-tags span {
  background: rgba(232, 156, 174, 0.15);
  color: #e89cae;
  border-color: rgba(232, 156, 174, 0.3);
}

.webinar-footer {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 15px;
}

.webinar-stats {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.webinar-stats span {
  color: #94a3b8;
  font-size: 0.85rem;
  display: flex;
  align-items: center;
  gap: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-title {
    font-size: 2rem;
  }
  
  .section-container {
    padding: 20px;
    margin-bottom: 20px;
  }
  
  .timeline-item {
    flex-direction: column;
    margin-bottom: 20px;
  }
  
  .timeline-marker {
    margin-right: 0;
    margin-bottom: 15px;
    width: 100%;
    flex-direction: row;
    align-items: center;
    gap: 15px;
  }
  
  .school-logo {
    margin-bottom: 0;
    width: 50px;
    height: 50px;
  }
  
  .marker-dot {
    display: none;
  }
  
  .marker-line {
    display: none;
  }
  
  .webinar-header {
    flex-direction: column;
    gap: 8px;
  }
  
  .webinar-stats {
    flex-direction: column;
    gap: 8px;
    align-items: flex-start;
  }
  
  .cert-grid,
  .webinar-grid {
    grid-template-columns: 1fr;
    gap: 15px;
  }
}

@media (max-width: 480px) {
  .edu-cert-section {
    padding: 10px 2%;
  }
  
  .section-hero {
    padding: 20px 10px;
  }
  
  .hero-title {
    font-size: 1.8rem;
  }
  
  .section-header h2 {
    font-size: 1.6rem;
  }
  
  .section-icon {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
  }
}
</style>

<script>
// Smooth scrolling for navigation
document.addEventListener('DOMContentLoaded', function() {
  // Add any interactive functionality here if needed
  console.log('Education & Certifications page loaded');
});
</script>
</body>
</html>