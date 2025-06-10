<?php require_once 'views/user/menu.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
<style>
    .admin-products-container {
        max-width: 1100px;
        margin: 40px auto 30px auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 32px 28px 24px 28px;
    }
    .admin-products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }
    .admin-products-header h2 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #222;
        margin: 0;
    }
    .admin-products-header a {
        background: #2196f3;
        color: #fff;
        padding: 10px 22px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.2s;
        display: inline-block;
    }
    .admin-products-header a:hover {
        background: #1769aa;
    }
    .admin-products-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }
    .admin-products-table th, .admin-products-table td {
        padding: 13px 12px;
        border-bottom: 1px solid #f0f0f0;
        text-align: left;
        font-size: 1rem;
    }
    .admin-products-table th {
        background: #f7f9fa;
        color: #333;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }
    .admin-products-table tr:last-child td {
        border-bottom: none;
    }
    .admin-products-table img {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        max-width: 60px;
        max-height: 60px;
        object-fit: cover;
    }
    .admin-action-btn {
        display: inline-block;
        margin-right: 8px;
        padding: 7px 14px;
        border-radius: 5px;
        font-size: 0.98rem;
        text-decoration: none;
        color: #fff;
        background: #4caf50;
        transition: background 0.2s;
    }
    .admin-action-btn.edit { background: #2196f3; }
    .admin-action-btn.edit:hover { background: #1769aa; }
    .admin-action-btn.delete { background: #e53935; }
    .admin-action-btn.delete:hover { background: #b71c1c; }
    @media (max-width: 700px) {
        .admin-products-container { padding: 10px 2px; }
        .admin-products-header { flex-direction: column; align-items: flex-start; gap: 12px; }
        .admin-products-table th, .admin-products-table td { font-size: 0.95rem; padding: 8px 5px; }
    }
</style>
<div class="admin-products-container">
    <div class="admin-products-header">
        <h2><i class="fa fa-box"></i> Quản lý sản phẩm</h2>
        <a href="index.php?action=add_product"><i class="fa fa-plus"></i> Thêm sản phẩm mới</a>
    </div>
    <div class="table-responsive">
        <table class="admin-products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
                    <td>
                        <?php if ($product['image']): ?>
                            <img src="assets/images/product/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        <?php else: ?>
                            <span style="color:#888;">Không có ảnh</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?action=edit_product&id=<?= $product['id'] ?>" class="admin-action-btn edit"><i class="fa fa-edit"></i> Sửa</a>
                        <a href="index.php?action=delete_product&id=<?= $product['id'] ?>" class="admin-action-btn delete" onclick="return confirm('Xóa sản phẩm này?')"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>