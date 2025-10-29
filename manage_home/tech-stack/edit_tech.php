<?php
// edit_tech.php
session_start();
include 'db.php';

// Fetch existing data if ID is provided
$tech = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM tech_stack WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $tech = mysqli_fetch_assoc($result);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $tech_name = mysqli_real_escape_string($conn, $_POST['tech_name']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    
    $query = "UPDATE tech_stack 
              SET tech_name = '$tech_name', image_url = '$image_url', alt_text = '$alt_text' 
              WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Technology updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating technology: " . mysqli_error($conn);
    }
    
    header("Location: dashboard.php");
    exit();
}

if (!$tech) {
    $_SESSION['error'] = "Technology not found!";
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Technology</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background-color: #0d0d0d;
      color: #f0f0f0;
      padding: 20px;
    }
    
    .container {
      max-width: 600px;
      margin: 50px auto;
      background: #1a1a1a;
      padding: 30px;
      border-radius: 10px;
    }
    
    h1 {
      color: #ffcc00;
      margin-bottom: 20px;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      color: #ffcc00;
    }
    
    input {
      width: 100%;
      padding: 10px;
      background: #222;
      border: 1px solid #333;
      border-radius: 5px;
      color: #fff;
      box-sizing: border-box;
    }
    
    .btn {
      background-color: #ffcc00;
      color: #000;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-weight: 600;
      cursor: pointer;
      margin-right: 10px;
    }
    
    .btn:hover {
      background-color: #ffd633;
    }
    
    .btn-secondary {
      background-color: #666;
      color: #fff;
    }
    
    .message {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
    }
    
    .success {
      background-color: #2d5016;
      color: #90ee90;
    }
    
    .error {
      background-color: #501616;
      color: #ff6b6b;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Edit Technology</h1>
    
    <?php if (isset($_SESSION['message'])): ?>
      <div class="message success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
      <div class="message error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    
    <form method="POST">
      <input type="hidden" name="id" value="<?= $tech['id']; ?>">
      
      <div class="form-group">
        <label for="tech_name">Technology Name</label>
        <input type="text" id="tech_name" name="tech_name" value="<?= htmlspecialchars($tech['tech_name']); ?>" required>
      </div>
      
      <div class="form-group">
        <label for="image_url">Image URL</label>
        <input type="url" id="image_url" name="image_url" value="<?= htmlspecialchars($tech['image_url']); ?>" required>
      </div>
      
      <div class="form-group">
        <label for="alt_text">Alt Text</label>
        <input type="text" id="alt_text" name="alt_text" value="<?= htmlspecialchars($tech['alt_text']); ?>">
      </div>
      
      <button type="submit" class="btn">Update Technology</button>
      <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>