<?php
class TrangChu extends Controller
{
    function display()
    {
        $objProduct = $this->getModel('SanPhamDB');
        $listProduct = $objProduct->getProductRandom(4);
        $data = array(
            'data'=>$listProduct,
            'data2'=>$objProduct->getProductRandom(4),
            'data_sale'=>$objProduct->getSaleProduct()
        );
        $this->View('TrangChu','Trang Chủ',$data);
    }

    function Logout()
    {
        unset($_SESSION['account']);
        echo '<script>window.location.href="../";alert("Đăng xuất thành công");</script>';
    }

    function viewCart()
    {
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    }

    function clear(){
        session_destroy();
    }

    function DoiMatKhau(){
        $objProduct = $this->getModel('SanPhamDB');
        $listProduct = $objProduct->getProductRandom(5);
        $data = array(
            'data'=>$listProduct,
            'data2'=>$objProduct->getProductRandom(5),
            'data_sale'=>$objProduct->getSaleProduct()
        );
        $this->View("DoiMatKhau",'Đổi mật khẩu',$data);
    }
}
