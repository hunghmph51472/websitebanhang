<?php require_once 'menu.php'; ?>
<div style="max-width:500px;margin:50px auto;background:#fff;padding:40px 30px;border-radius:10px;box-shadow:0 2px 12px #e0e0e0;text-align:center;">
    <svg width="60" height="60" fill="#4caf50" viewBox="0 0 24 24">
        <path d="M20.285 6.709l-11.285 11.285-5.285-5.285 1.414-1.414 3.871 3.871 9.871-9.871z"/>
    </svg>
    <h2 style="color:#4caf50;margin:20px 0 10px;">Đặt hàng thành công!</h2>
    <p style="font-size:1.1em;">Cảm ơn bạn đã mua hàng tại <b>Shop Điện Thoại MUVN</b>.<br>
    Đơn hàng của bạn sẽ được xử lý và giao sớm nhất.</p>
    <div style="margin-top:30px;">
        <a href="index.php" class="btn" style="margin-right:10px; background:#2196f3;">Về trang chủ</a>
        <?php if (!empty($order_id)): ?>
            <a href="index.php?action=order_status&id=<?= $order_id ?>" class="btn" style="background:#4caf50;">Theo dõi đơn hàng</a>
        <?php endif; ?>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>