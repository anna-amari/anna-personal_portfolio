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
      position: relative;
    }

    /* Matrix Rain Background */
    .matrix-rain {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 0;
      opacity: 0.1;
    }

    .container {
      text-align: center;
      color: white;
      max-width: 600px;
      width: 100%;
      position: relative;
      z-index: 1;
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
      position: relative;
    }

    .glitch-text {
      position: relative;
      display: inline-block;
    }

    .glitch-text::before,
    .glitch-text::after {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .glitch-text::before {
      left: 2px;
      text-shadow: -2px 0 #ff00ff;
      clip: rect(24px, 550px, 90px, 0);
      animation: glitch-anim 5s infinite linear alternate-reverse;
    }

    .glitch-text::after {
      left: -2px;
      text-shadow: -2px 0 #00ffff;
      clip: rect(85px, 550px, 140px, 0);
      animation: glitch-anim2 5s infinite linear alternate-reverse;
    }

    @keyframes glitch-anim {
      0% { clip: rect(42px, 9999px, 44px, 0); }
      5% { clip: rect(12px, 9999px, 59px, 0); }
      10% { clip: rect(48px, 9999px, 29px, 0); }
      15% { clip: rect(42px, 9999px, 73px, 0); }
      20% { clip: rect(63px, 9999px, 27px, 0); }
      25% { clip: rect(34px, 9999px, 55px, 0); }
      30% { clip: rect(86px, 9999px, 73px, 0); }
      35% { clip: rect(20px, 9999px, 20px, 0); }
      40% { clip: rect(26px, 9999px, 60px, 0); }
      45% { clip: rect(25px, 9999px, 66px, 0); }
      50% { clip: rect(57px, 9999px, 98px, 0); }
      55% { clip: rect(5px, 9999px, 46px, 0); }
      60% { clip: rect(82px, 9999px, 31px, 0); }
      65% { clip: rect(54px, 9999px, 27px, 0); }
      70% { clip: rect(28px, 9999px, 99px, 0); }
      75% { clip: rect(45px, 9999px, 69px, 0); }
      80% { clip: rect(23px, 9999px, 85px, 0); }
      85% { clip: rect(54px, 9999px, 84px, 0); }
      90% { clip: rect(45px, 9999px, 47px, 0); }
      95% { clip: rect(37px, 9999px, 20px, 0); }
      100% { clip: rect(4px, 9999px, 91px, 0); }
    }

    @keyframes glitch-anim2 {
      0% { clip: rect(65px, 9999px, 100px, 0); }
      5% { clip: rect(52px, 9999px, 74px, 0); }
      10% { clip: rect(79px, 9999px, 85px, 0); }
      15% { clip: rect(75px, 9999px, 5px, 0); }
      20% { clip: rect(67px, 9999px, 61px, 0); }
      25% { clip: rect(14px, 9999px, 79px, 0); }
      30% { clip: rect(1px, 9999px, 66px, 0); }
      35% { clip: rect(86px, 9999px, 30px, 0); }
      40% { clip: rect(23px, 9999px, 98px, 0); }
      45% { clip: rect(85px, 9999px, 72px, 0); }
      50% { clip: rect(71px, 9999px, 75px, 0); }
      55% { clip: rect(2px, 9999px, 48px, 0); }
      60% { clip: rect(30px, 9999px, 16px, 0); }
      65% { clip: rect(59px, 9999px, 50px, 0); }
      70% { clip: rect(41px, 9999px, 62px, 0); }
      75% { clip: rect(2px, 9999px, 82px, 0); }
      80% { clip: rect(47px, 9999px, 73px, 0); }
      85% { clip: rect(3px, 9999px, 27px, 0); }
      90% { clip: rect(26px, 9999px, 55px, 0); }
      95% { clip: rect(42px, 9999px, 97px, 0); }
      100% { clip: rect(38px, 9999px, 49px, 0); }
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
      position: relative;
      overflow: hidden;
    }

    .unlock-btn:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 15px 40px rgba(232, 156, 174, 0.6);
      animation: glitch-btn 0.3s infinite;
    }

    .unlock-btn:active {
      transform: translateY(0) scale(1);
    }

    @keyframes glitch-btn {
      0% { transform: translateY(-5px) scale(1.05); }
      25% { transform: translateY(-5px) scale(1.05) translateX(2px); }
      50% { transform: translateY(-5px) scale(1.05) translateX(-2px); }
      75% { transform: translateY(-5px) scale(1.05) translateX(1px); }
      100% { transform: translateY(-5px) scale(1.05); }
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
      background: #000;
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
      filter: sepia(0.3) contrast(1.2);
    }

    .slide-counter {
      position: absolute;
      bottom: 15px;
      right: 15px;
      background: rgba(0, 0, 0, 0.7);
      color: #00ffff;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.9rem;
      z-index: 10;
      font-family: 'Courier New', monospace;
      border: 1px solid #00ffff;
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
      animation: glitch-arrow 0.2s infinite;
    }

    .nav-arrow:disabled {
      background: rgba(232, 156, 174, 0.3);
      color: #666;
      cursor: not-allowed;
      transform: translateY(-50%) scale(1);
    }

    @keyframes glitch-arrow {
      0% { transform: translateY(-50%) scale(1.1); }
      50% { transform: translateY(-50%) scale(1.1) rotate(5deg); }
      100% { transform: translateY(-50%) scale(1.1) rotate(-5deg); }
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
      position: relative;
      overflow: hidden;
    }

    .continue-btn:hover:not(:disabled) {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(232, 156, 174, 0.4);
      animation: glitch-continue 0.4s infinite;
    }

    .continue-btn:disabled {
      background: #666;
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }

    @keyframes glitch-continue {
      0% { transform: translateY(-3px); }
      33% { transform: translateY(-3px) translateX(3px); }
      66% { transform: translateY(-3px) translateX(-3px); }
      100% { transform: translateY(-3px); }
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
      animation: shake 0.5s ease-in-out infinite;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0) rotate(0deg); }
      25% { transform: translateX(-10px) rotate(-5deg); }
      75% { transform: translateX(10px) rotate(5deg); }
    }

    .error-title {
      font-family: 'Pixelify Sans', cursive;
      font-size: 3rem;
      color: #e89cae;
      margin-bottom: 20px;
      text-shadow: 0 4px 8px rgba(232, 156, 174, 0.3);
      animation: text-flicker 3s infinite;
    }

    @keyframes text-flicker {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
      51% { opacity: 1; }
      52% { opacity: 0.3; }
      53% { opacity: 1; }
    }

    .error-message {
      font-size: 1.2rem;
      color: #b0b0b0;
      margin-bottom: 30px;
      line-height: 1.6;
      font-family: 'Courier New', monospace;
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
      position: relative;
      overflow: hidden;
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
      animation: glitch-btn-hover 0.3s infinite;
    }

    @keyframes glitch-btn-hover {
      0% { transform: translateY(-3px); }
      50% { transform: translateY(-3px) scale(1.05); }
      100% { transform: translateY(-3px); }
    }

    /* DVD Bounce Animation */
    .fun-text {
      margin-top: 30px;
      font-style: italic;
      color: #e89cae;
      font-size: 1.1rem;
      font-family: 'Pixelify Sans', cursive;
      position: fixed;
      padding: 10px 20px;
      background: rgba(0, 0, 0, 0.7);
      border: 2px solid #e89cae;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(232, 156, 174, 0.5);
      z-index: 1000;
      white-space: nowrap;
      animation: dvdBounce 15s linear infinite;
      text-shadow: 0 0 10px rgba(232, 156, 174, 0.8);
      backdrop-filter: blur(5px);
    }

    @keyframes dvdBounce {
      0% {
        top: 10%;
        left: 10%;
        background: rgba(232, 156, 174, 0.8);
        color: #1a1a2e;
        border-color: #ff00ff;
      }
      25% {
        top: 10%;
        left: 80%;
        background: rgba(255, 0, 255, 0.8);
        color: white;
        border-color: #00ffff;
      }
      50% {
        top: 80%;
        left: 80%;
        background: rgba(0, 255, 255, 0.8);
        color: #1a1a2e;
        border-color: #e89cae;
      }
      75% {
        top: 80%;
        left: 10%;
        background: rgba(232, 156, 174, 0.8);
        color: white;
        border-color: #ff00ff;
      }
      100% {
        top: 10%;
        left: 10%;
        background: rgba(232, 156, 174, 0.8);
        color: #1a1a2e;
        border-color: #00ffff;
      }
    }

    /* Glitch effect for the bouncing text */
    .fun-text::before {
      content: attr(data-text);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: inherit;
      border-radius: inherit;
      padding: inherit;
      animation: textGlitch 2s infinite linear;
      opacity: 0;
    }

    @keyframes textGlitch {
      0%, 100% { opacity: 0; transform: translateX(0); }
      25% { opacity: 0.1; transform: translateX(2px); }
      50% { opacity: 0.2; transform: translateX(-2px); }
      75% { opacity: 0.1; transform: translateX(1px); }
    }

    /* Scan Lines Effect */
    .scan-lines {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(
        to bottom,
        transparent 50%,
        rgba(0, 0, 0, 0.1) 50%
      );
      background-size: 100% 4px;
      pointer-events: none;
      z-index: 999;
      animation: scanMove 2s linear infinite;
    }

    @keyframes scanMove {
      0% { transform: translateY(-100%); }
      100% { transform: translateY(100%); }
    }

    /* Random Glitch Overlay */
    .glitch-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: transparent;
      pointer-events: none;
      z-index: 998;
      opacity: 0;
      animation: randomGlitch 10s infinite;
    }

    @keyframes randomGlitch {
      0%, 95% { opacity: 0; }
      96% { opacity: 0.1; background: #ff00ff; }
      97% { opacity: 0; }
      98% { opacity: 0.2; background: #00ffff; transform: translateX(10px); }
      99% { opacity: 0; transform: translateX(0); }
      100% { opacity: 0; }
    }

    /* BLEH Images Layout */
    .bleh-top {
      text-align: center;
      margin-bottom: 20px;
    }

    .bleh-image-top {
      width: 300px;
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #e89cae;
      transition: all 0.3s ease;
      filter: sepia(0.3) contrast(1.1);
    }

    .bleh-image-top:hover {
      transform: scale(1.05);
      border-color: #ff00ff;
      box-shadow: 0 5px 15px rgba(255, 0, 255, 0.4);
      animation: imageGlitch 0.3s infinite;
    }

    .text-images-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      margin: 30px auto;
      max-width: 800px;
    }

    .bleh-left, .bleh-right {
      flex: 0 0 auto;
    }

    .bleh-image-side {
      width: 250px;
      height: 200px;
      object-fit: cover;
      border-radius: 10px;
      border: 2px solid #e89cae;
      transition: all 0.3s ease;
      filter: sepia(0.3) contrast(1.1);
    }

    .bleh-image-side:hover {
      transform: scale(1.05);
      border-color: #00ffff;
      box-shadow: 0 5px 15px rgba(0, 255, 255, 0.4);
      animation: imageGlitch 0.3s infinite;
    }

    .error-content {
      flex: 1;
      text-align: center;
      min-width: 300px;
    }

    .bleh-bottom {
      text-align: center;
      margin: 25px auto;
    }

    .bleh-image-bottom {
      width: 350px;
      height: 280px;
      object-fit: cover;
      border-radius: 15px;
      border: 3px solid #e89cae;
      box-shadow: 0 10px 25px rgba(232, 156, 174, 0.3);
      transition: all 0.3s ease;
      filter: sepia(0.4) contrast(1.2);
    }

    .bleh-image-bottom:hover {
      transform: scale(1.02);
      border-color: #ff00ff;
      box-shadow: 0 15px 35px rgba(255, 0, 255, 0.4);
      animation: mainImageGlitch 0.5s infinite;
    }

    .bleh-label-bottom {
      margin-top: 10px;
      font-size: 1.1rem;
      color: #00ffff;
      font-weight: 600;
      font-family: 'Pixelify Sans', cursive;
      text-shadow: 0 2px 4px rgba(0, 255, 255, 0.3);
      animation: labelPulse 2s infinite;
    }

    @keyframes imageGlitch {
      0% { filter: sepia(0.3) contrast(1.1); }
      50% { filter: sepia(0.3) contrast(1.1) hue-rotate(90deg); }
      100% { filter: sepia(0.3) contrast(1.1); }
    }

    @keyframes mainImageGlitch {
      0% { filter: sepia(0.4) contrast(1.2); }
      33% { filter: sepia(0.4) contrast(1.2) hue-rotate(60deg); }
      66% { filter: sepia(0.4) contrast(1.2) hue-rotate(-60deg); }
      100% { filter: sepia(0.4) contrast(1.2); }
    }

    @keyframes labelPulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.7; transform: scale(1.05); }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .text-images-container {
        flex-direction: column;
        gap: 15px;
      }
      
      .bleh-left, .bleh-right {
        order: 2;
      }
      
      .error-content {
        order: 1;
        min-width: auto;
      }
      
      .bleh-image-top {
        width: 250px;
        height: 200px;
      }
      
      .bleh-image-side {
        width: 200px;
        height: 160px;
      }
      
      .bleh-image-bottom {
        width: 280px;
        height: 220px;
      }
    }

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
      
      .bleh-image-top {
        width: 200px;
        height: 160px;
      }
      
      .bleh-image-side {
        width: 160px;
        height: 130px;
      }
      
      .bleh-image-bottom {
        width: 220px;
        height: 180px;
      }
      
      .bleh-label-bottom {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <!-- Visual Effects -->
  <div class="matrix-rain" id="matrixRain"></div>
  <div class="scan-lines"></div>
  <div class="glitch-overlay"></div>

  <div class="container">
    
    <!-- Unlock Button Section -->
    <section id="unlockSection">
      <h1 class="unlock-title">
        <span class="glitch-text" data-text="SECURITY LOCKED 🔒">SECURITY LOCKED 🔒</span>
      </h1>
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
      
      <!-- Top Image -->
      <div class="bleh-top">
        <img src="images/bleh7.jpg" alt="BLEH 7" class="bleh-image-top">
      </div>
      
      <div class="text-images-container">
        <!-- Left Image -->
        <div class="bleh-left">
          <img src="images/bleh6.jpg" alt="BLEH 6" class="bleh-image-side">
        </div>
        
        <!-- Center Text Content -->
        <div class="error-content">
          <h1 class="error-title">BLEH! 🤢</h1>
          
          <p class="error-message">
            IKAW HA. ALAM MO HA.<br>
            HULAAAAN MOO PASSWORD HEHEHEEHE!!!
          </p>
        </div>
        
        <!-- Right Image -->
        <div class="bleh-right">
          <img src="images/bleh8.jpg" alt="BLEH 8" class="bleh-image-side">
        </div>
      </div>

      <!-- Bottom Single Image -->
      <div class="bleh-bottom">
        <div class="bleh-label-bottom">FINAL BLEH! 🎯</div>
      </div>
      
      <div class="action-buttons">
        <a href="login.php" class="btn btn-primary">
          <i class="fas fa-arrow-left"></i> Try Again
        </a>
        <a href="index.php" class="btn btn-secondary">
          <i class="fas fa-home"></i> Back to Portfolio
        </a>
      </div>
      
      <p class="fun-text" data-text="Gawa ka rin sayo hehehe. Thanks for trying tho!">
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

    // Matrix Rain Effect
    function createMatrixRain() {
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      const matrixRain = document.getElementById('matrixRain');
      matrixRain.appendChild(canvas);

      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;

      const chars = "01010101010101010101";
      const charArray = chars.split("");
      const font_size = 14;
      const columns = canvas.width / font_size;
      const drops = [];

      for (let x = 0; x < columns; x++) {
        drops[x] = Math.random() * canvas.height;
      }

      function draw() {
        ctx.fillStyle = "rgba(0, 0, 0, 0.04)";
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.fillStyle = "#0F0";
        ctx.font = font_size + "px arial";

        for (let i = 0; i < drops.length; i++) {
          const text = charArray[Math.floor(Math.random() * charArray.length)];
          ctx.fillText(text, i * font_size, drops[i] * font_size);

          if (drops[i] * font_size > canvas.height && Math.random() > 0.975) {
            drops[i] = 0;
          }
          drops[i]++;
        }
      }

      setInterval(draw, 35);
    }

    // Random glitch effects
    function triggerRandomGlitch() {
      const glitchOverlay = document.querySelector('.glitch-overlay');
      glitchOverlay.style.animation = 'none';
      setTimeout(() => {
        glitchOverlay.style.animation = 'randomGlitch 10s infinite';
      }, 10);
    }

    function randomScreenShake() {
      document.body.style.transform = 'translateX(5px)';
      setTimeout(() => {
        document.body.style.transform = 'translateX(-5px)';
        setTimeout(() => {
          document.body.style.transform = 'translateX(0)';
        }, 50);
      }, 50);
    }

    function startUnlockSequence() {
      // Trigger random effects
      triggerRandomGlitch();
      randomScreenShake();

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
      // Random chance for glitch effect
      if (Math.random() > 0.7) {
        triggerRandomGlitch();
      }

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
      // Big glitch effect on final click
      triggerRandomGlitch();
      randomScreenShake();
      
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

    // Initialize effects
    document.addEventListener('DOMContentLoaded', function() {
      createMatrixRain();
      
      // Random glitches every few seconds
      setInterval(() => {
        if (Math.random() > 0.8) {
          triggerRandomGlitch();
        }
      }, 5000);
    });

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