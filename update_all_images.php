<?php
function get_wiki_image($title) {
    if (strpos($title, '.jpg') !== false || strpos($title, '.png') !== false) {
        return $title; // Local file
    }
    
    $url = "https://en.wikipedia.org/w/api.php?action=query&titles=" . urlencode($title) . "&prop=pageimages&format=json&pithumbsize=400";
    $options = [
        "http" => [
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\n"
        ]
    ];
    $context = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);
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
    return null;
}

$category_fallbacks = [
    "Football" => "football.jpg",
    "Basketball" => "basketball.jpg",
    "Running" => "running.jpg",
    "Gym" => "gym.jpg",
    "Tennis" => "tennis.jpg",
    "Baseball" => "baseball.jpg",
    "Swimming" => "swimming.jpg"
];

$mappings = [
    "Match Ball" => "ball_gen.png",
    "Jersey" => "authentic_jersey.jpg",
    "Running Shoes" => "running-shoes.jpg",
    "Shoulder Pads" => "Shoulder_pads_(American_football)",
    "Rib Protector" => "Flak_jacket",
    "Kicking Tee" => "Tee_(sports)",
    "Helmet" => "Football_helmet",
    "Batting Helmet" => "Batting_helmet", // Needs to be checked before Helmet
    "Knee Pads" => "Knee_pad",
    "Training Pants" => "Sweatpants",
    "Headband" => "Sweatband",
    "Sweatband" => "Sweatband",
    "Wristbands" => "Sweatband",
    "High-Top" => "Sneakers",
    "Court Shoes" => "Sneakers",
    "Bag" => "Duffel_bag",
    "Sleeve" => "Compression_garment",
    "Hoop" => "Backboard_(basketball)",
    "Shorts" => "Shorts",
    "Basketball" => "Basketball_(ball)",
    "Pump" => "Bicycle_pump",
    "Polo" => "Polo_shirt",
    "Net" => "Net_(device)",
    "Windbreaker" => "Windbreaker",
    "Armband" => "Brassard",
    "Reflective" => "High-visibility_clothing",
    "Watch" => "Smartwatch",
    "Bottle" => "Water_bottle",
    "Socks" => "Sock",
    "Bands" => "Resistance_band",
    "Pull-up" => "Chin-up_bar",
    "Rope" => "Skipping_rope",
    "Mat" => "Yoga_mat",
    "Weight Bench" => "Weight_bench",
    "Roller" => "Foam_roller",
    "Dumbbell" => "Dumbbell",
    "Belt" => "Weightlifting_belt",
    "Kettlebell" => "Kettlebell",
    "Medicine" => "Medicine_ball",
    "Racket" => "Tennis_racket",
    "Dampener" => "Vibration_dampener",
    "Hopper" => "Tennis_ball",
    "Grip" => "Grip_(tennis)",
    "Shin" => "Shin_guard",
    "Gloves" => "glove", // fallback
    "Batting Gloves" => "Batting_glove",
    "Goalie Gloves" => "Goalkeeper_glove",
    "Bat" => "Baseball_bat",
    "Baseballs" => "Baseball_(ball)",
    "Mitt" => "Baseball_glove",
    "Chest Protector" => "Chest_protector",
    "Kickboard" => "Kickboard_(swimming)",
    "Ear Plugs" => "Earplug",
    "Pull Buoy" => "Pull_buoy",
    "Towel" => "Towel",
    "Nose Clip" => "Nose_clip",
    "Swimsuit" => "Swimsuit",
    "Drybag" => "Dry_bag",
    "Cones" => "Traffic_cone",
    "Ladder" => "Agility",
    "Cleats" => "Cleat_(shoe)",
    "Leather Glove" => "Baseball_glove"
];

// Sort mappings by length so that longer specific keys match first
uksort($mappings, function($a, $b) {
    return strlen($b) - strlen($a);
});

$content = file_get_contents('products.js');
$start = strpos($content, '[');
$end = strrpos($content, ']');
$json_str = substr($content, $start, $end - $start + 1);

$products = json_decode($json_str, true);
if (!$products) {
    die("Error parsing JSON. Ensure products.js contains valid JSON inside the array assignment.\n");
}

$cache = [];
$updated_count = 0;

foreach ($products as &$p) {
    $matched = false;
    foreach ($mappings as $key => $wiki_title) {
        if (stripos($p['name'], $key) !== false) {
            
            if (!isset($cache[$wiki_title])) {
                $img_url = get_wiki_image($wiki_title);
                if (!$img_url) {
                    $cat = $p['category'];
                    $cache[$wiki_title] = isset($category_fallbacks[$cat]) ? $category_fallbacks[$cat] : "download.jpg";
                } else {
                    $cache[$wiki_title] = $img_url;
                }
                echo "Fetched $wiki_title -> " . $cache[$wiki_title] . "\n";
            }
            
            $p['image'] = $cache[$wiki_title];
            $matched = true;
            $updated_count++;
            break;
        }
    }
    
    if (!$matched) {
        $cat = $p['category'];
        $p['image'] = isset($category_fallbacks[$cat]) ? $category_fallbacks[$cat] : "download.jpg";
        $updated_count++;
    }
}

$new_content = "const products = " . json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . ";\n";
file_put_contents('products.js', $new_content);

echo "Successfully updated " . $updated_count . " products with accurate wiki/local images.\n";
?>
