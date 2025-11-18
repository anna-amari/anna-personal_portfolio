<?php
include 'db.php';

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Debug: Log the request
file_put_contents('testimonial_debug.log', date('Y-m-d H:i:s') . " - Request started\n", FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents('testimonial_debug.log', "POST data received: " . print_r($_POST, true) . "\n", FILE_APPEND);
    
    // Check if all required fields are present
    if (!isset($_POST['name']) || !isset($_POST['position']) || !isset($_POST['rating']) || !isset($_POST['testimonial'])) {
        file_put_contents('testimonial_debug.log', "Missing required fields\n", FILE_APPEND);
        echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
        exit;
    }
    
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $position = mysqli_real_escape_string($conn, trim($_POST['position']));
    $rating = intval($_POST['rating']);
    $testimonial_text = mysqli_real_escape_string($conn, trim($_POST['testimonial']));
    
    file_put_contents('testimonial_debug.log', "Processed data - Name: '$name', Position: '$position', Rating: $rating, Text: '$testimonial_text'\n", FILE_APPEND);
    
    // Validate data
    if (empty($name) || empty($position) || empty($testimonial_text) || $rating < 1 || $rating > 5) {
        file_put_contents('testimonial_debug.log', "Validation failed\n", FILE_APPEND);
        echo json_encode(['success' => false, 'message' => 'Please fill all fields correctly.']);
        exit;
    }
    
    // Check database connection
    if (!$conn) {
        file_put_contents('testimonial_debug.log', "Database connection failed: " . mysqli_connect_error() . "\n", FILE_APPEND);
        echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
        exit;
    }
    
    // Simple INSERT query
    $query = "INSERT INTO testimonials (name, position, testimonials_text, rating, created_at) 
              VALUES ('$name', '$position', '$testimonial_text', $rating, NOW())";
    
    file_put_contents('testimonial_debug.log', "Executing query: $query\n", FILE_APPEND);
    
    if (mysqli_query($conn, $query)) {
        file_put_contents('testimonial_debug.log', "Insert successful, affected rows: " . mysqli_affected_rows($conn) . "\n", FILE_APPEND);
        echo json_encode(['success' => true, 'message' => 'Testimonial submitted successfully!']);
    } else {
        $error = mysqli_error($conn);
        file_put_contents('testimonial_debug.log', "Database error: $error\n", FILE_APPEND);
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $error]);
    }
} else {
    file_put_contents('testimonial_debug.log', "Invalid request method: " . $_SERVER['REQUEST_METHOD'] . "\n", FILE_APPEND);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

mysqli_close($conn);
file_put_contents('testimonial_debug.log', date('Y-m-d H:i:s') . " - Request completed\n\n", FILE_APPEND);
?>