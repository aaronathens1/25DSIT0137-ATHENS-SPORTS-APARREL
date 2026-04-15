<?php
session_start();

// Ensure user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(["error" => "Unauthorized access."]);
    exit;
}

require_once 'db_connect.php';

header('Content-Type: application/json');

try {
    // Check if tables exist. If they don't, return empty array rather than failing.
    $checkTable = $pdo->query("SHOW TABLES LIKE 'orders'")->rowCount();
    if ($checkTable == 0) {
        echo json_encode([]);
        exit;
    }

    // Fetch orders
    $stmt = $pdo->query("SELECT * FROM orders ORDER BY id DESC");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // For each order, fetch items
    $orderIds = array_column($orders, 'id');
    
    if (count($orderIds) > 0) {
        $inQuery = implode(',', array_fill(0, count($orderIds), '?'));
        $itemStmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id IN ($inQuery)");
        $itemStmt->execute($orderIds);
        $items = $itemStmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Group items by order_id
        $itemsByOrder = [];
        foreach ($items as $item) {
            $itemsByOrder[$item['order_id']][] = $item;
        }

        // Attach items to orders
        foreach ($orders as &$order) {
            $order['items'] = $itemsByOrder[$order['id']] ?? [];
        }
    }

    echo json_encode($orders);
} catch (PDOException $e) {
    echo json_encode(["error" => "Failed to fetch orders: " . $e->getMessage()]);
}
?>
