<?php
session_start();

// Handle login submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Hardcoded simple auth for the personalized dashboard
    if ($username === 'Athens' && $password === 'Athens23') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Athens Sports Apparel</title>
    <style>
        :root {
          --bg-color: #050505;
          --surface-color: #111111;
          --brand-blue: #0070f3;
          --brand-orange: #ff5500;
          --text-main: #ffffff;
        }
        body {
          font-family: 'Roboto', sans-serif;
          background-color: var(--bg-color);
          color: var(--text-main);
          height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
          margin: 0;
        }
        .login-box {
          background: var(--surface-color);
          padding: 3rem;
          border-radius: 12px;
          border: 1px solid rgba(255,255,255,0.1);
          width: 100%;
          max-width: 400px;
          box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .logo-text {
          font-family: 'Montserrat', sans-serif;
          font-size: 1.8rem;
          font-weight: 700;
          text-align: center;
          margin-bottom: 2rem;
          background: linear-gradient(45deg, var(--brand-blue), var(--brand-orange));
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
        }
        input {
          width: 100%;
          padding: 1rem;
          margin-bottom: 1rem;
          background: rgba(255,255,255,0.05);
          border: 1px solid rgba(255,255,255,0.1);
          color: white;
          border-radius: 8px;
          box-sizing: border-box;
        }
        input:focus {
          outline: none;
          border-color: var(--brand-orange);
        }
        .btn {
          width: 100%;
          padding: 1rem;
          background: var(--brand-orange);
          color: white;
          border: none;
          border-radius: 8px;
          font-weight: bold;
          text-transform: uppercase;
          cursor: pointer;
          transition: background 0.3s;
        }
        .btn:hover {
          background: #ff7733;
        }
        .error {
          color: #ff3333;
          text-align: center;
          margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo-text">Athens Admin</div>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="admin_login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
