<?php
$pageTitle = "Projects";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    color: #fff;
    line-height: 1.6;
    overflow-x: hidden;
    font-family: 'Montserrat', sans-serif;
  }

  /* Hero Section */
  .hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 100vh;
    padding: 0 80px;
    position: relative;
  }

  .hero-content {
    flex: 1;
    max-width: 600px;
    padding-right: 40px;
  }

  .hero-content h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
  }

  .hero-content p {
    font-size: 1.3rem;
    color: #cbd5e1;
    margin-bottom: 30px;
    font-weight: 300;
    line-height: 1.6;
  }

  .btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    color: white;
    padding: 14px 32px;
    text-decoration: none;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1rem;
  }

  .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(232, 156, 174, 0.3);
  }

  .hero-image {
    flex: 1;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .hero-image img {
    width: 85%;
    max-width: 500px;
    height: 400px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
  }

  .hero-image img:hover {
    transform: scale(1.02);
  }

  /* Visited Places Section */
  .carousel-section {
    padding: 100px 40px;
    background: #0d0d0d;
  }

  .section-header {
    text-align: center;
    margin-bottom: 60px;
  }

  .section-header h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .section-header p {
    color: #94a3b8;
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
  }

  .carousel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1300px;
    margin: 0 auto;
  }

  .carousel-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
  }

  .carousel-card:hover {
    transform: translateY(-10px);
    border-color: rgba(232, 156, 174, 0.3);
    box-shadow: 0 15px 35px rgba(232, 156, 174, 0.2);
  }

  .carousel-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .carousel-card:hover img {
    transform: scale(1.05);
  }

  .carousel-card h3 {
    padding: 20px;
    font-size: 1.3rem;
    font-weight: 600;
    color: #ffffff;
    text-align: center;
    margin: 0;
  }

  /* Dream Destination Section */
  .dream-destination {
    background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
    padding: 100px 40px;
    text-align: center;
    position: relative;
  }

  .dream-destination::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, #e89cae, transparent);
  }

  .section-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .dream-destination p {
    font-family: 'Dancing Script', cursive;
    font-size: 1.5rem;
    color: #cbd5e1;
    margin-bottom: 50px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
  }

  .destination-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    max-width: 1200px;
    margin: 0 auto;
  }

  .destination-card {
    overflow: hidden;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }

  .destination-card:hover {
    transform: translateY(-5px);
    border-color: rgba(232, 156, 174, 0.3);
    box-shadow: 0 12px 30px rgba(232, 156, 174, 0.2);
  }

  .destination-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
  }

  .destination-card:hover img {
    transform: scale(1.1);
  }

  /* Social Icons */
  .social-section {
    background: #0d0d0d;
    padding: 60px 20px;
    text-align: center;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
  }

  .social-icons {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 25px;
  }

  .social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: #e89cae;
    font-size: 1.5rem;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .social-icons a:hover {
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(232, 156, 174, 0.3);
  }

  /* Scrollbar */
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

  /* Responsive Design */
  @media (max-width: 1024px) {
    .hero {
      padding: 0 40px;
    }
    
    .hero-content h1 {
      font-size: 3rem;
    }
    
    .carousel-grid {
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    }
  }

  @media (max-width: 768px) {
    .hero {
      flex-direction: column;
      text-align: center;
      padding: 80px 20px;
      gap: 40px;
    }
    
    .hero-content {
      padding-right: 0;
      max-width: 100%;
    }
    
    .hero-content h1 {
      font-size: 2.5rem;
    }
    
    .hero-image img {
      width: 100%;
      max-width: 400px;
    }
    
    .carousel-section,
    .dream-destination {
      padding: 60px 20px;
    }
    
    .section-header h2,
    .section-title {
      font-size: 2rem;
    }
    
    .destination-grid {
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
  }

  @media (max-width: 480px) {
    .hero-content h1 {
      font-size: 2rem;
    }
    
    .hero-content p {
      font-size: 1.1rem;
    }
    
    .carousel-grid {
      grid-template-columns: 1fr;
    }
    
    .social-icons {
      gap: 15px;
    }
    
    .social-icons a {
      width: 50px;
      height: 50px;
      font-size: 1.3rem;
    }
  }
</style>

<!-- Hero Section -->
<section class="hero">
  <div class="hero-content">
    <h1>Travels in this Lifetime</h1>
    <p>Escape from these places, Find solace in the unknown. Discover breathtaking destinations and create unforgettable memories.</p>
    <a href="#visited" class="btn">
      <i class="fas fa-compass"></i>
      Explore Places
    </a>
  </div>
  <div class="hero-image">
    <img src="https://i.pinimg.com/736x/dd/43/c6/dd43c653dddbb1a2f2d5fb5c1ecb8ba3.jpg" alt="Travel Adventure">
  </div>
</section>


<!-- Visited Places Section -->
<section class="carousel-section" id="visited">
  <div class="section-header">
    <h2>Visited Places</h2>
    <p>Beautiful destinations I've been fortunate to explore and experience</p>
  </div>
  
  <?php
  include 'db.php';
  // Use the same upload directory as your admin panel
  $uploadDir = 'images/';
  
  // Check if directory exists, if not create it
  if (!file_exists($uploadDir)) {
      mkdir($uploadDir, 0755, true);
  }
  
  $visited = $conn->query("SELECT * FROM visited_places ORDER BY id ASC");
  if ($visited && $visited->num_rows > 0): 
  ?>
    <div class="carousel-grid">
      <?php while ($row = $visited->fetch_assoc()): 
        // Get the image path from database
        $imageFileName = $row['image'];
        $imagePath = $uploadDir . $imageFileName;
        $imageExists = file_exists($imagePath);
        
        // If image doesn't exist in current directory, check if it's in admin images folder
        if (!$imageExists) {
            $adminImagePath = 'admin/' . $uploadDir . $imageFileName;
            if (file_exists($adminImagePath)) {
                $imagePath = $adminImagePath;
                $imageExists = true;
            }
        }
      ?>
        <div class="carousel-card">
          <img src="<?= $imageExists ? $imagePath : 'https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Loading' ?>" 
               alt="<?= htmlspecialchars($row['place_name']) ?>"
               onerror="this.src='https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Not+Found'"
               loading="lazy">
          <h3><?= htmlspecialchars($row['place_name']) ?></h3>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div style="text-align:center; color:#94a3b8; grid-column:1/-1; padding:40px; font-style:italic;">
      <i class="fas fa-map-marker-alt" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;"></i>
      <h3>No Visited Places Yet</h3>
      <p>Travel destinations will appear here once added.</p>
    </div>
  <?php endif; ?>
</section>

<!-- Dream Destinations Section -->
<section class="dream-destination">
  <h2 class="section-title">Dream Destinations</h2>
  <p>I aspire to feel it underneath my skin, the beauty and everything intertwined.</p>
  
  <?php
  $destinations = $conn->query("SELECT * FROM dream_destinations ORDER BY id ASC");
  if ($destinations && $destinations->num_rows > 0): 
  ?>
    <div class="destination-grid">
      <?php while ($row = $destinations->fetch_assoc()): 
        // Get the image path from database
        $imageFileName = $row['image'];
        $imagePath = $uploadDir . $imageFileName;
        $imageExists = file_exists($imagePath);
        
        // If image doesn't exist in current directory, check if it's in admin images folder
        if (!$imageExists) {
            $adminImagePath = 'admin/' . $uploadDir . $imageFileName;
            if (file_exists($adminImagePath)) {
                $imagePath = $adminImagePath;
                $imageExists = true;
            }
        }
      ?>
        <div class="destination-card">
          <img src="<?= $imageExists ? $imagePath : 'https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Loading' ?>" 
               alt="<?= htmlspecialchars($row['destination_name']) ?>"
               onerror="this.src='https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Not+Found'"
               loading="lazy">
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div style="text-align:center; color:#94a3b8; grid-column:1/-1; padding:40px; font-style:italic;">
      <i class="fas fa-globe-americas" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.5;"></i>
      <h3>No Dream Destinations Yet</h3>
      <p>Future travel goals will appear here once added.</p>
    </div>
  <?php endif; 
  
  // Close database connection
  $conn->close();
  ?>
</section>


















<!-- Social Section -->
<div class="social-section">
  <div class="social-icons">
    <a href="https://github.com/anna-amari" target="_blank" title="GitHub">
      <i class="fab fa-github"></i>
    </a>
    <a href="mailto:annamarietaduran44@gmail.com" title="Email">
      <i class="fas fa-envelope"></i>
    </a>
    <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn">
      <i class="fab fa-linkedin"></i>
    </a>
    <a href="#" title="Instagram">
      <i class="fab fa-instagram"></i>
    </a>
  </div>
</div>

</body>
</html>