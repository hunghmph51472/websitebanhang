<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Shop Điện thoại</title>
    <style>
        body { font-family: Arial, sans-serif; margin:0; padding:0; background:#f5f5f5; }
        header, footer { background:#333; color:#fff; padding: 15px 20px; }
        nav a { color:#fff; margin-right:15px; text-decoration:none; }
        .container { max-width: 1200px; margin: 20px auto; padding: 0 15px; }
        .product-list { display: flex; flex-wrap: wrap; gap: 20px; }
        .product-item { background:#fff; border: 1px solid #ddd; padding: 10px; width: 230px; box-sizing: border-box; border-radius: 4px; text-align: center; }
        .product-item img { max-width: 100%; height: auto; }
        .product-name { font-weight: bold; margin: 10px 0 5px; }
        .product-price { color: #e91e63; font-size: 1.1em; margin-bottom: 10px; }
        .btn { background: #e91e63; color: white; padding: 8px 12px; border: none; border-radius: 3px; cursor: pointer; text-decoration:none; display:inline-block; }
        .btn:hover { background: #c2185b; }
        .welcome { margin-bottom: 20px; }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="index.php?action=products">Trang chủ</a>
        <?php if(isset($_SESSION['user'])): ?>
            Xin chào, <strong><?=htmlspecialchars($_SESSION['user']['name'] ?? $_SESSION['user']['email'] ?? 'User')?></strong>  |
            <a href="index.php?action=cart">Giỏ hàng</a> |
            <?php if($_SESSION['user']['is_admin']): ?>
                <a href="index.php?action=admin_products">Quản lý sản phẩm</a> |
            <?php endif; ?>
            <a href="index.php?action=logout">Đăng xuất</a>
        <?php else: ?>
            <a href="index.php?action=login">Đăng nhập</a> |
            <a href="index.php?action=register">Đăng ký</a>
        <?php endif; ?>
    </nav>
</header>
<div class="container">
