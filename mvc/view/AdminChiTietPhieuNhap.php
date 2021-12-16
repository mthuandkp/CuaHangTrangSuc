<!doctype html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .optionButton {
            width: 13rem;
            font-size: 1.1rem;
        }

        .btnControl {
            width: 10rem;
        }
    </style>
</head>

<body>
    <h1 style="margin-top: 5rem;margin-left: 10%;">Chi Tiết Phiếu Nhập <?php echo $data;?></h1>
    <div>
        <a href="/CuaHangTrangSuc/Admin/PhieuNhap">
        <button type="submit" class="btn btn-primary" style="background-color: white;color: #0066cc;margin-left: 10%;">Trở về </button>
        </a>
    </div>
    <table id="tableContent" class="table" style="width: 80%;margin-left: 10%;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Thành Tiền</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</body>

</html>