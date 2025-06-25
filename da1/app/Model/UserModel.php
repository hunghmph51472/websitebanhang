<?php
require_once './app/Database/database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
    public function getOrdersByUser($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, name, email, is_admin FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Đăng ký tài khoản mới
    public function register($name, $email, $password, $is_admin = 0)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $hash, $is_admin]);
    }

    // Đăng nhập bằng email và mật khẩu
    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            // Xóa trường password trước khi trả về user
            unset($user['password']);
            return $user;
        }
        return false;
    }

    // Lấy tất cả user (không trả về password)
    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT id, name, email, is_admin FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Kiểm tra email đã tồn tại chưa
    public function emailExists($email)
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }

    // Lấy user theo ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT id, name, email, is_admin FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $name, $email, $is_admin)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, is_admin = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $is_admin, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function updateRole($id, $role)
{
    $stmt = $this->db->prepare("UPDATE users SET role = ? WHERE id = ?");
    return $stmt->execute([$role, $id]);
}
}
