<?php
    class ThongTinKhachHang extends Controller{
        function display(){
            $objProduct = $this->getModel('SanPhamDB');
            $data = array(
                'data_sale' => $objProduct->getSaleProduct()                
            );
    
            $this->View('ThongTinKhachHang','Thông tin khách hàng',$data);
        }
    }

?>