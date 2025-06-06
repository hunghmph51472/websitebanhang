<?php
require_once './app/Database/database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Lấy tất cả sản phẩm, mới nhất lên đầu
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm mới
    public function add($name, $description, $price, $image) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $image]);
    }

    // Cập nhật sản phẩm
    public function update($id, $name, $description, $price, $image) {
        $stmt = $this->db->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
        return $stmt->execute([$name, $description, $price, $image, $id]);
    }

    // Xóa sản phẩm
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }

    // Lấy sản phẩm theo tên (tìm kiếm)
    public function searchByName($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE name LIKE ?");
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo khoảng giá
    public function getByPriceRange($min, $max) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE price BETWEEN ? AND ? ORDER BY price ASC");
        $stmt->execute([$min, $max]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}