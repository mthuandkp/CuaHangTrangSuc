<?php
    //http://127.0.0.1/CuaHangTrangSuc/Run
    class Run extends Controller{
        function display(){
            //model cần chạy
            $obj = $this->getModel('NhanVienDB');
            $rs = $obj->getAllStaff();

            echo '<pre>';
            print_r($rs);
        }
    }
?>
