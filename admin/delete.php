<?php
require '../config.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: admin.php?deleted=1");
        exit;
    } else {
        echo "Ошибка при удалении: " . $conn->error;
    }
    
    $stmt->close();
} else {
    header("Location: index.php");
    exit;
}

$conn->close();
?>