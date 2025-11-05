<?php
include 'db.php';
session_start();

/* ============================================================
   TECH STACK CRUD
============================================================ */
$uploadDirTech = "uploads/tech/";
if (!is_dir($uploadDirTech)) mkdir($uploadDirTech, 0777, true);

// CREATE
if (isset($_POST['add_tech'])) {
    $tech_name = mysqli_real_escape_string($conn, $_POST['tech_name']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $fileName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFilePath = $uploadDirTech . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg','jpeg','png','gif','svg','webp','jfif'];
    if (in_array($fileType, $allowedTypes)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        mysqli_query($conn, "INSERT INTO tech_stack (tech_name, alt_text, image_url)
                             VALUES ('$tech_name','$alt_text','$targetFilePath')");
    }
}

// UPDATE
if (isset($_POST['update_tech'])) {
    $id = intval($_POST['id']);
    $tech_name = mysqli_real_escape_string($conn, $_POST['tech_name']);
    $alt_text = mysqli_real_escape_string($conn, $_POST['alt_text']);
    $updateQuery = "UPDATE tech_stack SET tech_name='$tech_name', alt_text='$alt_text'";
    if (!empty($_FILES["image"]["name"])) {
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $uploadDirTech . $fileName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        $updateQuery .= ", image_url='$targetFilePath'";
    }
    $updateQuery .= " WHERE id=$id";
    mysqli_query($conn, $updateQuery);
}

// DELETE
if (isset($_POST['confirm_delete_tech'])) {
    $id = intval($_POST['id']);
    mysqli_query($conn, "DELETE FROM tech_stack WHERE id=$id");
}

// READ
$techResult = mysqli_query($conn, "SELECT * FROM tech_stack ORDER BY id ASC");


/* ============================================================
   COLLEGE FRIENDS CRUD
============================================================ */$uploadDirFriends = "images/BFF/";
if (!is_dir($uploadDirFriends)) {
    mkdir($uploadDirFriends, 0777, true);
}

// === CREATE ===
if (isset($_POST['add_friend'])) {
    $fileName = time() . "_" . basename($_FILES["friend_image"]["name"]);
    $targetFilePath = $uploadDirFriends . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg','jpeg','png','gif','svg','webp','jfif'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["friend_image"]["tmp_name"], $targetFilePath)) {
            // Save only the file name in DB, not the full path
            $query = "INSERT INTO college_friends (image) VALUES ('$fileName')";
            mysqli_query($conn, $query);
        }
    }
}

// === DELETE ===
if (isset($_POST['confirm_delete_friend'])) {
    $id = intval($_POST['id']);
    $getImage = mysqli_query($conn, "SELECT image FROM college_friends WHERE id=$id");
    if ($getImage && mysqli_num_rows($getImage) > 0) {
        $row = mysqli_fetch_assoc($getImage);
        $imagePath = $uploadDirFriends . $row['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // delete the actual image file
        }
    }
    mysqli_query($conn, "DELETE FROM college_friends WHERE id=$id");
}

