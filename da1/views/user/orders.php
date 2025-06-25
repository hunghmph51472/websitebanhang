
<?php require_once 'views/user/menu.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<div class="container my-5">
    <h2 class="mb-4"><i class="fa fa-history me-2 text-primary"></i>Xác nhận thanh toán đơn hàng</h2>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Ngày đặt</th>
                        <th>Sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['created_at'] ?></td>
                                <td>
                                    <?php if (!empty($order['items'])): ?>
                                        <ul class="mb-0 ps-3">
                                            <?php foreach ($order['items'] as $item): ?>
                                                 <img src="assets/images/product/<?= htmlspecialchars($item['image'] ?? 'no-image.png') ?>" alt="" style="width:32px;height:32px;object-fit:cover;border-radius:4px;vertical-align:middle;margin-right:6px;">
                                                <?= htmlspecialchars($item['product_name']) ?>
                                                (x<?= $item['quantity'] ?>)
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                        <span class="text-muted">Không có sản phẩm</span>
                                    <?php endif; ?>
                                </td>
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
                                <td>
                                    <?php if (!empty($order['is_paid']) && $order['is_paid']): ?>
                                        <span class="badge bg-success">Đã thanh toán</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Chưa thanh toán</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (empty($order['is_paid']) || !$order['is_paid']): ?>
                                        <form method="post" action="index.php?action=shipper_paid&id=<?= $order['id'] ?>" onsubmit="return confirm('Xác nhận đơn hàng này đã thanh toán?');" class="d-inline">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i> Xác nhận đã thanh toán
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-muted">Đã xác nhận</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Không có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>