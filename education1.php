<?php
$pageTitle = "Education & Certifications";
include 'db.php';
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
  <!-- Education Section with Two Columns -->
  <div class="section-container" id="education">
    <div class="section-header">
      <div class="section-icon">
        <i class="fas fa-graduation-cap"></i>
      </div>
      <h2>Education Journey</h2>
      <p>My academic background and technical coursework</p>
    </div>

    <div class="education-layout">
      <!-- Left Column - Academic Achievements -->
      <div class="academic-column">
        <h3 class="column-title">Academic Achievements</h3>
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
                  <p class="edu-description">Currently pursuing my passion for technology and software development, focusing on web technologies, cybersecurity, and database management.</p>
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
                  <p class="edu-description">Developed strong foundation in business management while discovering my passion for technology and problem-solving.</p>
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
                  <p class="edu-description">Built academic foundation and developed interest in mathematics and logical thinking that paved the way for my IT career.</p>
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

      <!-- Right Column - Courses -->
      <div class="courses-column">
        <h3 class="column-title">Technical Coursework</h3>
        <div class="courses-grid">
          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-code"></i>
            </div>
            <div class="course-content">
              <h4>Introduction to Computing</h4>
              <p>Fundamentals of computer systems and basic programming concepts.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-laptop-code"></i>
            </div>
            <div class="course-content">
              <h4>Computer Programming 1 & 2</h4>
              <p>Object-oriented programming principles and advanced coding techniques.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-network-wired"></i>
            </div>
            <div class="course-content">
              <h4>Networking 1 & 2</h4>
              <p>Network infrastructure, protocols, and security fundamentals.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-database"></i>
            </div>
            <div class="course-content">
              <h4>Information Management 1</h4>
              <p>Database design, SQL queries, and data management principles.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <div class="course-content">
              <h4>Cybersecurity</h4>
              <p>Security protocols, threat analysis, and protection mechanisms.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-globe"></i>
            </div>
            <div class="course-content">
              <h4>Web Systems and Technology 1</h4>
              <p>Front-end and back-end web development with modern frameworks.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <div class="course-content">
              <h4>Mobile Technology 1</h4>
              <p>Mobile app development and responsive design principles.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-project-diagram"></i>
            </div>
            <div class="course-content">
              <h4>IT Project Management</h4>
              <p>Agile methodologies, project planning, and team collaboration.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-calculator"></i>
            </div>
            <div class="course-content">
              <h4>Discrete Mathematics</h4>
              <p>Mathematical structures and logical reasoning for computing.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-chart-bar"></i>
            </div>
            <div class="course-content">
              <h4>Probability and Statistics</h4>
              <p>Data analysis, probability theory, and statistical methods.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="course-content">
              <h4>Human Computer Interaction</h4>
              <p>UI/UX design principles and user-centered design approaches.</p>
            </div>
          </div>

          <div class="course-card">
            <div class="course-icon">
              <i class="fas fa-cogs"></i>
            </div>
            <div class="course-content">
              <h4>Integrative Programming</h4>
              <p>System integration and enterprise application development.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- NEW: Affiliations Section -->
  <div class="section-container" id="affiliations">
    <div class="section-header">
      <div class="section-icon">
        <i class="fas fa-users"></i>
      </div>
      <h2>My Affiliations</h2>
      <p>Organizations and groups I'm involved with</p>
    </div>

    <div class="affiliations-grid">
      <div class="affiliation-card">
        <div class="affiliation-image">
          <img src="images/rotc.jfif" alt="ROTC Navy Reservist" onerror="this.src='https://via.placeholder.com/400x300/1a1a1a/ffffff?text=ROTC+Navy+Reservist'">
        </div>
        <div class="affiliation-content">
          <h3>ROTC Navy Reservist</h3>
          <p>Active participant in the Reserve Officers' Training Corps Navy program, developing leadership skills, discipline, and commitment to national service through military training and civic activities.</p>
          <div class="affiliation-badge">
            <i class="fas fa-anchor"></i>
            <span>Military Training & Leadership</span>
          </div>
        </div>
      </div>

      <div class="affiliation-card">
        <div class="affiliation-image">
          <img src="images/ccs.jfif" alt="CCS Student">
        </div>
        <div class="affiliation-content">
          <h3>CCS Student</h3>
          <p>Active student member of the College of Computer Studies, participating in tech events, and collaborative projects with fellow IT enthusiasts student.</p>
          <div class="affiliation-badge">
            <i class="fas fa-laptop-code"></i>
            <span>CCS Community</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-container" id="certifications">
    <div class="section-header">
        <div class="section-icon">
            <i class="fas fa-certificate"></i>
        </div>
        <h2>Certifications of Webinars</h2>
        <p>Professional certifications and achievements</p>
    </div>

    <div class="cert-grid">
        <?php
        $certQuery = "SELECT * FROM certifications WHERE is_active = 1 ORDER BY display_order ASC";
        $certResult = mysqli_query($conn, $certQuery);
        
        if (mysqli_num_rows($certResult) > 0) {
            while ($cert = mysqli_fetch_assoc($certResult)) {
                echo '
                <div class="cert-card">
                    <div class="cert-image">
                        <img src="' . htmlspecialchars($cert['image_url']) . '" alt="' . htmlspecialchars($cert['title']) . '">
                        <div class="cert-overlay">
                            <div class="cert-info">
                                <h4>' . htmlspecialchars($cert['title']) . '</h4>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="no-data">No certifications available yet.</p>';
        }
        
        // Close connection
        mysqli_close($conn);
        ?>
    </div>
</div>

  <!-- Webinars Section -->
  <div class="section-container" id="webinars">
    <div class="section-header">
      <div class="section-icon">
        <i class="fas fa-video"></i>
      </div>
      <h2>MY School I.T Affiliation</h2>
      <p>in my whole academic journey</p>
    </div>

    <div class="webinar-grid">
      <div class="webinar-card">
        <div class="webinar-badge">Latest</div>
        <div class="webinar-header">
          <h3>R𝗼𝗮𝗱 𝘁𝗼 𝗕𝘆𝘁𝗲 𝟮𝟬𝟮𝟱: 𝗖𝗮𝗺𝗽𝘂𝘀 𝗖𝗮𝗿𝗮𝘃𝗮𝗻</h3>
          <span class="webinar-date">October 11, 2025</span>
        </div>
        <div class="webinar-content">
          <p>AI fundamentals & real-world uses Management and Automation Tools like n8n, Notion & Linear
            Student Developer Pack such GitHub tools, free domain credits & more Emerging Tech in AI and Latest AI trends & future directions</p>
          <div class="webinar-tags">
            <span>AI</span>
            <span>Github Student Developer Pack</span>
            <span>Emerging Technologies</span>
          </div>
        </div>
        <div class="webinar-footer">
          <div class="webinar-stats">
            <span class="duration"><i class="far fa-clock"></i> 1pm - 5pm</span>
            <span class="attendees"><i class="fas fa-users"></i> Interested CCS Students</span>
          </div>
        </div>
      </div>

      <div class="webinar-card">
        <div class="webinar-header">
          <h3>1st, 2nd and 3rd Year Halubilo</h3>
          <span class="webinar-date">First Part of School Calendar</span>
        </div>
        <div class="webinar-content">
          <p>CCS Team Building. Different program to form a group</p>
          <div class="webinar-tags">
            <span>Team Building</span>
            <span>Games</span>
            <span>Entertainment</span>
          </div>
        </div>
        <div class="webinar-footer">
          <div class="webinar-stats">
            <span class="duration"><i class="far fa-clock"></i> Whole Day</span>
            <span class="attendees"><i class="fas fa-users"></i> Whole CCS Department</span>
          </div>
        </div>
      </div>

      <div class="webinar-card">
        <div class="webinar-header">
          <h3>BYCIT [12TH AND 13TH]</h3>
          <span class="webinar-date">2023 & 2025</span>
        </div>
        <div class="webinar-content">
          <p>Different speaker across fields come to discuss about their experiences of the chose fields.</p>
          <div class="webinar-tags">
            <span>Discussion</span>
            <span>Experience</span>
            <span>Speakers</span>
          </div>
        </div>
        <div class="webinar-footer">
          <div class="webinar-stats">
            <span class="duration"><i class="far fa-clock"></i> 2 DAYS</span>
            <span class="attendees"><i class="fas fa-users"></i> CCS Department</span>
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

/* Two Column Layout */
.education-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
}

