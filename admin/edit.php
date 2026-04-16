<?php
include "../config.php";

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    
    $query = "UPDATE products 
              SET name='$name', price='$price', description='$description', image='$image' 
              WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать товар</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .form-section {
            max-width: 650px;
            margin: 50px auto;
            padding: 35px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .form-section h1 {
            text-align: center;
            color: rgb(96, 37, 49);
            margin-bottom: 30px;
            font-size: 24px;
        }
        .form-section input,
        .form-section textarea {
            width: 100%;
            padding: 14px 16px;
            margin-bottom: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: inherit;
        }
        .form-section input:focus,
        .form-section textarea:focus {
            outline: none;
            border-color: rgb(96, 37, 49);
            box-shadow: 0 0 0 4px rgba(96, 37, 49, 0.15);
        }
        .form-section textarea {
            resize: vertical;
            min-height: 100px;
        }
        .form-section button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, rgb(30, 90, 133), rgb(96, 37, 49));
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        .form-section button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(96, 37, 49, 0.4);
        }
        .form-section a {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: rgb(96, 37, 49);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }
        .form-section a:hover {
            color: rgb(30, 90, 133);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <section class="form-section">
        <h1>Редактировать товар</h1>
        <form method="POST">
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" placeholder="Название товара" required>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" placeholder="Цена в рублях" required>
            <textarea name="description" rows="5" placeholder="Описание товара..." required><?php echo htmlspecialchars($product['description']); ?></textarea>
            <input type="text" name="image" value="<?php echo htmlspecialchars($product['image']); ?>" placeholder="Путь к картинке (например: ./img/monitor.png)" required>
            
            <button type="submit">Сохранить изменения</button>
            <a href="admin.php">← Вернуться в админ-панель</a>
        </form>
    </section>
    
</body>
</html>