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
    <title>Đăng ký</title>
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
    </nav>
    <fieldset>
            <legend><i class="fa fa-user-circle-o" aria-hidden="true"></i></legend>
            <p>Đăng ký tài khoản</p>
            <label for="exampleInputEmail1">Tên Khách Hàng</label>
            <div class="" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="nameCus">
            </div>
            <label for="exampleInputEmail1">Ngày Sinh</label>
            <div class="form-group" style="width: 76%;margin-left:12%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="date" class="form-control" id="birthday">
            </div>
            <label for="exampleInputEmail1">Tên Đăng Nhập</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="unameCus">
            </div>
            <label for="exampleInputEmail1">Mật Khẩu</label>
            <div class="form-group" style="width: 80%;margin-left:11%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="password" class="form-control" id="passCus">
            </div>
            <label for="exampleInputEmail1">Nhập Lại Mật Khẩu</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="password" class="form-control" id="passConfirmCus">
            </div>
            <label for="exampleInputEmail1">Địa chỉ</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="addressCus">
            </div>
            <label for="exampleInputEmail1">Số điện thoại</label>
            <div class="form-group" style="width: 80%;margin-left:10%;">
                <input style="font-family: 'Times New Roman', Times, serif;" type="text" class="form-control" id="phoneCus">
            </div>
            <label for="exampleInputEmail1">Giới tính</label>
            <div class="form-group" style="width: 75%;margin-left:12%;">
                <select style="font-family: 'Times New Roman', Times, serif;" class="form-control" id="sexCus">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <p id="sms" style="font-size: 1.4rem;color: red;"></p>
            <button style="float: right;margin-right: 10%;font-size: 1.5rem;width: 10rem;color: white;font-family: 'Times New Roman', Times, serif;margin: 1rem;" onclick="register();" class="btn btn-primary">Lưu</button>
        </fieldset>

    <script>
        function register() {
            $name = $("#nameCus").val();
            $uname = $("#unameCus").val();
            $pass = $("#passCus").val();
            $phone = $("#phoneCus").val();
            $address = $("#addressCus").val();
            $passc = $("#passConfirmCus").val();
            $sex = $("#sexCus").val();
            $birthday = $("#birthday").val();

            $("#sms").html('')

            if($name == ''){
                $("#sms").html('Tên khách hàng không được để trống');
            }
            else if($birthday == ''){
                $("#sms").html('Vui lòng chọn ngày sinh');                
            }
            else if($uname == '' || !$uname.includes('@gmail.com')){
                $("#sms").html('Tên đăng nhập phải là email (@gmail.com)');                
            }
            else if($pass == ''){
                $("#sms").html('Mật khẩu không được để trống');                
            }
            else if($passc == ''){
                $("#sms").html('Nhập lại mật khẩu không được để trống');                
            }
            else if($pass != $passc){
                $("#sms").html('Mật khẩu và xác nhận mật khẩu không khớp');                
            }
            else if(!checkPhoneNumber($phone)){
                $("#sms").html('Số điện thoại không hợp lệ');                
            }
            else if($address == ''){
                $("#sms").html('Địa chỉ không được để trống');                
            }
            else{
                $account = [$name,$uname,$pass,$phone,$address,$sex,$birthday];
                $.ajax({
                    url:'/CuaHangTrangSuc/Admin/registerNewAccount/' + JSON.stringify($account),
                    success : function(data){
                        var data = JSON.parse(data);
                        if(data.SMS === 'SUCCESS'){
                            alert('Đăng ký tài khoản thành công. Vui lòng đăng nhập');
                            window.location.href="/CuaHangTrangSuc/DangNhap"
                        }
                        else{
                            $("#sms").html(data.SMS);
                        }
                    }
                })
            }
        }
    </script>
</body>

</html>