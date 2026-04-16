<?php 
include "../config.php";
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

?>

<section class="admin-panel">
    <h1>Управление товарами</h1>
    
    <?php if (isset($_GET['deleted'])): ?>
        <p style="color: green; text-align: center;">Товар успешно удален!</p>
    <?php endif; ?>
    
    <a href="create.php" class="btn-add">Добавить товар</a>
    
    <table class="products-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php while($product = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo number_format($product['price'], 0, '.', ' '); ?> руб.</td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Редактировать</a>
                    <a href="delete.php?id=<?php echo $product['id']; ?>" 
                       onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">Удалить</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</section>

<style>
.admin-panel {
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.admin-panel h1 {
    text-align: center;
    margin-bottom: 30px;
    color: rgb(96, 37, 49);
}

.btn-add {
    display: inline-block;
    background: linear-gradient(135deg, rgb(30, 90, 133), rgb(96, 37, 49));
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.btn-add:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.products-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.products-table th,
.products-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

.products-table th {
    background-color: rgb(96, 37, 49);
    color: white;
    font-weight: bold;
}

.products-table tr:hover {
    background-color: #f5f5f5;
}

.products-table a {
    margin-right: 15px;
    text-decoration: none;
    padding: 5px 10px;
    transition: all 0.3s ease;
}

.products-table a{
    color:rgb(181, 52, 52);
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 0%;
}
.products-table>a:hover{
    color:rgb(35, 37, 107);
}
</style>
