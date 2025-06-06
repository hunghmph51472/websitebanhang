<?php

require_once 'app/Model/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function list() {
        $products = $this->productModel->getAll();
        include './views/user/product.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: ?action=products");
            exit;
        }
        $product = $this->productModel->getById($id);
        if (!$product) {
            echo "Sản phẩm không tồn tại.";
            exit;
        }
        include 'views/user/product_detail.php';
    }

    // Admin pages below

    private function checkAdmin() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
            die("Bạn không có quyền truy cập.");
        }
    }

    public function adminList() {
        $this->checkAdmin();
        $products = $this->productModel->getAll();
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
