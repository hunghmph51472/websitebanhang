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
}
