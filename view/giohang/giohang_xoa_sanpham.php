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

if(isset($_GET['giohang_id']) &&isset($_GET['sanpham_id'])){
	//Lấy id giỏ hàng từ URL
	$giohang_id = $_GET['giohang_id'];

	//Lấy id sản phẩm từ URL
	$sanpham_id = $_GET['sanpham_id'];
	
	//đếm số sp trong giỏ
	$soloai_sanpham_tronggiohang =  dem_sanpham_trong_giohang($giohang_id, $ketnoi);
	$_SESSION['soluong_sanpham'] = $soloai_sanpham_tronggiohang;
	//Xóa
	if ($soloai_sanpham_tronggiohang > 1 ){ // nếu số loại sản phẩm trong giỏ lớn hơn 1 thì xóa sản phẩm đi
		if (xoa_sanpham_trong_giohang($giohang_id, $sanpham_id, $ketnoi)){
			$_SESSION['soluong_sanpham'] = $_SESSION['soluong_sanpham'] -1;
			//Quay về trang danh sách sản phẩm trong giỏ hàng
			header('location: giohang_xem.php');
		}

	}else{ // nếu số loại sản phẩm trong giỏ <= 1 thì xóa sp và xóa luôn giỏ hàng
		if (xoa_sanpham_trong_giohang($giohang_id, $sanpham_id, $ketnoi)){
			$_SESSION['soluong_sanpham'] = 0 ;
			if ( xoa_giohang($giohang_id, $ketnoi) ){
				header('location:giohang_xem.php');
			}
		}
	}

}else{
	header('location:../../index.php');
}



?>