<?php require_once 'menu.php'; ?>

<div style="max-width:700px;margin:30px auto;background:#fff;padding:30px 40px;border-radius:8px;box-shadow:0 2px 8px #eee;">
    <h2 style="margin-bottom:20px;">Thanh toán đơn hàng</h2>

    <!-- Hiển thị thông tin sản phẩm trong giỏ hàng -->
    <form method="POST" action="index.php?action=checkout" id="checkout-form">
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%;margin-bottom:25px;">
            <tr style="background:#f5f5f5;">
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
            <?php
            $total = 0;
            foreach ($items as $index => $item):
                $line_total = $item['price'] * $item['quantity'];
                $total += $line_total;
            ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>
                    <img src="assets/images/product/<?= htmlspecialchars($item['image'] ?: 'no-image.png') ?>" width="60">
                </td>
                <td>
                    <span class="item-price"><?= number_format($item['price'], 0, ',', '.') ?></span> đ
                    <input type="hidden" name="items[<?= $index ?>][price]" value="<?= $item['price'] ?>">
                    <input type="hidden" name="items[<?= $index ?>][id]" value="<?= $item['id'] ?>">
                </td>
                <td>
                    <input type="number" name="items[<?= $index ?>][quantity]" class="item-qty" value="<?= $item['quantity'] ?>" min="1" style="width:60px;">
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" style="text-align:right;"><b>Phí ship:</b></td>
                <td><b id="shipping-fee">100.000 đ</b></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right;"><b>Tổng cộng:</b></td>
                <td><b id="grand-total"><?= number_format($total + 100000, 0, ',', '.') ?> đ</b></td>
            </tr>
        </table>

        <?php if (!empty($error)): ?>
            <div style="color:red;"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div style="margin-bottom:15px;">
            <label><b>Họ tên người nhận</b></label><br>
            <input type="text" name="customer_name" required style="width:100%;padding:8px;">
        </div>
        <div style="margin-bottom:15px;">
            <label><b>Số điện thoại</b></label><br>
            <input type="text" name="customer_phone" required pattern="[0-9]{9,12}" style="width:100%;padding:8px;">
        </div>
        <div style="margin-bottom:15px;">
            <label><b>Địa chỉ nhận hàng</b></label><br>
            <input type="text" name="customer_address" required style="width:100%;padding:8px;">
        </div>
        <div style="margin-bottom:15px;">
            <label><b>Phương thức thanh toán</b></label><br>
            <select name="payment_method" style="width:100%;padding:8px;">
                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
            </select>
        </div>
        <button class="btn" type="submit" style="width:100%;font-size:1.1em;">Đặt hàng</button>
    </form>
    <div style="margin-top:20px;text-align:center;">
        <a href="index.php?action=cart">← Quay lại giỏ hàng</a>
    </div>
</div>

<script>
// Tự động cập nhật tổng tiền khi thay đổi số lượng
document.querySelectorAll('.item-qty').forEach(function(input) {
    input.addEventListener('input', function() {
        var total = 0;
        document.querySelectorAll('.item-qty').forEach(function(qtyInput) {
            var row = qtyInput.closest('tr');
            var price = parseInt(row.querySelector('input[name*="[price]"]').value);
            var qty = parseInt(qtyInput.value) || 1;
            total += price * qty;
        });
        document.getElementById('grand-total').textContent = (total + 100000).toLocaleString('vi-VN') + ' đ';
    });
});
</script>

<?php include 'views/layouts/footer.php'; ?>