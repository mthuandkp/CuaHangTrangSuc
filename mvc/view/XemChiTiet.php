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
    <script src="/CuaHangTrangSuc/processFunc.js"></script>

    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="header">
        <div class="address">
            <i class="fa fa-map-marker"> Hồ Chí Minh, Việt Nam</i>
            <i class="fa fa-envelope"> milfuniture@gmail.com</i>
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
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/TrangTri">TRANG TRÍ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/PhongNgu">PHÒNG NGỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/PhongLamViec">PHÒNG LÀM VIỆC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/PhongKhach">PHÒNG KHÁCH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" style="cursor: pointer;" href="/CuaHangTrangSuc/PhongAn">PHÒNG ĂN</a>
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
                            }
                            else{
                                echo '<a href="/CuaHangTrangSuc/ThayDoiThongTin">Thay đổi thông tin</a>
                                <a href="/CuaHangTrangSuc/DoiMatKhau">Đổi mật khẩu</a>
                                <a href="/CuaHangTrangSuc/LichSuGioHang">Lịch sử</a>
                                <a href="/CuaHangTrangSuc/TrangChu/Logout">Đăng xuất</a>';
                            }
                        ?>                        
                    </div>
                </div>
                <a href="./GioHang" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
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
    <h2 class="title">
        <span>XEM CHI TIẾT ĐƠN HÀNG</span>

    </h2><br>
    <h3 style="margin-left: 10%;">Xem chi tiết hóa đơn <?php echo $data['sale']['MAHD']; ?></h3>
    <table class="table" style="width: 80%;margin-left: 10%;font-family: 'Times New Roman', Times, serif;font-size: 1.5rem;font-weight: normal;" id="shopping-cart-id">
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Tổng</th>
            <th>Giảm Giá / Sản Phẩm</th>
            <th>Thành tiền</th>
        </tr>

        <?php
        $sumSale = 0;
        foreach ($data['detail'] as $value) {
            echo '<tr>
                <td>' . $value['TENSP'] . '</td>
                <td><img src="/CuaHangTrangSuc/public/image/HINHANH/' . $value['HINHANH'] . '" alt="no image" style="width: 15rem;height:10rem;"></td>
                <td>' . number_format($value['GIA']) . ' VNĐ</td>
                <td>' . $value['SOLUONG'] . '</td>
                <td>' . number_format($value['GIA'] * $value['SOLUONG']) . ' VNĐ</td>
                <td> - ' . number_format($value['GIA'] * ($value['PHANTRAMGIAM'] / 100)) . ' VNĐ (' . $value['PHANTRAMGIAM'] . '%) x ' . $value['SOLUONG'] . '</td>
                <th>' . number_format($value['GIA'] * (1 - $value['PHANTRAMGIAM'] / 100) * $value['SOLUONG']) . ' VNĐ</th>
            </tr>';
            $sumSale += $value['GIA'] * (1 - $value['PHANTRAMGIAM'] / 100) * $value['SOLUONG'];
        }
        ?>

        <tr style="height: 5rem;">
            <td></td>
        </tr>
        <tr>
            <th>Tổng:</th>
            <td colspan="5"></td>
            <th><?php echo number_format($sumSale) ?> VNĐ</th>
        </tr>
        <tr>
            <th>Giảm Khuyến Mãi :</th>
            <td colspan="4"></td>
            <td>-<?php echo $data['sale']['PHANTRAMGIAM'] . '% (' . $data['sale']['MAKM'] . ')'; ?></td>
            <th> - <?php echo number_format($sumSale * ($data['sale']['PHANTRAMGIAM'] / 100)) ?> VNĐ</th>
        </tr>
        <tr>
            <th>Thành Tiền :</th>
            <td colspan="5"></td>
            <th><?php echo number_format($sumSale * (1 - $data['sale']['PHANTRAMGIAM'] / 100)) ?> VNĐ</th>
        </tr>
    </table>
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
            <a href="">VỀ MILD</a><br>
            <a href="">TẠI SAO LẠI CHỌN MILD</a><br>
        </div>
        <div class="footer">
            <h3>ĐĂNG KÝ NHẬN TIN</h3><br>
            <input type="text">
            <button class="footer-btn">ĐĂNG KÝ</button>
        </div>
    </div>
</body>

</html>