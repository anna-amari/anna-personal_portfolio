<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Access Denied | Anna Mari Portfolio</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      overflow: hidden;
    }

    .container {
      text-align: center;
      color: white;
      max-width: 600px;
      width: 100%;
    }

    /* Initial State - Button Only */
    #unlockSection {
      transition: all 0.5s ease;
    }

    .unlock-title {
      font-family: 'Pixelify Sans', cursive;
      font-size: 3rem;
      color: #e89cae;
      margin-bottom: 30px;
      text-shadow: 0 4px 8px rgba(232, 156, 174, 0.3);
    }

    .unlock-btn {
      padding: 20px 40px;
      background: linear-gradient(135deg, #e89cae, #f7b8c8);
      border: none;
      border-radius: 15px;
      color: #1a1a2e;
      font-size: 1.5rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-family: 'Pixelify Sans', cursive;
      box-shadow: 0 10px 30px rgba(232, 156, 174, 0.4);
    }

    .unlock-btn:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 15px 40px rgba(232, 156, 174, 0.6);
    }

    .unlock-btn:active {
      transform: translateY(0) scale(1);
    }

    /* Slideshow Section */
    #slideshowSection {
      display: none;
      opacity: 0;
      transition: opacity 1s ease;
    }

    .slideshow-container {
      position: relative;
      width: 100%;
      max-width: 500px;
      height: 400px;
      margin: 0 auto 30px;
      border: 3px solid #e89cae;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 40px rgba(232, 156, 174, 0.3);
    }

    .slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .slide.active {
      opacity: 1;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .slide-counter {
      position: absolute;
      bottom: 15px;
      right: 15px;
      background: rgba(0, 0, 0, 0.7);
      color: white;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.9rem;
      z-index: 10;
    }

    /* Navigation Arrows */
    .nav-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(232, 156, 174, 0.8);
      color: #1a1a2e;
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      font-size: 1.5rem;
      cursor: pointer;
      transition: all 0.3s ease;
      z-index: 20;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-arrow:hover {
      background: #e89cae;
      transform: translateY(-50%) scale(1.1);
    }

    .nav-arrow:disabled {
      background: rgba(232, 156, 174, 0.3);
      color: #666;
      cursor: not-allowed;
      transform: translateY(-50%) scale(1);
    }

    .nav-arrow.prev {
      left: 15px;
    }

    .nav-arrow.next {
      right: 15px;
    }

    .continue-btn {
      margin-top: 20px;
      padding: 15px 30px;
      background: linear-gradient(135deg, #e89cae, #f7b8c8);
      border: none;
      border-radius: 12px;
      color: #1a1a2e;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-family: 'Pixelify Sans', cursive;
    }

    .continue-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(232, 156, 174, 0.4);
    }

    .continue-btn:disabled {
      background: #666;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }

    /* Error Section */
    #errorSection {
      display: none;
      opacity: 0;
      transition: opacity 1s ease;
    }

    .error-icon {
      font-size: 5rem;
      color: #e89cae;
      margin-bottom: 20px;
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-10px); }
      75% { transform: translateX(10px); }
    }

    .error-title {
      font-family: 'Pixelify Sans', cursive;
      font-size: 3rem;
      color: #e89cae;
      margin-bottom: 20px;
      text-shadow: 0 4px 8px rgba(232, 156, 174, 0.3);
    }

    .error-message {
      font-size: 1.2rem;
      color: #b0b0b0;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn {
      padding: 12px 25px;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-primary {
      background: linear-gradient(135deg, #e89cae, #f7b8c8);
      color: #1a1a2e;
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 2px solid #e89cae;
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(232, 156, 174, 0.3);
    }

    .fun-text {
      margin-top: 30px;
      font-style: italic;
      color: #888;
      font-size: 0.9rem;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .unlock-title, .error-title {
        font-size: 2.5rem;
      }
      
      .unlock-btn {
        font-size: 1.3rem;
        padding: 15px 30px;
      }
      
      .slideshow-container {
        height: 300px;
      }
      
      .nav-arrow {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
      }
      
      .action-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .btn {
        width: 200px;
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    
    <!-- Unlock Button Section -->
    <section id="unlockSection">
      <h1 class="unlock-title">SECURITY LOCKED 🔒</h1>
      <button class="unlock-btn" onclick="startUnlockSequence()">
        <i class="fas fa-key"></i> TUTORIAL HOW TO UNLOCK MY SYSTEM
      </button>
    </section>

    <!-- Slideshow Section -->
    <section id="slideshowSection">
      <div class="slideshow-container" id="slideshow">
        <!-- Slides will be dynamically added -->
        <button class="nav-arrow prev" onclick="changeSlide(-1)" id="prevBtn">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="nav-arrow next" onclick="changeSlide(1)" id="nextBtn">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
      
      <button class="continue-btn" onclick="showErrorSection()" id="continueBtn" disabled>
        <i class="fas fa-exclamation-triangle"></i>OKI PI, CONTINUE KA
      </button>
    </section>

    <!-- Error Section -->
    <section id="errorSection">
      <div class="error-icon">
        <i class="fas fa-user-slash"></i>
      </div>
      
      <h1 class="error-title">BLEH! 🤢</h1>
      
      <p class="error-message">
        Access Denied! System remains locked.<br>
        Invalid credentials detected.
      </p>
      
      <div class="action-buttons">
        <a href="login.php" class="btn btn-primary">
          <i class="fas fa-arrow-left"></i> Try Again
        </a>
        <a href="index.php" class="btn btn-secondary">
          <i class="fas fa-home"></i> Back to Portfolio
        </a>
      </div>
      
      <p class="fun-text">
      Gawa ka rin sayo hehehe. Thanks for trying tho! 
      </p>
    </section>
  </div>

  <script>
    const blehImages = [
      'images/bleh1.jpg',
      'images/bleh2.jpg',
      'images/bleh3.jpg',
      'images/bleh4.jpg',
      'images/bleh5.jpg'
    ];

    let currentSlide = 0;

    function startUnlockSequence() {
      // Hide unlock button
      const unlockSection = document.getElementById('unlockSection');
      unlockSection.style.opacity = '0';
      
      setTimeout(() => {
        unlockSection.style.display = 'none';
        
        // Show slideshow
        const slideshowSection = document.getElementById('slideshowSection');
        slideshowSection.style.display = 'block';
        
        setTimeout(() => {
          slideshowSection.style.opacity = '1';
          initializeSlideshow();
        }, 100);
      }, 500);
    }

    function initializeSlideshow() {
      const slideshow = document.getElementById('slideshow');
      
      // Clear existing slides (except arrows)
      const existingSlides = slideshow.querySelectorAll('.slide');
      existingSlides.forEach(slide => slide.remove());
      
      // Add slides
      blehImages.forEach((image, index) => {
        const slide = document.createElement('div');
        slide.className = `slide ${index === 0 ? 'active' : ''}`;
        slide.innerHTML = `
          <img src="${image}" alt="BLEH Image ${index + 1}">
          <div class="slide-counter">${index + 1}/${blehImages.length}</div>
        `;
        slideshow.appendChild(slide);
      });
      
      updateNavigation();
    }

    function changeSlide(direction) {
      const newSlide = currentSlide + direction;
      
      if (newSlide >= 0 && newSlide < blehImages.length) {
        currentSlide = newSlide;
        showSlide(currentSlide);
        updateNavigation();
      }
    }

    function showSlide(index) {
      const slides = document.querySelectorAll('.slide');
      slides.forEach(slide => slide.classList.remove('active'));
      slides[index].classList.add('active');
    }

    function updateNavigation() {
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');
      const continueBtn = document.getElementById('continueBtn');
      
      // Update arrow states
      prevBtn.disabled = currentSlide === 0;
      nextBtn.disabled = currentSlide === blehImages.length - 1;
      
      // Enable continue button only on last image
      continueBtn.disabled = currentSlide !== blehImages.length - 1;
    }

    function showErrorSection() {
      const slideshowSection = document.getElementById('slideshowSection');
      slideshowSection.style.opacity = '0';
      
      setTimeout(() => {
        slideshowSection.style.display = 'none';
        
        const errorSection = document.getElementById('errorSection');
        errorSection.style.display = 'block';
        
        setTimeout(() => {
          errorSection.style.opacity = '1';
        }, 100);
      }, 500);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
      if (document.getElementById('slideshowSection').style.display === 'block') {
        if (e.key === 'ArrowLeft') {
          changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
          changeSlide(1);
        } else if (e.key === 'Enter' && !document.getElementById('continueBtn').disabled) {
          showErrorSection();
        }
      }
    });
  </script>
</body>
</html>