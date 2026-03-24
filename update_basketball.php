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

// Filter out old basketball items
$new_products = [];
$max_id = 0;
foreach ($products as $p) {
    if (isset($p['id']) && $p['id'] > $max_id) {
        $max_id = $p['id'];
    }
    if ((isset($p['category']) ? $p['category'] : '') !== 'Basketball') {
        $new_products[] = $p;
    }
}

$new_basketball_items = [
    ["name" => "Indoor/Outdoor Basketball", "price" => 35.00, "image" => "basketball.jpg"],
    ["name" => "Professional Basketball Shoes", "price" => 120.00, "image" => "basketball_shoes.jpg"],
    ["name" => "Breathable Mesh Shorts", "price" => 25.00, "image" => "basketball.jpg"],
    ["name" => "Reversible Practice Jersey", "price" => 30.00, "image" => "authentic_jersey.jpg"],
    ["name" => "Compression Arm Sleeve", "price" => 15.00, "image" => "basketball.jpg"],
    ["name" => "Protective Knee Pad Sleeve", "price" => 22.00, "image" => "basketball.jpg"],
    ["name" => "Moisture Wicking Headband", "price" => 12.00, "image" => "basketball.jpg"],
    ["name" => "Cushioned Crew Socks", "price" => 14.00, "image" => "basketball.jpg"],
    ["name" => "Spacious Gym Duffel Bag", "price" => 45.00, "image" => "gym.jpg"],
    ["name" => "Insulated Water Bottle", "price" => 20.00, "image" => "basketball.jpg"],
    ["name" => "Microfiber Sweat Towel", "price" => 10.00, "image" => "basketball.jpg"],
    ["name" => "Dual-Action Air Pump", "price" => 18.00, "image" => "basketball.jpg"],
    ["name" => "Referee Tactics Whistle", "price" => 8.00, "image" => "basketball.jpg"],
    ["name" => "Dry-Erase Coaches Board", "price" => 25.00, "image" => "basketball.jpg"],
    ["name" => "Over-the-Door Mini Hoop", "price" => 40.00, "image" => "basketball.jpg"]
];

foreach ($new_basketball_items as $item) {
    $max_id++;
    $new_products[] = [
        "id" => $max_id,
        "name" => $item["name"],
        "category" => "Basketball",
        "price" => $item["price"],
        "image" => $item["image"],
        "description" => "Experience unmatched quality with this " . strtolower($item['name']) . ". Ideal for basketball enthusiasts."
    ];
}

$js_content = $prefix . json_encode($new_products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . $suffix . "\n";
file_put_contents($file_path, $js_content);

echo "Added " . count($new_basketball_items) . " common basketball items.\n";
?>
