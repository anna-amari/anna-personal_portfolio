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
    background: #000;
    color: #fff;
    line-height: 1.6;
    overflow-x: hidden;
  }
   .hero {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 100vh;
  padding: 0 100px;
  background-color: #0d0d0d;
  color: #fff;
}

.hero-content {
  flex: 1;
  text-align: left;
  padding-left: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 20px; /* space between title, description, and button */
}

.hero-content h1 {
  font-size: 3rem;
  margin: 0;
  color: #d9d9d9;
}

.hero-content p {
  font-size: 1.2rem;
  color: #ccc;
  margin: 0;
}

.hero-content .btn {
  color: #fff;
  padding: 12px 30px;
  text-decoration: none;
  border-radius: 30px;
  font-weight: 600;
  transition: 0.3s;
  display: inline-block;
  width: fit-content;
}

.hero-content .btn:hover {
  background-color: #848282ff;
  color: #fff;
  transform: scale(1.05);
}

.hero-image {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  margin-right: -60px;
}

.hero-image img {
  width: 75%;
  height: 420px; /* makes it rectangular */
  object-fit: cover;
  border-radius: 16px;
 
}

/* === Static 4x4 Grid Carousel === */
.carousel-section {
  padding: 80px 40px;
}

.carousel-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
  max-width: 1300px;
  margin: 0 auto;
}

.carousel-card {
  background: #1a1a1a;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
  text-align: center;
}

.carousel-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 24px rgba(215, 133, 195, 0.3);
}

.carousel-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.carousel-card h3 {
  padding: 14px;
  font-size: 18px;
  font-weight: 600;
  color: #444;
    color: #f2f2f2;
}

/* Responsive */
@media (max-width: 1024px) {
  .carousel-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
@media (max-width: 768px) {
  .carousel-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 500px) {
  .carousel-grid {
    grid-template-columns: 1fr;
  }
}


  /* Dream Destination Section */
  .dream-destination {
    background: #000;
    padding: 80px 20px;
    text-align: center;
  }
  .dream-destination .section-title {
    font-size: 2.5rem;
    text-transform: uppercase;
    margin-bottom: 30px;
    letter-spacing: 2px;
  }
  .dream-destination p {
    font-family: 'Dancing Script', cursive;
    color: #ccc;
    margin-bottom: 40px;
  }
  .destination-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
  }
  .destination-card {
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(255,255,255,0.1);
    transition: transform 0.3s ease;
  }
  .destination-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
  }
  .destination-card:hover img {
    transform: scale(1.1);
  }
/* Social Icons */
.social-icons {
  margin: 60px 0;
  display: flex;
  justify-content: center; 
  align-items: center;   
  gap: 14px;              
}
.social-icons a {
  color: #fff;
  font-size: 26px;
  transition: color 0.3s;
}

.social-icons a:hover {
  color: #999;
}

 </style>
</head>


  <!-- Hero -->
 <section class="hero">
  <div class="hero-content">
    <h1>Travels in this Lifetime</h1>
    <p>Escape from these places, Find solace in the unknown.</p>
    <a href="#carousel" class="btn">Explore</a>
  </div>
  <div class="hero-image">
    <img src="https://i.pinimg.com/736x/dd/43/c6/dd43c653dddbb1a2f2d5fb5c1ecb8ba3.jpg" alt="Travel Image">
  </div>
</section>

<!-- Static 4x4 Grid Section -->
<section class="carousel-section" id="carousel">
  <h2 style="text-align:center; font-size:2rem; margin-bottom:40px; color:#d785c3;">Visited Places</h2>
  
  <div class="carousel-grid">
    <div class="carousel-card">
      <img src="images/location/l1.jpg" alt="">
      <h3>Hanginan, Southern Leyte</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l2.jfif" alt="">
      <h3>Punta Almara, Ligao Albay</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l3.jfif" alt="">
      <h3>Bula, Camarines Sur</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l4.jfif" alt="">
      <h3>Balatan</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l5.jfif" alt="">
      <h3>Mayon, Albay</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l6.jfif" alt="">
      <h3>Iriga City Resort</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l7.jfif" alt="">
      <h3>Masuso, Iriga City</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l8.jpg" alt="">
      <h3>Carnival, Iriga City</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l9.jfif" alt="">
      <h3>Sugod St. Leyte</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l10.jfif" alt="">
      <h3>Naga Cathedral Church</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l11.jfif" alt="">
      <h3>Inorogan, Iriga City</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l12.jfif" alt="">
      <h3>Camarines Sur Polytechnic Colleges</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l13.jfif" alt="">
      <h3>SVS Iriga City</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l14.jfif" alt="">
      <h3>Illian Hill</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l15.jpg" alt="">
      <h3>Sample Location</h3>
    </div>
    <div class="carousel-card">
      <img src="images/location/l16.jpg" alt="">
      <h3>Another Place</h3>
    </div>
  </div>

  
</section>



  <!-- Dream Destination -->
  <section class="dream-destination">
    <h2 class="section-title">Dream Destination</h2>
    <p>I aspire to feel it underneath my skin, the beauty and everything intertwined.</p>
    <div class="destination-grid">
      <div class="destination-card"><img src="https://i.pinimg.com/736x/9d/e6/c9/9de6c9c2c33e49b1ff4bc76bc7d8aa39.jpg"></div>
      <div class="destination-card"><img src="https://i.pinimg.com/1200x/ab/6f/0c/ab6f0cfa5d8239c6c0f6684d5f26fd29.jpg"></div>
      <div class="destination-card"><img src="https://i.pinimg.com/736x/12/db/4e/12db4e928868f3146573aed41e7ad939.jpg"></div>
      <div class="destination-card"><img src="https://i.pinimg.com/1200x/c2/26/e3/c226e3fad5203d336453d9cf0b6d3b0c.jpg"></div>
    </div>
  </section>

  <!-- Social -->
  <div class="social-icons">
    <a href="https://github.com/anna-amari" target="_blank"><i class="fab fa-github"></i></a>
    <a href="mailto:annamarietaduran44@gmail.com"><i class="fas fa-envelope"></i></a>
    <a href="https://www.linkedin.com/in/yourprofile" target="_blank"><i class="fab fa-linkedin"></i></a>
  </div>

</body>
</html>
