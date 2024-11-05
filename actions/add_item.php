<?php
require_once '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
    $title = trim($_POST['title']);
    
    $stmt = $pdo->prepare("INSERT INTO items (title) VALUES (?)");
    $stmt->execute([$title]);
    
    header('Location: ../index.php');
    exit();
}
?>
