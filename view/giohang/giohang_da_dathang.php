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

//$soloai_sanpham_tronggiohang =  dem_sanpham_trong_giohang($check_data_giohang['giohang_id'], $ketnoi);

require '../../view/sanpham/danhmuc_sanpham_m.php';
//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

if (!empty($_SESSION['nguoidung_id'])){
	// n lần ddawtj hàng gần nhất : 06
	$lichsu_dathang = lichsu_dathang($_SESSION['nguoidung_id'], 6 , $ketnoi);
}

//Require tập tin giao diện (View)
require '../../view/giohang/giohang_da_dathang_v.php';
?>
