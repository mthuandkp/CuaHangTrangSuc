
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
    <link rel="stylesheet" href="/CuaHangTrangSuc/usercss.css">
    <script src="/CuaHangTrangSuc/processFunc.js"></script>

    <title>Lịch sử mua hàng</title>
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
                            foreach($listSalePro as $value){
                                echo '<div style="width: 90%;margin-left: 5%;margin-top: 1rem;background-color: #ffed2b;border-radius: 0.5rem;font-size: 1.25rem;">
                                <div style="text-align: center;color: red;">Sản phẩm <b>'.$value['TENSP'].'</b> đang được giảm <b>'.$value['PHANTRAMGIAM'].'%</b> tại cửa hàng <a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/'.$value['MASP'].'" style="color: #00a2ff;font-size: 1.5rem;font-weight: 900;">Xem ngay</a></div>
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
    </nav><br>
    <h2 class="title">
        <span>LỊCH SỬ MUA HÀNG</span>
    </h2><br>

    <table style="width: 70%;margin-left: 15%;font-size: 1.2rem;" class="table" id="shopping-cart-id">
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

    <script>
        function viewDetail($id) {
            window.location.href = "/CuaHangTrangSuc/LichSuGioHang/XemChiTiet/" + $id;
        }

        function submitBill($id) {
            if (!confirm("Bạn đã nhận được hàng ?")) {
                return;
            }

            $.ajax({
                url: '/CuaHangTrangSuc/Admin/submitBill/' + $id,
                success: function(data) {
                    var data = JSON.parse(data);
                    alert(data.SMS);

                    loadTable();
                }
            })
        }

        function destroyBill($id){
            if (!confirm("Bạn muốn hủy đơn hàng ?")) {
                return;
            }

            $.ajax({
                url: '/CuaHangTrangSuc/Admin/destroyBill/' + $id,
                success: function(data) {
                    var data = JSON.parse(data);
                    alert(data.SMS);
                    loadTable();
                }
            })
        }
        loadTable();

        function loadTable() {
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/getCusBillAndDetailBill',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '<tr>' +
                        '<th style="width: 10rem;">Mã Hóa Đơn</th>' +
                        '<th style="width: 10rem;">Ngày Đặt</th>' +
                        '<th style="width: 10rem;">Giờ Đặt</th>' +
                        '<th>Tổng Tiền</th>' +
                        '<th>Trạng Thái</th>' +
                        '<th style="width: 10rem;">Chức Năng</th>' +
                        '</tr>';
                    for (var key in data) {
                        $obj = data[key];
                        $xhtml += '<tr style="height:6rem;">' +
                            '<td>' + $obj.MAHD + '</td>' +
                            '<td>' + $obj.NGAYLAP + '</td>' +
                            '<td>' + $obj.GIOLAP + '</td>';
                        if ($obj.TONG == $obj.LAST_PRICE) {
                            $xhtml += '<td> ' + $obj.TONG + 'VNĐ</td>';
                        } else {
                            $xhtml += '<td> ' + formatter.format($obj.LAST_PRICE) + ' VNĐ<p style="font-weight:800;text-decoration: line-through;">' + formatter.format($obj.TONG) + ' VNĐ</p></td>';
                        }

                        switch ($obj.MATRANGTHAI) {
                            case 'TT01': {
                                $xhtml += '<td style="padding:0.3rem;">Đang chờ cửa hàng xác nhận</td>' +
                                    '<td><button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: white;color: #2478ff;font-family: "Times New Roman", Times, serif;" onclick="viewDetail(\'' + $obj.MAHD + '\');">Xem Chi Tiết</button><button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: black;color: white;font-family: "Times New Roman", Times, serif;" onclick="destroyBill(\'' + $obj.MAHD + '\');">Hủy đơn hàng</button></td>';
                                break;
                            }
                            case 'TT02': {
                                $xhtml += '<td>Bạn đã nhận được hàng? Vui lòng xác nhận</td>' +
                                    '<td>' +
                                    '<button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: red;color: white;font-family: "Times New Roman", Times, serif;" onclick="submitBill(\'' + $obj.MAHD + '\')">Xác nhận</button>' +
                                    '<button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: white;color: #2478ff;font-family: "Times New Roman", Times, serif;" onclick="viewDetail(\'' + $obj.MAHD + '\');">Xem Chi Tiết</button>' +
                                    '</td>';
                                break;
                            }
                            case 'TT03': {
                                $xhtml += '<td>Đơn hàng hoàn tất</td>' +
                                    '<td>' +
                                    '<button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: white;color: #2478ff;font-family: "Times New Roman", Times, serif;" onclick="viewDetail(\'' + $obj.MAHD + '\');">Xem Chi Tiết</button>' +
                                    '</td>';
                                break;
                            }
                            case 'TT04': {
                                $xhtml += '<td style="color:red;">Bạn đã hủy đơn hàng</td>' +
                                    '<td>' +
                                    '<button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: white;color: #2478ff;font-family: "Times New Roman", Times, serif;" onclick="viewDetail(\'' + $obj.MAHD + '\');">Xem Chi Tiết</button>' +
                                    '</td>';
                                break;
                            }
                            case 'TT05': {
                                $xhtml += '<td style="color:red;">Đơn hàng đã bị admin hủy</td>' +
                                    '<td>' +
                                    '<button style="border-radius:0.5rem;margin: 0.2rem;width: 10rem;background-color: white;color: #2478ff;font-family: "Times New Roman", Times, serif;" onclick="viewDetail(\'' + $obj.MAHD + '\');">Xem Chi Tiết</button>' +
                                    '</td>';
                                break;
                            }
                        }
                        $xhtml += '<tr></tr>';
                    }
                    $("#shopping-cart-id").html($xhtml);
                }
            })
        }
    </script>
</body>

</html>