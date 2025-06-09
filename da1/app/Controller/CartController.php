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
        $product_id = $_GET['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;

        if ($product_id) {
            $cart = $this->cartModel->getCartByUserId($user_id);
            $this->cartModel->addItem($cart['id'], $product_id, $quantity);
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

    if (empty($items)) {
        echo "Giỏ hàng trống, không thể thanh toán.";
        return;
    }

    // Tính tổng tiền
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Tạo đơn hàng
    $db = Database::getConnection();
    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
    $stmt->execute([$user_id, $total]);
    $order_id = $db->lastInsertId();

    // Thêm từng sản phẩm vào order_items
    $stmtItem = $db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($items as $item) {
        $stmtItem->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
    }

    // Xóa giỏ hàng sau khi đặt hàng
    $db->prepare("DELETE FROM cart_items WHERE cart_id = ?")->execute([$cart['id']]);
    $db->commit();

    // Hiển thị thông báo thành công
    include 'views/user/checkout_success.php';
$items = array_filter($items, function($item) {
    return !empty($item['id']);
});
if (empty($items)) {
    echo "Giỏ hàng không có sản phẩm hợp lệ.";
    return;
}
}

}
