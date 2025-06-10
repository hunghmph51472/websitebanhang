<?php require_once 'menu.php'; ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

body {
    font-family: 'Roboto', Arial, sans-serif;
    background: #f6f8fa;
}

.cart-container {
    max-width: 1100px;
    margin: 48px auto 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.10);
    padding: 36px 28px 32px 28px;
    transition: box-shadow 0.2s;
}

.cart-title {
    text-align: center;
    color: #1a202c;
    font-size: 2.2em;
    font-weight: 700;
    margin-bottom: 32px;
    letter-spacing: 1px;
}

.cart-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
    margin-bottom: 22px;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.04);
}

.cart-table th, .cart-table td {
    padding: 16px 10px;
    background: #fff;
    text-align: center;
    font-size: 1.08em;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
}

.cart-table th {
    background: #f3f6fa;
    color: #00704A;
    font-weight: 700;
    font-size: 1.12em;
    border-bottom: 2px solid #e0e0e0;
}

.cart-table tr:last-child td {
    border-bottom: none;
}

.cart-table img {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    background: #fafbfc;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.cart-table input[type="number"] {
    width: 56px;
    padding: 7px 0;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    font-size: 1em;
    text-align: center;
    background: #f7fafc;
    transition: border 0.2s;
}

.cart-table input[type="number"]:focus {
    border: 1.5px solid #00704A;
    outline: none;
    background: #fff;
}

.product-form-select {
    width: 100%;
    margin-bottom: 0;
    padding: 4px 6px;
    border-radius: 5px;
    border: 1px solid #e0e0e0;
    font-size: 14px;
    background: #f8f8f8;
}

