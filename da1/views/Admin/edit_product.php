<h2>Sửa Sản Phẩm</h2>
<form method="POST" action="index.php?action=edit_product&id=<?= $product['id'] ?>" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" step="0.01" value="<?= $product['price'] ?>" required><br><br>

    <label>Ảnh sản phẩm hiện tại:</label><br>
    <?php if ($product['image']): ?>
        <img src="assets/images/product/<?= htmlspecialchars($product['image']) ?>" width="100"><br>
    <?php else: ?>
        Không có ảnh<br>
    <?php endif; ?>
    <label>Chọn ảnh mới (nếu muốn đổi):</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit">Cập nhật sản phẩm</button>
</form>
<a href="index.php?action=admin_products">Quay lại danh sách</a>