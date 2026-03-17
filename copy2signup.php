<?php
// signup.php
require 'connect.php'; // Include the database connection
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 1. Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 2. Prepare the SQL statement (Prevents SQL Injection)
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        // 3. Execute the statement
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password
        ]);
        $message = "Account created successfully! <a href='login.php'>Login here</a>";
    } catch (PDOException $e) {
        // If email already exists, it will throw an error
        $message = "Error: That email is already registered.";
    }
}
?>