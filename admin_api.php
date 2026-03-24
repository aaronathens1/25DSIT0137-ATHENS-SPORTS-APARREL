<?php
session_start();
header('Content-Type: application/json');

// Check authorization
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized access.']);
    exit;
}

$file_path = "products.js";
$js_content = file_get_contents($file_path);
$prefix = "const products = ";

$start_pos = strpos($js_content, $prefix);
if ($start_pos === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Could not find product data.']);
    exit;
}
$start_pos += strlen($prefix);

$json_str = substr($js_content, $start_pos);
$json_str = rtrim($json_str, " \n\r\t;");

$products = json_decode($json_str, true);
if (!$products) {
    http_response_code(500);
    echo json_encode(['error' => 'Error parsing JSON data.']);
    exit;
}

// Process API requests
$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'GET') {
    echo json_encode($products);
    exit;
}

if ($method === 'POST') {
    $input = file_get_contents('php://input');
    $req = json_decode($input, true);
    
    $action = $req['action'] ?? '';
    
    if ($action === 'add') {
        $new_product = $req['product'];
        // Generate new ID
        $max_id = 0;
        foreach ($products as $p) {
            if ($p['id'] > $max_id) $max_id = $p['id'];
        }
        $new_product['id'] = $max_id + 1;
        $products[] = $new_product;
        
    } elseif ($action === 'edit') {
        $edit_product = $req['product'];
        $found = false;
        foreach ($products as &$p) {
            if ($p['id'] == $edit_product['id']) {
                $p = $edit_product;
                $found = true;
                break;
            }
        }
        if (!$found) {
            http_response_code(404);
            echo json_encode(['error' => 'Product not found.']);
            exit;
        }
        
    } elseif ($action === 'delete') {
        $id_to_delete = $req['id'];
        $filtered = [];
        foreach ($products as $p) {
            if ($p['id'] != $id_to_delete) {
                $filtered[] = $p;
            }
        }
        $products = $filtered;
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid action.']);
        exit;
    }
    
    // Save back to file
    $new_content = $prefix . json_encode(array_values($products), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
    file_put_contents($file_path, $new_content);
    
    echo json_encode(['success' => true]);
    exit;
}
?>
