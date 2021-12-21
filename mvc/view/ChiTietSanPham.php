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

    <link rel="stylesheet" href="/CuaHangTrangSuc/usercss.css">
    <script src="/CuaHangTrangSuc/processFunc.js"></script>
    <title>Trang Trí</title>
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
                            if(isset($_SESSION['account'])){
                                echo '<a href="/CuaHangTrangSuc/LichSuGioHang">Lịch sử</a>
                                    <a href="/CuaHangTrangSuc/TrangChu/DoiMatKhau">Đổi mật khẩu</a>
                                    <a href="/CuaHangTrangSuc/TrangChu/Logout">Đăng xuất</a>';
                            }
                            else{
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
    </nav>

    <div class="product-info">
        <div class="info-flex-container">
            <div class="info-flex">
                <img src="/CuaHangTrangSuc/public/image/HINHANH/<?php echo $data['product']['HINHANH']; ?>" alt="1234">
            </div>
            <div class="info-flex">
                <b><?php echo $data['product']['TENSP']; ?></b>
                <div style="font-size: 25px;">Giá gốc :
                    <?php echo number_format($data['product']['GIA']); ?> <sup>đ</sup>
                </div>
                <?php
                if ($data['product']['PHANTRAMGIAM'] != 0) {
                    echo '<div style="font-size: 45px;color:red;">Giá khuyến mãi : ' . number_format($data['product']['GIA'] * (1 - $data['product']['PHANTRAMGIAM'] / 100)) . ' <sup>đ</sup> (- ' . number_format($data['product']['GIA'] * ($data['product']['PHANTRAMGIAM'] / 100)) . ' <sup>đ</sup>) </div>';
                }
                ?>
                <div class="add-cart"> <input type="button" value="Thêm vào giỏ" onclick="addToCart('<?php echo $data['product']['MASP']; ?>');"></div><br>
                <h2>Các sản phẩm tại Infinity có gì nổi bật.</h2>
                <p>Phụ kiện trang sức gần như sẽ thu hút ánh nhìn và để lại ấn tượng rất lớn với người đối diện, thế nên món phụ kiện này là thứ không thế thiếu trong set đồ của bạn.</p>
                <h4>1. Yên tâm về chất lượng</h4>
                <p>Các mẫu Dây chuyền, vòng cổ, khuyên tai, nhẫn tại Infinity được lựa chọn và sàng lọc một cách kĩ càng về chất lượng, với chất liệu và dây được làm từ hợp kim titan trắng, đá, dây dù... cực kì chắc chắn và bền bỉ theo thời gian.</p>
                <h4>2. Mẫu mã đa dạng</h4>
                <p>Luôn luôn update những mẫu mặt dây chuyền theo mùa, theo trend, theo phong cách của giới trẻ, đã có hơn 100 mẫu dây chuyền cập bên tại Infinity, với nhiều chất liệu, kiểu cách. Và không dừng ở con số đó, mỗi ngày Infinity đều sẽ tiếp tục update các mẫu sản phẩm mới.</p>
                <h4>3. Giá cả hợp lý</h4>
                <p>Đến với các sản phẩm của Infinity, khách hàng có quyền yên tâm về sản phẩm với mức giá mình bỏ ra. Luôn có các event, các ưu đãi cho khách hàng mới, tri ân khách hàng cũ. </p>
            </div>
        </div>
    </div><br><br>

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
</body>

</html>