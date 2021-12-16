<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/CuaHangTrangSuc/my-css.css">
    <title>Trang Chủ</title>
</head>

<body>
    <div class="header">
        <div class="address">
            <i class="fa fa-map-marker"> Hồ Chí Minh, Việt Nam</i>
            <i class="fa fa-envelope"> infinity@gmail.com</i>
        </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-md navbar-light ">
        <div class="container-fluid">
            <a class="navar-branch" style="cursor: pointer;" href="/CuaHangTrangSuc/TrangChu">
                <img src="/CuaHangTrangSuc/public/image/logo.png" alt="logo" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto " id="lsp">
                    <li class="nav-item active">
                        <a class="nav-link a active" style="cursor: pointer;" href="/CuaHangTrangSuc/TrangChu">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/VongTay">vÒNG TAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/DayChuyen">DÂY CHUYỀN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/KhuyenTai">KHUYÊN TAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/Nhan">NHẪN</a>
                    </li>
                </ul>
            </div>
            <?php if (isset($_SESSION['account'])) {
                echo "<div style='margin-top:2rem;'> Hello ," . $_SESSION['account']['TENKH'] . '</div>';
            } ?>

            <div class="user-nav">
                <div class="dropdown">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-content user" style="margin-top: -0.5rem;">
                        <?php
                        if (!isset($_SESSION['account'])) {
                            echo '<a href="/CuaHangTrangSuc/DangNhap">Đăng nhập</a>';
                            echo '<a href="/CuaHangTrangSuc/DangKy">Đăng ký</a>';
                        } else {
                            echo '<a href="/CuaHangTrangSuc/ThayDoiThongTin">Thay đổi thông tin</a>
                                <a href="/CuaHangTrangSuc/DoiMatKhau">Đổi mật khẩu</a>
                                <a href="/CuaHangTrangSuc/LichSuGioHang">Lịch sử</a>
                                <a href="/CuaHangTrangSuc/TrangChu/Logout">Đăng xuất</a>';
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
    </nav>
    <div class="banner">
        <img src="/CuaHangTrangSuc/public/image/BANNER_CHINH_1.png" alt="">
    </div>
    <h2 class="title">
        <span>Infinity thương hiệu trang sức nam thời trang - phong cách</span>
    </h2>
    <p class="content">
        Là một trong những công ty hàng đầu về lĩnh vực cung cấp cấp trang sức vàng bạc, đá quý, đá thiên nhiên với mẫu mã đa dạng, chất lượng đảm bảo, đáp ứng nhiều nhu cầu, thị hiếu khách hàng, được khách hàng trong và ngoài nước đánh giá cao.
        Với quy mô hoạt động sâu rộng, công ty đã cung cấp cho khách hàng trong và ngoài nước lượng sản phẩm lớn mỗi năm và đáp ứng các nhu cầu thiết kế cao cấp của khách hàng. Phương châm "Trao trọn niềm tin - Đồng hành cùng bạn", chúng tôi đang ngày càng giành được sự yêu mến của khách hàng và có vị trí cao trên thị trường.
    </p>
    <div class="category-container">
        <div class="category">
            <a href="/CuaHangTrangSuc/VongTay">
                <img src="/CuaHangTrangSuc/public/image/cate-1.jpg" alt="cate-1">
                <p>Vòng tay</p>
            </a>
        </div>
        <div class="category">
            <a href="/CuaHangTrangSuc/DayChuyen">
                <img src="/CuaHangTrangSuc/public/image/cate-4.jpg" alt="cate-2">
                <p>Dây chuyền</p>
            </a>
        </div>
        <div class="category">
            <a href="/CuaHangTrangSuc/KhuyenTai">
                <img src="/CuaHangTrangSuc/public/image/cate-3.jpg" alt="cate-3">
                <p>Khuyên tai</p>
            </a>
        </div>
        <div class="category">
            <a href="/CuaHangTrangSuc/Nhan">
                <img src="/CuaHangTrangSuc/public/image/cate-2.jpg" alt="cate-4">
                <p>Nhẫn</p>
            </a>
        </div>
    </div>
    <h2 class="title">
        <span>Hàng nhập khẩu từ các thương hiệu trên thế giới</span>
    </h2>
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="/CuaHangTrangSuc/public/image/Banner_phu_1.png" alt="1" width="100%" height="100%">
            </div>
            <div class="carousel-item">
                <img src="/CuaHangTrangSuc/public/image/Banner_phu_2.jpg" alt="2" width="100%" height="100%">
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
    </div><br><br>

    <div class="footer-container">
        <div class="footer">
            <img src="/CuaHangTrangSuc/public/image/logo.png" alt="">
        </div>
        <div class="footer">
            <a href="">GIAO HÀNG</a><br>
            <a href="">BẢO HÀNH</a><br>
            <a href="">BẢO DƯỠNG</a><br>
            <a href="">ĐẶT HÀNG</a><br>
            <a href="">CỬA HÀNG</a><br>
            <a href="">LIÊN HỆ</a><br>
        </div>
        <div class="footer">
            <a href="">VỀ INFINITY</a><br>
            <a href="">TẠI SAO LẠI CHỌN INFINITY</a><br>
        </div>
        <div class="footer">
            <h3>ĐĂNG KÝ NHẬN TIN</h3><br>
            <input type="text">
            <button class="footer-btn">ĐĂNG KÝ</button>
        </div>
    </div>
</body>

</html>