with open("dashboard.php", "r", encoding="utf-8") as f:
    lines = f.readlines()

new_content = []
for i, line in enumerate(lines):
    if i < 490: # lines 1-490
        new_content.append(line)
    elif i == 490: # line 491
        new_content.append('''            <?php
            require_once 'db_connect.php';
            try {
                $stmt = $pdo->query("SELECT * FROM tbl_content");
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (count($rows) > 0) {
                    foreach ($rows as $row) {
                        echo '<div class="category-card">';
                        echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['title']) . '">';
                        echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<div class="equipment-list">';
                        echo $row['description'];
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p style="text-align:center; grid-column: 1 / -1; font-size: 1.2rem; color: var(--text-muted); padding: 2rem;">No records found</p>';
                }
            } catch (PDOException $e) {
                echo '<p style="text-align:center; grid-column: 1 / -1; color: red;">Error fetching data: ' . htmlspecialchars($e->getMessage()) . '</p>';
            }
            ?>\n''')
    elif i >= 754: # lines 755 onwards
        new_content.append(line)

with open("dashboard.php", "w", encoding="utf-8") as f:
    f.writelines(new_content)
