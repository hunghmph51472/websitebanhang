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
   public function updateStatus($id, $status) {
    $stmt = $this->db->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
    // Nếu trạng thái là "Đã hủy" thì xóa đơn hàng
    if ($status === 'Đã hủy') {
        $this->delete($id);
    }
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
}
