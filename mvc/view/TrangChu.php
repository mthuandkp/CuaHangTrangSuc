<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo-img/logo.png" type="image/gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Infinity - Phụ kiện trang sức nam</title>
    <!-- <link rel="stylesheet" href="/CuaHangTrangSuc/my-css.css"> -->
    <link rel="stylesheet" href="/CuaHangTrangSuc/usercss.css">
    <script src="/CuaHangTrangSuc/processFunc.js"></script>
</head>

<body>
    <div class="top-header">
        <p>-~ YOUR LIFE YOUR STYLE ~-</p>
    </div>

    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navar-branch" style="cursor: pointer;" href="/CuaHangTrangSuc">
                <img src="/CuaHangTrangSuc/public/image/logo.png" alt="logo" height="45px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto " id="lsp">
                    <li class="nav-item">
                        <a class="nav-link active" style="cursor: pointer;" href="/CuaHangTrangSuc">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/SanPham/Pages/1">SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/VongTay/Pages/1">VÒNG TAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/DayChuyen/Pages/1">DÂY CHUYỀN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/KhuyenTai/Pages/1">KHUYÊN TAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="/CuaHangTrangSuc/Nhan/Pages/1">NHẪN</a>
                    </li>
                </ul>

            </div>
            <div class="user-nav">
                <p style="float: left;font-size: 20px">
                <?php
                    if(isset($_SESSION['account'])){
                        $user = $_SESSION['account'];
                        echo 'Xin chào, '.$user['TENKH'];
                    }
                ?>
                </p>
                <div class="dropdown-bell">
                    <i class="fa fa-bell"></i>
                    <div class="dropdown-bell-content">

                        <?php
                        $listSalePro = $data['data_sale'];
                        foreach ($listSalePro as $value) {
                            echo '<div style="width: 90%;margin-left: 5%;margin-top: 1rem;background-color: #ffed2b;border-radius: 0.5rem;font-size: 1.25rem;">
                                <div style="text-align: center;color: red;">Sản phẩm <b>' . $value['TENSP'] . '</b> đang được giảm <b>' . $value['PHANTRAMGIAM'] . '%</b> tại cửa hàng <a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/' . $value['MASP'] . '" style="color: #00a2ff;font-size: 1.5rem;font-weight: 900;">Xem ngay</a></div>
                            </div>';
                        }

                        ?>
                    </div>
                </div>


                <div class="dropdown-user">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-user-content">
                        <?php
                        if (isset($_SESSION['account'])) {
                            echo '<a href="/CuaHangTrangSuc/LichSuGioHang">Lịch sử</a>
                                    <a href="/CuaHangTrangSuc/TrangChu/DoiMatKhau">Đổi mật khẩu</a>
                                    <a href="/CuaHangTrangSuc/TrangChu/Logout">Đăng xuất</a>';
                        } else {
                            echo ' <a href="/CuaHangTrangSuc/DangNhap">Đăng nhập</a>
                                    <a href="/CuaHangTrangSuc/DangKy">Đăng ký</a>';
                        }
                        ?>



                    </div>
                </div>
                <a href="/CuaHangTrangSuc/GioHang" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                <span id="counter">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = 0;
                        foreach ($_SESSION['cart'] as $value) {
                            $count += $value['amount'];
                        }
                        echo $count;
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav><br>
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="/CuaHangTrangSuc/public/image/BANNER_CHINH_1.png" alt="1" width="100%" height="100%">
            </div>
            <div class="carousel-item">
                <img src="/CuaHangTrangSuc/public/image/Banner_phu_1.png" alt="2" width="100%" height="100%">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br><br><br><br>
    <div>
        <!--best-seller-product------------------------------------------------------->
        <h2 class="content">
            <span> SẢN PHẨM NỖI BẬT</span>
        </h2>
    </div>
    <div class="products">
        <div class="product-box">
            <?php
            $listPro = $data['data'];
            foreach ($listPro as $value) {
                echo '<div class="product-item">
                <a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/' . $value['MASP'] . '">
                    <img src="/CuaHangTrangSuc/public/image/HINHANH/' . $value['HINHANH'] . '" alt="">
                    <i class="fa fa-search"></i>    
                    <div class="product-name"> ' . $value['TENSP'] . '</div>
                </a>
                <div class="price">' . number_format($value['GIA']) . 'đ</div>
                <div class="add-cart"> <input type="button" value="Thêm vào giỏ" id="btn" onclick="addToCart(\'' . $value['MASP'] . '\');"></div>
            </div>';
            }
            ?>
        </div>
    </div>




    <!--new-product------------------------------------------------------->
    <h2 class="content">
        <span> SẢN PHẨM MỚI</span>
    </h2>
    <div class="products">
        <div class="product-box">
            <?php
            $listPro = $data['data2'];
            foreach ($listPro as $value) {
                echo '<div class="product-item">
                <a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/' . $value['MASP'] . '">
                    <img src="/CuaHangTrangSuc/public/image/HINHANH/' . $value['HINHANH'] . '" alt="">
                    <i class="fa fa-search"></i>    
                    <div class="product-name"> ' . $value['TENSP'] . '</div>
                </a>
                <div class="price">' . number_format($value['GIA']) . 'đ</div>
                <div class="add-cart"> <input type="button" value="Thêm vào giỏ" id="btn" onclick="addToCart(\'' . $value['MASP'] . '\');"></div>
            </div>';
            }
            ?>
        </div>
    </div>

    <!--offer img------------------------------------------------------->
    <div class="offer-img">
        <div class="offer">
            <img src="/CuaHangTrangSuc/public/image/offer_image_1.png" alt="offer-img">
            <div class="offer-text">THỜI TRANG</div>
        </div>
        <div class="offer">
            <img src="/CuaHangTrangSuc/public/image/offer_image_2.png" alt="offer-img">
            <div class="offer-text">PHONG CÁCH</div>
        </div>
    </div>
    </div>
    <!--footer------------------------------------------------------->
    <div class="flex-container">
        <div class="flex1"><i class="fa fa-plane" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>GIAO HÀNG TẬN NƠI TRÊN TOÀN QUỐC</p>
        </div>
        <div class="flex1"><i class="fa fa-calendar" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>ĐỔI TRẢ TRONG VÒNG 07 NGÀY </p>
        </div>
        <div class="flex1"><i class="fa fa-thumbs-up" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>CAM KẾT CHẤT LƯỢNG SẢN PHẨM</p>
        </div>
        <div class="flex1"><i class="fa fa-lock" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>BẢO MẬT THÔNG TIN KHÁCH HÀNG</p>
        </div>
    </div>
    <div class="flex-container2">
        <div class="flex5">Infinity là một thương hiệu phụ kiện <br>
            Đã - Đang - Sẽ và Luôn mang tới cho mọi người những sản phẩm Độc - Chất - Giá tốt nhất trên thị trường.</div>
        <div class="flex6">
            <strong> CHĂM SÓC KHÁCH HÀNG</strong>
            <a href="#">LIÊN HỆ</a>
            <a href="#">HƯỚNG DẪN THANH TOÁN</a>
            <a href="#">GIAO HÀNG</a>
            <a href="#">CHÍNH SÁCH BẢO HÀNH</a>
            <a href="#">CHÍNH SÁCH ĐỔI TRẢ</a>
        </div>
        <div class="flex7">
            <strong style="font-size: 20px;">VỀ CHÚNG TÔI</strong>
            <a href="#">IFINITY LÀ GÌ?</a>
        </div>
        <div class="flex8">
            <strong style="font-size: 20px;">ĐĂNG KÝ NHẬN TIN</strong><br>
            <input type="email" placeholder="Nhập email của bạn..">
            <input type="button" value="Gửi">
        </div>
    </div>
    <p style="text-align: center; font-size: 13px;">
        © Infitiny Jewewlry. All Rights Reserved.
    </p>
    <!--Page up btn------------------------------------------------------->
    <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    <script src="./jquery-3.6.0.js"></script>
    <script src="main-js.js"></script>
</body>
<script>
    function addToCart($productId) {
        if (!confirm("Bạn có muốn thêm sản phẩm vào giỏ hàng ?")) {
            return;
        }
        $.ajax({
            url: '/CuaHangTrangSuc/Admin/addToCart/' + $productId,
            success: function(data) {
                var data = JSON.parse(data);
                alert(data.SMS);
                loadCountCart();
            }
        });
    }

    function loadCountCart() {
        $.ajax({
            url: '/CuaHangTrangSuc/Admin/countCart',
            success: function(data) {
                var data = JSON.parse(data);
                $("#counter").html(data.COUNT)
            }
        })
    }
</script>

</html>