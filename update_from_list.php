<?php
$content = file_get_contents('products.js');
$start = strpos($content, '[');
$end = strrpos($content, ']');
$json_str = substr($content, $start, $end - $start + 1);

$products = json_decode($json_str, true);

$colors = [
    'Red' => 'e74c3c',
    'Blue' => '3498db',
    'Black' => '2c3e50',
    'White' => 'ecf0f1',
    'Neon' => '39ff14',
    'Silver' => 'bdc3c7',
    'Gold' => 'f1c40f',
    'Green' => '2ecc71',
    'Yellow' => 'f1c40f',
    'Orange' => 'e67e22',
    'Carbon' => '111111',
    'Matte' => '333333',
    'Glossy' => '999999'
];

$text_colors = [
    'White' => '2c3e50',
    'Neon' => '2c3e50',
    'Silver' => '2c3e50',
    'Gold' => '2c3e50',
    'Yellow' => '2c3e50',
    'Default' => 'ffffff'
];

$target_names = [
    "classic carbon rib protector", "performance yellow kickin tee", "elite blue knee pads", "advanced silver knee pads", "premium gold match ball", "ultra orange cleats", "essential black shoulder pads", "signature glossy helmet", "signature silver match ball", "tournament gold jersey", "premium orange shoulder pads", "ultra green rib protector", "pro red knee pads", "performance orange helmet", "classic green training pants", "signature blue match ball", "essential matte match ball", "performance green helmet", "ultra green kicking tee", "advanced orange knee pads", "ultra neon shoulder pads", "signature blue helmet", "elite carbon knee pads", "advanced red jersey", "advanced black gloves", "essential silver gloves", "advanced white cleats", "signature glossy firm ground cleats", "pro red dual action pump", "pro yellow knee-high socks", "advanced silver speed ladder", "performance carbon captain armband", "essential yellow captain armband", "ultra carbon agility cones", "vantage neon goalie gloves", "elite orange agility cones"
];

$updated = 0;
foreach ($products as &$p) {
    // Also include them if they loosely match (kickin tee vs kicking tee)
    $name_lower = strtolower($p['name']);
    
    // We update replacing the weird images
    $bg = '34495e'; // Default blue-grey
    $color_found = 'Default';
    foreach ($colors as $name => $hex) {
        if (stripos($p['name'], $name) !== false) {
            $bg = $hex;
            if (isset($text_colors[$name])) {
                $color_found = $name;
            }
            break;
        }
    }
    $fg = isset($text_colors[$color_found]) ? $text_colors[$color_found] : $text_colors['Default'];
    
    $text = str_replace(' ', '+', $p['name']);
    
    $p['image'] = "https://placehold.co/400x400/{$bg}/{$fg}?text={$text}";
    $updated++;
}

$new_content = "const products = " . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents('products.js', $new_content);

echo "Updated " . $updated . " items with perfect placeholders.\n";
?>
