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

function get_realistic_price($name) {
    $name_lower = strtolower($name);
    
    // High tier equipment
    if (strpos($name_lower, 'robot server') !== false || strpos($name_lower, 'table') !== false || strpos($name_lower, 'board') !== false) return rand(150, 600);
    if (strpos($name_lower, 'watch') !== false || strpos($name_lower, 'rangefinder') !== false || strpos($name_lower, 'bike') !== false) return rand(150, 400);
    if (strpos($name_lower, 'scoreboard') !== false || strpos($name_lower, 'net') !== false || strpos($name_lower, 'hoop system') !== false) return rand(50, 300);
    if (strpos($name_lower, 'helmet') !== false || strpos($name_lower, 'headgear') !== false || strpos($name_lower, 'bat') !== false || strpos($name_lower, 'racket') !== false || strpos($name_lower, 'paddle') !== false || strpos($name_lower, 'stick') !== false || strpos($name_lower, 'skis') !== false) return rand(50, 250);
    if (strpos($name_lower, 'shoes') !== false || strpos($name_lower, 'cleats') !== false || strpos($name_lower, 'boots') !== false || strpos($name_lower, 'skates') !== false) return rand(60, 180);
    
    // Mid tier equipment
    if (strpos($name_lower, 'bag') !== false || strpos($name_lower, 'case') !== false || strpos($name_lower, 'backpack') !== false || strpos($name_lower, 'duffel') !== false) return rand(30, 100);
    if (strpos($name_lower, 'shirt') !== false || strpos($name_lower, 'jersey') !== false || strpos($name_lower, 'shorts') !== false || strpos($name_lower, 'pants') !== false || strpos($name_lower, 'windbreaker') !== false || strpos($name_lower, 'base layer') !== false || strpos($name_lower, 'wetsuit') !== false || strpos($name_lower, 'jacket') !== false || strpos($name_lower, 'swimsuit') !== false) return rand(25, 80);
    if (strpos($name_lower, 'glove') !== false || strpos($name_lower, 'mitts') !== false) return rand(20, 80);
    if (strpos($name_lower, 'pads') !== false || strpos($name_lower, 'guards') !== false || strpos($name_lower, 'protector') !== false || strpos($name_lower, 'belt') !== false) return rand(15, 60);

    // Low tier equipment
    if (strpos($name_lower, 'ball') !== false || strpos($name_lower, 'puck') !== false || strpos($name_lower, 'shuttlecocks') !== false || strpos($name_lower, 'tees') !== false || strpos($name_lower, 'studs') !== false) return rand(10, 35);
    if (strpos($name_lower, 'socks') !== false || strpos($name_lower, 'headband') !== false || strpos($name_lower, 'sweatband') !== false || strpos($name_lower, 'wristbands') !== false || strpos($name_lower, 'towel') !== false || strpos($name_lower, 'bottle') !== false || strpos($name_lower, 'pump') !== false || strpos($name_lower, 'whistle') !== false) return rand(8, 25);
    if (strpos($name_lower, 'grip') !== false || strpos($name_lower, 'tape') !== false || strpos($name_lower, 'wax') !== false || strpos($name_lower, 'lube') !== false || strpos($name_lower, 'sunscreen') !== false || strpos($name_lower, 'cleaner') !== false || strpos($name_lower, 'clip') !== false || strpos($name_lower, 'plugs') !== false || strpos($name_lower, 'dampener') !== false) return rand(5, 15);

    // Fallback default
    return rand(20, 100);
}

srand(123);
$updated_count = 0;
foreach ($products as &$p) {
    if (isset($p['name'])) {
        $p['price'] = get_realistic_price($p['name']);
        $updated_count++;
    }
}

$new_content = $prefix . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents($file_path, $new_content);

echo "Successfully updated prices for $updated_count products.\n";
?>
