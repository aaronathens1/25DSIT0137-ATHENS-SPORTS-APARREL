<?php
$json = file_get_contents('products.js');
// Extract the array
$json = substr($json, strpos($json, '['));
$json = substr($json, 0, strrpos($json, ']') + 1);

$products = json_decode($json, true);

if (!$products) {
    die("Error decoding JSON");
}

/* Base category images */
$category_images = [
    "Football" => "football.jpg",
    "Basketball" => "basketball.jpg",
    "Running" => "running.jpg",
    "Gym" => "gym.jpg",
    "Tennis" => "tennis.jpg",
    "Baseball" => "baseball.jpg",
    "Swimming" => "swimming.jpg",
    "Volleyball" => "volleyball.jpg",
    "Golf" => "golf.png",
    "Boxing" => "boxing.jpg",
    "Cycling" => "cycling.jpg",
    "Rugby" => "rugby.png",
    "Cricket" => "cricket.jpg",
    "Hockey" => "hockey.jpg",
    "Table Tennis" => "table_tennis.jpg",
    "Badminton" => "badminton.jpg",
    "Surfing" => "surfing.jpg",
    "Skateboarding" => "skateboarding.png",
    "Snowboarding" => "snowboarding.jpg",
    "Skiing" => "skiing.jpg",
    "Yoga" => "yoga.jpg",
    "Track and Field" => "track.jpg",
    "Soccer (Football)" => "uefa_ball.png"
];

/* Specific product image mappings */
$specific_images = [
    "Jersey" => "authentic_jersey.jpg",
    "Running Shoes" => "running-shoes.jpg",
    "Compression" => "compression_shirt.jpg"
];

foreach ($products as &$p) {
    $cat = $p['category'];
    $img = isset($category_images[$cat]) ? $category_images[$cat] : "download.jpg";
    
    foreach ($specific_images as $keyword => $specific_img) {
        if (stripos($p['name'], $keyword) !== false) {
            $img = $specific_img;
            break;
        }
    }
    
    $p['image'] = $img;
}

$js_content = "const products = " . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents('products.js', $js_content);
echo "Successfully updated " . count($products) . " products with appropriate images.\n";
?>