.color-dot {
    display: inline-block;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid #ddd;
    margin: 0 2px;
    vertical-align: middle;
    cursor: pointer;
    transition: border 0.2s;
    position: relative;
}
.color-dot.selected, .color-dot:hover {
    border: 2.5px solid #00704A;
    box-shadow: 0 0 0 2px #43cea2;
}
.color-dot.black { background: #222; }
.color-dot.white { background: #fff; }
.color-dot.blue { background: #2196f3; }
.color-dot.red { background: #e53935; }
.color-dot::after {
    content: '';
    display: none;
    position: absolute;
    left: 7px; top: 7px;
    width: 12px; height: 12px;
    border-radius: 50%;
    background: rgba(0,0,0,0.08);
}
.color-dot.selected::after {
    display: block;
}

.cart-table a.btn,
.cart-actions .btn {
    background: #2196f3;
    color: #fff !important;
    padding: 9px 22px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1em;
    margin-left: 10px;
    transition: background 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(33,150,243,0.08);
    display: inline-block;
}

.cart-table a.btn:hover,
.cart-actions .btn:hover {
    background: #1769aa;
}

.cart-actions {
    text-align: right;
    margin-top: 18px;
}

.cart-actions button {
    background: linear-gradient(90deg, #00704A 0%, #43cea2 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 10px 24px;
    font-weight: 700;
    font-size: 1em;
    cursor: pointer;
    margin-left: 8px;
    box-shadow: 0 2px 8px rgba(67,206,162,0.08);
    transition: background 0.2s, box-shadow 0.2s;
}

.cart-actions button:hover {
    background: linear-gradient(90deg, #43cea2 0%, #00704A 100%);
    box-shadow: 0 4px 16px rgba(67,206,162,0.13);
}

.cart-table a[style*="color:#e53935"] {
    color: #e53935 !important;
    font-size: 1.2em;
    border-radius: 50%;
    padding: 4px 10px;
    background: #fff0f0;
    transition: background 0.2s, color 0.2s;
    display: inline-block;
}

.cart-table a[style*="color:#e53935"]:hover {
    background: #e53935;
    color: #fff !important;
}

.empty-cart {
    text-align: center;
    color: #bbb;
    font-size: 1.18em;
    margin: 60px 0 40px 0;
    letter-spacing: 1px;
}

@media (max-width: 900px) {
    .cart-container {
        padding: 12px 2vw;
        max-width: 99vw;
    }
    .cart-title {
        font-size: 1.3em;
    }
    .cart-table th, .cart-table td {
        padding: 8px 2px;
        font-size: 0.98em;
    }
    .cart-table img {
        width: 44px;
        height: 44px;
    }
    .cart-actions {
        text-align: center;
    }
}
.color-select option[value="Đen"]   { color: #222; font-weight: bold; }
.color-select option[value="Titan"]   { color: #7c3aed; font-weight: bold; }
.color-select option[value="Xanh"]  { color: #2196f3; font-weight: bold; }
.color-select option[value="Mạ vàng"]  { color: #ffe600; font-weight: bold; }
</style>
<div class="cart-container">
    <div class="cart-title">Giỏ hàng của bạn</div>
    <?php if (empty($items)): ?>
        <div class="empty-cart">Giỏ hàng trống</div>
    <?php else: ?>
        <form method="POST" action="?action=update_cart">
            <table class="cart-table">
                <tr>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Bộ nhớ</th>
                    <th>Tình trạng</th>
                    <th>Gói bảo hành</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                <?php
                $total = 0;
                foreach ($items as $item):
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                    // Xác định màu cho dot
                    $colorValue = strtolower($item['color'] ?? 'đen');
                    $colorClass = 'black';
                    if ($colorValue == 'đen') $colorClass = 'black';
                    elseif ($colorValue == 'trắng') $colorClass = 'white';
                    elseif ($colorValue == 'xanh') $colorClass = 'blue';
                    elseif ($colorValue == 'đỏ') $colorClass = 'red';
                ?>
                <tr>
                    <td>
                        <img src="assets/images/product/<?= htmlspecialchars($item['image'] ?? 'no-image.png') ?>" width="60">
                    </td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td>
    <select name="color[<?= $item['id'] ?>]" class="product-form-select color-select" style="width: 70px; padding-left: 8px;">
        <option value="Đen" <?= ($item['color'] ?? 'Đen') == 'Đen' ? 'selected' : '' ?> data-color="#222">● Đen</option>
        <option value="Tím" <?= ($item['color'] ?? '') == 'Tím' ? 'selected' : '' ?> data-color="#7c3aed" style="color:#7c3aed;">● Titan</option>
        <option value="Xanh" <?= ($item['color'] ?? '') == 'Xanh' ? 'selected' : '' ?> data-color="#2196f3" style="color:#2196f3;">● Xanh</option>
        <option value="Vàng" <?= ($item['color'] ?? '') == 'Vàng' ? 'selected' : '' ?> data-color="#ffe600" style="color:#ffe600;">● Mạ Vàng</option>
    </select>
</td>
                    <td>
                        <select name="memory[<?= $item['id'] ?>]" class="product-form-select">
                            <option value="64GB" <?= ($item['memory'] ?? '') == '64GB' ? 'selected' : '' ?>>64GB</option>
                            <option value="256GB" <?= ($item['memory'] ?? '') == '256GB' ? 'selected' : '' ?>>256GB</option>
                            <option value="512GB" <?= ($item['memory'] ?? '') == '512GB' ? 'selected' : '' ?>>512GB</option>
                        </select>
                    </td>
                    <td>
                        <select name="condition[<?= $item['id'] ?>]" class="product-form-select">
                            <option value="98% - Pin 8x" <?= ($item['condition'] ?? '') == '98% - Pin 8x' ? 'selected' : '' ?>>98% - Pin 8x</option>
                            <option value="99% - Pin 8x" <?= ($item['condition'] ?? '') == '99% - Pin 8x' ? 'selected' : '' ?>>99% - Pin 8x</option>
                            <option value="98% - Pin 9x" <?= ($item['condition'] ?? '') == '98% - Pin 9x' ? 'selected' : '' ?>>98% - Pin 9x</option>
                            <option value="99% - Pin 9x" <?= ($item['condition'] ?? '') == '99% - Pin 9x' ? 'selected' : '' ?>>99% - Pin 9x</option>
                        </select>
                    </td>
                    <td>
                        <select name="warranty[<?= $item['id'] ?>]" class="product-form-select">
                            <option value="BHV 6 tháng" <?= ($item['warranty'] ?? '') == 'BHV 6 tháng' ? 'selected' : '' ?>>BHV 6 tháng</option>
                            <option value="BHV 12 tháng" <?= ($item['warranty'] ?? '') == 'BHV 12 tháng' ? 'selected' : '' ?>>BHV 12 tháng</option>
                        </select>
                    </td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> đ</td>
                    <td>
                        <input type="number" name="items[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1" style="width:55px; text-align:center;">
                    </td>
                    <td><?= number_format($subtotal, 0, ',', '.') ?> đ</td>
                    <td>
                        <a href="?action=remove_cart_item&item_id=<?= $item['id'] ?>" onclick="return confirm('Xóa sản phẩm này khỏi giỏ?')" style="color:#e53935;font-weight:bold;">X</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="8" style="text-align:right;font-weight:700;">Tổng cộng:</td>
                    <td colspan="2" style="color:#e53935;font-weight:700;"><?= number_format($total, 0, ',', '.') ?> đ</td>
                </tr>
            </table>
            <div class="cart-actions">
                <button type="submit">Cập nhật giỏ hàng</button>
                <a href="index.php?action=checkout" class="btn" style="margin-left:10px;background:#2196f3;color:#fff;padding:8px 18px;border-radius:5px;text-decoration:none;">Thanh toán</a>
            </div>
        </form>
    <?php endif; ?>
</div>
<?php include 'views/layouts/footer.php'; ?>