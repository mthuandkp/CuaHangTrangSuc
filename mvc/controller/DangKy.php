<?php
class DangKy extends Controller
{
    function display()
    {
        $objProduct = $this->getModel('SanPhamDB');
        $data = array(
            'data_sale' => $objProduct->getSaleProduct()
        );
        $this->View('DangKy','Đăng Ký',$data);
    }
}
