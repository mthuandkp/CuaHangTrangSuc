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
    <title>Khuyên Tai</title>
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
        <img src="/CuaHangTrangSuc/public/image/BANNER_PHONGLAMVIEC.jpg" alt="">
    </div>
    <h2 class="title">
        <span>KHUYÊN TAI</span>
    </h2>
    <div style="width: 80%;margin-left: 10%;margin-top: 1rem;">
        <h2 style="font-weight: bolder;">Tìm kiếm</h2>
        <div class="form-row">
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkProductName">
                    <label class="form-check-label" for="autoSizingCheck">Tên sản phẩm</label>
                </div>
                <input type="text" class="form-control" id="inputProductName">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkProductPrice">
                    <label class="form-check-label" for="autoSizingCheck">Giá sản phẩm</label>
                </div>
                <input type="number" class="form-control" id="inputMinProductPrice" placeholder="Giá thất nhất">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <label class="form-check-label" for="autoSizingCheck" style="color: white;">Giá cao nhất</label>
                </div>
                <input type="number" class="form-control" id="inputMaxProductPrice" placeholder="Giá cao nhất">
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkStatusDecreaseProduct">
                    <label class="form-check-label" for="autoSizingCheck">Trạng thái giảm</label>
                </div>
                <select class="form-control" id="inputStatusDecreaseProduct">
                    <option value="0">Không Giảm Giá</option>
                    <option value="1">Được Giảm Giá</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="checkSortProduct">
                    <label class="form-check-label" for="autoSizingCheck">Sắp xếp</label>
                </div>
                <select class="form-control" id="inputSortProduct">
                    <option value="1">Tăng dần</option>
                    <option value="0">Giảm dần</option>
                </select>
            </div>
            <div style="width: 91%;">
                <button id="searchProduct" style="width: 15rem;float: right;font-size: 1.2rem;font-weight: bolder;" class="btn btn-primary">Tìm kiếm </button>
            </div>

        </div>
    </div>
    <div class="products">
        <div class="product-container" id="product-container-id"></div>
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
            <a href="">VỀ INFINITY</a><br>
            <a href="">TẠI SAO LẠI CHỌN INFINITY</a><br>
        </div>
        <div class="footer">
            <h3>ĐĂNG KÝ NHẬN TIN</h3><br>
            <input type="text">
            <button class="footer-btn">ĐĂNG KÝ</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/CuaHangTrangSuc/Admin/getAllProductByType/LSP03',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '';
                    for (var key in data) {
                        $obj = data[key];
                        $xhtml += ' <div class="product-item">' +
                            '<a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/' + $obj.MASP + '">' +
                            '<img src="/CuaHangTrangSuc/public/image/HINHANH/' + $obj.HINHANH + '" alt="">' +
                            '<p class="product-name">' + $obj.TENSP + '<sup style="color: red;font-size: 1.2rem;"> -' + $obj.PHANTRAMGIAM + '%</sup></p>' +
                            '</a>' +
                            '<div style="font-size: 20px;">Giá gốc: <div class="price">' + formatter.format($obj.GIA) + ' <sup>đ</sup></div></div>';
                        if ($obj.PHANTRAMGIAM != 0) {
                            $xhtml += '<div style="font-size: 20px;">Giá khuyến mãi: <div class="price" style="color: red;">' + formatter.format($obj.GIA * (1 - $obj.PHANTRAMGIAM / 100)) + ' <sup>đ</sup></div>';
                        }
                        $xhtml += '<button onclick="addToCart(\'' + $obj.MASP + '\');" class="product-name" style="background-color: white;color: red;font-weight: 900;float: right;border-radius: 0.3rem;">Thêm vào giỏ</button>' +
                            '</div></div>';
                    }

                    $("#product-container-id").html($xhtml);
                }
            });
        });


        $("#searchProduct").click(function() {
            $name = "@";
            $minPrice = "@";
            $maxPrice = '@';
            $sale = "@";
            $sort = "@";

            if ($("#checkProductName").is(":checked")) {
                $name = convertStringToEnglish($("#inputProductName").val());
                if ($name == "") {
                    alert("Vui lòng nhập tên sản phẩm");
                    return;
                }
            }
            if ($("#checkProductPrice").is(":checked")) {

                $minPrice = parseInt($("#inputMinProductPrice").val());
                $maxPrice = parseInt($("#inputMaxProductPrice").val());
                if ($minPrice == "" || $maxPrice == "") {
                    alert("Vui lòng nhập khoảng giá cần tìm kiếm");
                    return;
                } else if (!Number.isInteger($minPrice) || !Number.isInteger($maxPrice)) {
                    alert("Giá tìm kiếm phải là số");
                    return;
                } else if ($minPrice > $maxPrice) {
                    alert("Giá thấp nhất phải nhỏ hơn bằng giá cao nhất");
                    return;
                }
            }
            if ($("#checkStatusDecreaseProduct").is(":checked")) {
                $sale = $("#inputStatusDecreaseProduct").val();
            }
            if ($("#checkSortProduct").is(":checked")) {
                $sort = $("#inputSortProduct").val();
            }

            $.ajax({
                url: '/CuaHangTrangSuc/Admin/getAllProductByType/LSP03',
                success: function(data) {
                    var data = JSON.parse(data);
                    $xhtml = '';

                    //Sort aray
                    switch ($sort) {
                        case '0': {
                            for (var i = 0; i < data.length - 1; i++) {
                                for (var j = i + 1; j < data.length; j++) {
                                    if (parseInt(data[i].GIA) < parseInt( data[j].GIA)) {
                                        var tmp = data[i];
                                        data[i] = data[j]
                                        data[j] = tmp
                                    }
                                }
                            }
                            break;
                        }

                        case '1': {
                            for (var i = 0; i < data.length - 1; i++) {
                                for (var j = i + 1; j < data.length; j++) {
                                    if (parseInt(data[i].GIA) > parseInt(data[j].GIA)) {
                                        var tmp = data[i];
                                        data[i] = data[j]
                                        data[j] = tmp
                                    }
                                }
                            }
                            break;
                        }
                    }
                    for (var key in data) {
                        $obj = data[key];
                        if ($name != '@' && !convertStringToEnglish($obj.TENSP).includes($name)) {
                            continue;
                        }
                        if ($minPrice != '@' && ($minPrice > $obj.GIA || $maxPrice < $obj.GIA)) {
                            continue;
                        }
                        if ($sale != '@') {
                            if ($sale == 0 && $obj.PHANTRAMGIAM != 0) {
                                continue;
                            }

                            if ($sale != 0 && $obj.PHANTRAMGIAM == 0) {
                                continue;
                            }
                        }

                        $xhtml += ' <div class="product-item">' +
                            '<a href="/CuaHangTrangSuc/ChiTietSanPham/SanPham/' + $obj.MASP + '">' +
                            '<img src="/CuaHangTrangSuc/public/image/HINHANH/' + $obj.HINHANH + '" alt="">' +
                            '<p class="product-name">' + $obj.TENSP + '<sup style="color: red;font-size: 1.2rem;"> -' + $obj.PHANTRAMGIAM + '%</sup></p>' +
                            '</a>' +
                            '<div style="font-size: 20px;">Giá gốc: <div class="price">' + formatter.format($obj.GIA) + ' <sup>đ</sup></div></div>';
                        if ($obj.PHANTRAMGIAM != 0) {
                            $xhtml += '<div style="font-size: 20px;">Giá khuyến mãi: <div class="price" style="color: red;">' + formatter.format($obj.GIA * (1 - $obj.PHANTRAMGIAM / 100)) + ' <sup>đ</sup></div>';
                        }
                        $xhtml += '<button onclick="addToCart(\'' + $obj.MASP + '\');" class="product-name" style="background-color: white;color: red;font-weight: 900;float: right;border-radius: 0.3rem;">Thêm vào giỏ</button>' +
                            '</div></div>';
                    }

                    $("#product-container-id").html($xhtml);
                }
            });

        });


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