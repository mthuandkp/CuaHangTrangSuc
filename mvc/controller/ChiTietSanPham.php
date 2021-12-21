<?php
class ChiTietSanPham extends Controller
{
    function display()
    {
    }

    function SanPham($id)
    {
        $objProduct = $this->getModel('SanPhamDB');
        $product = $objProduct->getProductById($id);

        $data = array(
            'data_sale'=>$objProduct->getSaleProduct(),
            'product' => $product

        );   
        $this->View('ChiTietSanPham', 'Chi Tiết Sản Phẩm', $data);
    }


    function getProductById($productId)
    {
        $productId = 0;
        if (isset($_POST['productId'])) {
            $productId = $_GET['productId'];
        }
        $objProduct = $this->getModel('SanPham');
        return $objProduct->getProductById($productId);
    }
}
