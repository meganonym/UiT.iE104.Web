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
require '../../view/nguoidung/nguoidung_m.php';


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
	
	$nguoidung_id = $_SESSION['nguoidung_id'];
	
	$nguoidung_tt= lay_tt_nguoidung_bang_id($nguoidung_id, $ketnoi);
	
	
	
}else{$_SESSION['soluong_sanpham'] = 0;}



if ($_POST) {
    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'nguoidung_id' => $_SESSION['nguoidung_id'],
        //'email' => $_POST['email'],
        'hovaten' => $_POST['hovaten'],
        'dienthoai' => $_POST['dienthoai'],
		'diachi' => $_POST['diachi'],
    );
    
    if( $data['hovaten'] != $nguoidung_tt['hovaten'] || $data['dienthoai'] != $nguoidung_tt['dienthoai'] || $data['diachi'] != $nguoidung_tt['diachi']  ){
        sua_nguoidung_dathang($data, $data['nguoidung_id'] , $ketnoi);
    }
    
    if (dathang($check_data_giohang['giohang_id'], $ketnoi) ){
        // đặt hàng thành công chuyển đến trang cảm ơn
         header('location:giohang_camon.php');
    }
}


require '../../view/sanpham/danhmuc_sanpham_m.php';
//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

//Require tập tin giao diện (View)
require '../../view/giohang/giohang_dathang_v.php';
?>