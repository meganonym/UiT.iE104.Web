<?php

require '../kiemtra.php' ;

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require 'loaisanpham_m.php';

if(isset($_GET['danhmuc_sanpham_id']) && is_numeric($_GET['danhmuc_sanpham_id'])){
	
	//Lấy category_id từ URL
	$danhmuc_sanpham_id = $_GET['danhmuc_sanpham_id'];


	//Xóa
	if ( $_SESSION['nhom_nguoidung_id'] == 1){
		if(xoa_loaisanpham($danhmuc_sanpham_id, $ketnoi)){
			header('location:loaisanpham_danhsach.php');
			$_SESSION['xoa_loaisanpham']='Xóa danh mục sản phẩm thành công!';
		} else{
			header('location:loaisanpham_danhsach.php');
			$_SESSION['xoa_loaisanpham']='Xóa danh mục sản phẩm thất bại! Mã danh mục sản phẩm không tồn tại!';
		}
	}else{
		header('location:loaisanpham_danhsach.php');
		$_SESSION['xoa_loaisanpham']='Xóa danh mục sản phẩm thất bại! Bạn không có quyền xóa';
	}
}else{ 
	header('location:loaisanpham_danhsach.php'); 
	$_SESSION['xoa_loaisanpham']='Xóa danh mục sản phẩm thất bại! Lỗi không xác định';
}


?>
