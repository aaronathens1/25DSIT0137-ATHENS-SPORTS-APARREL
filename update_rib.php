<?php
$content = file_get_contents('products.js');
$start = strpos($content, '[');
$end = strrpos($content, ']');
$json_str = substr($content, $start, $end - $start + 1);

$products = json_decode($json_str, true);

$updated_count = 0;
foreach ($products as &$p) {
    if ($p['category'] === 'Football' && stripos($p['name'], 'Rib Protector') !== false) {
        $p['image'] = 'https://placehold.co/400x400/111111/ff5500?text=Rib\nProtector';
        $updated_count++;
    }
}

$new_content = "const products = " . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents('products.js', $new_content);

echo "Updated Rib Protectors.\n";
?>
