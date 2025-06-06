<h2>Quản lý sản phẩm</h2>
<a href="index.php?action=add_product">Thêm sản phẩm mới</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
        <td>
            <?php if ($product['image']): ?>
                <img src="assets/images/product/<?= htmlspecialchars($product['image']) ?>" width="60">
            <?php else: ?>
                Không có ảnh
            <?php endif; ?>
        </td>
        <td>
            <a href="index.php?action=edit_product&id=<?= $product['id'] ?>">Sửa</a> |
            <a href="index.php?action=delete_product&id=<?= $product['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>