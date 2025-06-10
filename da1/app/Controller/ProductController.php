<?php

require_once 'app/Model/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function list() {
        $products = $this->productModel->getAll();
        include './views/user/home.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: ?action=home");
            exit;
        }
        $product = $this->productModel->getById($id);
        if (!$product) {
            echo "Sản phẩm không tồn tại.";
            exit;
        }
        include 'views/user/products_detail.php';
    }

    // Admin pages below

    private function checkAdmin() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
        echo '<div style="max-width:400px;margin:60px auto;padding:32px 24px;background:#fff;border-radius:10px;box-shadow:0 2px 16px rgba(0,0,0,0.08);text-align:center">';
        echo '<div style="font-size:2.2rem;color:#e53935;margin-bottom:18px;"><i class="fa fa-ban"></i></div>';
        echo '<div style="font-size:1.15rem;font-weight:600;color:#222;margin-bottom:18px;">Bạn không có quyền truy cập trang quản trị!</div>';
        echo '<a href="index.php" style="display:inline-block;padding:10px 22px;background:#2196f3;color:#fff;border-radius:6px;text-decoration:none;font-weight:500;">Quay lại trang chủ</a>';
        echo '</div>';
        exit;
    }
}

    public function adminList() {
        $this->checkAdmin();
        $products = $this->productModel->getAll('ASC');
        include 'views/admin/products.php';
    }

    public function addForm() {
        $this->checkAdmin();
        include 'views/admin/add_product.php';
    }

    public function add() {
        $this->checkAdmin();

        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? 0;
        $image = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "assets/images/product/";
        $fileName = time() . '_' . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = $fileName;
        }
    }

        if ($name && $price > 0) {
            $this->productModel->add($name, $description, $price, $image);
            header("Location: ?action=admin_products");
        } else {
            echo "Vui lòng nhập đầy đủ thông tin.";
        }
    }

    public function editForm() {
    $this->checkAdmin();
    $id = $_GET['id'] ?? 0;
    $product = $this->productModel->getById($id);
    if (!$product) {
        echo "Sản phẩm không tồn tại.";
        exit;
    }
    include 'views/admin/edit_product.php';
}

public function edit() {
    $this->checkAdmin();
    $id = $_GET['id'] ?? 0;
    $product = $this->productModel->getById($id);
    if (!$product) {
        echo "Sản phẩm không tồn tại.";
        exit;
    }
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $image = $product['image'];

    // Xử lý upload ảnh mới nếu có
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $targetDir = "assets/images/product/";
        $fileName = time() . '_' . basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $fileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $image = $fileName;
        }
    }

    $this->productModel->update($id, $name, '', $price, $image);
    header("Location: index.php?action=admin_products");
}

    public function delete() {
        $this->checkAdmin();

        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->productModel->delete($id);
        }
        header("Location: ?action=admin_products");
    }
}
