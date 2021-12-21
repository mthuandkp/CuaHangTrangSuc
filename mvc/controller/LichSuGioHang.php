<?php
class LichSuGioHang extends Controller
{
    function display()
    {
        if (!isset($_SESSION['account'])) {
            $this->View('TrangChu');
            return;
        }
        $obj = $this->getModel('HoaDonDB');
        $objSale = $this->getModel("KhuyenMaiDB");

        $listBill = $obj->getBillByCusId("KH01");
        foreach ($listBill as $key => $value) {
            $sumBill = 0;
            foreach ($obj->getBillDetailById($value['MAHD']) as $subvalue) {
                $sumBill += $subvalue['GIA'] * $subvalue['SOLUONG'] * (1 - $subvalue['PHANTRAMGIAM'] / 100);
            }

            $saleId = $value['MAKM'];

            $sale = $objSale->getSaleById($saleId);
            $listBill[$key]['LAST_PRICE'] = (1 - $sale['PHANTRAMGIAM'] / 100) * $sumBill;
        }

        $objProduct = $this->getModel('SanPhamDB');
        $data = array(
            'data_sale' => $objProduct->getSaleProduct(),
            'data' => $listBill
        );

        $this->View('LichSuGioHang', "Lich Sử Giỏ Hàng", $data);
    }

    function XemChiTiet($id)
    {
        $obj = $this->getModel('HoaDonDB');
        $objSale = $this->getModel('KhuyenMaiDB');
        $objProduct = $this->getModel("SanPhamDB");

        $bill = $obj->getBillById($id)[0];
        $listBill['detail'] = $obj->getBillDetailById($id);
        $listBill['sale'] = $objSale->getSaleById($bill['MAKM']);
        $listBill['sale']['MAHD'] = $id;

        foreach ($listBill['detail'] as $key => $value) {
            $pro = $objProduct->getProductById($value['MASP']);
            $listBill['detail'][$key]['TENSP'] = $pro['TENSP'];
            $listBill['detail'][$key]['HINHANH'] = $pro['HINHANH'];
        }

        $objProduct = $this->getModel('SanPhamDB');
        $data = array(
            'data_sale' => $objProduct->getSaleProduct(),
            'data' => $listBill
        );

        $this->View('XemChiTiet', "Xem Chi Tiết Đơn Hàng", $data);
    }
}
