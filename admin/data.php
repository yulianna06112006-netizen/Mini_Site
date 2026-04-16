<?php
require '../config.php';

$name_product = $_POST["name"];
$price_product = $_POST["price"];
$description_product = $_POST["description"];
$image_product = $_FILES["image"];

$newFileName = $image_product['name'];
$uploadPath = '../img/' . $newFileName;
$imagePath = './img/' . $newFileName; 

echo "Название продукта: " . $name_product . "<br>";
echo "Цена продукта: " . $price_product . "<br>";
echo "Описание продукта: " . $description_product . "<br>";
echo "Картинка продукта: " . $newFileName . "<br>";

if (move_uploaded_file($image_product['tmp_name'], $uploadPath)) {
    echo "Файл загружен успешно!<br>";
    
    $stmt = $conn->prepare("INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $name_product, $price_product, $description_product, $imagePath);
    
    if ($stmt->execute()) {
        echo "Товар успешно добавлен!<br>";
        echo "<a href='../glavnaya.php'>Вернуться на главную</a><br>";
        echo "<a href='admin.php'>Вернуться в админ-панель</a>";
    } else {
        echo "Ошибка при добавлении товара: " . $conn->error;
    }
    
    $stmt->close();
} else {
    echo "Ошибка при загрузке файла";
}

$conn->close();
?>