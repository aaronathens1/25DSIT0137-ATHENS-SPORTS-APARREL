<?php
$file_path = "products.js";
$content = file_get_contents($file_path);
$prefix = "const products = ";
$suffix = ";";

$content = trim($content);
if (substr($content, -1) === ';') {
    $content = substr($content, 0, -1);
}

$start_pos = strpos($content, $prefix) + strlen($prefix);
$json_str = substr($content, $start_pos);
$products = json_decode($json_str, true);

if (!$products) {
    die("Error parsing JSON.");
}

$updated_count = 0;
foreach ($products as &$p) {
    if (isset($p['price'])) {
        // Assume current price is in USD and exchange rate is approx 3800 UGX per 1 USD.
        // Round to nearest 1000 UGX for clean numbers.
        $p['price'] = round(($p['price'] * 3800) / 1000) * 1000;
        $updated_count++;
    }
}

$new_content = $prefix . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents($file_path, $new_content);

echo "Successfully converted prices to UGX for $updated_count products.\n";
?>
