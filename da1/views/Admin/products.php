<?php require_once 'views/user/menu.php'; ?>
<div class="container my-5">
    <h2 class="mb-4"><i class="fa fa-box"></i> Quản lý sản phẩm</h2>
    <a href="index.php?action=admin_dashboard" class="btn btn-secondary mb-3">
        <i class="fa fa-arrow-left"></i> Quay lại trang quản trị
    </a>
    <table class="table table-bordered table-hover align-middle">
                                <a href="index.php?action=add_product" class="btn btn-primary btn-sm">Thêm sản phẩm</a>
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price']) ?> đ</td>
                    <td>
                        <?php if ($product['image']): ?>
                            <img src="assets/images/product/<?= $product['image'] ?>" width="60">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?action=edit_product&id=<?= $product['id'] ?>" class="btn btn-info btn-sm">Sửa</a>
                        <a href="index.php?action=delete_product&id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">Chưa có sản phẩm nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include 'views/layouts/footer.php'; ?>