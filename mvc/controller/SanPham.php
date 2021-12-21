<?php
class SanPham extends Controller
{
    function display()
    {
        
    }

    function Pages($page){
        $objProduct = $this->getModel('SanPhamDB');
        $listProduct = $objProduct->getAllProduct();
        $data = array(
            'data' => $listProduct,
            'data_sale' => $objProduct->getSaleProduct(),
            'page'=>$page
        );
        $this->View('SanPham', 'Tất cả sản phẩm', $data);
    }
}
