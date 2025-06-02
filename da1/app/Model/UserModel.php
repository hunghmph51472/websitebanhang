<?php
require_once './app/Database/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function register($username, $password, $is_admin = 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password, is_admin) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $hash, $is_admin]);
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getAllUsers() {
        $stmt = $this->db->query("SELECT id, username, is_admin FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
