<?php
include 'db.php'; // Database connection file
session_start(); // Add this at the top

// Folder for uploaded images - match the structure from your database
$uploadDir = 'images/location/';

// Create images directory if it doesn't exist with proper permissions
if (!file_exists($uploadDir)) {
    if (!mkdir($uploadDir, 0755, true)) {
        $_SESSION['error'] = "Failed to create directory: " . $uploadDir;
    }
}

/* ------------------ ADD VISITED PLACE ------------------ */
if (isset($_POST['add_place'])) {
    $place_name = trim($_POST['place_name']);
    
    // Check if file was uploaded
    if (!isset($_FILES['place_image']) || $_FILES['place_image']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Please select a valid image file.";
    } else {
        $fileName = basename($_FILES['place_image']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'jfif'];
        
        // Validate file type
        if (!in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['error'] = "Invalid file type. Allowed: JPG, JPEG, PNG, GIF, WebP, JFIF";
        } else {
            // Generate unique filename to avoid conflicts
            $uniqueName = uniqid() . '_' . time() . '.' . $fileExtension;
            $targetPath = $uploadDir . $uniqueName;
            
            // Store the full path in database to match your existing structure
            $dbImagePath = 'images/location/' . $uniqueName;
            
            if (move_uploaded_file($_FILES['place_image']['tmp_name'], $targetPath)) {
                $stmt = $conn->prepare("INSERT INTO visited_places (place_name, image) VALUES (?, ?)");
                $stmt->bind_param("ss", $place_name, $dbImagePath);
                if ($stmt->execute()) {
                    $_SESSION['message'] = "Place added successfully!";
                } else {
                    $_SESSION['error'] = "Database error: " . $stmt->error;
                    // Clean up the uploaded file if database insert failed
                    if (file_exists($targetPath)) {
                        unlink($targetPath);
                    }
                }
            } else {
                $_SESSION['error'] = "Failed to upload file. Check folder permissions.";
            }
        }
    }
}

/* ------------------ ADD DREAM DESTINATION ------------------ */
if (isset($_POST['add_destination'])) {
    $destination_name = trim($_POST['destination_name']);
    
    // Check if file was uploaded
    if (!isset($_FILES['destination_image']) || $_FILES['destination_image']['error'] !== UPLOAD_ERR_OK) {
        $_SESSION['error'] = "Please select a valid image file.";
    } else {
        $fileName = basename($_FILES['destination_image']['name']);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'jfif'];
        
        // Validate file type
        if (!in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['error'] = "Invalid file type. Allowed: JPG, JPEG, PNG, GIF, WebP, JFIF";
        } else {
            // Generate unique filename to avoid conflicts
            $uniqueName = uniqid() . '_' . time() . '.' . $fileExtension;
            $targetPath = $uploadDir . $uniqueName;
            
            // Store appropriate path in database
            $dbImagePath = 'images/location/' . $uniqueName;

            if (move_uploaded_file($_FILES['destination_image']['tmp_name'], $targetPath)) {
                $stmt = $conn->prepare("INSERT INTO dream_destinations (destination_name, image) VALUES (?, ?)");
                $stmt->bind_param("ss", $destination_name, $dbImagePath);
                if ($stmt->execute()) {
                    $_SESSION['message'] = "Dream destination added successfully!";
                } else {
                    $_SESSION['error'] = "Database error: " . $stmt->error;
                    // Clean up the uploaded file if database insert failed
                    if (file_exists($targetPath)) {
                        unlink($targetPath);
                    }
                }
            } else {
                $_SESSION['error'] = "Failed to upload file. Check folder permissions.";
            }
        }
    }
}

