<?php
$lines = file('dashboard.php');
$new_content = [];

foreach ($lines as $i => $line) {
    if ($i < 490) { // lines 1-490
        $new_content[] = $line;
    } elseif ($i == 490) { // line 491
        $new_content[] = "            <?php\n";
        $new_content[] = "            require_once 'db_connect.php';\n";
        $new_content[] = "            try {\n";
        $new_content[] = "                \$stmt = \$pdo->query(\"SELECT * FROM tbl_content\");\n";
        $new_content[] = "                \$rows = \$stmt->fetchAll(PDO::FETCH_ASSOC);\n";
        $new_content[] = "                if (count(\$rows) > 0) {\n";
        $new_content[] = "                    foreach (\$rows as \$row) {\n";
        $new_content[] = "                        echo '<div class=\"category-card\">';\n";
        $new_content[] = "                        echo '<img src=\"' . htmlspecialchars(\$row['image_url']) . '\" alt=\"' . htmlspecialchars(\$row['title']) . '\">';\n";
        $new_content[] = "                        echo '<h3>' . htmlspecialchars(\$row['title']) . '</h3>';\n";
        $new_content[] = "                        echo '<div class=\"equipment-list\">';\n";
        $new_content[] = "                        echo \$row['description'];\n";
        $new_content[] = "                        echo '</div>';\n";
        $new_content[] = "                        echo '</div>';\n";
        $new_content[] = "                    }\n";
        $new_content[] = "                } else {\n";
        $new_content[] = "                    echo '<p style=\"text-align:center; grid-column: 1 / -1; font-size: 1.2rem; color: var(--text-muted); padding: 2rem;\">No records found</p>';\n";
        $new_content[] = "                }\n";
        $new_content[] = "            } catch (PDOException \$e) {\n";
        $new_content[] = "                echo '<p style=\"text-align:center; grid-column: 1 / -1; color: red;\">Error fetching data: ' . htmlspecialchars(\$e->getMessage()) . '</p>';\n";
        $new_content[] = "            }\n";
        $new_content[] = "            ?>\n";
    } elseif ($i >= 754) { // lines 755 onwards
        $new_content[] = $line;
    }
}

file_put_contents('dashboard.php', implode("", $new_content));
echo "Successfully updated dashboard.php\n";
?>
