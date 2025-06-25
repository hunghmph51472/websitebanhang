<?php
class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection(); // Kết nối PDO
    }
    // Lấy tất cả đơn hàng
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM orders ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy đơn hàng theo ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin chi tiết đơn hàng (sản phẩm, tổng, địa chỉ...)
    public function getFullOrderInformation($order_id)
    {
        $sql = "SELECT 
                oi.*, 
                p.name as product_name,
                p.image,
                o.created_at,
                o.customer_name,
                o.customer_phone,
                o.customer_address,
                o.total,
                o.payment_method
            FROM order_items oi
            JOIN products p ON oi.product_id = p.id
            JOIN orders o ON oi.order_id = o.id
            WHERE oi.order_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateOrder($id, $customer_name, $total, $status)
    {
        $stmt = $this->db->prepare("UPDATE orders SET customer_name = ?, total = ?, status = ? WHERE id = ?");
        return $stmt->execute([$customer_name, $total, $status, $id]);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus($id, $newStatus)
    {
        // Lấy trạng thái hiện tại
        $stmt = $this->db->prepare("SELECT status FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        $current = $stmt->fetchColumn();

        // Không cho phép chuyển trạng thái nếu đã là "Đã giao" hoặc "Đã hủy"
        if ($current === 'Đã giao' || $current === 'Đã hủy') {
            return false;
        }

        // Logic chuyển trạng thái hợp lệ
        $allowed = [
            'Chờ xử lý' => ['Đang giao', 'Đã hủy'],
            'Đang giao' => ['Đã giao', 'Đã hủy'],
        ];

        if (!isset($allowed[$current]) || !in_array($newStatus, $allowed[$current])) {
            return false;
        }

        // Nếu trạng thái mới là "Đã hủy" thì xóa đơn hàng
        if ($newStatus === 'Đã hủy') {
            $this->delete($id);
            return true;
        }

        // Cập nhật trạng thái nếu hợp lệ
        $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->execute([$newStatus, $id]);
        return true;
    }
    // Xóa đơn hàng
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ?");
        return $stmt->execute([$id]);
    }
    // Thêm đơn hàng mới
    public function autoUpdateDeliveredOrders()
    {
        $sql = "UPDATE orders 
            SET status = 'Đã giao' 
            WHERE status = 'Đang giao' 
              AND created_at <= DATE_SUB(NOW(), INTERVAL 2 DAY)";
        $this->db->query($sql);
    }
    public function getAllWithProducts()
    {
        $sql = "SELECT o.*, GROUP_CONCAT(p.name SEPARATOR ', ') as products
            FROM orders o
            LEFT JOIN order_items oi ON o.id = oi.order_id
            LEFT JOIN products p ON oi.product_id = p.id
            GROUP BY o.id
            ORDER BY o.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Lấy đơn hàng theo user_id

    public function getOrdersByUserId($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updatePaid($orderId, $isPaid)
    {
        $stmt = $this->db->prepare("UPDATE orders SET is_paid = ? WHERE id = ?");
        return $stmt->execute([$isPaid, $orderId]);
    }
    public function getOrdersByStatus($status)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE status = ?");
        $stmt->execute([$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
