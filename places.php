<?php 
$pageTitle = "Anna Mari Portfolio";
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
  <style>
  /* Reset */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', sans-serif;
    line-height: 1.7;
    background: #fafafa;
    color: #333;
    transition: background-color 0.4s, color 0.4s;
  
  }

  /* Navigation */
  .main-nav {
    padding: 15px 40px;
    position: absolute; 
    width: 100%;
    top: 0;
    left: 0;
    z-index: 100;
  background: transparent; 
  }
  .main-nav ul {
    list-style: none;
    margin: 20px;
    display: flex;
    justify-content: flex-end;
    gap: 25px;
    padding-left: 50px;
  }
  .main-nav ul li a {
    text-decoration: none;
     color: #fff;  /* white so it’s visible on hero image */
    font-size: 18px;
    font-weight: 500;
    padding: 6px 10px;
    border-radius: 6px;
    transition: background 0.3s, color 0.3s;
  }
  .main-nav ul li a:hover {
    background: #d785c315;
    color: #d785c3;
  }

  /* Hero Section */
  .hero {
    position: relative;
    background: url('https://i.pinimg.com/1200x/2a/da/9d/2ada9d1617d5752038695a04df6beb2c.jpg') no-repeat center center/cover;
    height: 100vh;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0 80px;
    overflow: hidden;
  }
  .hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom right, rgba(215,133,195,0.5), rgba(0,0,0,0.5));
}
.hero-content h1 span {
  color: #d785c3;
}
  .hero-content {
    position: relative;
    max-width: 600px;
    z-index: 1;
    animation: fadeUp 1.2s ease;
  }
  @keyframes fadeUp {
    from {opacity: 0; transform: translateY(30px);}
    to {opacity: 1; transform: translateY(0);}
  }
  .hero-content h1 {
    font-size: 60px;
    margin-bottom: 20px;
    font-weight: 700;
  }
  .hero-content p {
    font-size: 20px;
    margin-bottom: 30px;
    opacity: 0.95;
  }
 
  .hero-content .btn {
    padding: 14px 34px;
    font-size: 18px;
    border: none;
    border-radius: 30px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    font-weight: 600;
     background: linear-gradient(135deg, #d785c3, #9b59b6);
  box-shadow: 0 6px 20px rgba(215,133,195,0.6);
  transition: all 0.3s ease;
  }
  .hero-content .btn:hover {
    background: #c46db0;
    transform: translateY(-3px);
     transform: scale(1.05);
  box-shadow: 0 8px 25px rgba(215,133,195,0.8);
  }

  /* Carousel Section */
  .carousel-section {
    background: #fff;
    padding: 80px 0;
    position: relative;
     overflow: hidden; 
  }
  .carousel-wrapper {
  width: 100%;
  overflow: hidden; /* 🔹 Added: wrapper to contain the scrolling row */
}
  .carousel-container {
    display: flex;
    gap: 24px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 0 80px 0 0;  
  }
  .carousel-container::after {
  content: "";
    flex: 0 0 40px; 
}
  .carousel-container::-webkit-scrollbar {
    display: none;
  }
  .carousel-card {
    flex: 0 0 300px;
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    transition: transform 0.3s;
    position: relative;
  }
  .carousel-card:hover {
    transform: translateY(-6px);
  }
  .carousel-card img {
    width: 100%;
    height: 190px;
    object-fit: cover;
  }
  .carousel-card h3 {
    font-size: 18px;
    font-weight: 600;
    padding: 14px;
    margin: 0;
  }
  .carousel-card .bookmark {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    padding: 8px;
    cursor: pointer;
    transition: background 0.3s;
  }
  .carousel-card .bookmark:hover {
    background: #d785c3;
    color: #fff;
  }

  /* Carousel Arrows */
  .carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: #ffffffdd;
    color: #d785c3;
    border: none;
    font-size: 22px;
    padding: 12px;
    cursor: pointer;
    border-radius: 50%;
    z-index: 10;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
  }
  .carousel-arrow:hover {
    background: #d785c3;
    color: #fff;
  }
  .arrow-left { left: 30px; }
  .arrow-right { right: 30px; }

  /* Dots */
  .carousel-dots {
    text-align: center;
    margin-top: 20px;
  }
  .carousel-dots span {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin: 0 5px;
    background: #ccc;
    border-radius: 50%;
    cursor: pointer;
    transition: background 0.3s;
  }
  .carousel-dots .active {
    background: #d785c3;
  }

  /* Projects */
  main {
    padding: 80px 20px;
    text-align: center;
  }
  main h1 {
    font-size: 38px;
    margin-bottom: 20px;
    font-weight: 700;
  }
  main p {
    font-size: 19px;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
    opacity: 0.85;
  }

  /* Social Icons */
  .social-icons {
    margin: 60px 0;
    text-align: center;
  }
  .social-icons a {
    color: #333;
    font-size: 26px;
    margin: 0 14px;
    transition: color 0.3s;
  }
  .social-icons a:hover {
    color: #d785c3;
  }

  /* Theme Toggle Button */
  #toggle-theme {
    background: none;
    border: none;
    color: #111;
    font-size: 24px;
    cursor: pointer;
    position: fixed;
    top: 20px;
    right: 30px;
    z-index: 200;
    transition: color 0.3s;
  }
  
  .dancing-script {
    font-family: "Dancing Script", cursive;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
  }

