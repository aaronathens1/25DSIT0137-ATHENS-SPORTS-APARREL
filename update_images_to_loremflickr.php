<?php
$json = file_get_contents('products.js');
$json = substr($json, strpos($json, '['));
$json = substr($json, 0, strrpos($json, ']') + 1);

$products = json_decode($json, true);

if (!$products) {
    die("Error decoding JSON");
}

$adjectives = ["Pro", "Elite", "Premium", "Ultra", "Classic", "Hyper", "Vantage", "Signature", "Advanced", "Tournament", "Performance", "Essential"];
$colors = ["Red", "Blue", "Black", "White", "Neon", "Silver", "Gold", "Green", "Yellow", "Orange", "Matte", "Glossy", "Carbon"];

foreach ($products as &$p) {
    $name = $p['name'];
    
    // Extract base item
    foreach ($adjectives as $adj) {
        $name = str_ireplace($adj, '', $name);
    }
    foreach ($colors as $color) {
        $name = str_ireplace($color, '', $name);
    }
    
    $base_item = trim($name);
    
    $cat_safe = str_replace([' ', '(', ')'], [',', '', ''], strtolower($p['category']));
    $item_safe = str_replace(' ', ',', strtolower($base_item));
    $keywords = "sport," . $cat_safe . "," . $item_safe;
    $keywords = preg_replace('/,+/', ',', $keywords); // Remove duplicate commas
    
    $p['image'] = "https://loremflickr.com/400/400/{$keywords}?lock={$p['id']}";
}

$js_content = "const products = " . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents('products.js', $js_content);
echo "Successfully updated " . count($products) . " products with dynamic LoremFlickr images matching their names.\n";
?>
