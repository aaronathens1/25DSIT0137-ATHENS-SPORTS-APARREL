<?php
$source_img = 'C:\Users\Athens\.gemini\antigravity\brain\98d98823-d366-4a90-9773-e3a586a1d329\pool_table_cover_1774350647387.png';
$dest_img = 'c:\xampp1\htdocs\athens\pool_table_cover.png';

if(file_exists($source_img)) {
    copy($source_img, $dest_img);
    echo "Image copied successfully.\n";
} else {
    echo "Image not found.\n";
}

$dash_path = 'c:\xampp1\htdocs\athens\dashboard.php';
$dash = file_get_contents($dash_path);

// Update dashboard image to the new one
$dash = preg_replace('/<img src="pooltable\.jpg" alt="Pool Tables">/i', '<img src="pool_table_cover.png" alt="Pool Tables">', $dash);

// Update dashboard items preview (optional but nice)
// We change one item to Heyball Table
$dash = preg_replace('/<li>Chalk <span class="price">\$79<\/span><\/li>/i', '<li>Heyball Table <span class="price">$1500</span></li>', $dash);

file_put_contents($dash_path, $dash);
echo "Dashboard updated.\n";


// Update products.js
$file_path = "products.js";
$content = file_get_contents($file_path);
$prefix = "const products = ";

$start_pos = strpos($content, $prefix) + strlen($prefix);
$json_str = substr($content, $start_pos);
$json_str = rtrim($json_str, " \n\r\t;");

$products = json_decode($json_str, true);
if (!$products) {
    die("Error parsing JSON: " . json_last_error_msg() . "\n");
}

$new_products = [
    [ "id" => 804, "name" => "Professional Pool Table", "category" => "Pool Tables", "price" => 1200, "image" => "pool_table_cover.png", "description" => "Experience unmatched quality with this professional pool table. Ideal for pool enthusiasts." ],
    [ "id" => 805, "name" => "Standard Billiard Table", "category" => "Pool Tables", "price" => 850, "image" => "pool_table_cover.png", "description" => "Experience unmatched quality with this standard billiard table. Ideal for pool enthusiasts." ],
    [ "id" => 806, "name" => "Heyball Table", "category" => "Pool Tables", "price" => 1500, "image" => "pool_table_cover.png", "description" => "Experience unmatched quality with this heyball table. Ideal for pool enthusiasts." ],
    [ "id" => 807, "name" => "Mini Pool Table", "category" => "Pool Tables", "price" => 150, "image" => "pool_table_cover.png", "description" => "Experience unmatched quality with this mini pool table. Ideal for pool enthusiasts." ],
    [ "id" => 808, "name" => "Triangle Ball Rack", "category" => "Pool Tables", "price" => 12, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this triangle ball rack. Ideal for pool enthusiasts." ],
    [ "id" => 809, "name" => "Billiard Table Cover", "category" => "Pool Tables", "price" => 45, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this billiard table cover. Ideal for pool enthusiasts." ],
    [ "id" => 810, "name" => "Pool Table Brush", "category" => "Pool Tables", "price" => 18, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this pool table brush. Ideal for pool enthusiasts." ],
    [ "id" => 811, "name" => "Wall-Mounted Cue Rack", "category" => "Pool Tables", "price" => 65, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this wall-mounted cue rack. Ideal for pool enthusiasts." ],
    [ "id" => 812, "name" => "Cross Bridge Stick", "category" => "Pool Tables", "price" => 25, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this cross bridge stick. Ideal for pool enthusiasts." ],
    [ "id" => 813, "name" => "Hard Tube Cue Case", "category" => "Pool Tables", "price" => 55, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this hard tube cue case. Ideal for pool enthusiasts." ],
    [ "id" => 814, "name" => "Billiard Glove", "category" => "Pool Tables", "price" => 15, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this billiard glove. Ideal for pool enthusiasts." ],
    [ "id" => 815, "name" => "Replacement Felt (Green)", "category" => "Pool Tables", "price" => 110, "image" => "pooltable.jpg", "description" => "Experience unmatched quality with this replacement felt (green). Ideal for pool enthusiasts." ]
];

foreach ($new_products as $np) {
    $products[] = $np;
}

$new_content = $prefix . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents($file_path, $new_content);

echo "Successfully added " . count($new_products) . " items to products.js.\n";
?>
