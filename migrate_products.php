<?php
require_once 'db_connect.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        category VARCHAR(255) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        image VARCHAR(255) NOT NULL,
        description TEXT NOT NULL
    )";
    $pdo->exec($sql);
    echo "Table 'products' created or exists.\\n";
    
    $file_path = "products.js";
    if (!file_exists($file_path)) die("products.js not found.");
    
    $js_content = file_get_contents($file_path);
    $prefix = "const products = ";
    $start_pos = strpos($js_content, $prefix);
    
    if ($start_pos !== false) {
        $start_pos += strlen($prefix);
        $json_str = substr($js_content, $start_pos);
        $json_str = rtrim($json_str, " \\n\\r\\t;");
        $products = json_decode($json_str, true);
        
        if ($products && is_array($products)) {
            $stmt = $pdo->prepare("INSERT INTO products (id, name, category, price, image, description) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE name=VALUES(name), category=VALUES(category), price=VALUES(price), image=VALUES(image), description=VALUES(description)");
            foreach ($products as $p) {
                $stmt->execute([
                    $p['id'],
                    $p['name'],
                    $p['category'],
                    $p['price'],
                    $p['image'],
                    $p['description']
                ]);
            }
            echo "Successfully migrated " . count($products) . " products to DB.\\n";
        } else {
            echo "Failed to decode products JSON.\\n";
        }
    } else {
        echo "Could not find prefix in products.js.\\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\\n";
}
?>
