<?php
// Отключаем обработку ошибок
mysqli_report(MYSQLI_REPORT_OFF);

// Подключение к MySQL (ПРАВИЛЬНЫЙ IP!)
$conn = mysqli_connect(
    '127.0.1.27',  // ← ИЗМЕНИЛИ IP!
    'root',        // пользователь
    '',            // пароль
    'electronic-shop',  // база данных
    3306           // порт
);

// Проверяем подключение
if (!$conn) {
    die("❌ Ошибка подключения: " . mysqli_connect_error());
}

// Устанавливаем кодировку
mysqli_set_charset($conn, "utf8");
?>