<?php

require_once 'app/Model/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
            echo "Bạn không có quyền truy cập!";
            exit;
        }
    }

    public function adminList()
    {
        $this->checkAdmin();
        $users = $this->userModel->getAll();
        include 'views/Admin/users.php';
    }

    public function registerForm()
    {
        include 'views/user/register.php';
    }

    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($name && $email && $password) {
            // Kiểm tra email đã tồn tại chưa
            if ($this->userModel->emailExists($email)) {
                $error = "Email đã tồn tại!";
                include 'views/user/register.php';
                return;
            }
            $success = $this->userModel->register($name, $email, $password);
            if ($success) {
                header("Location: ?action=login");
                exit;
            } else {
                $error = "Đăng ký thất bại.";
                include 'views/user/register.php';
            }
        } else {
            $error = "Vui lòng nhập đầy đủ thông tin.";
            include 'views/user/register.php';
        }
    }
    public function orderHistory()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $user_id = $_SESSION['user']['id'];
        $orders = $this->userModel->getOrdersByUser($user_id);
        include 'views/user/order_history.php';
    }
    public function loginForm()
    {
        $error = '';
        include 'views/user/login.php';
    }

    public function login()
    {
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

    public function logout()
    {
        session_destroy();
        header("Location: index.php");
    }
    public function editForm()
    {
        $this->checkAdmin();
        $id = $_GET['id'] ?? 0;
        $user = $this->userModel->getById($id);
        if (!$user) {
            echo "Người dùng không tồn tại.";
            exit;
        }
        include 'views/Admin/edit_users.php';
    }
    public function delete()
    {
        $this->checkAdmin();
        $id = $_GET['id'] ?? 0;
        $this->userModel->delete($id);
        header("Location: index.php?action=admin_users");
    }
    public function edit()
    {
        $this->checkAdmin();
        $id = $_GET['id'] ?? 0;
        $user = $this->userModel->getById($id);
        if (!$user) {
            echo "Người dùng không tồn tại.";
            exit;
        }
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $this->userModel->update($id, $name, $email, $is_admin);
        header("Location: index.php?action=admin_users");
    }
}
