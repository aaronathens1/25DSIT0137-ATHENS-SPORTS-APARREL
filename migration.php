<?php
require 'db_connect.php';

try {
    // Create tbl_content table
    $sql = "CREATE TABLE IF NOT EXISTS tbl_content (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        image_url VARCHAR(255) NOT NULL
    )";
    $pdo->exec($sql);
    echo "Table 'tbl_content' created or already exists.\n";
    
    // Parse dashboard.php for repeated HTML
    $html = file_get_contents('dashboard.php');
    if (preg_match_all('/<div class="category-card">\s*<img src="([^"]+)" alt="([^"]+)">\s*<h3>(.*?)<\/h3>\s*<div class="equipment-list">\s*(<ul>.*?<\/ul>)\s*<\/div>\s*<\/div>/is', $html, $matches)) {
        
        $stmt = $pdo->prepare("INSERT INTO tbl_content (title, description, image_url) VALUES (?, ?, ?)");
        
        // Truncate to avoid duplicates during dev
        $pdo->exec("TRUNCATE TABLE tbl_content");
        
        $count = count($matches[0]);
        for ($i = 0; $i < $count; $i++) {
            $imageUrl = $matches[1][$i];
            $titleFromH3 = trim($matches[3][$i]); // Use the h3 text
            $description = trim($matches[4][$i]);
            $stmt->execute([$titleFromH3, $description, $imageUrl]);
        }
        echo "Successfully migrated $count categories into tbl_content!\n";
    } else {
        echo "Regex failed to match any categories.\n"; 
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
