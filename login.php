<?php
session_start();
if (isset($_SESSION["logged_in"])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Anna Mari Portfolio</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background: black;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-container {
      width: 100%;
      max-width: 420px;
      position: relative;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(15px);
      border: 2px solid #e89cae;
      border-radius: 20px;
      padding: 40px 35px;
      text-align: center;
      box-shadow: 0 20px 40px rgba(232, 156, 174, 0.15);
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .login-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(232, 156, 174, 0.25);
    }

    .login-box::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, #e89cae, #f7b8c8, #e89cae);
    }

    .logo {
      margin-bottom: 30px;
    }

    .logo h1 {
      font-family: 'Pixelify Sans', cursive;
      color: #e89cae;
      font-size: 2.5rem;
      margin-bottom: 5px;
      text-shadow: 0 4px 8px rgba(232, 156, 174, 0.3);
    }

    .logo p {
      color: #b0b0b0;
      font-size: 1rem;
    }

    .input-group {
      position: relative;
      margin-bottom: 25px;
    }

    .input-group i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #e89cae;
      font-size: 1.1rem;
    }

    .input-group input {
      width: 100%;
      padding: 15px 15px 15px 45px;
      background: rgba(255, 255, 255, 0.08);
      border: 2px solid rgba(232, 156, 174, 0.3);
      border-radius: 12px;
      color: #ffffff;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .input-group input::placeholder {
      color: #b0b0b0;
    }

    .input-group input:focus {
      outline: none;
      border-color: #e89cae;
      background: rgba(255, 255, 255, 0.12);
      box-shadow: 0 0 0 3px rgba(232, 156, 174, 0.1);
    }

    .login-btn {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #e89cae, #f7b8c8);
      border: none;
      border-radius: 12px;
      color: #1a1a2e;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(232, 156, 174, 0.4);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .error-message {
      background: rgba(255, 77, 77, 0.1);
      border: 1px solid rgba(255, 77, 77, 0.3);
      color: #ff6b6b;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.9rem;
    }

    .back-link {
      margin-top: 25px;
      text-align: center;
    }

    .back-link a {
      color: #b0b0b0;
      text-decoration: none;
      font-size: 0.9rem;
      transition: color 0.3s ease;
    }

    .back-link a:hover {
      color: #e89cae;
    }

    .decoration {
      position: absolute;
      width: 200px;
      height: 200px;
      background: radial-gradient(circle, rgba(232, 156, 174, 0.1) 0%, transparent 70%);
      border-radius: 50%;
      z-index: -1;
    }

    .decoration-1 {
      top: -80px;
      right: -80px;
    }

    .decoration-2 {
      bottom: -80px;
      left: -80px;
    }

    /* Responsive Design */
    @media (max-width: 480px) {
      .login-box {
        padding: 30px 25px;
        margin: 20px;
      }

      .logo h1 {
        font-size: 2rem;
      }

      .input-group input {
        padding: 12px 12px 12px 40px;
      }
    }

    /* Loading animation */
    .loading {
      display: none;
    }

    .login-btn.loading {
      position: relative;
      color: transparent;
    }

    .login-btn.loading::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      top: 50%;
      left: 50%;
      margin: -10px 0 0 -10px;
      border: 2px solid transparent;
      border-top: 2px solid #1a1a2e;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>
<body>
  <div class="decoration decoration-1"></div>
  <div class="decoration decoration-2"></div>

  <div class="login-container">
    <div class="login-box">
      <div class="logo">
        <h1>Admin</h1>
      </div>

      <?php if (!empty($_GET['error'])): ?>
        <div class="error-message">
          <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
      <?php endif; ?>

      <form action="authenticate.php" method="POST" id="loginForm">
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="login-btn" id="loginBtn">
          <i class="fas fa-sign-in-alt"></i> Login to Dashboard
        </button>
      </form>

      <div class="back-link">
        <a href="index.php">
          <i class="fas fa-arrow-left"></i> Back to Portfolio
        </a>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function() {
      const btn = document.getElementById('loginBtn');
      btn.classList.add('loading');
      btn.disabled = true;
    });

    // Add some interactive effects
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
      });
    });
  </script>
</body>
</html>