<?php 
include "config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Товар не найден!");
}

$product = mysqli_fetch_assoc($result);

include "header.php";
?>

<section class="product-page">
    <div class="tovar-img-page">
        <img src="<?php echo htmlspecialchars($product['image']); ?>" 
             alt="<?php echo htmlspecialchars($product['name']); ?>" 
             width="800">
    </div>
    <div class="tovar-info-page">
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <div class="price">
            <b><?php echo number_format($product['price'], 0, '.', ' '); ?> руб.</b>
        </div>
        <br><br>
        <p>Описание</p>
        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        <br>
        <button id="buyBtn">Купить</button>
    </div>
</section>

<script>
const btn = document.getElementById('buyBtn');
btn.addEventListener('click', (e) => {
    alert('Покупка совершена!');
});
</script>

<?php include "footer.php"; ?>