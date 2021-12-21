<?php
class VongTay extends Controller
{
    function display()
    {
        $objProduct = $this->getModel('SanPhamDB');
        $listProduct = $objProduct->getAllProduct();
        $data = array(
            'data' => $listProduct,
            'data_sale' => $objProduct->getSaleProduct()
        );
        
    }

    function Pages($page){
        $objProduct = $this->getModel('SanPhamDB');
        $listProduct = $objProduct->getProductByTypeId('LSP01');
        $data = array(
            'data' => $listProduct,
            'data_sale' => $objProduct->getSaleProduct(),
            'page'=>$page
        );
        $this->View('VongTay', 'Vòng Tay', $data);
    }
}
