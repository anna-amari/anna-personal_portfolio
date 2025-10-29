<?php
  include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Me - Anna Mari</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>About Me</h1>
      <p>
        I’m Anna Marie Taduran, a passionate IT student who loves blending creativity and technology.  
        I enjoy coding, design, and discovering new ways to express ideas through digital art and development.
      </p>
      <a href="projects.php">View My Projects</a>
      <div class="social-icons">
        <a href="https://github.com/anna-amari" target="_blank"><i class="fab fa-github"></i></a>
        <a href="mailto:annamarietaduran44@gmail.com"><i class="fas fa-envelope"></i></a>
        <a href="https://www.linkedin.com/in/yourprofile" target="_blank"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    <div class="hero-image">
      <img src="images/Projects/AnnaMari.png" alt="Anna Mari">
    </div>
  </section>

  <!-- College Friends Section -->
  <section class="photo-gallery">
    <h2>College Friends</h2>
    <div class="gallery">
      <div class="gallery-item">
        <img src="images/Friends/friend1.jpg" alt="Friend 1">
        <p>Mika - Best in Debugging</p>
      </div>
      <div class="gallery-item">
        <img src="images/Friends/friend2.jpg" alt="Friend 2">
        <p>Jessa - The Designer</p>
      </div>
      <div class="gallery-item">
        <img src="images/Friends/friend3.jpg" alt="Friend 3">
        <p>Kay - Our Team Leader</p>
      </div>
      <div class="gallery-item">
        <img src="images/Friends/friend4.jpg" alt="Friend 4">
        <p>Leo - Backend Wizard</p>
      </div>
    </div>
  </section>

  <!-- Likes & Dislikes Table -->
  <section class="likes-dislikes">
    <h2>What I Like & Dislike</h2>
    <table>
      <tr>
        <th>Likes</th>
        <th>Dislikes</th>
      </tr>
      <tr>
        <td>Writing code that actually works ✨</td>
        <td>Unclear project requirements 😅</td>
      </tr>
      <tr>
        <td>Late-night music & coffee ☕</td>
        <td>Broken commits 💀</td>
      </tr>
      <tr>
        <td>UI/UX Design 🎨</td>
        <td>Slow internet 😭</td>
      </tr>
    </table>
  </section>

  <!-- Accounts Section -->
  <section class="accounts">
    <h2>Find Me Online</h2>
    <div class="account-grid">
      <div class="account-card">
        <img src="images/Accounts/github.png" alt="GitHub" class="account-img">
        <p>GitHub</p>
        <a href="https://github.com/anna-amari" target="_blank" class="account-btn">Visit</a>
      </div>
      <div class="account-card">
        <img src="images/Accounts/linkedin.png" alt="LinkedIn" class="account-img">
        <p>LinkedIn</p>
        <a href="https://www.linkedin.com/in/yourprofile" target="_blank" class="account-btn">Visit</a>
      </div>
      <div class="account-card">
        <img src="images/Accounts/gmail.png" alt="Gmail" class="account-img">
        <p>Email</p>
        <a href="mailto:annamarietaduran44@gmail.com" class="account-btn">Send</a>
      </div>
    </div>
  </section>

  <!-- Contact Form -->
  <section class="contact-form">
    <h2>Let’s Connect!</h2>
    <form action="send-message.php" method="POST">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Your Email</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Anna Marie Taduran | Designed with ❤️ in the Philippines</p>
  </footer>

</body>
</html>
