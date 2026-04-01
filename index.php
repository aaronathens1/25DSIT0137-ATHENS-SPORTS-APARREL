<?php
// signup.php
require 'connect.php'; // Include the database connection
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // 1. Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 2. Prepare the SQL statement (Prevents SQL Injection)
    $sql = "INSERT INTO users (username, email, password, first_name, last_name, phone) VALUES (:username, :email, :password, :first_name, :last_name, :phone)";
    $stmt = $pdo->prepare($sql);

    try {
        // 3. Execute the statement
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':phone' => $phone
        ]);
        $message = "Account created successfully! <a href='login.php'>Login here</a>";
    } catch (PDOException $e) {
        // If email already exists, it will throw an error
        $message = "Error: That email is already registered.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <style>
        /* Using a bit of Flexbox from Week 3 to center the form! */
        body { display: flex; justify-content: center; align-items: center; height: 100vh; font-family: sans-serif; background-color: #050505;}
        .form-container { background: #ff5500; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;}
        h2{color:  #050505;}
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Athens Sports Aparrel</h2>
        <?php if($message) echo "<p style='color:red;'>$message</p>"; ?>
        <form method="POST" action="index.php">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Create Account</button>
        </form>
        <p style="font-size: 14px; text-align: center;">Already have an account? <a href="login.php">Login</a></p>
        <p style="font-size: 14px; text-align: center; margin-top: 15px;"><a href="dashboard.php" style="color: #ff5500; text-decoration: none; font-weight: bold; background: #050505; padding: 8px 15px; border-radius: 4px;">Continue as Guest</a></p>
    </div>
</body>
</html>