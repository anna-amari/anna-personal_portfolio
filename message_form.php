<?php include 'd_header.php'; ?>
<?php include 'db.php'; ?>

<link rel="stylesheet" href="dashboard1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    .messages-section {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .messages-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e89cae;
    }

    .header-content {
        flex: 1;
    }

    .messages-header h2 {
        color: #ffffff;
        margin: 0;
        font-size: 2rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .messages-header h2 i {
        color: #e89cae;
    }

    .messages-stats {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .stat-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 6px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .stat-item i {
        color: #e89cae;
        font-size: 0.8rem;
    }

    .back-button {
        background: linear-gradient(135deg, #e89cae 0%, #60a5fa 100%);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(232, 156, 174, 0.3);
    }

    .messages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .message-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
        position: relative;
        backdrop-filter: blur(10px);
    }

    .message-card:hover {
        transform: translateY(-3px);
        border-color: rgba(232, 156, 174, 0.3);
        box-shadow: 0 8px 25px rgba(232, 156, 174, 0.15);
    }

    .message-card.new {
        border-left: 4px solid #e89cae;
        background: rgba(232, 156, 174, 0.05);
    }

    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sender-info {
        flex: 1;
    }

    .sender-name {
        color: #ffffff;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0 0 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sender-name i {
        color: #e89cae;
        font-size: 0.9rem;
    }

    .sender-email {
        color: #60a5fa;
        font-size: 0.9rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .message-actions {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #cbd5e1;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .action-btn:hover {
        background: rgba(232, 156, 174, 0.2);
        color: #e89cae;
        border-color: rgba(232, 156, 174, 0.3);
    }

    .action-btn.delete:hover {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
        border-color: rgba(239, 68, 68, 0.3);
    }

    .message-content {
        color: #cbd5e1;
        line-height: 1.6;
        margin-bottom: 15px;
        font-size: 0.95rem;
    }

    .message-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .message-time {
        color: #94a3b8;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .message-status {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-new {
        background: rgba(232, 156, 174, 0.15);
        color: #e89cae;
    }

    .no-messages {
        text-align: center;
        padding: 60px 20px;
        color: #94a3b8;
        font-style: italic;
        background: rgba(255, 255, 255, 0.03);
        border: 2px dashed rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        font-size: 1.1rem;
    }

    .no-messages i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #e89cae;
        opacity: 0.5;
    }

    .filters {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #cbd5e1;
        padding: 8px 16px;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .filter-btn.active {
        background: rgba(232, 156, 174, 0.2);
        color: #e89cae;
        border-color: rgba(232, 156, 174, 0.3);
    }

    .filter-btn:hover {
        background: rgba(232, 156, 174, 0.15);
        color: #e89cae;
    }

    @media (max-width: 768px) {
        .messages-grid {
            grid-template-columns: 1fr;
        }
        
        .messages-header {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .messages-stats {
            flex-wrap: wrap;
        }
        
        .filters {
            justify-content: center;
        }
    }
</style>

<main class="dashboard-main">
    <div class="messages-section">
        <!-- Header Section -->
        <div class="messages-header">
            <div class="header-content">
                  <button onclick="goBack()" class="back-button">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </button>
                <h2>
                    <i class="fas fa-envelope-open-text"></i>
                    User Messages
                </h2>
                <div class="messages-stats">
                    <?php
                    $totalQuery = "SELECT COUNT(*) as total FROM contact_messages";
                    $todayQuery = "SELECT COUNT(*) as today FROM contact_messages WHERE DATE(submitted_at) = CURDATE()";
                    $weekQuery = "SELECT COUNT(*) as week FROM contact_messages WHERE submitted_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
                    
                    $total = $conn->query($totalQuery)->fetch_assoc()['total'];
                    $today = $conn->query($todayQuery)->fetch_assoc()['today'];
                    $week = $conn->query($weekQuery)->fetch_assoc()['week'];
                    ?>
                    <div class="stat-item">
                        <i class="fas fa-inbox"></i>
                        Total: <?= $total ?>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-calendar-day"></i>
                        Today: <?= $today ?>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-calendar-week"></i>
                        This Week: <?= $week ?>
                    </div>
                </div>
            </div>
    
        </div>

        <!-- Filters -->
        <div class="filters">
            <button class="filter-btn active" onclick="filterMessages('all')">
                <i class="fas fa-layer-group"></i> All Messages
            </button>
            <button class="filter-btn" onclick="filterMessages('today')">
                <i class="fas fa-calendar-day"></i> Today
            </button>
            <button class="filter-btn" onclick="filterMessages('week')">
                <i class="fas fa-calendar-week"></i> This Week
            </button>
        </div>

        <!-- Messages Grid -->
        <?php 
        $query = "SELECT * FROM contact_messages ORDER BY submitted_at DESC"; 
        $result = $conn->query($query);
        
        if ($result->num_rows > 0): ?>
            <div class="messages-grid" id="messagesGrid">
                <?php while ($row = $result->fetch_assoc()): 
                    $isToday = date('Y-m-d') == date('Y-m-d', strtotime($row['submitted_at']));
                    $isThisWeek = strtotime($row['submitted_at']) >= strtotime('-7 days');
                ?>
                    <div class="message-card <?= $isToday ? 'new' : '' ?>" data-date="<?= date('Y-m-d', strtotime($row['submitted_at'])) ?>" data-week="<?= $isThisWeek ? 'yes' : 'no' ?>">
                        <div class="message-header">
                            <div class="sender-info">
                                <h3 class="sender-name">
                                    <i class="fas fa-user"></i>
                                    <?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?>
                                </h3>
                                <a href="mailto:<?= htmlspecialchars($row['email']); ?>" class="sender-email">
                                    <i class="fas fa-envelope"></i>
                                    <?= htmlspecialchars($row['email']); ?>
                                </a>
                            </div>
                            <div class="message-actions">
                                <button class="action-btn" onclick="replyToMessage('<?= htmlspecialchars($row['email']); ?>')" title="Reply">
                                    <i class="fas fa-reply"></i>
                                </button>
                                <button class="action-btn delete" onclick="deleteMessage(<?= $row['id'] ?>)" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="message-content">
                            <?= nl2br(htmlspecialchars($row['message'])); ?>
                        </div>
                        
                        <div class="message-footer">
                            <div class="message-time">
                                <i class="far fa-clock"></i>
                                <?= date('M j, Y g:i A', strtotime($row['submitted_at'])); ?>
                                <?= $isToday ? '<span style="color:#e89cae;">• Today</span>' : '' ?>
                            </div>
                            <?php if ($isToday): ?>
                                <div class="message-status status-new">
                                    New
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="no-messages">
                <i class="fas fa-inbox"></i>
                <h3>No messages yet</h3>
                <p>Your inbox is empty. Messages from your contact form will appear here.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<script>
function goBack() {
    window.location.href = 'dashboard.php';
}

function filterMessages(filter) {
    const messages = document.querySelectorAll('.message-card');
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    // Update active filter button
    filterBtns.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    messages.forEach(message => {
        const date = message.getAttribute('data-date');
        const week = message.getAttribute('data-week');
        const today = new Date().toISOString().split('T')[0];
        
        let show = false;
        
        switch(filter) {
            case 'all':
                show = true;
                break;
            case 'today':
                show = date === today;
                break;
            case 'week':
                show = week === 'yes';
                break;
        }
        
        message.style.display = show ? 'block' : 'none';
    });
}

function replyToMessage(email) {
    window.location.href = `mailto:${email}`;
}

function deleteMessage(messageId) {
    if (confirm('Are you sure you want to delete this message?')) {
        fetch('delete_message.php?id=' + messageId)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
    }
}
</script>

<?php include 'd_footer.php'; ?>