<?php
// login.php
session_start(); // Start a session to keep the user logged in
require 'connect.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Look for the user in the database by email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    // 2. If user exists AND password matches the hash
    if ($user && password_verify($password, $user['password'])) {
        // Create session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // Redirect to a protected page
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; font-family: sans-serif; background-color: #050505;}
        .form-container { background: #ff5500; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        button { width: 100%; padding: 10px; background: #050505; color: white; border: none; border-radius: 4px; cursor: pointer;}
        h2{color:  #050505;}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <?php if($message) echo "<p style='color:red;'>$message</p>"; ?>
        <form method="POST" action="login.php">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p style="font-size: 14px; text-align: center;">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>