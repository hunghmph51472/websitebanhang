<?php require_once 'views/user/menu.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
<style>
    .add-product-container {
        max-width: 500px;
        margin: 40px auto 30px auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 32px 28px 24px 28px;
    }
    .add-product-container h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 22px;
        text-align: center;
    }
    .add-product-container label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
        display: block;
    }
    .add-product-container input[type="text"],
    .add-product-container input[type="number"] {
        width: 100%;
        padding: 9px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 16px;
        font-size: 1rem;
        background: #fafbfc;
        transition: border 0.2s;
    }
    .add-product-container input[type="file"] {
        margin-bottom: 18px;
    }
    .add-product-container button {
        background: #2196f3;
        color: #fff;
        padding: 10px 22px;
        border-radius: 6px;
        border: none;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
        width: 100%;
        margin-top: 10px;
    }
    .add-product-container button:hover {
        background: #1769aa;
    }
    .add-product-container .back-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        color: #2196f3;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .add-product-container .back-link:hover {
        color: #1769aa;
        text-decoration: underline;
    }
</style>
<div class="add-product-container">
    <h2><i class="fa fa-plus"></i> Thêm Sản Phẩm</h2>
    <form method="POST" action="index.php?action=add_product" enctype="multipart/form-data">
        <label>Tên sản phẩm:</label>
        <input type="text" name="name" required>

        <label>Giá:</label>
        <input type="number" name="price" step="0.01" required>

        <label>Ảnh sản phẩm:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit"><i class="fa fa-plus"></i> Thêm sản phẩm</button>
    </form>
    <a href="index.php?action=admin_products" class="back-link"><i class="fa fa-arrow-left"></i> Quay lại danh sách</a>
</div>
<?php include 'views/layouts/footer.php'; ?>