// === READ ===
$friendsResult = mysqli_query($conn, "SELECT * FROM college_friends ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Portfolio</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*{box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{margin:0;background:#0f0f0f;color:#fff;}
.container{max-width:1200px;margin:60px auto;background:#1a1a1a;padding:40px;border-radius:15px;
  box-shadow:0 0 20px rgba(255,105,180,0.2);position:relative;}
.back-btn{position:absolute;top:20px;left:20px;background:#f2a6c1;color:#111;text-decoration:none;
  padding:10px 15px;border-radius:8px;font-weight:600;display:flex;align-items:center;gap:8px;}
h1{text-align:center;color:#f2a6c1;margin-bottom:30px;}
h2{color:#f9a8c4;text-align:center;margin-top:60px;}
form{margin-bottom:20px;}
.form-group{margin-bottom:15px;}
label{color:#f9a8c4;font-weight:500;display:block;margin-bottom:5px;}
input[type="text"], input[type="file"]{
  width:100%;padding:10px;border:1px solid #333;border-radius:8px;background:#222;color:white;
}
.btn{padding:10px 20px;border:none;border-radius:6px;cursor:pointer;margin:5px;font-weight:600;}
.btn-primary{background:#f2a6c1;color:#111;}
.btn-edit{background:#60a5fa;color:white;}
.btn-delete{background:#ef4444;color:white;}
.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px;margin-top:25px;}
.card{background:#1b1b1b;padding:20px;border-radius:10px;border:1px solid #333;text-align:center;}
.card img{width:100%;height:150px;object-fit:contain;border-radius:8px;margin-bottom:10px;background:#fff;}
.update-form{display:none;margin-top:15px;background:#141414;padding:15px;border-radius:10px;border:1px solid #333;}
.delete-popup{display:none;position:fixed;top:0;left:0;width:100%;height:100%;
  background:rgba(0,0,0,0.7);justify-content:center;align-items:center;z-index:999;}
.popup-content{background:#1b1b1b;padding:30px;border-radius:12px;text-align:center;box-shadow:0 0 15px rgba(255,182,193,0.3);}
.popup-content button{margin:10px;padding:10px 20px;border:none;border-radius:8px;font-weight:600;cursor:pointer;}
.btn-cancel{background:#555;color:white;}
.btn-confirm{background:#ef4444;color:white;}
</style>
</head>
<body>

<div class="container">
  <a href="dashboard.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>

  <!-- ================= TECH STACK ================= -->
  <h1><i class="fa-solid fa-code"></i> Manage Tech Stack</h1>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group"><label>Technology Name:</label><input type="text" name="tech_name" required></div>
    <div class="form-group"><label>Alt Text:</label><input type="text" name="alt_text" required></div>
    <div class="form-group"><label>Upload Icon:</label><input type="file" name="image" accept="image/*" required></div>
    <button type="submit" name="add_tech" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Tech</button>
  </form>

  <div class="grid">
    <?php while ($row = mysqli_fetch_assoc($techResult)): ?>
    <div class="card" id="tech-<?= $row['id'] ?>">
      <img src="<?= htmlspecialchars($row['image_url']); ?>" alt="<?= htmlspecialchars($row['alt_text']); ?>">
      <h3><?= htmlspecialchars($row['tech_name']); ?></h3>
      <p><i><?= htmlspecialchars($row['alt_text']); ?></i></p>
      <button class="btn btn-edit" onclick="toggleUpdate('tech',<?= $row['id'] ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
      <button class="btn btn-delete" onclick="openDeletePopup('tech',<?= $row['id'] ?>)"><i class="fa-solid fa-trash"></i> Delete</button>

      <div class="update-form" id="update-tech-<?= $row['id'] ?>">
        <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <div class="form-group"><label>Technology Name:</label>
            <input type="text" name="tech_name" value="<?= htmlspecialchars($row['tech_name']); ?>" required>
          </div>
          <div class="form-group"><label>Alt Text:</label>
            <input type="text" name="alt_text" value="<?= htmlspecialchars($row['alt_text']); ?>" required>
          </div>
          <div class="form-group"><label>Change Icon (optional):</label><input type="file" name="image" accept="image/*"></div>
          <button type="submit" name="update_tech" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save</button>
        </form>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

<div class="container">
  <!-- ================= COLLEGE FRIENDS ================= -->
  <h2><i class="fa-solid fa-user-group"></i> Manage College Friends</h2>

  <!-- Add Friend -->
  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Upload Friend Image:</label><br>
      <input type="file" name="friend_image" accept="image/*" required>
    </div>
    <button type="submit" name="add_friend" class="btn btn-primary">
      <i class="fa-solid fa-plus"></i> Add Image
    </button>
  </form>

  <!-- Display Friends -->
  <div class="grid">
    <?php while ($row = mysqli_fetch_assoc($friendsResult)): ?>
      <div class="card" id="friend-<?= $row['id'] ?>">
        <img src="<?= $uploadDirFriends . htmlspecialchars($row['image']); ?>" alt="Friend">
        <button class="btn btn-delete" onclick="openDeletePopup(<?= $row['id'] ?>)">
          <i class="fa-solid fa-trash"></i> Delete
        </button>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Delete Popup -->
<div class="delete-popup" id="deletePopup">
  <div class="popup-content">
    <h3>Delete Friend Image?</h3>
    <form method="POST">
      <input type="hidden" name="id" id="deleteId">
      <button type="button" class="btn-cancel" onclick="closeDeletePopup()">Cancel</button>
      <button type="submit" name="confirm_delete_friend" class="btn-confirm">Delete</button>
    </form>
  </div>
</div>

<script>
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