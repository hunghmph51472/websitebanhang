<?php require_once 'views/user/menu.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>
    .dashboard-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 18px;
    }
    .dashboard-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.12);
        background: #f8f9fa;
    }
    .dashboard-icon {
        font-size: 3rem;
        margin-bottom: 12px;
    }
    .dashboard-title {
        font-weight: 600;
        font-size: 1.2rem;
        color: #222;
    }
</style>

<div class="container my-5">
    <h2 class="mb-4"><i class="fa fa-tachometer-alt me-2"></i> Bảng điều khiển quản trị</h2>
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <a href="index.php?action=admin_products" class="text-decoration-none">
                <div class="card dashboard-card shadow-sm border-0 h-100 py-4">
                    <div class="card-body">
                        <i class="fa fa-box dashboard-icon text-primary"></i>
                        <div class="dashboard-title">Quản lý sản phẩm</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index.php?action=admin_orders" class="text-decoration-none">
                <div class="card dashboard-card shadow-sm border-0 h-100 py-4">
                    <div class="card-body">
                        <i class="fa fa-receipt dashboard-icon text-success"></i>
                        <div class="dashboard-title">Quản lý đơn hàng</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index.php?action=admin_users" class="text-decoration-none">
                <div class="card dashboard-card shadow-sm border-0 h-100 py-4">
                    <div class="card-body">
                        <i class="fa fa-users dashboard-icon text-warning"></i>
                        <div class="dashboard-title">Quản lý người dùng</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php require_once 'views/layouts/footer.php'; ?>