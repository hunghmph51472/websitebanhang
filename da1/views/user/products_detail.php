<?php require_once 'menu.php'; ?>
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
<form method="POST" action="index.php?action=add_to_cart&product_id=<?= $product['id'] ?>">
    <input type="number" name="quantity" value="1" min="1" style="width:60px;">
    <select name="color" required>
        <option value="" disabled selected>Màu sắc</option>
        <option value="Đen">Đen</option>
        <option value="Tím">Tím</option>
        <option value="Xanh">Xanh</option>
        <option value="Vàng">Vàng</option>
    </select>
    <select name="memory" required>
        <option value="" disabled selected>Bộ nhớ</option>
        <option value="64GB">64GB</option>
        <option value="256GB">256GB</option>
        <option value="512GB">512GB</option>
    </select>
    <select name="condition" required>
        <option value="" disabled selected>Tình trạng</option>
        <option value="98% - Pin 8x">98% - Pin 8x</option>
        <option value="99% - Pin 8x">99% - Pin 8x</option>
        <option value="98% - Pin 9x">98% - Pin 9x</option>
        <option value="99% - Pin 9x">99% - Pin 9x</option>
    </select>
    <select name="warranty" required>
        <option value="" disabled selected>Gói bảo hành</option>
        <option value="BHV 6 tháng">BHV 6 tháng</option>
        <option value="BHV 12 tháng">BHV 12 tháng</option>
    </select>
    <button class="btn" type="submit">Thêm vào giỏ</button>
</form>
    </form>
    <div style="margin-top:20px;">
        <a href="index.php?action=products">← Quay lại danh sách sản phẩm</a>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>