<?php

require '../kiemtra.php' ;


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require 'sanpham_m.php';
require '../danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);
$error=array();
$data=array();
//Nếu có post dữ liệu lên thì xử lý

if ($_POST) {
	
	//Tải hình ảnh lên máy chủ (Upload)
    if (($image = $_FILES['image']['name']) != null) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../../hinhsanpham/' . $image);
    } else {
        $image = '';
    }
    //danhmuc_sanpham_id, ten_sanpham, gia, chitiet, hinh, trangthai
    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'danhmuc_sanpham_id' => $_POST['danhmuc_sanpham_id'],
        'ten_sanpham' => $_POST['ten_sanpham'],
        'chitiet' => $_POST['chitiet'],
        'hinh' =>  $image,
        'gia' => $_POST['gia'],
        'trangthai' => isset($_POST['trangthai']) ? 1 : 0,
    );
    $data['gia'] = str_replace(array('₫','\`','\'',',','.','vnđ','VNĐ','VND',' ','vnd','đ','.'), '', $data['gia']);
    $data['chitiet'] = str_replace(array('<td style="background-color:#ffffff; text-align:left; vertical-align:top; width:1px">&nbsp;</td>','\`','<td>&nbsp;</td>'), '', $data['chitiet']);
    
    // Kiểm tra tên sản phẩm
    if (empty($_POST['ten_sanpham'])) {
        $error['ten_sanpham'] = '<p style="color: red;">Tên sản phẩm bắt buộc phải nhập</p>' ;
    } else {
        $ten_sanpham = $_POST['ten_sanpham'];
        if(kiemtra_tontai_tensanpham($ketnoi, $ten_sanpham)){
            $error['ten_sanpham'] ='<p style="color: red;">Tên sản phẩm trong hệ thống! Vui lòng nhập tên sản phẩm khác </p>';
        }else{ 
			unset($error['ten_sanpham']); 
		}
    }
	
	// kiểm tra giá 
	if (empty($data['gia'])) {
        $error['gia_sanpham'] = '<p style="color: red;">Giá của sản phẩm bắt buộc phải nhập</p>' ;
    } else {
		if(!is_numeric($data['gia'])){
			$error['gia_sanpham'] = '<p style="color: red;">Giá của sản phẩm bắt buộc phải là 1 dãy số</p>' ;
		}else{
			if(strlen($data['gia'])<5 || strlen($data['gia']) >10){
				$error['gia_sanpham'] = '<p style="color: red;">Giá của sản phẩm quá nhỏ hoặc quá lớn. vui lòng nhập lại</p>' ;
			} else { 
                unset($error['gia_sanpham']); 
            }
		}
    }
	
 	
	
	
    //Thêm mới
    if(!$error){
        if (them_sanpham($data, $ketnoi)) {
            $_SESSION['thanhcong'] = 'Complete! Bạn đã thêm thành công';
            $trangthai = 'Complete! Bạn đã thêm thành công';
            header('location:sanpham_them.php');
            //unset($data);
        }else{
            $trangthai = 'ERROR! không ghi được vào DB';
        }
    }else{
        $trangthai = 'ERROR! Vui lòng nhập lại chính xác';
    }
}


//Lấy danh sách danh mục sản phẩm có trạng thái kích hoạt (Status = 1)
$danhmuc_hienhoat = lay_danhmuc_hienhoat($ketnoi);

//Require tập tin giao diện (View)
require 'sanpham_them_v.php';
?>