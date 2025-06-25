<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Điện Thoại</title>
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
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .product-item {
            background: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            width: 230px;
            box-sizing: border-box;
            border-radius: 4px;
            text-align: center;
        }

        .product-item img {
            max-width: 100%;
            height: auto;
        }

        .product-name {
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .product-price {
            color: #e91e63;
            font-size: 1.1em;
            margin-bottom: 10px;
        }

        .btn {
            background: #e91e63;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background: #c2185b;
        }

        .welcome {
            margin-bottom: 20px;
        }

        /* Banner layout */
        .banner-section-home {
            width: 85%;
            margin: 0 auto 30px auto;
        }

        .main-banner-row {
            display: flex;
            gap: 16px;
            align-items: stretch;
        }

        .main-banner-col {
            flex: 2;

            background: rgb(250, 247, 247);
            border-radius: 0;
            box-shadow: none;
            overflow: none;
            display: flex;
            align-items: left;
            justify-content: left;
            min-width: 0;
            padding-right: 0;
            margin-right: 0;
            padding: 0;
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .side-banner-col {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding-top: 0px;
            padding-bottom: 0px;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px #eee;
            padding: 12px;
            min-width: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            padding: 12px;
            box-sizing: border-box;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
        }

        .banner-slide img {
            width: 100%;
            height: 300px;
            object-fit: contain;
            border-radius: 0;
            display: block;
            background: #fff;
        }

        .side-banner-img {
            width: 100%;
            height: 144px;
            object-fit: cover;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 6px #fff;
        }

        .owl-theme .owl-dots .owl-dot span {
            background: rgb(212, 153, 153) !important;
        }

        @media (max-width: 991px) {
            .main-banner-row {
                flex-direction: column;
            }

            .side-banner-col {
                flex-direction: row;
                gap: 10px;
            }

            .side-banner-img {
                height: 80px;
            }

            .main-banner-col {
                margin-bottom: 12px;
            }
        }

        body {
            background: rgb(250, 247, 247) !important;
            /* Màu nền đậm hơn, dễ nhận thấy */
        }
    </style>
</head>

<body>
    <?php require_once 'menu.php'; ?>
    <!-- ...phần HTML giữ nguyên... -->
    <div class="banner-section-home">
        <div class="main-banner-row">
            <!-- Banner chính (slide) bên trái, nằm trong khung -->
            <div class="main-banner-col">
                <div class="owl-carousel owl-theme" id="banner-carousel">
                    <div class="item banner-slide">
                        <img src="assets/images/banner/banner1.webp" alt="Banner 1">
                    </div>
                    <div class="item banner-slide">
                        <img src="assets/images/banner/banner2.webp" alt="Banner 2">
                    </div>
                </div>
            </div>
            <!-- 2 banner phụ bên phải -->
            <div class="side-banner-col">
                <img class="side-banner-img" src="assets/images/banner/bannerphu1.webp" alt="Banner phụ 1">
                <img class="side-banner-img" src="assets/images/banner/bannerphu2.webp" alt="Banner phụ 2">
            </div>
        </div>
    </div>
    <!-- Banner Slideshow End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 mix new-arrivals">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/product/<?= htmlspecialchars($product['image'] ?: 'no-image.png') ?>">
                                    <a href="index.php?action=product_detail&id=<?= $product['id'] ?>" style="display:block;width:100%;height:100%;">
                                        <span class="label">New</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="./assets/images/icon/heart.png" alt=""></a></li>
                                            <li><a href="#"><img src="./assets/images/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                            <li><a href="#"><img src="./assets/images/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </a>
                                </div>
                                <div class="product__item__text">
                                    <h6>
                                        <a href="index.php?action=product_detail&id=<?= $product['id'] ?>">
                                            <?= htmlspecialchars($product['name']) ?>
                                        </a>
                                    </h6>
                                    <form id="add-to-cart-<?= $product['id'] ?>" action="index.php?action=add_to_cart" method="POST" style="display:none;">
                                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                        <input type="hidden" name="quantity" value="1">
                                    </form>
                                    <a href="#" class="add-cart"
                                        onclick="event.preventDefault(); document.getElementById('add-to-cart-<?= $product['id'] ?>').submit();">
                                        + Add To Cart
                                    </a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5><?= number_format($product['price'], 0, ',', '.') ?> đ</h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php require_once './views/Layouts/footer.php'; ?>
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
    <script>
        // Khởi tạo Owl Carousel cho banner
        $(document).ready(function() {
            $("#banner-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3500,
                dots: true
            });
            // Xử lý set-bg cho ảnh sản phẩm
            $('.set-bg').each(function() {
                var bg = $(this).attr('data-setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
        });
    </script>
</body>

</html>