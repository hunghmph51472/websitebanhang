<h2>Giỏ hàng của bạn</h2>
<?php if (empty($items)): ?>
    <p>Giỏ hàng trống</p>
<?php else: ?>
    <ul>
        <?php foreach ($items as $id => $qty): ?>
            <li>Sản phẩm ID: <?= $id ?> - Số lượng: <?= $qty ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
