<?php

require_once 'app/Model/CartModel.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    private function checkLogin() {
        if (!isset($_SESSION['user'])) {
            header("Location: ?action=login");
            exit;
        }
    }

    public function view() {
        $this->checkLogin();

        $user_id = $_SESSION['user']['id'];
        $cart = $this->cartModel->getCartByUserId($user_id);
        $items = $this->cartModel->getItems($cart['id']);

        include 'views/user/cart.php';
    }

    public function add() {
    $this->checkLogin();
    $user_id = $_SESSION['user']['id'];
    $product_id = $_POST['product_id'] ?? null;
    $quantity = $_POST['quantity'] ?? 1;
    $color = $_POST['color'] ?? null;
    $memory = $_POST['memory'] ?? null;
    $condition = $_POST['condition'] ?? null;
    $warranty = $_POST['warranty'] ?? null;
    if ($product_id) {
        $cart = $this->cartModel->getCartByUserId($user_id);
        $this->cartModel->addItem($cart['id'], $product_id, $quantity, $color, $memory, $condition, $warranty);
    }
    header("Location: ?action=cart");
}

    public function update() {
        $this->checkLogin();

        $items = $_POST['items'] ?? [];
        foreach ($items as $item_id => $qty) {
            $this->cartModel->updateItem($item_id, intval($qty));
        }
        header("Location: ?action=cart");
    }

    public function remove() {
        $this->checkLogin();

        $item_id = $_GET['item_id'] ?? null;
        if ($item_id) {
            $this->cartModel->removeItem($item_id);
        }
        header("Location: ?action=cart");
    }
    public function checkout() {
    $this->checkLogin();
    $user_id = $_SESSION['user']['id'];
    $cart = $this->cartModel->getCartByUserId($user_id);
    $items = $this->cartModel->getItems($cart['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy thông tin khách hàng từ form
        $customer_name = $_POST['customer_name'] ?? '';
        $customer_phone = $_POST['customer_phone'] ?? '';
        $customer_address = $_POST['customer_address'] ?? '';
        $payment_method = $_POST['payment_method'] ?? '';

        // Tính tổng tiền
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Tạo đơn hàng (thêm các trường khách hàng)
        $db = Database::getConnection();
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO orders (user_id, total, customer_name, customer_phone, customer_address, payment_method) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $total, $customer_name, $customer_phone, $customer_address, $payment_method]);
        $order_id = $db->lastInsertId();

        // Thêm từng sản phẩm vào order_items
        $stmtItem = $db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($items as $item) {
            $stmtItem->execute([$order_id, $item['product_id'], $item['quantity'], $item['price']]);
        }

        // Xóa giỏ hàng sau khi đặt hàng
        $db->prepare("DELETE FROM cart_items WHERE cart_id = ?")->execute([$cart['id']]);
        $db->commit();

        // Hiển thị thông báo thành công
        include 'views/user/checkout_success.php';
        return;
    }

    // ...hiển thị form checkout nếu không phải POST...
        include 'views/user/checkout.php';

}

}