.column-title {
  font-size: 1.5rem;
  color: #e89cae;
  margin-bottom: 20px;
  text-align: center;
  border-bottom: 2px solid rgba(232, 156, 174, 0.3);
  padding-bottom: 10px;
}

/* Academic Column (Left) */
.academic-column {
  background: rgba(255, 255, 255, 0.03);
  border-radius: 15px;
  padding: 20px;
  border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Courses Column (Right) */
.courses-column {
  background: rgba(255, 255, 255, 0.03);
  border-radius: 15px;
  padding: 20px;
  border: 1px solid rgba(255, 255, 255, 0.1);
  height: fit-content;
}

.courses-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 15px;
  padding-right: 10px;
}

/* NEW: Affiliations Grid */
.affiliations-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  max-width: 900px;
  margin: 0 auto;
}

.affiliation-card {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.affiliation-card:hover {
  transform: translateY(-5px);
  border-color: rgba(232, 156, 174, 0.3);
  box-shadow: 0 10px 30px rgba(232, 156, 174, 0.2);
}

.affiliation-image {
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.affiliation-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.affiliation-card:hover .affiliation-image img {
  transform: scale(1.05);
}

.affiliation-content {
  padding: 25px;
  text-align: center;
}

.affiliation-content h3 {
  color: #ffffff;
  font-size: 1.4rem;
  margin-bottom: 12px;
  background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.affiliation-content p {
  color: #cbd5e1;
  line-height: 1.6;
  margin-bottom: 20px;
  font-size: 0.95rem;
}

.affiliation-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(232, 156, 174, 0.15);
  color: #e89cae;
  padding: 8px 16px;
  border-radius: 20px;
  border: 1px solid rgba(232, 156, 174, 0.3);
  font-size: 0.85rem;
  font-weight: 500;
}

.affiliation-badge i {
  font-size: 1rem;
}

/* Course Cards */
.course-card {
  display: flex;
  align-items: flex-start;
  gap: 15px;
  padding: 15px;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 12px;
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: all 0.3s ease;
  cursor: pointer;
}

.course-card:hover {
  transform: translateX(5px);
  border-color: rgba(232, 156, 174, 0.4);
  background: rgba(232, 156, 174, 0.1);
}

.course-icon {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 1.1rem;
}

.course-content {
  flex: 1;
}

.course-content h4 {
  margin: 0 0 8px 0;
  color: #ffffff;
  font-size: 1rem;
}

.course-content p {
  margin: 0;
  color: #94a3b8;
  font-size: 0.85rem;
  line-height: 1.4;
}

/* Updated Education Card Styles */
.edu-description {
  color: #cbd5e1;
  font-size: 0.9rem;
  line-height: 1.5;
  margin: 10px 0;
  font-style: italic;
}

/* Rest of your existing styles remain the same */
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

.section-container {
  max-width: 1200px;
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

.timeline {
  position: relative;
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
/* Certifications Grid Styles */
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
    cursor: pointer;
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
    margin: 0;
    font-size: 1.1rem;
}

.no-data {
    text-align: center;
    color: #94a3b8;
    font-style: italic;
    grid-column: 1 / -1;
    padding: 40px;
}
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
@media (max-width: 968px) {
  .education-layout {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .affiliations-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
}

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
  
  .course-card {
    flex-direction: column;
    text-align: center;
    gap: 10px;
  }
  
  .course-icon {
    align-self: center;
  }
  
  .affiliations-grid {
    grid-template-columns: 1fr;
  }
}

html, body {
    overflow: auto;
}

html::-webkit-scrollbar,
body::-webkit-scrollbar {
    display: none;
}

html, body {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>

<script>
// Smooth scrolling for navigation
document.addEventListener('DOMContentLoaded', function() {
  console.log('Education & Certifications page loaded');
  
  // Add hover effects for course cards
  const courseCards = document.querySelectorAll('.course-card');
  courseCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateX(5px)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateX(0)';
    });
  });
});
</script>
</body>
</html>