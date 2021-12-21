<?php
class GioHang extends Controller
{
    function display()
    {
        $objProduct = $this->getModel('SanPhamDB');
        $data = array(
            'data_sale' => $objProduct->getSaleProduct()
        );
        $this->View('GioHang', 'Giỏ Hàng', $data);
    }
}
