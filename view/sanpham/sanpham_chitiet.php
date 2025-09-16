<?php

session_start();

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require '../../view/sanpham/sanpham_m.php';
require '../../view/sanpham/danhmuc_sanpham_m.php';

//Lấy id từ URL (Nếu có)
if(isset($_GET['sanpham_id']) && is_numeric($_GET['sanpham_id'])){
	$sanpham_id = $_GET['sanpham_id'];

	//Lấy thông tin sản phẩm
	$sanpham_theo_id = lay_sanpham_theo_id($sanpham_id, $ketnoi);

	//Lấy 6 sản phẩm cùng loại
	$sanpham_cungloai = lay_sanpham_theo_danhmuc(4, $sanpham_theo_id['danhmuc_sanpham_id'], $sanpham_id, $ketnoi);


}


if(isset($_SESSION['nguoidung_id'])){
    require '../../view/giohang/giohang_m.php';
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

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);
//Lấy danh sách logo danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_logo = lay_logo_dmsp_cosp_hh($ketnoi);
//Require tập tin giao diện (View)
require '../../view/sanpham/sanpham_chitiet_v.php';
?>