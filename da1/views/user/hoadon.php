<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $order_id = $_GET['id'];
} else {
    echo "ID đơn hàng không hợp lệ.";
    exit;
}

$order_details = $OrderModel->getFullOrderInformation($order_id);
if (!$order_details) {
    echo "Không tìm thấy thông tin đơn hàng.";
    exit;
}

// Lấy thông tin đơn hàng từ dòng đầu tiên
$first = $order_details[0];
$created_at = $first['created_at'] ?? '';
$customer_name = $first['customer_name'] ?? '';
$customer_phone = $first['customer_phone'] ?? '';
$customer_address = $first['customer_address'] ?? '';
$total = $first['total'] ?? 0;
$payment_method = $first['payment_method'] ?? '';
$date_formated = !empty($created_at) ? date('d/m/Y H:i:s', strtotime($created_at)) : '';
?>

<?php require_once 'menu.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <style>
        /* Toàn bộ trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            color: #000;
            margin: 0;
            padding: 20px;
        }

        /* Khung chứa hóa đơn */
        .invoice-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
        }

        /* Tiêu đề và logo */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 80px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Phân cách tiêu đề mỗi mục */
        .section-title {
            font-size: 1.1em;
            font-weight: bold;
            border-bottom: 2px solid #000;
            margin-top: 20px;
            padding-bottom: 5px;
        }

        /* Khu vực thông tin */
        .info-section p {
            margin: 5px 0;
            font-size: 0.95em;
        }

        /* Bảng thông tin sản phẩm */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 0.95em;
        }

        .product-table th {
            background-color: #f2f2f2;
        }

        /* Mã QR */
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }

        /* Tổng tiền */
        .total-section {
            text-align: right;
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 10px;
        }
        
        .print-btn {
            margin: 20px auto;
            display: block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .print-btn:hover {
            background-color: #45a049;
        }
        @media print {
    /* Ẩn tất cả nội dung ngoài khung hóa đơn */
    body * {
        visibility: hidden;
    }

    /* Chỉ hiển thị nội dung bên trong khung hóa đơn */
    .invoice-container, .invoice-container * {
        visibility: visible;
    }

    /* Đảm bảo chỉ in khung hóa đơn */
    .invoice-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }
    
    /* Ẩn nút in */
    .print-btn {
        display: none;
    }
}
    </style>
</head>
<body>

    <div class="invoice-container">
        <!-- Thông tin vận đơn -->
        <div class="info-section">
            <p><strong>Mã vận đơn:</strong> SPXVN<?= str_pad($order_id, 12, '0', STR_PAD_LEFT) ?></p>
            <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order_id) ?></p>
        </div>

        <!-- Thông tin người gửi -->
        <div class="section-title">Thông Tin Người Gửi</div>
        <div class="info-section">
            <p><strong>Tên:</strong> MUVN SHOP</p>
            <p><strong>Địa chỉ: </strong>Phố Thụy Ứng, Huyện Đan Phượng, Thành phố Hà Nội</p>
            <p><strong>SĐT:</strong> 0123456789</p>
        </div>

        <!-- Thông tin khách hàng -->
        <div class="section-title">Thông Tin Khách Hàng</div>
        <div class="info-section">
            <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($customer_name) ?></p>
            <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($customer_phone) ?></p>
            <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($customer_address) ?></p>
            <p><strong>Thời gian:</strong> <?= $date_formated ?></p>
            <p><strong>Tổng tiền hàng:</strong> <?= number_format($total) ?>₫</p>
            <p><strong>Phí vận chuyển:</strong> Miễn phí</p>
            <p><strong>Phương thức thanh toán:</strong> <?= htmlspecialchars($payment_method) ?></p>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="section-title">Thông Tin Sản Phẩm</div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Nội dung hàng</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($order_details)) {
                    foreach ($order_details as $item) {
                        echo "
                        <tr>
                            <td>" . htmlspecialchars($item['product_name']) . "</td>
                            <td>" . htmlspecialchars($item['quantity']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Không có sản phẩm</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Mã QR -->
        <div class="qr-code">
    <img 
        src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?= urlencode('https://'.$_SERVER['HTTP_HOST'].'/websitebanhang/da1/index.php?action=order_status&id='.$order_id) ?>" 
        alt="QR Code" width="120" height="120">
    <div style="font-size:0.9em;color:#888;margin-top:4px;">Quét để xem trạng thái đơn hàng</div>
</div>

        <!-- Tổng tiền -->
        <div class="total-section">
            <p><strong>Tổng tiền:</strong> <?= number_format($total) ?>₫</p>
        </div>

        <!-- Ghi chú -->
        <div class="note">
            <p>Kiểm tra mã vận đơn và đơn hàng trước khi nhận.</p>
            <p>Tuyển dụng Tài xế/Điều phối kho SPX - Thu nhập 8-20 triệu - Gọi 1900 6885</p>
        </div>

        <!-- Nút in hóa đơn -->
        <button class="print-btn" onclick="window.print()">In hóa đơn</button>
    </div>

</body>
</html>
<?php include 'views/layouts/footer.php'; ?>