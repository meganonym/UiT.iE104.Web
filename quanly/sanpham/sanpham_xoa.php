<?php

require( '../kiemtra.php');


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require 'sanpham_m.php';

if (isset( $_GET['sanpham_id'])){
	//Lấy id sản phẩm từ URL
	$sanpham_id = $_GET['sanpham_id'];
	
	
	//Xóa 
	if(!is_numeric($sanpham_id)){
		$_SESSION['xoa_sanpham']='Xóa sản phẩm thất bại! Mã sản phẩm không xác định';
			header('location:sanpham_danhsach.php');
	}else{
		if(!kiemtra_tontai_sanpham_id($ketnoi, $sanpham_id) ){
			$_SESSION['xoa_sanpham']='Xóa sản phẩm thất bại! Sản phẩm không tồn tại trong hệ thống';
			header('location:sanpham_danhsach.php');
		}else{
			if($_SESSION['nhom_nguoidung_id'] != 1){
				$_SESSION['xoa_sanpham']='Xóa sản phẩm thất bại! bạn không có quyền xóa';
				header('location:sanpham_danhsach.php');
			}else {
				if(xoa_sanpham($sanpham_id, $ketnoi)){
					$_SESSION['xoa_sanpham']='Xóa sản phẩm thành công!';
					header('location:sanpham_danhsach.php');
				}else{
					$_SESSION['xoa_sanpham']='Xóa sản phẩm thất bại! Lỗi không xác định';
					header('location:sanpham_danhsach.php');
				}
			}
		}
	}
}else{
	$_SESSION['xoa_sanpham']='Xóa sản phẩm thất bại! Không nhận được mã sản phẩm';
	header('location:sanpham_danhsach.php');
}

?>