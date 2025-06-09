<?php include 'views/layouts/header.php'; ?>
<style>
.cart-container {
    max-width: 800px;
    margin: 40px auto;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.10);
    padding: 30px 24px;
}
.cart-title {
    text-align: center;
    color: #e53935;
    font-size: 2em;
    font-weight: 700;
    margin-bottom: 24px;
}
.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 18px;
}
.cart-table th, .cart-table td {
    padding: 12px 8px;
    border-bottom: 1px solid #eee;
    text-align: center;
}
.cart-table th {
    background: #f7fafd;
    color: #e53935;
    font-weight: 600;
}
.cart-table img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #eee;
}
.cart-actions {
    text-align: right;
}
.cart-actions button {
    background: #e53935;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 18px;
    font-weight: 600;
    cursor: pointer;
    margin-left: 8px;
    transition: background 0.2s;
}
.cart-actions button:hover {
    background: #b71c1c;
}
.empty-cart {
    text-align: center;
    color: #888;
    font-size: 1.1em;
    margin: 40px 0;
}
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
                ?>
                <tr>
                    <td>
                        <img src="<?= htmlspecialchars($item['image'] ?: 'https://via.placeholder.com/60x60?text=No+Image') ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    </td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
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
                    <td colspan="4" style="text-align:right;font-weight:700;">Tổng cộng:</td>
                    <td colspan="2" style="color:#e53935;font-weight:700;"><?= number_format($total, 0, ',', '.') ?> đ</td>
                </tr>
            </table>
            <?php if (!empty($items)): ?>
    <!-- ... bảng giỏ hàng ... -->
    <div class="cart-actions">
        <button type="submit">Cập nhật giỏ hàng</button>
        <a href="index.php?action=checkout" class="btn" style="margin-left:10px;">Thanh toán</a>
    </div>
<?php endif; ?>
        </form>
    <?php endif; ?>
</div>
<?php include 'views/layouts/footer.php'; ?>