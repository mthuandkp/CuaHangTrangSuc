<?php
    class Nhan extends Controller{
        function display(){
            $this->View('Nhan');
        }

        function Pages($page){
            $objProduct = $this->getModel('SanPhamDB');
            $listProduct = $objProduct->getProductByTypeId('LSP03');
            $data = array(
                'data' => $listProduct,
                'data_sale' => $objProduct->getSaleProduct(),
                'page'=>$page
            );
            $this->View('Nhan', 'Nhẫn', $data);
        }
    }

?>