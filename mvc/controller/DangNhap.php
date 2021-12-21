<?php
    class DangNhap extends Controller{
        function display(){
            $objProduct = $this->getModel('SanPhamDB');
        $data = array(
            'data_sale' => $objProduct->getSaleProduct()
        );
        $this->View('DangNhap','Đăng Nhập',$data);
        }

        function checkLogin(){
            return true;
        }
    }

?>