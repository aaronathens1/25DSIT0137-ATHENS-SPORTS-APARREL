<?php
require_once 'db_connect.php';

// Prepare basic tables if they don't exist
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(50),
        address TEXT,
        payment_method VARCHAR(50),
        total_amount DECIMAL(10,2) DEFAULT 0.00,
        status VARCHAR(50) DEFAULT 'Pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS order_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL,
        product_name VARCHAR(255),
        quantity INT,
        price DECIMAL(10,2),
        FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
    )");
} catch (PDOException $e) {
    die("Database setup failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment_method = $_POST['payment_method'] ?? 'unknown';
    $cart_data_json = $_POST['cart_data'] ?? '[]';
    
    $cart = json_decode($cart_data_json, true);
    
    if (empty($full_name) || empty($email) || empty($cart) || !is_array($cart)) {
        die("Invalid checkout data. Please try again.");
    }
    
    // Calculate exact total based on cart
    $total_amount = 0;
    foreach ($cart as $item) {
        $total_amount += (float) ($item['price'] ?? 0) * (int) ($item['quantity'] ?? 1);
    }
    
    // Insert Order
    try {
        $stmt = $pdo->prepare("INSERT INTO orders (full_name, email, phone, address, payment_method, total_amount) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$full_name, $email, $phone, $address, $payment_method, $total_amount]);
        $order_id = $pdo->lastInsertId();
        
        // Insert Order Items
        $itemStmt = $pdo->prepare("INSERT INTO order_items (order_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart as $item) {
            $pname = $item['product'] ?? $item['name'] ?? 'Unknown Item';
            $qty = (int) ($item['quantity'] ?? 1);
            $price = (float) ($item['price'] ?? 0);
            $itemStmt->execute([$order_id, $pname, $qty, $price]);
        }
        
    } catch (PDOException $e) {
        die("Failed to save order: " . $e->getMessage());
    }
    
    // Success UI
    $success_message = "Thank you, $full_name! Your order (ID: #$order_id) has been placed successfully.";
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - Athens Sports Apparel</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #050505;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: #111;
            padding: 50px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.05);
            max-width: 600px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.6);
        }
        h1 { color: #0070f3; margin-bottom: 20px; font-size: 2.5rem; }
        p { color: #a1a1aa; font-size: 1.1rem; line-height: 1.6; margin-bottom: 30px; }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(45deg, #0070f3, #ff5500);
            color: white;
            text-decoration: none;
            font-weight: 700;
            border-radius: 8px;
            transition: transform 0.2s;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(255,85,0,0.4); }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Confirmed! 🎉</h1>
        <p><?= htmlspecialchars($success_message) ?></p>
        <p>A notification has been sent regarding your <b><?= htmlspecialchars(str_replace('_', ' ', strtoupper($payment_method))) ?></b> payment.</p>
        <a href="index.php" class="btn" onclick="clearCart()">Continue Shopping</a>
    </div>

    <script>
        // Clear the cart in JS so user doesn't rebuy accidentally
        function clearCart() {
            localStorage.removeItem('athens_cart');
        }
        // Auto clear just in case they don't click the link
        clearCart();
    </script>
</body>
</html>
