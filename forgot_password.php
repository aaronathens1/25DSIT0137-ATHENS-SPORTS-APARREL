<?php
// forgot_password.php
session_start();
require 'connect.php';
$message = '';
$message_type = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $message = "Passwords do not match!";
        $message_type = "red";
    } else {
        // Find user by email and phone as a security verification
        $sql = "SELECT id FROM users WHERE email = :email AND phone = :phone";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email, ':phone' => $phone]);
        $user = $stmt->fetch();

        if ($user) {
            // Update password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET password = :password WHERE email = :email";
            $update_stmt = $pdo->prepare($update_sql);
            if ($update_stmt->execute([':password' => $hashed_password, ':email' => $email])) {
                $message = "Password reset successfully! You can now login.";
                $message_type = "#050505";
            } else {
                $message = "Error updating password.";
                $message_type = "red";
            }
        } else {
            $message = "No account matches that email and phone number.";
            $message_type = "red";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; font-family: sans-serif; background-color: #050505; margin: 0;}
        .form-container { background: #ff5500; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        button { width: 100%; padding: 10px; background: #050505; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;}
        h2{color: #050505; margin-top: 0;}
        .back-link { display: block; text-align: center; margin-top: 15px; font-size: 14px; color: #050505; text-decoration: none; font-weight: bold;}
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>
        <?php if($message) echo "<p style='color:$message_type; font-size: 14px; text-align: center; font-weight: bold; background-color: rgba(255,255,255,0.8); padding: 5px; border-radius: 4px;'>$message</p>"; ?>
        <form method="POST" action="forgot_password.php">
            <p style="font-size: 13px; margin: 0 0 10px 0; color: #050505;">Enter your details to securely reset your password.</p>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="tel" name="phone" placeholder="Registered Phone Number" required>
            <input type="password" name="new_password" placeholder="New Password" required minlength="6">
            <input type="password" name="confirm_password" placeholder="Confirm New Password" required minlength="6">
            <button type="submit">Retrieve Account & Reset</button>
        </form>
        <a href="login.php" class="back-link">Back to Login</a>
    </div>
</body>
</html>
