<?php
require_once './app/Database/database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($name, $description, $price, $image) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $image]);
    }

    public function update($id, $name, $description, $price, $image) {
        $stmt = $this->db->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
        return $stmt->execute([$name, $description, $price, $image, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>