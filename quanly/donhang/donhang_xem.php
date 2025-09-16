<?php

require '../kiemtra.php';


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

// lấy Model
require 'donhang_m.php';
require '../nguoidung/nguoidung_m.php';
require '../danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

//Lấy giohang_id từ URL
if(isset($_GET['giohang_id'])){
    $giohang_id = $_GET['giohang_id'];
    
    //lấy thông tin giỏ hàng
    $donhang = lay_thongtin_donhang($giohang_id, $ketnoi);


    //lấy thông tin người dùng
    $nguoidung_tt =lay_tt_nguoidung_bang_id($donhang['nguoidung_id'], $ketnoi);

    // lấy chi tiết giỏ hàng
    $donhang_chitiet = lay_chitiet_donhang($giohang_id, $ketnoi);
    
    
}





// lấy View
require 'donhang_xem_v.php';

?>