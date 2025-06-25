<?php require_once 'menu.php'; ?>
<div class="product-detail" style="max-width:700px;margin:40px auto;padding:30px 40px;background:#fff;border-radius:10px;box-shadow:0 2px 16px rgba(0,0,0,0.08);">
    <div style="display:flex;gap:40px;align-items:flex-start;">
        <img src="assets/images/product/<?= htmlspecialchars($product['image'] ?: 'no-image.png') ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="max-width:300px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.06);">
        <div style="flex:1;">
            <h2 style="margin-bottom:10px;"><?= htmlspecialchars($product['name']) ?></h2>
            <div class="product-price" style="color:#e53935;font-size:1.5em;font-weight:bold;margin-bottom:18px;">
                <?= number_format($product['price'], 0, ',', '.') ?> đ
            </div>
            <div class="product-description" style="margin-bottom:18px;color:#444;">
                <?= nl2br(htmlspecialchars($product['description'])) ?>
            </div>
            <form method="POST" action="index.php?action=add_to_cart&product_id=<?= $product['id'] ?>" style="margin-bottom:0;">
                <div style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:15px;">
                    <input type="number" name="quantity" value="1" min="1" style="width:70px;padding:6px 8px;border-radius:4px;border:1px solid #ccc;">
                    <select name="color" required style="padding:6px 8px;border-radius:4px;border:1px solid #ccc;">
                        <option value="" disabled selected>Màu sắc</option>
                        <option value="Đen">Đen</option>
                        <option value="Tím">Tím</option>
                        <option value="Xanh">Xanh</option>
                        <option value="Vàng">Vàng</option>
                    </select>
                    <select name="memory" required style="padding:6px 8px;border-radius:4px;border:1px solid #ccc;">
                        <option value="" disabled selected>Bộ nhớ</option>
                        <option value="64GB">64GB</option>
                        <option value="256GB">256GB</option>
                        <option value="512GB">512GB</option>
                    </select>
                    <select name="condition" required style="padding:6px 8px;border-radius:4px;border:1px solid #ccc;">
                        <option value="" disabled selected>Tình trạng</option>
                        <option value="98% - Pin 8x">98% - Pin 8x</option>
                        <option value="99% - Pin 8x">99% - Pin 8x</option>
                        <option value="98% - Pin 9x">98% - Pin 9x</option>
                        <option value="99% - Pin 9x">99% - Pin 9x</option>
                    </select>
                    <select name="warranty" required style="padding:6px 8px;border-radius:4px;border:1px solid #ccc;">
                        <option value="" disabled selected>Gói bảo hành</option>
                        <option value="BHV 6 tháng">BHV 6 tháng</option>
                        <option value="BHV 12 tháng">BHV 12 tháng</option>
                    </select>
                </div>
                <button class="btn" type="submit" style="background:#4caf50;color:#fff;padding:8px 28px;border:none;border-radius:4px;font-size:1em;">Thêm vào giỏ</button>
            </form>
            <div style="margin-top:18px;">
                <a href="index.php?action=products" style="color:#1976d2;text-decoration:none;">← Quay lại danh sách sản phẩm</a>
            </div>
        </div>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>