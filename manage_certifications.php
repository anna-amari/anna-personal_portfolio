<?php
include 'db.php';
session_start();

// Ensure uploads directory exists
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // === ADD CERTIFICATION ===
    if (isset($_POST['add_certification'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $display_order = intval($_POST['display_order']);
        $targetDir = $uploadDir;
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'jfif');

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $insertQuery = "INSERT INTO certifications (title, image_url, display_order) 
                                VALUES ('$title', '$targetFilePath', '$display_order')";
                mysqli_query($conn, $insertQuery);
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type.');</script>";
        }

    // === UPDATE CERTIFICATION ===
    } elseif (isset($_POST['update_certification'])) {
        $id = intval($_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $display_order = intval($_POST['display_order']);
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        $updateQuery = "UPDATE certifications SET title='$title', display_order='$display_order', is_active='$is_active'";

        if (!empty($_FILES["image"]["name"])) {
            $fileName = time() . "_" . basename($_FILES["image"]["name"]);
            $targetFilePath = $uploadDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'jfif');
            if (in_array($fileType, $allowedTypes)) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
                $updateQuery .= ", image_url='$targetFilePath'";
            }
        }

        $updateQuery .= " WHERE id=$id";
        mysqli_query($conn, $updateQuery);

    // === DELETE CERTIFICATION ===
    } elseif (isset($_POST['confirm_delete'])) {
        $id = intval($_POST['id']);
        $deleteQuery = "DELETE FROM certifications WHERE id=$id";
        mysqli_query($conn, $deleteQuery);
    }
}

