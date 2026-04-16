<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        .form-section {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .form-section h1 {
            text-align: center;
            margin-bottom: 30px;
            color: rgb(96, 37, 49);
        }

        .form-section label {
            display: block;
            margin-bottom: 8px;
            color: rgb(96, 37, 49);
            font-weight: bold;
        }

        .form-section input[type="text"],
        .form-section input[type="number"],
        .form-section textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-section input[type="text"]:focus,
        .form-section input[type="number"]:focus,
        .form-section textarea:focus {
            outline: none;
            border-color: rgb(96, 37, 49);
        }

        .form-section input[type="file"] {
            margin-bottom: 20px;
            padding: 10px;
        }

        .form-section button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, rgb(30, 90, 133), rgb(96, 37, 49));
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-section button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .form-section a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: rgb(96, 37, 49);
            text-decoration: none;
            font-weight: bold;
        }

        .form-section a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <section class="form-section">
        <h1>Добавить новый товар</h1>
        <form action="data.php" method="POST" enctype="multipart/form-data">
            <label for="name">Название товара:</label>
            <input type="text" id="name" name="name" placeholder="" required><br>
            
            <label for="price">Цена (руб.):</label>
            <input type="number" id="price" name="price" placeholder="" required><br>
            
            <label for="description">Описание:</label>
            <textarea id="description" name="description" rows="5" placeholder="" required></textarea><br>
            
            <label for="image">Изображение:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>
            
            <button type="submit">Добавить товар</button>
            <a href="admin.php">Отмена</a>
        </form>
    </section>
    
</body>
</html>