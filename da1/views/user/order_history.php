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
                        <th>Ngày đặt</th>
                        <th>Sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
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
                                    <?php if ($order['status'] == 'Chờ xử lý'): ?>
                                        <form method="post" action="index.php?action=delete_order_user&id=<?= $order['id'] ?>" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này?');" class="d-inline">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i> Hủy đơn
                                            </button>
                                        </form>
                                    <?php elseif ($order['status'] == 'Đang giao' || $order['status'] == 'Đã giao'): ?>
                                        <button class="btn btn-secondary btn-sm" disabled>
                                            <i class="fa fa-ban"></i> Không thể hủy
                                        </button>
                                    <?php elseif ($order['status'] == 'Đã hủy'): ?>
                                        <span class="text-muted">Đã hủy</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>