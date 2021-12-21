<?php
    class ThayDoiThongTin extends Controller{
        function display(){
            if(!isset($_SESSION['account'])){
                echo '<script>alert("Bạn chưa đăng nhập. Vui lòng đăng nhập để tiếp tục");window.location.href="./DangNhap";</script>';
                return;
            }

            $objProduct = $this->getModel('SanPhamDB');
            $data = array(
                'data_sale' => $objProduct->getSaleProduct(),
                'user'=>$_SESSION['account']
            );
    
            
            $this->View('ThayDoiThongTin',"Thay đổi thông tin khách hàng",$data);
        }
    }

?>


