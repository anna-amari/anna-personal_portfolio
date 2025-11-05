<?php
$pageTitle = "Projects | Anna Mari Portfolio";
include 'db.php'; 
include 'nav.php';

// Fetch projects with their images
$projectsQuery = "
    SELECT p.*, 
           GROUP_CONCAT(pi.image_path ORDER BY pi.display_order SEPARATOR '||') as images,
           GROUP_CONCAT(pi.alt_text ORDER BY pi.display_order SEPARATOR '||') as alt_texts
    FROM projects p
    LEFT JOIN project_images pi ON p.id = pi.project_id
    WHERE p.status = 'active'
    GROUP BY p.id
    ORDER BY p.created_at DESC
";

$projectsResult = $conn->query($projectsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #0f0f0f;
      color: #ffffff;
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Header Section */
    .page-header {
      text-align: center;
      padding: 80px 20px 40px;
      background: linear-gradient(180deg, rgba(15,15,15,0.9) 0%, transparent 100%);
      position: relative;
    }

    .page-title {
      font-size: 3.5rem;
      font-weight: 700;
      background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1rem;
      animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
      from { text-shadow: 0 0 20px rgba(232, 156, 174, 0.3); }
      to { text-shadow: 0 0 30px rgba(232, 156, 174, 0.6), 0 0 40px rgba(167, 139, 250, 0.4); }
    }

    .page-subtitle {
      font-size: 1.2rem;
      color: #94a3b8;
      font-weight: 300;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Projects Grid */
    .projects-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 40px 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
      gap: 30px;
      position: relative;
    }

    /* Project Card */
    .project-card {
      background: rgba(30, 30, 30, 0.8);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 24px;
      padding: 30px;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      overflow: hidden;
      box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .project-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(232, 156, 174, 0.1), transparent);
      transition: left 0.6s ease;
    }

    .project-card:hover::before {
      left: 100%;
    }

    .project-card:hover {
      transform: translateY(-12px) scale(1.02);
      border-color: rgba(232, 156, 174, 0.3);
      box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(232, 156, 174, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    /* Project Header */
    .project-header {
      margin-bottom: 20px;
      position: relative;
    }

    .project-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 8px;
      line-height: 1.3;
      background: linear-gradient(135deg, #ffffff 0%, #e89cae 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .project-subtitle {
      font-size: 1.1rem;
      color: #e89cae;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .project-role {
      font-size: 0.95rem;
      color: #94a3b8;
      font-weight: 400;
    }

    /* Project Description */
    .project-description {
      color: #cbd5e1;
      line-height: 1.7;
      margin-bottom: 25px;
      font-weight: 300;
      background: rgba(255, 255, 255, 0.02);
      padding: 15px;
      border-radius: 12px;
      border-left: 3px solid #e89cae;
    }

    /* Image Gallery */
    .project-gallery {
      margin: 25px 0;
    }

    .gallery-single img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: 16px;
      transition: all 0.3s ease;
      border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .gallery-single img:hover {
      transform: scale(1.03);
      border-color: #e89cae;
      box-shadow: 0 10px 30px rgba(232, 156, 174, 0.3);
    }

    .gallery-grid {
      display: grid;
      gap: 12px;
    }

    .gallery-2 {
      grid-template-columns: 1fr 1fr;
    }

    .gallery-3 {
      grid-template-columns: repeat(3, 1fr);
    }

    .gallery-grid img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 12px;
      transition: all 0.3s ease;
      border: 2px solid rgba(255, 255, 255, 0.1);
    }

    .gallery-grid img:hover {
      transform: scale(1.05);
      border-color: #e89cae;
      box-shadow: 0 8px 25px rgba(232, 156, 174, 0.3);
    }

    /* Tech Stack Tags */
    .tech-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 20px 0;
    }

    .tech-tag {
      background: linear-gradient(135deg, rgba(232, 156, 174, 0.15), rgba(167, 139, 250, 0.1));
      color: #e89cae;
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
      border: 1px solid rgba(232, 156, 174, 0.2);
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .tech-tag:hover {
      background: linear-gradient(135deg, rgba(232, 156, 174, 0.25), rgba(167, 139, 250, 0.2));
      transform: translateY(-2px);
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 80px 20px;
      grid-column: 1 / -1;
    }

    .empty-icon {
      font-size: 4rem;
      color: #e89cae;
      margin-bottom: 20px;
      opacity: 0.7;
    }

    .empty-title {
      font-size: 1.5rem;
      color: #ffffff;
      margin-bottom: 10px;
    }

    .empty-text {
      color: #94a3b8;
      margin-bottom: 30px;
    }

    /* Footer */
    .modern-footer {
      background: linear-gradient(180deg, transparent 0%, rgba(15, 15, 15, 0.9) 100%);
      padding: 60px 20px 40px;
      margin-top: 80px;
      text-align: center;
      position: relative;
    }

    .footer-title {
      font-size: 2.5rem;
      font-weight: 700;
      background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1rem;
    }

    .footer-divider {
      width: 80px;
      height: 3px;
      background: linear-gradient(90deg, #e89cae, #60a5fa);
      margin: 0 auto 30px;
      border-radius: 2px;
    }

    .footer-description {
      color: #cbd5e1;
      max-width: 600px;
      margin: 0 auto 40px;
      line-height: 1.6;
    }

  .logo-grid {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 25px;
}

.logo-item {
  width: 150px;
  height: 150px;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 50%;
  padding: 15px;
  transition: all 0.4s ease;
  border: 2px solid transparent;
  overflow: hidden; /* Add this to contain the image */
}

.logo-item:hover {
  transform: scale(1.15) rotate(5deg);
  background: rgba(255, 255, 255, 0.1);
  border-color: #e89cae;
  box-shadow: 0 10px 30px rgba(232, 156, 174, 0.3);
}

.logo-item img {
  width: 100%; /* Change from 150% to 100% */
  height: 100%; /* Change from 150% to 100% */
  object-fit: contain;
  border-radius: 50%;
}

    /* Responsive Design */
    @media (max-width: 768px) {
      .projects-container {
        grid-template-columns: 1fr;
        padding: 20px 15px;
      }
      
      .page-title {
        font-size: 2.5rem;
      }
      
      .project-card {
        padding: 20px;
      }
      
      .gallery-3 {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 480px) {
      .gallery-2,
      .gallery-3 {
        grid-template-columns: 1fr;
      }
      
      .logo-grid {
        gap: 15px;
      }
      
      .logo-item {
        width: 80px;
        height: 80px;
      }
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
  </style>
</head>
<body>
  <!-- Header Section -->
  <header class="page-header">
   <h1 class="page-title" style="
    font-size: 3.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    animation: glow 2s ease-in-out infinite alternate;
    font-family: 'Pixelify Sans', cursive;
    text-align: center;
">Project Portfolio</h1>
    <p class="page-subtitle">Showcasing innovative solutions and practical implementations from academic projects and personal explorations</p>
  </header>

  <!-- Projects Grid -->
  <div class="projects-container">
    <?php if ($projectsResult && $projectsResult->num_rows > 0): ?>
      <?php while($project = $projectsResult->fetch_assoc()): ?>
        <div class="project-card">
          <div class="project-header">
            <h2 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h2>
            <div class="project-subtitle"><?php echo htmlspecialchars($project['subtitle']); ?></div>
            <div class="project-role">Role: <?php echo htmlspecialchars($project['role']); ?></div>
          </div>

          <div class="project-description">
            <?php echo htmlspecialchars($project['description']); ?>
          </div>

          <?php 
          // Handle images
          $images = explode('||', $project['images']);
          $altTexts = explode('||', $project['alt_texts']);
          $imageCount = count($images);
          
          if ($imageCount > 0 && !empty($images[0])): 
            if ($imageCount == 1): ?>
              <div class="project-gallery gallery-single">
                <img src="<?php echo htmlspecialchars($images[0]); ?>" 
                     alt="<?php echo htmlspecialchars($altTexts[0] ?? $project['title']); ?>">
              </div>
            <?php elseif ($imageCount == 2): ?>
              <div class="project-gallery gallery-grid gallery-2">
                <?php for($i = 0; $i < 2; $i++): ?>
                  <img src="<?php echo htmlspecialchars($images[$i]); ?>" 
                       alt="<?php echo htmlspecialchars($altTexts[$i] ?? $project['title'] . ' ' . ($i+1)); ?>">
                <?php endfor; ?>
              </div>
            <?php else: ?>
              <div class="project-gallery gallery-grid gallery-<?php echo min($imageCount, 3); ?>">
                <?php for($i = 0; $i < min($imageCount, 6); $i++): ?>
                  <img src="<?php echo htmlspecialchars($images[$i]); ?>" 
                       alt="<?php echo htmlspecialchars($altTexts[$i] ?? $project['title'] . ' ' . ($i+1)); ?>">
                <?php endfor; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="empty-state">
        <div class="empty-icon">
          <i class="fas fa-folder-open"></i>
        </div>
        <h3 class="empty-title">No Projects Yet</h3>
        <p class="empty-text">Stay tuned for amazing projects coming soon!</p>
      </div>
    <?php endif; ?>
  </div>

  <!-- Footer -->
  <footer class="modern-footer">
    <h1 class="footer-title" style="
    font-size: 3.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    animation: glow 2s ease-in-out infinite alternate;
    font-family: 'Pixelify Sans', cursive;
    text-align: center;
">CREATIVE DESIGN</h1>
    <div class="footer-divider"></div>
    <p class="footer-description">
      Exploring visual identity through custom logo designs and brand concepts crafted with creativity and attention to detail.
    </p>
    
    <div class="logo-grid">
      <div class="logo-item">
        <img src="images/Logo/2.jpg" alt="Logo Design 1">
      </div>
      <div class="logo-item">
        <img src="images/Logo/3.jpg" alt="Logo Design 2">
      </div>
      <div class="logo-item">
        <img src="images/Logo/4.jpg" alt="Logo Design 3">
      </div>
      <div class="logo-item">
        <img src="images/Logo/5.jpg" alt="Logo Design 4">
      </div>
    </div>
  </footer>

</body>
</html>