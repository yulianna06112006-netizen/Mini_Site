<?php 
include "config.php";

$query = "SELECT * FROM products";
$result = $conn->query($query);
$products = $result->fetch_all(MYSQLI_ASSOC);

include "header.php";
?>

<section class="popular-tovar">
    <h3>Товары</h3>
    <div class="tovar-list">
        <?php foreach ($products as $product): ?>
        <div class="tovar-card">
            <div class="tovar-img">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?>" 
                     width="500">
            </div>
            <div class="tovar-info">
                <p><?php echo htmlspecialchars($product['name']); ?></p>
                <p><b><?php echo number_format($product['price'], 0, '.', ' '); ?> руб.</b></p>
                <a href="product.php?id=<?php echo $product['id']; ?>">Подробнее</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include "footer.php"; ?>