/* ------------------ DELETE VISITED PLACE ------------------ */
if (isset($_POST['delete_place'])) {
    $id = intval($_POST['id']);
    $result = $conn->query("SELECT image FROM visited_places WHERE id=$id");
    if ($row = $result->fetch_assoc()) {
        // Extract filename from the stored path
        $imagePath = basename($row['image']);
        $fullPath = $uploadDir . $imagePath;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
    if ($conn->query("DELETE FROM visited_places WHERE id=$id")) {
        $_SESSION['message'] = "Place deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting place: " . $conn->error;
    }
}

/* ------------------ DELETE DREAM DESTINATION ------------------ */
if (isset($_POST['delete_destination'])) {
    $id = intval($_POST['id']);
    $result = $conn->query("SELECT image FROM dream_destinations WHERE id=$id");
    if ($row = $result->fetch_assoc()) {
        // Handle both URLs and local files
        if (!filter_var($row['image'], FILTER_VALIDATE_URL)) {
            // It's a local file
            $imagePath = basename($row['image']);
            $fullPath = $uploadDir . $imagePath;
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }
    }
    if ($conn->query("DELETE FROM dream_destinations WHERE id=$id")) {
        $_SESSION['message'] = "Dream destination deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting destination: " . $conn->error;
    }
}

/* ------------------ FETCH DATA ------------------ */
$placesResult = $conn->query("SELECT * FROM visited_places ORDER BY id ASC");
$destinationsResult = $conn->query("SELECT * FROM dream_destinations ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Places & Destinations</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #0d0d0d;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    position: relative;
  }

  /* Back Button Styles */
  .back-btn {
    position: fixed;
    top: 20px;
    left: 20px;
    background: #f2a6c1;
    color: #111;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 8px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    z-index: 1000;
    transition: all 0.3s ease;
  }

  .back-btn:hover {
    background: #e89cae;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(232, 156, 174, 0.3);
  }

  .admin-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    position: relative;
  }

  .page-header {
    text-align: center;
    margin-bottom: 40px;
    padding-top: 20px;
  }

  .page-header h1 {
    font-size: 2.5rem;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 10px;
  }

  .page-header p {
    color: #94a3b8;
    font-size: 1.1rem;
  }

  .section {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
  }

  .section-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e89cae;
  }

  .section-header h2 {
    color: #ffffff;
    font-size: 1.8rem;
    margin: 0;
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .section-header i {
    color: #e89cae;
    font-size: 1.5rem;
  }

  .form-container {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 25px;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 8px;
    color: #e89cae;
    font-weight: 500;
  }

  .form-control {
    width: 100%;
    padding: 12px 15px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #fff;
    font-size: 1rem;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    outline: none;
    border-color: #e89cae;
    box-shadow: 0 0 0 2px rgba(232, 156, 174, 0.2);
  }

  .btn {
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    font-size: 1rem;
  }

  .btn-primary {
    background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
    color: white;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(232, 156, 174, 0.3);
  }

  .btn-delete {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }

  .btn-delete:hover {
    background: rgba(239, 68, 68, 0.3);
    transform: translateY(-1px);
  }

  .grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

  .card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 15px;
    transition: all 0.3s ease;
    text-align: center;
  }

  .card:hover {
    transform: translateY(-5px);
    border-color: rgba(232, 156, 174, 0.3);
    box-shadow: 0 10px 25px rgba(232, 156, 174, 0.15);
  }

  .card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }

  .card h3 {
    color: #ffffff;
    font-size: 1.1rem;
    margin-bottom: 15px;
    font-weight: 600;
  }

  .empty-state {
    text-align: center;
    padding: 40px 20px;
    color: #94a3b8;
    font-style: italic;
    grid-column: 1 / -1;
  }

  .empty-state i {
    font-size: 3rem;
    margin-bottom: 15px;
    color: #e89cae;
    opacity: 0.5;
  }

  @media (max-width: 768px) {
    .admin-container {
      padding: 15px;
    }
    
    .section {
      padding: 20px;
    }
    
    .grid {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 15px;
    }
    
    .form-container {
      padding: 20px;
    }
    
    .back-btn {
      position: relative;
      top: fixed;
      margin-left:50px;
      margin-bottom: 20px;
      align-self: flex-start;
    }
  }

  @media (max-width: 480px) {
    .grid {
      grid-template-columns: 1fr;
    }
    
    .section-header {
      flex-direction: column;
      text-align: center;
      gap: 10px;
    }
  }
</style>
</head>
<body>

<!-- Back Button -->
<a href="dashboard.php" class="back-btn">
  <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
</a>

