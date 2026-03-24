<?php
$file_path = "products.js";
$content = file_get_contents($file_path);

$prefix = "const products = ";
$suffix = ";";

$content_trimmed = trim($content);
if (substr($content_trimmed, -1) === ';') {
    $content_trimmed = substr($content_trimmed, 0, -1);
}

$json_str = substr($content_trimmed, strpos($content_trimmed, $prefix) + strlen($prefix));
$products = json_decode($json_str, true);

if ($products === null) {
    die("Error parsing JSON\n");
}

$category_counts = [];
$filtered_products = [];

foreach ($products as $p) {
    $cat = isset($p['category']) ? $p['category'] : "Unknown";
    if (!isset($category_counts[$cat])) {
        $category_counts[$cat] = 0;
    }
    
    if ($category_counts[$cat] < 15) {
        $filtered_products[] = $p;
        $category_counts[$cat]++;
    }
}

$js_content = $prefix . json_encode($filtered_products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . $suffix . "\n";
file_put_contents($file_path, $js_content);

echo "Successfully reduced products from " . count($products) . " to " . count($filtered_products) . ".\n";
?>
