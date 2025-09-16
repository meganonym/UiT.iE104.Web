<?php

require '../kiemtra.php' ;



// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

// lấy Model
require 'nguoidung_m.php';

if (isset( $_GET['nguoidung_id'])){
	//Lấy id người dùng từ URL
	$nguoidung_id = $_GET['nguoidung_id'];
	
	
	//Xóa 
	if(!is_numeric($nguoidung_id)){
		$_SESSION['xoa_nguoidung']='Xóa người dùng thất bại! Mã người dùng không xác định';
			header('location:nguoidung_danhsach.php');
	}else{
		if(!kiemtra_tontai_nguoidung_id($ketnoi, $nguoidung_id) ){
			$_SESSION['xoa_nguoidung']='Xóa người dùng thất bại! người dùng không tồn tại trong hệ thống';
			header('location:nguoidung_danhsach.php');
		}else{
			if($_SESSION['nhom_nguoidung_id'] != 1){
				$_SESSION['xoa_nguoidung']='Xóa người dùng thất bại! bạn không có quyền xóa';
				header('location:nguoidung_danhsach.php');
			}else {
				if(xoa_nguoidung($nguoidung_id, $ketnoi)){
					$_SESSION['xoa_nguoidung']='Xóa người dùng thành công!';
					header('location:nguoidung_danhsach.php');
				}else{
					$_SESSION['xoa_nguoidung']='Xóa người dùng thất bại! Lỗi không xác định';
					header('location:nguoidung_danhsach.php');
				}
			}
		}
	}
}else{
	$_SESSION['xoa_nguoidung']='Xóa người dùng thất bại! Không nhận được mã người dùng';
	header('location:nguoidung_danhsach.php');
}
?>