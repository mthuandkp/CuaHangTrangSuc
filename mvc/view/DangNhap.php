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
    <title>Đăng nhập</title>
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
    <fieldset>
        <legend><i class="fa fa-user-circle-o" aria-hidden="true"></i></legend>
        <p>ĐĂNG NHẬP</p>
        <input type="text" id="uname" name="uname" placeholder="a@gmail.com">
        <p style="font-size: 18px;text-align: left;color: red;margin-left: 20%;" id="errorUname">Tên đăng nhập không hợp lệ</p>
        <input type="password" id="pass" name="pass" placeholder="*********">
        <p style="font-size: 18px;text-align: left;color: red;margin-left: 20%;" id="errorPass">Mật khẩu không hợp lệ</p>
        <p id="errorMessage" style="margin-top: 0;padding-top: 0;"></p>
        <input type="submit" id="submitbtn" value="ĐĂNG NHẬP" class="btn-log">
        <div class="reg">Bạn chưa có tài khoản? <a href="/CuaHangTrangSucDangKy">Đăng ký</a></div>
    </fieldset>

</body>
<script>
    $(document).ready(function() {
        $("#errorUname").hide();
        $("#errorPass").hide();
    });

    $("#submitbtn").click(function() {
        $("#errorUname").hide();
        $("#errorPass").hide();
        $("#errorMessage").hide();

        $uname = $("#uname").val();
        $pass = $("#pass").val();

        if ($uname === "" || !$uname.includes("@gmail.com")) {
            $("#errorUname").show();
            return;
        }
        if ($pass === "") {
            $("#errorPass").show();
            return;
        }

        $.ajax({
            url: '/CuaHangTrangSuc/Admin/checkLoginCustomer/' + $uname + '/' + $pass,
            method: 'POST',
            data: {
                url: window.location.href
            },
            success: function(data) {
                var data = JSON.parse(data);
                $result = data.RESULT;
                if ($result === "NOT_EXISTS") {
                    $("#errorMessage").html("Tài khoản không tồn tại");
                    $("#errorMessage").show();
                } else if ($result === "WRONG_PASSWORD") {
                    $("#errorMessage").html("Mật khẩu không chính xác");
                    $("#errorMessage").show();
                } else if($result === 'BLOCK'){
                    $("#errorMessage").html("Tài khoản bạn đã bị khóa. Vui lòng liên hệ mildstore@gmail.com để biết thêm chi tiết");
                    $("#errorMessage").show();
                }
                 else {
                    window.location.href = "./" + data.URL;
                }
            }
        });

    });
</script>

</html>