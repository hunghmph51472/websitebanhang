<?php
require_once 'app/Model/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function registerForm() {
        include 'views/user/register.php';
    }

    public function register() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username && $password) {
            $success = $this->userModel->register($username, $password);
            if ($success) {
                header("Location: ?action=login");
            } else {
                echo "Đăng ký thất bại. Có thể username đã tồn tại.";
            }
        } else {
            echo "Vui lòng nhập đầy đủ thông tin.";
        }
    }

    public function loginForm() {
        include 'views/user/login.php';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->login($username, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
        } else {
            echo "Đăng nhập thất bại.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}