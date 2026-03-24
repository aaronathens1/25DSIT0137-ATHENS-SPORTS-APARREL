<?php
function get_wiki_image($title) {
    $url = "https://en.wikipedia.org/w/api.php?action=query&titles=" . urlencode($title) . "&prop=pageimages&format=json&pithumbsize=400";
    $options = [
        "http" => [
            "header" => "User-Agent: Mozilla/5.0\r\n"
        ]
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    if ($response) {
        $data = json_decode($response, true);
        if (isset($data['query']['pages'])) {
            $pages = $data['query']['pages'];
            foreach ($pages as $page) {
                if (isset($page['thumbnail']['source'])) {
                    return $page['thumbnail']['source'];
                }
            }
        }
    }
    return "football.jpg";
}

$mappings = [
    "Match Ball" => "ball_gen.png",
    "Gloves" => "gloves_gen.png",
    "Jersey" => "authentic_jersey.jpg",
    "Cleats" => get_wiki_image("Cleat_(shoe)"),
    "Shoulder Pads" => get_wiki_image("Shoulder_pads_(American_football)"),
    "Rib Protector" => get_wiki_image("Flak_jacket"),
    "Kicking Tee" => get_wiki_image("Tee_(sports)"),
    "Helmet" => get_wiki_image("Football_helmet"),
    "Knee Pads" => get_wiki_image("Knee_pad"),
    "Training Pants" => get_wiki_image("Sweatpants")
];

$content = file_get_contents('products.js');
$start = strpos($content, '[');
$end = strrpos($content, ']');
$json_str = substr($content, $start, $end - $start + 1);

$products = json_decode($json_str, true);
if (!$products) {
    die("Error parsing JSON. Ensure products.js contains valid JSON inside the array assignment.");
}

$updated_count = 0;
foreach ($products as &$p) {
    if ($p['category'] === 'Football') {
        foreach ($mappings as $key => $img) {
            if (stripos($p['name'], $key) !== false) {
                $p['image'] = $img;
                $updated_count++;
                break;
            }
        }
    }
}

$new_content = "const products = " . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents('products.js', $new_content);

echo "Successfully updated " . $updated_count . " football products with accurate wiki/local images.\n";
?>