<div class="admin-container">
  <!-- Page Header -->
  <div class="page-header">
    <h1>Manage Places & Destinations</h1>
    <p>Add and manage your visited places and dream destinations</p>
  </div>

  <!-- ===================== VISITED PLACES ===================== -->
  <div class="section">
    <div class="section-header">
      <i class="fa-solid fa-location-dot"></i>
      <h2>Visited Places</h2>
    </div>

    <!-- Add Place Form -->
    <div class="form-container">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="place_name"><i class="fas fa-map-marker-alt"></i> Place Name</label>
          <input type="text" id="place_name" name="place_name" class="form-control" placeholder="Enter place name" required>
        </div>
        <div class="form-group">
          <label for="place_image"><i class="fas fa-image"></i> Place Image</label>
          <input type="file" id="place_image" name="place_image" class="form-control" accept="image/*" required>
          <small style="color: #94a3b8; font-size: 0.85rem;">Allowed: JPG, JPEG, PNG, GIF, WebP, JFIF | Max: 5MB</small>
        </div>
        <button type="submit" name="add_place" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Add Visited Place
        </button>
      </form>
    </div>

    <!-- Display Visited Places -->
    <div class="grid">
      <?php if ($placesResult->num_rows > 0): ?>
        <?php while ($row = $placesResult->fetch_assoc()): ?>
          <div class="card">
            <?php 
            // Extract filename from stored path and check if it exists
            $imageFileName = basename($row['image']);
            $imagePath = $uploadDir . $imageFileName;
            $imageExists = file_exists($imagePath);
            ?>
            <img src="<?= $imageExists ? $imagePath : 'https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Not+Found'; ?>" 
                 alt="<?= htmlspecialchars($row['place_name']); ?>"
                 onerror="this.src='https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Error'"
                 style="<?= !$imageExists ? 'border: 2px dashed #ef4444;' : '' ?>">
            <h3><?= htmlspecialchars($row['place_name']); ?></h3>
            <?php if (!$imageExists): ?>
              <small style="color: #ef4444; font-size: 0.8rem;">Image file missing</small>
            <?php endif; ?>
            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this place?');">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button type="submit" name="delete_place" class="btn btn-delete">
                <i class="fa-solid fa-trash"></i> Delete
              </button>
            </form>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="empty-state">
          <i class="fas fa-map"></i>
          <h3>No Visited Places Yet</h3>
          <p>Add your first visited place using the form above.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- ===================== DREAM DESTINATIONS ===================== -->
  <div class="section">
    <div class="section-header">
      <i class="fa-solid fa-globe"></i>
      <h2>Dream Destinations</h2>
    </div>

    <!-- Add Destination Form -->
    <div class="form-container">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="destination_name"><i class="fas fa-map-pin"></i> Destination Name</label>
          <input type="text" id="destination_name" name="destination_name" class="form-control" placeholder="Enter destination name" required>
        </div>
        <div class="form-group">
          <label for="destination_image"><i class="fas fa-image"></i> Destination Image</label>
          <input type="file" id="destination_image" name="destination_image" class="form-control" accept="image/*" required>
          <small style="color: #94a3b8; font-size: 0.85rem;">Allowed: JPG, JPEG, PNG, GIF, WebP, JFIF | Max: 5MB</small>
        </div>
        <button type="submit" name="add_destination" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Add Dream Destination
        </button>
      </form>
    </div>

    <!-- Display Dream Destinations -->
    <div class="grid">
      <?php if ($destinationsResult->num_rows > 0): ?>
        <?php while ($row = $destinationsResult->fetch_assoc()): ?>
          <div class="card">
            <?php 
            // Check if it's a URL or local file
            if (filter_var($row['image'], FILTER_VALIDATE_URL)) {
              // It's a URL
              $imageSrc = $row['image'];
              $imageExists = true;
            } else {
              // It's a local file
              $imageFileName = basename($row['image']);
              $imagePath = $uploadDir . $imageFileName;
              $imageExists = file_exists($imagePath);
              $imageSrc = $imageExists ? $imagePath : 'https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Not+Found';
            }
            ?>
            <img src="<?= $imageSrc ?>" 
                 alt="<?= htmlspecialchars($row['destination_name']); ?>"
                 onerror="this.src='https://via.placeholder.com/300x200/1a1a1a/666666?text=Image+Error'"
                 style="<?= !$imageExists ? 'border: 2px dashed #ef4444;' : '' ?>">
            <h3><?= htmlspecialchars($row['destination_name']); ?></h3>
            <?php if (!$imageExists && !filter_var($row['image'], FILTER_VALIDATE_URL)): ?>
              <small style="color: #ef4444; font-size: 0.8rem;">Image file missing</small>
            <?php endif; ?>
            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this destination?');">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button type="submit" name="delete_destination" class="btn btn-delete">
                <i class="fa-solid fa-trash"></i> Delete
              </button>
            </form>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="empty-state">
          <i class="fas fa-sun"></i>
          <h3>No Dream Destinations Yet</h3>
          <p>Add your first dream destination using the form above.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php mysqli_close($conn); ?>
</body>
</html>