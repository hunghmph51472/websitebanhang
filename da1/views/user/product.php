<?php include 'views/layouts/header.php'; ?>

<div class="welcome">
    <h1>Chào mừng đến với Shop Quần Áo</h1>
    <p>Khám phá bộ sưu tập quần áo mới nhất của chúng tôi.</p>
</div>

<div class="product-list">
    <?php if (count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <a href="index.php?action=product_detail&id=<?= $product['id'] ?>">
                    <img src="<?= htmlspecialchars($product['image'] ?: 'https://via.placeholder.com/200x250?text=No+Image') ?>" alt="<?= htmlspecialchars($product['name']) ?>" />
                    <div class="product-name"><?= htmlspecialchars($product['name']) ?></div>
                </a>
                <div class="product-price"><?= number_format($product['price'], 0, ',', '.') ?> đ</div>
                <form method="POST" action="index.php?action=add_to_cart&product_id=<?= $product['id'] ?>">
                    <input type="number" name="quantity" value="1" min="1" style="width:50px;" />
                    <button class="btn" type="submit">Thêm vào giỏ</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Chưa có sản phẩm nào.</p>
    <?php endif; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
