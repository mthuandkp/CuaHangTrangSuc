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

    <title>Giỏ Hàng</title>
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
    </nav><br>
    <h2 class="title">
        <span>GIỎ HÀNG</span>
    </h2><br>
    <div style="width: 80%;margin-left: 10%;">
        <table style="width: 100%;" class="shopping-cart" id="shopping-cart-id"></table>
    </div>
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

    <script>
        function loadCart() {
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/getCart',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '<tr>' +
                        '<th>Hình ảnh</th>' +
                        '<th>Tên sản phẩm</th>' +
                        '<th>Giá</th>' +
                        '<th>Số lượng</th>' +
                        '<th>Tổng tiền</th>' +
                        '</tr>';
                    $sum = 0;
                    for (var key in data) {
                        $obj = data[key];
                        $sum += $obj.GIA * (1 - $obj.PHANTRAMGIAM / 100) * $obj.amount;
                        $xhtml += '<tr>' +
                            '<td><img src="/CuaHangTrangSuc/public/image/HINHANH/' + $obj.HINHANH + '" alt=""></td>' +
                            '<td>' +
                            '<p style="margin: 0;">' + $obj.TENSP + ' (-' + $obj.PHANTRAMGIAM + '%)</p>' +
                            '</td>' +
                            '<td>';

                        if ($obj.PHANTRAMGIAM == 0) {
                            $xhtml += '<div class="price">' + formatter.format($obj.GIA) + ' <sup>đ</sup></div>';
                        } else {
                            $xhtml += '<div class="price">' + formatter.format($obj.GIA * (1 - $obj.PHANTRAMGIAM / 100)) + ' <sup>đ</sup></div>';
                            $xhtml += '<div style="text-decoration: line-through;" class="price">' + formatter.format($obj.GIA) + ' <sup>đ</sup></div>';
                        }
                        $xhtml += '</td>' +
                            '<td><input id="number-product-item-' + $obj.MASP + '" type="number" onchange="changeNumberCart(\'' + $obj.MASP + '\');" placeholder="1" class="number" value="' + $obj.amount + '"><i class="fa fa-trash" onclick="deleteCartItem(\'' + $obj.MASP + '\')"></i><p style="color:red;">' + $obj.ERROR + '</p></td>' +
                            '<td>' +
                            '<div class="price">' + formatter.format($obj.GIA * (1 - $obj.PHANTRAMGIAM / 100) * $obj.amount) + ' <sup>đ</sup></div>' +
                            '</td>' +
                            '</tr>';
                    }
                    $.ajax({
                        url: '/CuaHangTrangSuc/Admin/getSale',
                        success: function(subdata) {
                            var subdata = JSON.parse(subdata);
                            if (subdata === undefined || subdata.length == 0 || data.length == 0 || data === undefined) {
                                $xhtml += '<tr>' +
                                    '<td colspan="3">' +
                                    '</td>' +
                                    '<td colspan="2" style="text-align: end;">' +
                                    '<div class="total-price">' +
                                    formatter.format($sum) + '<sup>đ</sup>' +
                                    '</div>' +
                                    '<p style="font-size: 12px;">Tiền vận chuyển tính khi thanh toán</p>' +
                                    '<input type="button" onclick="orderCart();" value="ĐẶT HÀNG" class="cart-btn">' +
                                    '</td>' +
                                    '</tr>';

                            } else {
                                /*$xhtml += '<tr>' +
                                '<td colspan="3">' +
                                '</td>' +
                                '<td colspan="2" style="text-align: end;">' +
                                '<div class="total-price" style="text-decoration: line-through;">' +
                                formatter.format($sum) + '<sup>đ</sup>' +
                                '</div>' +
                                '<div class="total-price">' +
                                formatter.format($sum*(1-subdata.PHANTRAMGIAM/100)) + ' (-'+subdata.PHANTRAMGIAM+'%)<sup>đ</sup>' +
                                '</div><p>(' +subdata.NGAYBD+' đến '+subdata.NGAYKT+')</p>' +
                                '<p style="font-size: 12px;">Tiền vận chuyển tính khi thanh toán</p>' +
                                '<input type="button" onclick="orderCart();" value="ĐẶT HÀNG" class="cart-btn">' +
                                '</td>' +
                                '</tr>';*/

                                $xhtml += '<tr>' +
                                    '<td>Tổng</td>' +
                                    '<td></td>' +
                                    '<td></td>' +
                                    '<td></td>' +
                                    '<td style="text-align: end;">' +
                                    '<div class="total-price">' +formatter.format($sum) + '</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                    '<td>Khuyến mãi</td>' +
                                    '<td></td>' +
                                    '<td>'+subdata.PHANTRAMGIAM+'%</td>' +
                                    '<td>('+subdata.NGAYBD +' đến '+ subdata.NGAYKT+')</td>' +
                                    '<td style="text-align: end;">' +
                                    '<div class="total-price">- '+formatter.format($sum*(subdata.PHANTRAMGIAM/100))+'</div>' +
                                    '</td>' +
                                    '</tr>' +
                                    '<tr>' +
                                    '<td><div class="total-price">Thành tiền</div></td>' +
                                    '<td colspan="3"></td>' +
                                    '<td style="text-align: end;">' +
                                    '<div class="total-price">'+formatter.format($sum*(1-subdata.PHANTRAMGIAM/100))+
                                '</div>' +
                                '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td colspan="4"></td>' +
                                '<td>' +
                                '<p style="font-size: 12px;">Tiền vận chuyển tính khi thanh toán</p><input type="button" onclick="orderCart();" value="ĐẶT HÀNG" class="cart-btn"></p>' +
                                '</td>' +
                                '</tr>';
                            }

                            $("#shopping-cart-id").html($xhtml);

                        }
                    })
                }
            })
        }
        $(document).ready(function() {
            loadCart();
        });

        function changeNumberCart($id) {
            $number = ($("#number-product-item-" + $id).val());
            if (!Number.isInteger(parseInt($number)) || parseInt($number) != $number) {
                loadCart();
            } else if ($number <= 0) {
                if (confirm('Số lượng sản phẩm phải lớn hơn 0. Bạn có muốn xóa sản phẩm này không ?')) {
                    $.ajax({
                        url: '/CuaHangTrangSuc/Admin/deleteCartItem/' + $id,
                        success: function(data) {
                            alert(data);
                        }
                    })
                    loadCart();
                } else {

                    loadCart();
                }
            } else {
                $.ajax({
                    url: '/CuaHangTrangSuc/Admin/checkNumberCart/' + $id + '/' + $number,
                    success: function(data) {
                        var data = JSON.parse(data);
                        if (data.SMS != "success") {
                            alert(data.SMS);
                        }
                        loadCart();

                    }
                })
            }
        }

        function deleteCartItem($id) {
            if (confirm('Bạn có muốn xóa sản phẩm này không ?')) {
                $.ajax({
                    url: '/CuaHangTrangSuc/Admin/deleteCartItem/' + $id,
                    success: function(data) {
                        alert(data);
                    }
                })
                loadCart();
            }
        }

        function orderCart() {
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/orderCart',
                success: function(data) {
                    var data = JSON.parse(data);
                    console.log(data);
                    if (data.SMS == "NOT_LOGIN") {
                        alert("Vui lòng đăng nhập để tiếp tục");
                        window.location.href = "/CuaHangTrangSuc/DangNhap?return=GioHang"
                    } else {
                        alert(data.SMS);
                    }
                    loadCart();
                }
            })
        }
    </script>
</body>

</html>