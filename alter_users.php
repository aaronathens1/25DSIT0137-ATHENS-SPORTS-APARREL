<?php
require_once 'db_connect.php';
try {
    $pdo->exec("ALTER TABLE users 
        ADD COLUMN first_name VARCHAR(100) NULL AFTER password,
        ADD COLUMN last_name VARCHAR(100) NULL AFTER first_name,
        ADD COLUMN phone VARCHAR(20) NULL AFTER last_name
    ");
    echo "Columns added to users table successfully.\n";
} catch (PDOException $e) {
    echo "Error updating users table: " . $e->getMessage() . "\n";
}
?>
