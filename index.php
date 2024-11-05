<?php
require_once 'config/db_connect.php';

// Fetch all items
$stmt = $pdo->query("SELECT * FROM items ORDER BY created_at DESC");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>List Manager</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>My List</h1>
        
        <form action="actions/add_item.php" method="POST">
            <input type="text" name="title" placeholder="Add new item" required>
            <button type="submit">Add</button>
        </form>

        <ul class="item-list">
            <?php foreach($items as $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['title']); ?>
                    <form action="actions/delete_item.php" method="POST" class="delete-form">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
