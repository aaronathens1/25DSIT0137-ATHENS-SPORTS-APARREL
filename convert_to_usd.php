<?php
$file_path = "products.js";
$content = file_get_contents($file_path);
$prefix = "const products = ";

$start_pos = strpos($content, $prefix) + strlen($prefix);
$json_str = substr($content, $start_pos);

// remove trailing semicolon etc
$json_str = rtrim($json_str, " \n\r\t;");

$products = json_decode($json_str, true);

if (!$products) {
    die("Error parsing JSON. json_last_error_msg: " . json_last_error_msg() . "\n");
}

$updated_count = 0;
foreach ($products as &$p) {
    if (isset($p['price'])) {
        $p['price'] = round($p['price'] / 3800);
        $updated_count++;
    }
}

$new_content = $prefix . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents($file_path, $new_content);

echo "Successfully converted prices to USD for $updated_count products.\n";

$dash = file_get_contents('dashboard.php');

$dash = preg_replace_callback("/(<h3>(.+?)<\/h3>\s*<div class=\"equipment-list\">\s*<ul>\s*)(.*?)(\s*<\/ul>\s*<\/div>)/s", function($m) use ($products) {
    $cat_name = trim($m[2]);
    if ($cat_name === 'Soccer (Football)') $cat_name = 'Football';
    $list_html = $m[3];

    $list_html = preg_replace_callback("/<li>(.*?)<span class=\"price\">.*?<\/span><\/li>/s", function($m2) use ($products, $cat_name) {
        $item_name = trim($m2[1]);
        $best_price = null;
        
        // Custom adjustments since sometimes category mismatch or keyword is a bit different
        $search_term = strtolower($item_name);
        
        foreach ($products as $p) {
            $p_cat = strtolower(trim($p['category']));
            if ($p_cat === strtolower($cat_name) || ($cat_name == 'Football' && $p_cat == 'soccer (football)')) {
                if (stripos($p['name'], $search_term) !== false) {
                    $best_price = $p['price'];
                    break;
                }
            }
        }
        
        if ($best_price !== null) {
            return "<li>" . $m2[1] . "<span class=\"price\">$" . $best_price . "</span></li>";
        }
        return $m2[0]; // fallback
    }, $list_html);

    return $m[1] . $list_html . $m[4];
}, $dash);

file_put_contents('dashboard.php', $dash);
echo "Dashboard updated.\n";
?>
