<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Quần Áo</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/search.css">
    <style>
        /* Ẩn modal đăng nhập mặc định */
        #loginModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.3);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .header__logo {
            display: flex;
            align-items: center;
            height: 100px;
            padding: 8px 0;
        }

        .header__logo img {
            height: 108px;
            max-width: 100%;
        }

        nav a,
        .menu a,
        ul li a {
            text-decoration: none !important;
            border-bottom: none !important;
        }

        .menu a {
            text-decoration: none;
            border-bottom: none;
            color: #111;
            font-weight: bold;
            padding-bottom: 2px;
            transition: border-bottom 0.2s;
        }

        .menu a.active {
            border-bottom: 2px solid #e74c3c;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="index.php?act=/"><img src="./assets/images/banner/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li><a href="?act=/">Home</a></li>
                        <li><a href="?act=shop">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./about.html">About Us</a></li>
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="index.php?action=cart">Shopping Cart</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?action=cart">Shopping Cart</a></li>
                        <li><a href="index.php?action=admin_dashboard">Admin</a></li>
                        <li><a href="index.php?action=order_history">Lịch sử đơn hàng</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option" style="position: relative;">
                    <a href="#" id="searchIcon" class="search-switch"><img src="./assets/images/icon/search.png" alt=""></a>
                    <a href="#"><img src="./assets/images/icon/heart.png" alt=""></a>
                    <a href="?action=cart"><img src="./assets/images/icon/cart.png" alt=""></a>
                    <div class="user-dropdown" style="display:inline-block;position:relative;">
                        <a href="#" id="loginBtn" style="display:flex;align-items:center;gap:6px;">
                            <img src="./assets/images/icon/user1.png" alt="">
                            <i class="fa fa-caret-down" style="color:#888;font-size:1.1em;"></i>
                        </a>
                        <div id="userDropdownMenu" style="display:none;position:absolute;right:0;top:38px;min-width:180px;background:#fff;border:1px solid #eee;box-shadow:0 4px 16px rgba(0,0,0,0.10);border-radius:10px;z-index:1000;overflow:hidden;">
                            <?php if (empty($_SESSION['user'])): ?>
                                <a href="index.php?action=login" style="display:flex;align-items:center;gap:10px;padding:13px 20px;color:#222;text-decoration:none;font-weight:500;transition:background 0.18s;">
                                    <i class="fa fa-sign-in" style="width:18px;text-align:center;"></i> Đăng nhập
                                </a>
                                <a href="index.php?action=register" style="display:flex;align-items:center;gap:10px;padding:13px 20px;color:#222;text-decoration:none;font-weight:500;transition:background 0.18s;">
                                    <i class="fa fa-user-plus" style="width:18px;text-align:center;"></i> Đăng ký
                                </a>
                            <?php else: ?>
                                <div style="padding:15px 20px;border-bottom:1px solid #f0f0f0;display:flex;align-items:center;gap:10px;background:#f7f9fa;">
                                    <i class="fa fa-user-circle" style="font-size:1.5em;color:#2196f3;"></i>
                                    <span style="font-weight:600;color:#00704A;">
                                        <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Tài khoản') ?>
                                        <?php if (!empty($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1): ?>
                                            <span style="color:#e53935;font-weight:600;"> (admin)</span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <a href="index.php?action=logout" style="display:flex;align-items:center;gap:10px;padding:13px 20px;color:#e53935;text-decoration:none;font-weight:500;transition:background 0.18s;">
                                    <i class="fa fa-sign-out" style="width:18px;text-align:center;"></i> Đăng xuất
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <script>
                        document.getElementById('loginBtn').onclick = function(e) {
                            e.preventDefault();
                            var menu = document.getElementById('userDropdownMenu');
                            if (menu.style.display === 'block') {
                                menu.style.display = 'none';
                            } else {
                                menu.style.display = 'block';
                                setTimeout(function() {
                                    document.addEventListener('click', hideMenu);
                                }, 10);
                            }
                            e.stopPropagation();
                        };

                        function hideMenu(ev) {
                            var menu = document.getElementById('userDropdownMenu');
                            var btn = document.getElementById('loginBtn');
                            if (!menu.contains(ev.target) && ev.target !== btn) {
                                menu.style.display = 'none';
                                document.removeEventListener('click', hideMenu);
                            }
                        }
                        document.getElementById('userDropdownMenu').onclick = function(e) {
                            e.stopPropagation();
                        };
                    </script>
                    <div id="searchContainer" style="display: none;">
                        <input type="text" id="searchInput" placeholder="Search for products..." />
                        <button id="searchButton">Search</button>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>

        <!-- Modal đăng nhập chỉ hiện khi bấm nút -->


        <script src="./assets/js/jquery-3.3.1.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.min.js"></script>
        <script src="./assets/js/jquery.magnific-popup.min.js"></script>
        <script src="./assets/js/jquery.countdown.min.js"></script>
        <script src="./assets/js/jquery.slicknav.js"></script>
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/main.js"></script>

</body>

</html>