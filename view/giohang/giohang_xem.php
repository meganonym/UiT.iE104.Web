<?php
//Khởi động session
session_start();

/*
Kiểm tra đăng nhập hay chưa? nếu chưa trả về trang đăng nhập
 */

if (empty($_SESSION['nguoidung_id'])) {
    header('location:../../view/nguoidung/dangnhap.php');
}
// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require '../../view/giohang/giohang_m.php';
require '../../view/sanpham/danhmuc_sanpham_m.php';
//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

//Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
if (!empty($_SESSION['nguoidung_id'])){
    //Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
    $check_data_giohang = giohang_theo_nguoidung_id($_SESSION['nguoidung_id'], $ketnoi);

    //echo $check_data_giohang['giohang_id'];
    if (!empty($check_data_giohang['giohang_id']))
    {
        $sanpham_tronggio = giohang_theo_id($check_data_giohang['giohang_id'], $ketnoi);
        $soloai_sanpham_tronggiohang =  dem_sanpham_trong_giohang($check_data_giohang['giohang_id'], $ketnoi);
        $_SESSION['soluong_sanpham'] = $soloai_sanpham_tronggiohang;
        //echo $soloai_sanpham_tronggiohang;
    }else{$_SESSION['soluong_sanpham'] = 0;}
}else{$_SESSION['soluong_sanpham'] = 0;}



if ($_POST) {
    foreach($_POST as $key => $val) { 
        if (!isset($val) || $val <1){$val =1;}
        
        if (them_soluong_vao_sptronggio($check_data_giohang['giohang_id'], $key, $val, $ketnoi)) {
			$capnhatgiohang = '<p style="color: green;" align="center">Sản phẩm được cập nhật thành công!</p>';
			$sanpham_tronggio = giohang_theo_id($check_data_giohang['giohang_id'], $ketnoi);
		}
    }
}
    
//Require tập tin giao diện (View)
require '../../view/giohang/giohang_xem_v.php';
?>