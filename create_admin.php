<?php
include "db.php";

$hashed = password_hash("amari4", PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (username, password) VALUES ('Amari', '$hashed')";

if ($conn->query($sql)) {
    echo "Admin account created successfully.";
} else {
    echo "Error: " . $conn->error;
}
?>
