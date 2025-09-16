<?php

require( '../kiemtra.php');


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require 'sanpham_m.php';
require '../danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

//Lấy id sản phẩm từ URL
$sanpham_id = $_GET['sanpham_id'];
//Lấy thông tin sản phẩm để trình bày trên form
$sanpham = lay_sanpham_theo_id($sanpham_id, $ketnoi);

//Lấy danh sách danh mục sản phẩm có trạng thái kích hoạt (Status = 1)
$danhmuc_hienhoat = lay_danhmuc_hienhoat($ketnoi);


$error=array();
$data=array();
//Nếu có post dữ liệu lên thì xử lýs
if ($_POST) {
    //Tải hình ảnh lên máy chủ (Upload)
    if (($image = $_FILES['image']['name']) != null) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../../hinhsanpham/' . $image);
    } else {
        $image = NULL;
    }
    
    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'danhmuc_sanpham_id' => $_POST['danhmuc_sanpham_id'],
        'ten_sanpham' => $_POST['ten_sanpham'],
        'chitiet' => $_POST['chitiet'],
        'hinh' =>  $image,
        'gia' => $_POST['gia'],
        'trangthai' => isset($_POST['trangthai']) ? '1' : '0',
        
    );
	$data['gia'] = str_replace(array('₫','\`','\'',',','.','vnđ','VNĐ','VND',' ','vnd','đ','.'), '', $data['gia']);
    $data['chitiet'] = str_replace(array('<td style="background-color:#ffffff; text-align:left; vertical-align:top; width:1px">&nbsp;</td>','\`','<td>&nbsp;</td>'), '', $data['chitiet']);
    
	// kiểm tra id danh mục
    if (empty($_POST['danhmuc_sanpham_id'])) {
        $error['danhmuc_sanpham_id'] = '<p style="color: red;">Mã danh mục sản phẩm bắt buộc phải nhập</p>' ;
    } else {
		if($_POST['danhmuc_sanpham_id'] != $sanpham['danhmuc_sanpham_id']){
			if(!kiemtra_tontai_loaisanpham_id($ketnoi, $_POST['danhmuc_sanpham_id'])){
			 $error['danhmuc_sanpham_id'] = '<p style="color: red;">Danh mục không tồn tại trong hệ thống</p>' ;
			}else {
				unset($error['danhmuc_sanpham_id']);
			}
		}else {
			unset($error['danhmuc_sanpham_id']);
		}
	}
	
	
	// Kiểm tra tên sản phẩm
    if (empty($_POST['ten_sanpham'])) {
        $error['ten_sanpham'] = '<p style="color: red;">Tên sản phẩm bắt buộc phải nhập</p>' ;
    } else {
		if($_POST['ten_sanpham'] != $sanpham['ten_sanpham']){
			 $ten_sanpham = $_POST['ten_sanpham'];
			if(kiemtra_tontai_tensanpham($ketnoi, $ten_sanpham)){
            	$error['ten_sanpham'] ='<p style="color: red;">Tên sản phẩm trong hệ thống! Vui lòng nhập tên sản phẩm khác </p>';
			}else {
				unset($error['ten_sanpham']);
			}
		}else{
			$data['ten_sanpham'] = NULL ; // không thay đổi lọai sản phẩm
			unset($error['ten_sanpham']);
		}
    }
	
	// kiểm tra giá 
	if (empty($_POST['gia'])) {
        $error['gia_sanpham'] = '<p style="color: red;">Giá của sản phẩm bắt buộc phải nhập</p>' ;
    } else {
		if($_POST['gia'] != $sanpham['gia']){
			if(!is_numeric($_POST['gia'])){
				$error['gia_sanpham'] = '<p style="color: red;">Giá của sản phẩm bắt buộc phải là 1 dãy số</p>' ;
			}else{
				$gia_sanpham = $_POST['gia'];
				if(strlen($gia_sanpham)<5 || strlen($gia_sanpham) >10){
					$error['gia_sanpham'] = '<p style="color: red;">Giá của sản phẩm quá nhỏ hoặc quá lớn. vui lòng nhập lại</p>' ;
				} else { unset($error['gia_sanpham']); }
			}
		}else { 
			$data['gia'] = NULL;
			unset($error['gia_sanpham']); }
    }
    
	 //kiểm tra trạng thái 
	if($data['trangthai'] == $sanpham['trangthai']){
		$data['trangthai'] = NULL; // không thay đổi
	}

	// kiểm tra hình ảnh
	if($data['hinh'] == $sanpham['hinh']){
		$data['hinh'] = NULL; // không thay đổi
	}
	
	// kiểm tra chi tiết
	if($data['chitiet'] == $sanpham['chitiet']){
		$data['chitiet'] = NULL; // không thay đổi
	}
    //Cập nhật
    if(!$error){
        if (sua_sanpham($data, $sanpham_id, $ketnoi)) {
            $trangthai = 'Complete! Bạn đã sửa thành công';
			$sanpham = lay_sanpham_theo_id($sanpham_id, $ketnoi);
        }else{
            $trangthai = 'ERROR! không ghi được vào DB';
        }
    }else{
        $trangthai = 'ERROR! Vui lòng nhập lại chính xác';
    }
    
}


//Require tập tin giao diện (View)
require 'sanpham_sua_v.php';
?>