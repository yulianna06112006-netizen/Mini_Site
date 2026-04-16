<?php 
include "config.php";

$query = "SELECT * FROM products LIMIT 4";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Ошибка запроса: " . mysqli_error($conn));
}

include "header.php";
?>

<section class="popular-tovar">
<h3>Популярные товары</h3>
<div class="tovar-list">
<?php while($product = mysqli_fetch_assoc($result)): ?>
    <div class="tovar-card">
        <div class="tovar-img">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                 alt="<?php echo htmlspecialchars($product['name']); ?>" 
                 width="500">
        </div>
        <div class="tovar-info">
            <p><?php echo htmlspecialchars($product['name']); ?></p>
            <a href="product.php?id=<?php echo $product['id']; ?>">Подробнее</a>
        </div>
    </div>
<?php endwhile; ?>
</div>
</section>

<?php include "footer.php"; ?>