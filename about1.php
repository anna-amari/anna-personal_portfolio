<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

<?php
include 'db.php'; 
include 'nav.php';


$pageTitle = "About Me";


$bio = "Hi! I'm Anna Mari, an aspiring web developer with interest and currently learning in PHP, HTML, CSS, JavaScript, and MySQL. 
I enjoy creating functional and aesthetic web applications that provide great user experiences. ";

$formMessage = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $conn->real_escape_string($_POST['first_name']);
    $last = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $msg = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (first_name, last_name, email, message) 
            VALUES ('$first', '$last', '$email', '$msg')";

    if ($conn->query($sql)) {
        $formMessage = "<p class='success'>Message sent successfully! Thank you </p>";
    } else {
        $formMessage = "<p class='error'>Something went wrong. Please try again.</p>";
    }
}
$classmates = $conn->query("SELECT * FROM classmates");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #000000;
      color: #ffffff;
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* Hero Section - Updated for dark theme */
    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 60px 10%;
      gap: 5px;
      min-height: 90vh;
      background-color: #000000;
      min-height: calc(10vh - 90px);
    }
    .hero-text h1 {
      font-size: 48px;
      font-weight: 700;
      color: #e89cae;
      margin-bottom: 20px;
    }
    .hero-text p {
      font-size: 18px;
      max-width: 550px;
      margin-bottom: 30px;
      color: #ffffff;
    }
    .hero-text a {
      display: inline-block;
      padding: 12px 25px;
      background: #e89cae;
      color: #ffffff;
      font-weight: 600;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s ease;
    }
    .hero-text a:hover {
      background: #fcc7d1;
    }
    .hero img {
      width: 320px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(255,255,255,0.1);
      object-fit: cover;
    }

    /* Social Icons */
    .social-icons {
      margin-top: 20px;
      display: flex;
      gap: 20px;
    }
    .social-icons a {
      color: #ffffff;
      font-size: 22px;
      transition: color 0.3s, transform 0.2s;
    }
    .social-icons a:hover {
      color: #e89cae;
      transform: translateY(-3px);
    }

    /* ===== CLASSMATES - Updated for dark theme ===== */
    .classmates-section {
      padding: 50px 5%;
      background: #1a1a1a;
      text-align: center;
    }
    .classmates-section h2 {
      color: #e89cae;
      margin-bottom: 30px;
    }
    .cards {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }
    .card {
      background: #2a2a2a;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(255,255,255,0.1);
      width: 280px;
      padding: 20px;
    }
    .card h3 {
      margin-bottom: 15px;
      color: #e89cae;
    }
    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 12px;
    }
    .card p {
      color: #ffffff;
      font-size: 14px;
    }

    /* Contact Form Container - Updated for dark theme */
    .contact-form {
      background: #2a2a2a;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(255,255,255,0.1);
      max-width: 900px;
      margin: auto;
    }

    .contact-form h2 {
      color: #e89cae;
      margin-bottom: 20px;
      text-align: center;
    }

    /* Flexbox Layout */
    .contact-form form {
      display: flex;
      gap: 20px;
    }

    /* Left and Right Columns */
    .form-left, .form-right {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    /* Labels */
    .contact-form label {
      font-weight: bold;
      color: #ffffff;
      margin-top: 10px;
    }

    /* Inputs & Textarea */
    .contact-form input,
    .contact-form textarea {
      width: 70%;
      padding: 12px;
      margin-top: 8px;
      margin-bottom: 15px;
      border: 1px solid #555;
      border-radius: 8px;
      font-size: 15px;
      background: #1a1a1a;
      color: #ffffff;
    }

    /* Textarea */
    textarea {
      height: 100%;
      resize: vertical;
    }

    /* Button */
    .contact-form button {
      background: #e89cae;
      color: #fff;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      display: block;
      width: 100%;
      margin-top: 15px;
    }

    .contact-form button:hover {
      background: #f7b8c8;
    }

    /* Success & Error Messages */
    .success { 
      color: #90ee90; 
      text-align: center; 
    }
    .error { 
      color: #ff6b6b; 
      text-align: center; 
    }

    /* 🌸 Updated Gallery for dark theme */
    .photo-gallery {
      text-align: center;
      padding: 60px 20px;
      background: linear-gradient(180deg, #2a1a2a, #1a1a2a);
      color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(255,255,255,0.1);
      max-width: 1200px;
      margin: 50px auto;
    }

    .photo-gallery h2 {
      font-size: 2em;
      margin-bottom: 30px;
      color: #e89cae;
      letter-spacing: 1px;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      justify-items: center;
    }

    .gallery-item {
      background: #2a2a2a;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(255,255,255,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item:hover {
      transform: translateY(-8px);
      box-shadow: 0 6px 20px rgba(232, 156, 174, 0.4);
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* Updated Card Styles for dark theme */
    .account-card {
      background: #2a2a2a;
      border: 2px solid #e89cae;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 6px 12px rgba(255,255,255,0.1);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .account-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 18px rgba(255,255,255,0.15);
    }
    .account-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
      transition: transform 0.4s ease;
    }
    .account-card:hover .account-img {
      transform: scale(1.08);
    }
    .account-btn {
      display: inline-block;
      padding: 8px 16px;
      background: #e89cae;
      color: #fff;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
    }
    .account-btn:hover {
      background: #f7b8c8;
    }
    .social-card {
      position: relative;
      background: #2a2a2a;
      border: 2px solid #e89cae;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 6px 14px rgba(255,255,255,0.1);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width: 100%;
      max-width: 280px;
      padding-bottom: 12px;
    }
    .social-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 22px rgba(255,255,255,0.15);
    }
    .social-img {
      width: 100%;
      height: 420px; 
      object-fit: cover;
      border-bottom: 2px solid #e89cae;
      display: block;
    }
    .social-title {
      color: #e89cae;
      margin-top: 12px;
      font-size: 1.1rem;
      font-weight: 600;
    }

    /* Updated Section Backgrounds */
    .bestfriends-section {
      margin-top: 50px;
      padding: 40px;
      background-color: #1a1a1a;
    }

    .accounts-section {
      margin: 60px auto;
      padding: 40px;
      max-width: 1100px;
      background: #1a1a1a;
      border-radius: 12px;
    }

    .social-section {
      margin: 60px auto;
      padding: 40px;
      max-width: 900px;
      background: #1a1a1a;
      border-radius: 16px;
    }

    .likes-dislikes {
      margin: 60px auto;
      padding: 40px;
      max-width: 900px;
      background: #1a1a1a;
      border-radius: 16px;
    }

    /* Updated Table Styles */
    .likes-dislikes table {
      width: 100%;
      border-collapse: collapse;
      font-size: 1rem;
    }

    .likes-dislikes thead tr {
      background: #2a2a2a;
      color: #e89cae;
      text-align: center;
    }

    .likes-dislikes th {
      padding: 15px;
      border-radius: 8px 0 0 8px;
    }

    .likes-dislikes tbody {
      color: #ffffff;
    }

    .likes-dislikes tr:nth-child(even) {
      background: #2a2a2a;
    }

    .likes-dislikes td {
      padding: 12px 18px;
    }

    /* Updated Footer */
    footer {
      background: #1a1a1a;
      padding: 30px 20px;
      margin-top: 50px;
      border-top: 2px solid #e89cae;
    }
  

  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h1>About Me</h1>
      <p><?php echo $bio; ?></p>
      <a href="projects.php"> View My Work</a>

      <!-- Social Icons -->
      <div class="social-icons">
        <a href="https://github.com/anna-amari" target="_blank" title="GitHub"><i class="fab fa-github"></i></a>
        <a href="mailto:annamarietaduran44@gmail.com?subject=Portfolio Inquiry" target="_blank" title="Email"><i class="fas fa-envelope"></i></a>
        <a href="https://www.linkedin.com/in/yourprofile" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>
    <img src="images/amari.jpeg" alt="Anna Mari Profile">
  </section>

  <!-- Classmates Section -->
  <div style="display: flex; gap: 20px; justify-content: center; margin-top: 30px;">
    <?php while($row = $classmates->fetch_assoc()): ?>
      <div style="width: 250px; text-align: center; border: 2px solid #e89cae; border-radius: 10px; padding: 15px; background: #2a2a2a;">
        <h3 style="color:#e89cae;"><?php echo htmlspecialchars($row['section']); ?></h3>
        <img src="<?php echo htmlspecialchars($row['file_path']); ?>" alt="<?php echo htmlspecialchars($row['section']); ?>" 
             style="width:100%; height:150px; object-fit:cover; border-radius:8px; margin-bottom:10px;">
        <p style="color:#ffffff;"><?php echo htmlspecialchars($row['description']); ?></p>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Best Friends Section -->
  <section class="bestfriends-section">
    <h2 style="text-align:center; color:#e89cae; margin-bottom:30px;">My SHS Bestfriends</h2>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; max-width: 1000px; margin: auto;">
      <?php
        $bestfriends = $conn->query("SELECT * FROM shs_bestfriends");
        if ($bestfriends && $bestfriends->num_rows > 0):
          while($row = $bestfriends->fetch_assoc()):
      ?>
        <div style="background:#2a2a2a; border: 2px solid #e89cae; border-radius: 12px; padding: 20px; text-align:center; box-shadow:0 4px 8px rgba(255,255,255,0.1);">
          <img src="<?php echo htmlspecialchars($row['file_path']); ?>" 
               alt="<?php echo htmlspecialchars($row['name']); ?>" 
               style="width:100%; height:300px; object-fit:cover; border-radius:10px; margin-bottom:15px;">
          <h3 style="color:#e89cae; margin:10px 0;"><?php echo htmlspecialchars($row['name']); ?></h3>
          <p style="color:#ffffff; font-size: 14px;"><?php echo htmlspecialchars($row['description']); ?></p>
        </div>
      <?php 
          endwhile;
        else:
          echo "<p style='text-align:center; color:#ffffff;'>No bestfriends found.</p>";
        endif;
      ?>
    </div>
  </section>

  <!-- College Friends Section -->
  <div style="text-align:center;">
    <h2 style="font-family:'Press Start 2P',cursive;font-size:24px;color:#e89cae;letter-spacing:3px;text-shadow:2px 2px 0 #000,4px 4px 0 #2a2a2a;background:linear-gradient(180deg,#1a1a1a,#2a2a2a);padding:20px;border-radius:12px;display:inline-block;margin-top:40px;width:auto;">
      COLLEGE FRIENDS
    </h2>
  </div>

  <section class="photo-gallery">
    <div class="gallery-grid">
      <?php
        $folder = "images/BFF/";
        $photos = [
          "1.jfif", "5.jfif", "15.jfif",
          "4.jfif", "29.jfif", "12.jfif",
          "28.jfif", "14.jfif", "18.jfif",
          "13.jfif", "19.jfif",  "26.jfif", "37.jfif",
           "20.jfif", "11.jfif", "17.jfif"
        ];

        foreach ($photos as $photo) {
          echo "
            <div class='gallery-item'>
              <img src='{$folder}{$photo}' alt='Gallery Photo'>
            </div>
          ";
        }
      ?>
    </div>
  </section>

  <!-- Tech Accounts Section -->
  <section class="accounts-section">
    <h2 style="text-align:center; color:#e89cae; margin-bottom:30px;">My Tech Accounts</h2>
    
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:25px;">
      
      <!-- GitHub -->
      <div class="account-card">
        <a href="https://github.com/anna-amari" target="_blank" rel="noopener">
          <img src="images/Accounts/Github.png" class="account-img">
        </a>
        <div style="padding:15px;">
          <h3 style="color:#e89cae; margin:10px 0;">GitHub</h3>
          <a href="https://github.com/anna-amari" target="_blank" class="account-btn">Visit GitHub</a>
        </div>
      </div>

      <!-- Codedex -->
      <div class="account-card">
        <a href="https://www.codedex.io/profile/your-username" target="_blank" rel="noopener">
          <img src="images/Accounts/codedexProfile.jfif" alt="Codedex Profile Screenshot" class="account-img">
        </a>
        <div style="padding:15px;">
          <h3 style="color:#e89cae; margin:10px 0;">Codedex</h3>
          <a href="https://www.codedex.io/@aAmari" target="_blank" class="account-btn">Visit Codedex</a>
        </div>
      </div>

      <!-- TryHackMe -->
      <div class="account-card">
        <a href="https://tryhackme.com/p/your-username" target="_blank" rel="noopener">
          <img src="images/Accounts/tryHackMe.jfif" alt="TryHackMe Profile Screenshot" class="account-img">
        </a>
        <div style="padding:15px;">
          <h3 style="color:#e89cae; margin:10px 0;">TryHackMe</h3>
          <a href="https://tryhackme.com/p/anntaduran" target="_blank" class="account-btn">Visit TryHackMe</a>
        </div>
      </div>

    </div>
  </section>

  <!-- Social Accounts Section -->
  <section class="social-section">
    <h2 style="text-align:center; color:#e89cae; margin-bottom:35px;">My Social Accounts</h2>
    
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:30px; justify-items:center;">
      
      <!-- Instagram -->
      <div class="social-card">
        <img src="images/Accounts/insta.jfif" alt="Instagram Profile Screenshot" class="social-img">
        <h3 class="social-title">Instagram</h3>
      </div>

      <!-- Facebook -->
      <div class="social-card">
        <img src="images/Accounts/fb.jfif" alt="Facebook Profile Screenshot" class="social-img">
        <h3 class="social-title">Facebook</h3>
      </div>

      <!-- TikTok -->
      <div class="social-card">
        <img src="images/Accounts/tiktok.jfif" alt="TikTok Profile Screenshot" class="social-img">
        <h3 class="social-title">TikTok</h3>
      </div>

    </div>
  </section>

  <!-- Likes & Dislikes Section -->
  <section class="likes-dislikes">
    <h2 style="text-align:center; color:#e89cae; margin-bottom:35px;">✨ Likes & Dislikes ✨</h2>

    <table>
      <thead>
        <tr>
          <th>Likes </th>
          <th>Dislikes </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Writing poems & novels</td>
          <td>❌ People with "parking lot ego"</td>
        </tr>
        <tr>
          <td>My humor (between dark & light)</td>
          <td>❌ People who can't understand "NO"</td>
        </tr>
        <tr>
          <td>Watching BL (esp. Japanese)</td>
          <td>❌ SKs corrupt in the making</td>
        </tr>
        <tr>
          <td>I love angst story</td>
          <td>❌ Doesn't like if it's too painful</td>
        </tr>
        <tr>
          <td>INFJ girlie ✨</td>
          <td>❌ Philippine government</td>
        </tr>
        <tr>
          <td>Loving solitude most of the time</td>
          <td>❌ The marching noise I hear in the night</td>
        </tr>
        <tr>
          <td>Light pink is my anthem color 🎀</td>
          <td>❌ People who finds joy over someone's misery</td>
        </tr>
        <tr>
          <td>Traveling to many destinations</td>
          <td>❌ Lack of financial capability</td>
        </tr>
        <tr>
          <td>Ghibli movies (10/10 amazing!)</td>
          <td>❌ Too much selflessness</td>
        </tr>
        <tr>
          <td>Gen-Z fear: pregnancy & being unsuccessful</td>
          <td>❌ My father side of a family</td>
        </tr>
        <tr>
          <td>Ribbon and Tulip Emoticon</td>
          <td>❌ Losing connection to ones I love dearly</td>
        </tr>
        <tr>
          <td>I believe in supernatural beings</td>
          <td>❌ Unable to see them</td>
        </tr>
        <tr>
          <td>My body letting me to do things I want</td>
          <td>❌ My aching back</td>
        </tr>
      </tbody>
    </table>
  </section>

  <!-- Contact Form Section -->
  <h1 style="color:#e89cae; text-align:center; background-color:#2a2a2a; padding:10px; border-radius:8px;">REACH ME</h1>

  <div class="contact-form">
    <?php echo $formMessage; ?>
    <form action="" method="POST">
      <div class="form-left">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-right">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="12" required></textarea>
        
        <button type="submit">Send Message</button>
      </div>
    </form>
  </div>

  <footer>
    <div style="max-width:1100px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; text-align:center;">
      <div style="flex:1; min-width:220px; margin-bottom:15px;">
        <p style="color:#ffffff; font-size:14px;">© 2025 Amari</p>
      </div>
    </div>
  </footer>
</body>
</html>