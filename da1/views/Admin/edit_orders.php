<?php require_once 'views/user/menu.php'; ?>
<h2>Sửa đơn hàng</h2>
<form method="post" action="index.php?action=edit_order&id=<?= $order['id'] ?>">
    <div class="mb-3">
        <label>Khách hàng</label>
<input type="text" name="customer_name" class="form-control" value="<?= htmlspecialchars($order['customer_name'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label>Ngày đặt</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($order['created_at'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label>Tổng tiền</label>
        <input type="text" class="form-control" value="<?= number_format($order['total'] ?? 0) ?> đ">
    </div>
    <div class="mb-3">
        <label>Trạng thái đơn hàng</label>
        <select name="status" class="form-select">
            <option value="Chờ xử lý" <?= $order['status']=='Chờ xử lý'?'selected':''; ?>>Chờ xử lý</option>
            <option value="Đang giao" <?= $order['status']=='Đang giao'?'selected':''; ?>>Đang giao</option>
            <option value="Đã giao" <?= $order['status']=='Đã giao'?'selected':''; ?>>Đã giao</option>
            <option value="Đã hủy" <?= $order['status']=='Đã hủy'?'selected':''; ?>>Đã hủy</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="index.php?action=admin_orders" class="btn btn-secondary">Quay lại</a>
</form>
<?php include 'views/layouts/footer.php'; ?>