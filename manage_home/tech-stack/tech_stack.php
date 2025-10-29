<?php
// tech_stack.php
session_start();
include 'db.php';

// Fetch all technologies
$query = "SELECT * FROM tech_stack ORDER BY tech_name ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tech Stack Management</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #000000;
      color: #ffffff;
      display: flex;
      min-height: 100vh;
      line-height: 1.6;
    }

    .sidebar {
      width: 240px;
      background-color: #111111;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      box-shadow: 2px 0 10px rgba(255,255,255,0.1);
      position: fixed;
      height: 100%;
      border-right: 1px solid #333333;
    }

    .sidebar h2 {
      text-align: center;
      color: #ffffff;
      margin-bottom: 25px;
      font-size: 1.4rem;
      font-weight: 600;
      padding-bottom: 15px;
      border-bottom: 2px solid #ffffff;
    }

    .sidebar a {
      color: #cccccc;
      text-decoration: none;
      padding: 12px 15px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .sidebar a:hover {
      background-color: #ffffff;
      color: #000000;
      transform: translateX(5px);
    }

    .sidebar a.active {
      background-color: #ffffff;
      color: #000000;
      font-weight: 600;
    }

    .sidebar hr {
      border: none;
      border-top: 1px solid #333333;
      margin: 15px 0;
    }

    .main {
      margin-left: 240px;
      padding: 30px;
      flex-grow: 1;
      background-color: #000000;
    }

    .main h1 {
      font-weight: 600;
      margin-bottom: 25px;
      color: #ffffff;
      font-size: 2rem;
    }

    .section {
      background-color: #111111;
      padding: 25px;
      border-radius: 10px;
      margin-bottom: 25px;
      box-shadow: 0 2px 10px rgba(255,255,255,0.05);
      border: 1px solid #333333;
    }

    .section h2 {
      color: #ffffff;
      margin-bottom: 20px;
      font-size: 1.4rem;
      font-weight: 600;
      padding-bottom: 10px;
      border-bottom: 2px solid #ffffff;
    }

    .stack-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }

    .badge {
      background-color: #1a1a1a;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      width: 140px;
      box-shadow: 0 3px 12px rgba(255,255,255,0.05);
      transition: all 0.3s ease;
      border: 1px solid #333333;
    }

    .badge:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 20px rgba(255,255,255,0.1);
      border-color: #555555;
    }

    .badge img {
      border-radius: 8px;
      margin-bottom: 12px;
      border: 1px solid #333333;
    }

    .badge span {
      display: block;
      color: #ffffff;
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 0.9rem;
    }

    .badge div a {
      font-size: 0.8rem;
      color: #cccccc;
      text-decoration: none;
      transition: color 0.3s ease;
      font-weight: 500;
    }

    .badge div a:hover {
      color: #ffffff;
    }

    form {
      margin-top: 25px;
      background: #1a1a1a;
      padding: 25px;
      border-radius: 8px;
      border: 1px solid #333333;
    }

    input, button {
      padding: 12px;
      margin: 8px;
      border: none;
      border-radius: 6px;
      font-family: 'Poppins', sans-serif;
    }

    input {
      background: #000000;
      color: #ffffff;
      border: 1px solid #333333;
      width: calc(25% - 20px);
      min-width: 200px;
      transition: border-color 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: #ffffff;
    }

    input::placeholder {
      color: #666666;
    }

    form button {
      background: #ffffff;
      color: #000000;
      font-weight: 600;
      padding: 12px 25px;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    form button:hover {
      background: #e0e0e0;
      transform: translateY(-2px);
    }

    .message {
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 25px;
      font-weight: 500;
      border: 1px solid transparent;
    }

    .message.success {
      background-color: #1a331a;
      color: #90ee90;
      border-color: #2d5016;
    }

    .message.error {
      background-color: #331a1a;
      color: #ff6b6b;
      border-color: #501616;
    }

    .empty-state {
      color: #666666;
      font-style: italic;
      text-align: center;
      padding: 40px;
      background: #1a1a1a;
      border-radius: 8px;
      border: 2px dashed #333333;
      width: 100%;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 200px;
        padding: 15px;
      }
      
      .main {
        margin-left: 200px;
        padding: 20px;
      }
      
      input {
        width: calc(50% - 20px);
      }
    }

    @media (max-width: 480px) {
      body {
        flex-direction: column;
      }
      
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }
      
      .main {
        margin-left: 0;
      }
      
      input {
        width: 100%;
        margin: 8px 0;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2><i class="fas fa-user-circle"></i> Dashboard</h2>
    <a href="dashboard.php"><i class="fas fa-home"></i> Overview</a>
    <a href="projects.php"><i class="fas fa-briefcase"></i> Projects</a>
    <a href="places.php"><i class="fas fa-map-marker-alt"></i> Places</a>
    <a href="education.php"><i class="fas fa-graduation-cap"></i> Education</a>
    <a href="about.php"><i class="fas fa-user"></i> About Me</a>
    <a href="tech-stack/tech_stack.php" class="active"><i class="fas fa-layer-group"></i> Tech Stack</a>
    <a href="index.php"><i class="fas fa-globe"></i> View Portfolio</a>
    <hr>
    <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <!-- Message Display Section -->
    <?php if (isset($_SESSION['message'])): ?>
      <div class="message success">
        <?= $_SESSION['message']; unset($_SESSION['message']); ?>
      </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
      <div class="message error">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>
    
    <h1>Tech Stack Management</h1>

    <!-- Tech Stack Section -->
    <div class="section">
      <h2>Current Technologies</h2>
      <div class="stack-grid">
        <?php 
        if (mysqli_num_rows($result) > 0): 
          while ($row = mysqli_fetch_assoc($result)): 
        ?>
          <div class="badge">
            <img src="<?= $row['image_url']; ?>" alt="<?= htmlspecialchars($row['alt_text']); ?>" style="width:60px;height:60px;">
            <span><?= htmlspecialchars($row['tech_name']); ?></span>
            <div>
              <a href="edit_tech.php?id=<?= $row['id']; ?>">✏️ Edit</a> |
              <a href="delete_tech.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete <?= htmlspecialchars($row['tech_name']); ?>?');">🗑️ Delete</a>
            </div>
          </div>
        <?php 
          endwhile; 
        else: 
        ?>
          <div class="empty-state">
            <i class="fas fa-layer-group" style="font-size: 48px; margin-bottom: 15px; display: block;"></i>
            No technologies added yet. Add your first tech stack item below!
          </div>
        <?php endif; ?>
      </div>

      <!-- Add New Tech -->
      <form action="add_tech.php" method="POST">
        <h3 style="color: #ffffff; margin-bottom: 15px;">Add New Technology</h3>
        <input type="text" name="tech_name" placeholder="Technology Name (e.g., JavaScript)" required>
        <input type="url" name="image_url" placeholder="Image URL (e.g., https://example.com/js.png)" required>
        <input type="text" name="alt_text" placeholder="Alt Text (optional)">
        <button type="submit">Add Technology</button>
      </form>
    </div>
  </div>

</body>
</html>