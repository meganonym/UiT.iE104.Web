<?php
//Khởi động session
session_start();

// lấy cấu hình
require 'cauhinh/cauhinh.php';
require 'cauhinh/ketnoi.php';

//lấy model
require 'view/sanpham/sanpham_m.php';
require 'view/sanpham/danhmuc_sanpham_m.php';

//Lấy danh sách 6 sản phẩm mới nhất
$sanpham_moinhat = lay_sanpham_moinhat(9, $ketnoi);
$sanpham_ngaunhien = lay_sanpham_ngaunhien(12, $ketnoi);
$soluong_sanpham = mysqli_num_rows($sanpham_ngaunhien);

if(isset($_SESSION['nguoidung_id'])){
    require 'view/giohang/giohang_m.php';
    //Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
    $check_data_giohang = giohang_theo_nguoidung_id($_SESSION['nguoidung_id'], $ketnoi);
    //$giohang_id = $check_data_giohang['giohang_id'];
    if (!empty($check_data_giohang['giohang_id']))
    {
        $sanpham_tronggio = giohang_theo_id($check_data_giohang['giohang_id'], $ketnoi);
        $soloai_sanpham_tronggiohang =  dem_sanpham_trong_giohang($check_data_giohang['giohang_id'], $ketnoi);
        $_SESSION['soluong_sanpham'] = $soloai_sanpham_tronggiohang;
        //echo $soloai_sanpham_tronggiohang;
    }else{$_SESSION['soluong_sanpham'] = 0;}
}
//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt đưa vào menu
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

$dmsp_logo = lay_logo_dmsp_cosp_hh($ketnoi);
//lấy giao diện
require 'view/index_v.php';
?>