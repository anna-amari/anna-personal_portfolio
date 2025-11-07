<?php

function logActivity($conn, $action_type, $description, $table_name = null, $record_id = null) {
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    $stmt = $conn->prepare("INSERT INTO activity_logs (user_id, action_type, description, table_name, record_id, ip_address, user_agent) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiss", $user_id, $action_type, $description, $table_name, $record_id, $ip_address, $user_agent);
    
    return $stmt->execute();
}
?>