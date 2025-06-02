<?php
require_once './app/Database/database.php';

class Cart {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Lấy giỏ hàng theo user_id, tạo mới nếu chưa có
    public function getCartByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM carts WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cart) {
            $stmt = $this->db->prepare("INSERT INTO carts (user_id) VALUES (?)");
            $stmt->execute([$user_id]);
            $cart_id = $this->db->lastInsertId();
            $stmt = $this->db->prepare("SELECT * FROM carts WHERE id = ?");
            $stmt->execute([$cart_id]);
            $cart = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $cart;
    }

    public function addItem($cart_id, $product_id, $quantity = 1) {
        // Kiểm tra sản phẩm có trong giỏ chưa
        $stmt = $this->db->prepare("SELECT * FROM cart_items WHERE cart_id = ? AND product_id = ?");
        $stmt->execute([$cart_id, $product_id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            // Cập nhật số lượng
            $newQty = $item['quantity'] + $quantity;
            $stmt = $this->db->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
            return $stmt->execute([$newQty, $item['id']]);
        } else {
            // Thêm mới
            $stmt = $this->db->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)");
            return $stmt->execute([$cart_id, $product_id, $quantity]);
        }
    }

    public function getItems($cart_id) {
        $stmt = $this->db->prepare("
            SELECT ci.*, p.name, p.price, p.image
            FROM cart_items ci
            JOIN products p ON ci.product_id = p.id
            WHERE ci.cart_id = ?
        ");
        $stmt->execute([$cart_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateItem($item_id, $quantity) {
        if ($quantity <= 0) {
            $stmt = $this->db->prepare("DELETE FROM cart_items WHERE id = ?");
            return $stmt->execute([$item_id]);
        } else {
            $stmt = $this->db->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
            return $stmt->execute([$quantity, $item_id]);
        }
    }

    public function removeItem($item_id) {
        $stmt = $this->db->prepare("DELETE FROM cart_items WHERE id = ?");
        return $stmt->execute([$item_id]);
    }
}
?>