<!-- Footer Section Begin -->
<footer class="footer" style="background-color:rgb(125, 5, 5);width:100vw;position:relative;left:50%;right:50%;margin-left:-50vw;margin-right:-50vw;">
    <div class="container-fluid" style="max-width:100vw;padding:0 0;">
        <div class="row" style="margin:0;align-items:center;">
            <div class="col-lg-4 col-md-6 col-sm-7 d-flex align-items-center" style="height:100%;">
                <div class="footer__about" style="width:100%;">
                    <div class="footer__logo" style="display:inline-block;vertical-align:middle;">
                        <a href="./index.php"><img src="" alt=""></a>
                    </div>
                    <span style="color: white; font-weight: 600; padding-left: 50px;  display:inline-block;vertical-align:middle;margin-left:10px;">
                        Chào mừng bạn đến với MUVN SHOP nơi cung cấp quần áo chất lượng
                    </span>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6 style="color: white; font-weight: 600;">ĐƯỜNG DẪN</h6>
                    <ul>
                        <li><a href="#" style="color: white; font-weight: 600;">Về chúng tôi</a></li>
                        <li><a href="index.php?url=lien-he" style="color: white; ">Liên hệ</a></li>
                        <li><a href="index.php?url=doi-tra" style="color: white;">Chính sách đổi trả</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6 style="color: white; font-weight: 600;">TÀI KHOẢN</h6>
                    <ul>
                        <li><a href="index.php?url=thong-tin-tai-khoan" style="color: white; ">Tài khoản của tôi</a></li>
                        <li><a href="index.php?url=don-hang" style="color: white;">Theo dõi đơn hàng</a></li>
                        <li><a href="#" style="color: white; font-weight: 600;">Thủ tục thanh toán</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6 style="color: white; font-weight: 600" ;>HỖ TRỢ THANH TOÁN</h6>
                    <div class="footer__payment">
                        <a href="#"><img src="public/img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="public/img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="public/img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="public/img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="public/img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form action="tim-kiem" method="get" class="search-model-form">
<input type="search" name="query" id="search-input" placeholder="TÌM KIẾM.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Toatr -->
<script>
    $(document).ready(function() {
        $("#toastr-success-top-right").on("click", function() {
            toastr.success("1 sản phẩm đã thêm vào giỏ", "Thành công", {
                closeButton: true,
                debug: false,
                newestOnTop: false,
                progressBar: true,
                positionClass: "toast-top-right",
                preventDuplicates: false,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                timeOut: "5000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            });
        });
    });
</script>

<!-- Js Plugins -->
<script src="public/js/jquery-3.3.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.magnific-popup.min.js"></script>
<script src="public/js/jquery-ui.min.js"></script>
<script src="public/js/mixitup.min.js"></script>
<script src="public/js/jquery.countdown.min.js"></script>
<script src="public/js/jquery.slicknav.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/jquery.nicescroll.min.js"></script>
<script src="public/js/main.js"></script>

<!-- dialogflow -->
<!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
    intent="WELCOME"
    chat-title="Chat"
    agent-id="a111a74a-8334-4098-9636-0f1433d6fc97"
    language-code="vi"
></df-messenger> -->


</body>

</html>