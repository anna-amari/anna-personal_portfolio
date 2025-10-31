<?php include 'd_header.php'; // header (contains HTML head, navbar, etc.) ?>
<?php include 'db.php'; // your database connection file ?>

<link rel="stylesheet" href="dashboard1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<main class="dashboard-main">
    <!-- Back Button -->
    <button onclick="goBack()" class="back-button">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </button>
    
    <div class="messages-section">
        <h2>User Messages</h2>
        <?php 
        $query = "SELECT * FROM contact_messages ORDER BY submitted_at DESC"; 
        $result = $conn->query($query);
        
        if ($result->num_rows > 0): ?>
            <div class="messages-grid">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="message-card">
                        <p><strong>Name:</strong> <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars(string: $row['email']); ?></p>
                        <p><strong>Message:</strong><br> <?= nl2br(htmlspecialchars($row['message'])); ?></p>
                        <p class="time"><i><?= $row['submitted_at']; ?></i></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="no-messages">No messages yet.</p>
        <?php endif; ?>
    </div>
</main>

<script>
function goBack() {
    window.location.href = 'dashboard.php';
    
}
</script>

<?php include 'd_footer.php'; // footer ?>