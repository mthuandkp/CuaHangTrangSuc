<?php
class DayChuyen extends Controller
{
    function display()
    {
        $this->View('DayChuyen');
    }

    function Pages($page)
    {
        $objProduct = $this->getModel('SanPhamDB');
        $listProduct = $objProduct->getProductByTypeId('LSP02');
        $data = array(
            'data' => $listProduct,
            'data_sale' => $objProduct->getSaleProduct(),
            'page' => $page
        );
        $this->View('DayChuyen', 'Dây Chuyền', $data);
    }
}
