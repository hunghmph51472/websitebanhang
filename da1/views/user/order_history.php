<?php require_once 'views/user/menu.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<div class="container my-5">
    <h2 class="mb-4"><i class="fa fa-history me-2 text-primary"></i>Lịch sử đơn hàng của bạn</h2>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['created_at'] ?></td>
                            <td><?= number_format($order['total']) ?> đ</td>
                            <td>
                                <?php
                                    $badge = 'secondary';
                                    if ($order['status'] == 'Chờ xử lý') $badge = 'warning';
                                    elseif ($order['status'] == 'Đang giao') $badge = 'info';
                                    elseif ($order['status'] == 'Đã giao') $badge = 'success';
                                    elseif ($order['status'] == 'Đã hủy') $badge = 'danger';
                                ?>
                                <span class="badge bg-<?= $badge ?>"><?= htmlspecialchars($order['status']) ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>