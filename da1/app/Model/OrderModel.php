<?php
class OrderModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection(); // Trả về PDO object
    }

public function getFullOrderInformation($order_id) {
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
}