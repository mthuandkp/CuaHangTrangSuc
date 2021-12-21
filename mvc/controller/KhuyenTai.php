<?php
    class KhuyenTai extends Controller{
        function display(){
            $this->View('KhuyenTai');
        }

        function Pages($page){
            $objProduct = $this->getModel('SanPhamDB');
            $listProduct = $objProduct->getProductByTypeId('LSP04');
            $data = array(
                'data' => $listProduct,
                'data_sale' => $objProduct->getSaleProduct(),
                'page'=>$page
            );
            $this->View('KhuyenTai', 'Khuyên Tai', $data);
        }
    }

?>