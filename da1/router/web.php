<?php
session_start();
require_once 'controllers/UserController.php';
require_once 'controllers/ProductController.php';


$userController = new UserController();
$productController = new ProductController();

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();
        } else {
            $userController->registerForm();
        }
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->login();
        } else {
            $userController->loginForm();
        }
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'products':
        $productController->list();
        break;
    case 'product_detail':
        $productController->detail();
        break;
    // Admin quản lý sản phẩm
    case 'admin_products':
        $productController->adminList();
        break;
    case 'admin_dashboard':
        $productController->adminList();
        break;  
    case 'admin_users':
        $userController->adminList();
        break;
    case 'admin_add_product':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productController->add();
        } else {
            $productController->addForm();
        }
        break;
    case 'admin_edit_product':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productController->edit();
        } else {
            $productController->editForm();
        }
        break;
    case 'admin_delete_product':
        $productController->delete();
        break;
    default:
        echo "<h1>Trang chủ website bán quần áo</h1>";
        if (isset($_SESSION['user'])) {
            echo "Xin chào, " . htmlspecialchars($_SESSION['user']['username']) . " | <a href='?action=logout'>Đăng xuất</a> | ";
            echo "<a href='?action=products'>Xem sản phẩm</a>";
            if ($_SESSION['user']['is_admin'] == 1) {
                echo " | <a href='?action=admin_products'>Quản lý sản phẩm</a>";
            }
        } else {
            echo "<a href='?action=login'>Đăng nhập</a> | <a href='?action=register'>Đăng ký</a>";
        }
        break;
}
