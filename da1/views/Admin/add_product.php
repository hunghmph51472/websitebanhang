<h2>Thêm Sản Phẩm</h2>
<form method="POST" action="index.php?action=admin/add-product" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" step="0.01" required><br><br>

    <label>Ảnh sản phẩm:</label><br>
    <input type="file" name="image" accept="image/*" required><br><br>

    <button type="submit">Thêm sản phẩm</button>
</form>
