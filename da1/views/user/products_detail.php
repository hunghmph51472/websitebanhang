<?php include 'views/layouts/header.php'; ?>

<div class="product-detail">
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="assets/images/product/<?= htmlspecialchars($product['image'] ?: 'no-image.png') ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="max-width:300px;">
    <div class="product-price" style="color:#e53935;font-size:1.3em;margin:15px 0;">
        <?= number_format($product['price'], 0, ',', '.') ?> đ
    </div>
    <div class="product-description" style="margin-bottom:20px;">
        <?= nl2br(htmlspecialchars($product['description'])) ?>
    </div>
    <form method="POST" action="index.php?action=add_to_cart&product_id=<?= $product['id'] ?>">
        <input type="number" name="quantity" value="1" min="1" style="width:60px;">
        <button class="btn" type="submit">Thêm vào giỏ</button>
    </form>
    <div style="margin-top:20px;">
        <a href="index.php?action=products">← Quay lại danh sách sản phẩm</a>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>