$certQuery = "SELECT * FROM certifications ORDER BY display_order ASC, created_at DESC";
$certResult = mysqli_query($conn, $certQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Certifications</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
  *{box-sizing:border-box;font-family:'Poppins',sans-serif;}
  body{margin:0;background:#0f0f0f;color:#fff;}
  .admin-container{max-width:1200px;margin:60px auto;background:linear-gradient(145deg,#1a1a1a,#111);
    padding:40px;border-radius:15px;box-shadow:0 0 20px rgba(255,105,180,0.2);position:relative;}
  .back-btn{position:absolute;top:20px;left:20px;background:#f2a6c1;color:#111;text-decoration:none;
    padding:10px 15px;border-radius:8px;font-weight:600;display:flex;align-items:center;gap:8px;}
  h1{text-align:center;color:#f2a6c1;margin-bottom:40px;}
  h2{color:#ffbed3;margin-top:40px;border-left:5px solid #f2a6c1;padding-left:10px;}
  .add-form{background:#191919;padding:20px;border-radius:10px;}
  .form-group{margin-bottom:15px;}
  .form-group label{display:block;color:#f9a8c4;margin-bottom:6px;}
  .form-group input{width:100%;padding:10px;border-radius:8px;border:1px solid #333;background:#222;color:white;}
  .form-group input[type=file]{background:#1c1c1c;padding:8px;}
  .btn{padding:10px 20px;border:none;border-radius:6px;cursor:pointer;margin:5px;font-weight:600;}
  .btn-primary{background:#f2a6c1;color:#111;}
  .btn-edit{background:#60a5fa;color:white;}
  .btn-delete{background:#ef4444;color:white;}
  .cert-grid-admin{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:25px;margin-top:20px;}
  .cert-card-admin{background:#1b1b1b;padding:20px;border-radius:10px;border:1px solid #333;position:relative;}
  .cert-image-admin{width:100%;height:180px;border-radius:8px;overflow:hidden;margin-bottom:15px;}
  .cert-image-admin img{width:100%;height:100%;object-fit:cover;}
  .update-form{display:none;background:#141414;margin-top:15px;padding:15px;border-radius:10px;border:1px solid #333;}
  .fade{animation:fadeIn 0.3s ease;}
  @keyframes fadeIn{from{opacity:0;transform:translateY(-5px);}to{opacity:1;transform:translateY(0);}}
  .delete-popup{display:none;position:fixed;top:0;left:0;width:100%;height:100%;
    background:rgba(0,0,0,0.7);justify-content:center;align-items:center;z-index:999;}
  .popup-content{background:#1b1b1b;padding:30px;border-radius:12px;text-align:center;box-shadow:0 0 15px rgba(255,182,193,0.3);}
  .popup-content button{margin:10px;padding:10px 20px;border:none;border-radius:8px;font-weight:600;cursor:pointer;}
  .btn-cancel{background:#555;color:white;}
  .btn-confirm{background:#ef4444;color:white;}
</style>
</head>
<body>


<div class="admin-container">
  <a href="dashboard.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
  <h1><i class="fa-solid fa-certificate"></i> Manage Certifications</h1>

  <!-- Add Certification -->
  <div class="add-form">
    <h2><i class="fa-solid fa-plus-circle"></i> Add New Certification</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group"><label>Title:</label><input type="text" name="title" required></div>
      <div class="form-group"><label>Display Order:</label><input type="number" name="display_order" value="0"></div>
      <div class="form-group"><label>Upload Image:</label><input type="file" name="image" accept="image/*" required></div>
      <button type="submit" name="add_certification" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Certification</button>
    </form>
  </div>

  <!-- Certifications -->
  <div class="certifications-list">
    <h2><i class="fa-solid fa-list"></i> Existing Certifications</h2>
    <div class="cert-grid-admin">
      <?php while ($cert = mysqli_fetch_assoc($certResult)): ?>
      <div class="cert-card-admin" id="card-<?= $cert['id'] ?>">
        <div class="cert-image-admin">
          <img src="<?= htmlspecialchars($cert['image_url']) ?>" alt="<?= htmlspecialchars($cert['title']) ?>">
        </div>
        <h3><?= htmlspecialchars($cert['title']) ?></h3>
        <p>Order: <?= $cert['display_order'] ?> | 
          Status: <?= $cert['is_active'] ? '<span style="color:#4ade80;">Active</span>' : '<span style="color:#f87171;">Inactive</span>' ?>
        </p>

        <button class="btn btn-edit" onclick="toggleUpdate(<?= $cert['id'] ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
        <button class="btn btn-delete" onclick="openDeletePopup(<?= $cert['id'] ?>)"><i class="fa-solid fa-trash"></i> Delete</button>

        <!-- Hidden Update Form -->
        <div class="update-form fade" id="updateForm-<?= $cert['id'] ?>">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $cert['id'] ?>">
            <div class="form-group"><label>Title:</label>
              <input type="text" name="title" value="<?= htmlspecialchars($cert['title']) ?>" required>
            </div>
            <div class="form-group"><label>Display Order:</label>
              <input type="number" name="display_order" value="<?= $cert['display_order'] ?>">
            </div>
            <div class="form-group"><label>Update Image:</label>
              <input type="file" name="image" accept="image/*">
            </div>
            <div class="form-group"><label><input type="checkbox" name="is_active" <?= $cert['is_active'] ? 'checked' : '' ?>> Active</label></div>
            <button type="submit" name="update_certification" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Changes</button>
          </form>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<!-- Delete Confirmation Popup -->
<div class="delete-popup" id="deletePopup">
  <div class="popup-content">
    <h3>Are you sure you want to delete this certification?</h3>
    <form method="POST">
      <input type="hidden" name="id" id="deleteId">
      <button type="button" class="btn-cancel" onclick="closeDeletePopup()">Cancel</button>
      <button type="submit" name="confirm_delete" class="btn-confirm">Delete</button>
    </form>
  </div>
</div>

<script>
function toggleUpdate(id){
  const form = document.getElementById('updateForm-'+id);
  form.style.display = form.style.display === 'block' ? 'none' : 'block';
}
function openDeletePopup(id){
  document.getElementById('deletePopup').style.display='flex';
  document.getElementById('deleteId').value=id;
}
function closeDeletePopup(){
  document.getElementById('deletePopup').style.display='none';
}
</script>

</body>
</html>

<?php mysqli_close($conn); ?>