.hobbies-section {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 25px;
  max-width: 1200px;
  margin: 50px auto;
  padding: 0 20px;
}

.hobby-card {
  background: #ffe6f3;
  border-radius: 16px;
  box-shadow: 0 6px 16px rgba(215,133,195,0.25);
  overflow: hidden;
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
}

.hobby-card h3 {
  background: linear-gradient(135deg, #f8c6e7, #f3a7d3);
  margin: 0;
  padding: 12px;
  font-size: 18px;
  font-weight: 600;
  color: #fff;
  border-radius: 16px 16px 0 0;
}

.hobby-card img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 0 0 16px 16px;
}

.hobby-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 24px rgba(215,133,195,0.4);
}

/* Responsive */
@media (max-width: 992px) {
  .hobbies-section {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 600px) {
  .hobbies-section {
    grid-template-columns: 1fr;
  }
}
 .dream-destination {
    padding: 50px 20px;
    text-align: center;
    background: #fdfdfd;
  }

  .dream-destination .section-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: #d24787;
    letter-spacing: 2px;
    text-transform: uppercase;
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
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .destination-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.4s ease;
  }

  .destination-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  }

  .destination-card:hover img {
    transform: scale(1.08);
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

  <!-- Navigation -->
  <nav class="main-nav">
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="projects.php">Projects</a></li>
      <li><a href="places.php">Places</a></li>
      <li><a href="side-hustle.php">Side Hustle</a></li>
    </ul>
  </nav>

  <!-- Hero -->
  <section class="hero">
    <div class="hero-content">
      <h1>Travels in this Lifetime</h1>
    <p style="font-family: 'Dancing Script', cursive; font-weight:400;">
  Escape from these places, Find solace in the unknown.
</p>
      <a href="#carousel" class="btn">Explore</a>
    </div>
  </section>

<!-- Carousel -->
<section class="carousel-section" id="carousel">
  <button class="carousel-arrow arrow-left"><i class="fas fa-chevron-left"></i></button>
  <div class="carousel-container" id="carouselContainer">
    <div class="carousel-card">
      <h3>Hanginan, Southern Leyte</h3>
        <img src="images/location/l1.jpg">
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <img src="images/location/l2.jfif">
    <h3>Punta Almara, Ligao Albay</h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <h3>Bula, Camarines Sur</h3>
        <img src="images/location/l3.jfif">
       <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <img src="images/location/l4.jfif">
    <h3>Balatan</h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <h3>Mayon, Albay</h3>
        <img src="images/location/l5.jfif">
       <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
        <img src="images/location/l6.jfif">
         <h3>Iriga City Resort</h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <h3>Masuso, Iriga City</h3>
      <img src="images/location/l7.jfif">
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <img src="images/location/l8.jpg">
    <h3>Carnival, Iriga City</h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <h3>Sugod St. Leyte</h3>
        <img src="images/location/l9.jfif">
       <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
   <div class="carousel-card">
      <img src="images/location/l10.jfif">
    <h3>Naga Cathedral Church</h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <h3>Inorogan, Iriga City</h3>
        <img src="images/location/l11.jfif">
       <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
   <div class="carousel-card">
      <img src="images/location/l12.jfif">
    <h3>Camarines Sur Polytechnic Colleges <h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
    <div class="carousel-card">
      <h3>SVS Iriga City</h3>
        <img src="images/location/l13.jfif">
       <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>
     <div class="carousel-card">
      <img src="images/location/l14.jfif">
    <h3>Illian Hill</h3>
      <div class="bookmark"><i class="fas fa-bookmark"></i></div>
    </div>

  
  </div>

  <button class="carousel-arrow arrow-right"><i class="fas fa-chevron-right"></i></button>

  <!-- Dots -->
  <div class="carousel-dots" id="carouselDots">
    <!-- JS will populate these to match pages -->
  </div>
</section>
<div style="text-align:center; margin: 40px 0 60px 0;">
  <img src="https://i.pinimg.com/1200x/24/75/b7/2475b7c078e08aa5fd7a011ef9eb0c45.jpg" 
       style="width: 450px; height: 200px; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
</div>

<!-- Dream Destination Section -->
<section class="dream-destination">
  <h2 class="section-title">Dream Destination</h2>
  <p style="font-family: 'Dancing Script', cursive; font-size: 1.2rem; font-weight:400; margin: 10px 0 40px 0; color: #666;">
    I aspire to feel it underneath my skin, the beauty and everything intertwined
  </p>

  <div class="destination-grid" id="destinationGrid">
    <div class="destination-card">
      <img src="https://i.pinimg.com/736x/9d/e6/c9/9de6c9c2c33e49b1ff4bc76bc7d8aa39.jpg" alt="Destination 1">
    </div>
    <div class="destination-card">
      <img src="https://i.pinimg.com/1200x/ab/6f/0c/ab6f0cfa5d8239c6c0f6684d5f26fd29.jpg" alt="Destination 2">
    </div>
    <div class="destination-card">
      <img src="https://i.pinimg.com/736x/12/db/4e/12db4e928868f3146573aed41e7ad939.jpg" alt="Destination 3">
    </div>
    <div class="destination-card">
      <img src="https://i.pinimg.com/1200x/c2/26/e3/c226e3fad5203d336453d9cf0b6d3b0c.jpg" alt="Destination 4">
    </div>
    <div class="destination-card">
      <img src="https://i.pinimg.com/1200x/94/e0/8e/94e08e6d0b4f70a7c7b3fdd01ff27cb7.jpg" alt="Destination 5">
    </div>
    <div class="destination-card">
      <img src="https://i.pinimg.com/1200x/0a/d0/74/0ad0749b4478a8463cfb4c9b0c27fc97.jpg" alt="Destination 6">
    </div>
     <div class="destination-card">
      <img src="https://i.pinimg.com/1200x/fd/7b/ec/fd7becf818dc6a4be682b5dc77a5b1e3.jpg" alt="Destination 5">
    </div>
    <div class="destination-card">
      <img src="https://i.pinimg.com/736x/b6/ac/7a/b6ac7a0c954b0fe7af8dfa12edadcc0e.jpg" alt="Destination 6">
    </div>
  </div>
</section>


  <!-- Social -->
  <div class="social-icons">
    <a href="https://github.com/anna-amari" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
    <a href="mailto:annamarietaduran44@gmail.com" title="Email"><i class="fas fa-envelope"></i></a>
    <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
  </div>

  <!-- Scripts -->
  <script>
    // guard theme toggle (if you add the button later)
    const toggleBtn = document.getElementById('toggle-theme');
    if (toggleBtn) {
      const body = document.body;
      const icon = toggleBtn.querySelector('i');
      toggleBtn.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        if (icon) {
          icon.classList.toggle('fa-moon');
          icon.classList.toggle('fa-sun');
        }
      });
    }

    // Carousel: arrows + clickable dots (keeps your design & CSS)
    (function () {
      const carousel = document.getElementById('carouselContainer');
      const dotsContainer = document.getElementById('carouselDots');
      const btnLeft = document.querySelector('.arrow-left');
      const btnRight = document.querySelector('.arrow-right');
      if (!carousel || !dotsContainer) return;

      const cards = Array.from(carousel.querySelectorAll('.carousel-card'));
      if (!cards.length) return;

      const style = getComputedStyle(carousel);
      const gap = parseInt(style.gap || 24, 10) || 24;

      function cardWidth() {
        return Math.round(cards[0].getBoundingClientRect().width);
      }

      function visibleCount() {
        // how many cards fit into the visible carousel width (account for gap)
        return Math.max(1, Math.floor((carousel.clientWidth + gap) / (cardWidth() + gap)));
      }

      function pageWidth() {
        const v = visibleCount();
        return v * cardWidth() + Math.max(0, v - 1) * gap;
      }

      function pages() {
        return Math.max(1, Math.ceil(cards.length / visibleCount()));
      }

      function renderDots() {
        dotsContainer.innerHTML = '';
        for (let i = 0; i < pages(); i++) {
          const span = document.createElement('span');
          span.dataset.page = i;
          if (i === 0) span.classList.add('active');
          span.addEventListener('click', () => scrollToPage(i));
          dotsContainer.appendChild(span);
        }
      }

      function scrollToPage(pageIndex) {
        const pw = pageWidth();
        const maxLeft = carousel.scrollWidth - carousel.clientWidth;
        const left = Math.min(pageIndex * pw, maxLeft);
        carousel.scrollTo({ left, behavior: 'smooth' });
      }

      function updateDotsOnScroll() {
        const pw = pageWidth();
        const page = pw ? Math.round(carousel.scrollLeft / pw) : 0;
        const spans = dotsContainer.children;
        for (let i = 0; i < spans.length; i++) {
          spans[i].classList.toggle('active', i === page);
        }
      }

      // arrows: go to previous/next page
      if (btnRight) {
        btnRight.addEventListener('click', () => {
          const currentPage = Math.round(carousel.scrollLeft / pageWidth());
          const next = Math.min(pages() - 1, currentPage + 1);
          scrollToPage(next);
        });
      }
      if (btnLeft) {
        btnLeft.addEventListener('click', () => {
          const currentPage = Math.round(carousel.scrollLeft / pageWidth());
          const prev = Math.max(0, currentPage - 1);
          scrollToPage(prev);
        });
      }

      // debounce helper
      let resizeTimer;
      function debounce(fn, wait = 80) {
        return function () {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(fn, wait);
        };
      }

      carousel.addEventListener('scroll', debounce(updateDotsOnScroll, 60));
      window.addEventListener('resize', debounce(() => { renderDots(); updateDotsOnScroll(); }, 120));

      // initial
      renderDots();
      updateDotsOnScroll();
    })();
  </script>
</body>
</html>
