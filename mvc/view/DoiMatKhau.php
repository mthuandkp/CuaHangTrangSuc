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
    <title>Đổi mật khẩu</title>
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
        <p>ĐỔI MẬT KHẨU</p>
        <input type="password" id="uname" name="uname" placeholder="Mật khẩu hiện tại">
        <input type="password" id="pass" name="pass" placeholder="Mật khẩu mới">
        <input type="password" id="passconfirm" placeholder="Xác nhận mật khẩu mới">
        

        <p style="font-size: 18px;text-align: left;color: red;margin-left: 20%;" id="sms"></p>
        <input type="submit" id="submitbtn" value="ĐỔI MẬT KHẨU" class="btn-log">
    </fieldset>

</body>
<script>
    $("#submitbtn").click(function() {
        $uname = $("#uname").val();
        $pass = $("#pass").val();
        $pass_confirm = $("#passconfirm").val();

        if ($uname === "") {
            $("#sms").html("Vui lòng nhập mật khẩu hiện tại");
            return;
        }
        if ($pass === "") {
            $("#sms").html("Vui lòng nhập mật khẩu mới");
            return;
        }
        if($pass_confirm === ""){
            $("#sms").html("Vui lòng nhập lại mật khẩu mới");
            return;
        }
        if($pass != $pass_confirm){
            $("#sms").html("Xác nhận mật khẩu không chính xác");
            return;
        }

        $.ajax({
            url: '/CuaHangTrangSuc/Admin/changePassword/' + $uname + '/' + $pass+ '/' + $pass_confirm,
            method: 'POST',
            success: function(data) {
                var data = JSON.parse(data);console.log(data)
                var sms = data.SMS;
                if(sms ==='SUCCESS'){
                    alert("Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại")
                    window.location.href="/CuaHangTrangSuc/DangNhap"
                }
                else{
                    $("#sms").html(sms);
                }
            }
        });

    });
</script>

</html>