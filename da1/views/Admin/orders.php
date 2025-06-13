
<?php require_once 'views/user/menu.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fa fa-receipt me-2 text-success"></i>Quản lý đơn hàng</h2>
        <a href="index.php?action=admin_dashboard" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i> Quay lại trang quản trị
        </a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= htmlspecialchars($order['customer_name'] ?? '') ?></td>
                                <td><?= $order['created_at'] ?? '' ?></td>
                                <td><?= number_format($order['total'] ?? 0) ?> đ</td>
                                <td>
                                    <?php
                                        $badge = 'secondary';
                                        if ($order['status'] == 'Chờ xử lý') $badge = 'warning';
                                        elseif ($order['status'] == 'Đang giao') $badge = 'info';
                                        elseif ($order['status'] == 'Đã giao') $badge = 'success';
                                        elseif ($order['status'] == 'Đã hủy') $badge = 'danger';
                                    ?>
                                    <span class="badge bg-<?= $badge ?>"><?= htmlspecialchars($order['status'] ?? '') ?></span>
                                </td>
                                <td class="text-center">
                                    <form method="post" action="index.php?action=change_order_status&id=<?= $order['id'] ?>" class="d-inline">
                                        <select name="status" class="form-select form-select-sm d-inline w-auto">
                                            <option value="Chờ xử lý" <?= $order['status'] == 'Chờ xử lý' ? 'selected' : ''; ?>>Chờ xử lý</option>
                                            <option value="Đang giao" <?= $order['status'] == 'Đang giao' ? 'selected' : ''; ?>>Đang giao</option>
                                            <option value="Đã giao" <?= $order['status'] == 'Đã giao' ? 'selected' : ''; ?>>Đã giao</option>
                                            <option value="Đã hủy" <?= $order['status'] == 'Đã hủy' ? 'selected' : ''; ?>>Đã hủy</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm ms-1"><i class="fa fa-sync"></i></button>
                                    </form>
                                    <a href="index.php?action=edit_order&id=<?= $order['id'] ?>" class="btn btn-info btn-sm ms-1"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?action=delete_order&id=<?= $order['id'] ?>" class="btn btn-danger btn-sm ms-1" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Chưa có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'views/layouts/footer.php'; ?>