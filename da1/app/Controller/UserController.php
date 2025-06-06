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
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($name && $email && $password) {
            $success = $this->userModel->register($name, $email, $password);
            if ($success) {
                header("Location: ?action=login");
                exit;
            } else {
                $error = "Đăng ký thất bại. Có thể email đã tồn tại.";
                include 'views/user/register.php';
            }
        } else {
            $error = "Vui lòng nhập đầy đủ thông tin.";
            include 'views/user/register.php';
        }
    }

    public function loginForm() {
        $error = '';
        include 'views/user/login.php';
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->login($email, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit;
        } else {
            $error = "Đăng nhập thất bại. Email hoặc mật khẩu không đúng.";
            include 'views/user/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}