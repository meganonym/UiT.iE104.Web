<?php

include_once '../kiemtra.php';
// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require 'loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

$error = array();
$data = array();
//Nếu có post dữ liệu lên thì xử lý
if ($_POST) {
    //Tải hình ảnh lên máy chủ (Upload)
    if (($logo = $_FILES['logo']['name']) != null) {
        move_uploaded_file($_FILES['logo']['tmp_name'], '../../hinhdanhmucsanpham/' . $logo);
    } else {
        $logo = '';
    }
    //Tải hình ảnh lên máy chủ (Upload)
    if (($banner = $_FILES['banner']['name']) != null) {
        move_uploaded_file($_FILES['banner']['tmp_name'], '../../hinhdanhmucsanpham/' . $banner);
    } else {
        $banner = '';
    }
    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'ten_danhmuc_sanpham' => $_POST['ten_danhmuc_sanpham'],
        'trangthai' => isset($_POST['trangthai']) ? 1 : 0,
        'logo' =>  $logo,
        'banner' =>  $banner,
    );
    //echo $data['logo'];
    //echo $data['banner'];
    
    // Kiểm tra ten_danhmuc_sanpham 
    if (empty($_POST['ten_danhmuc_sanpham'])) {
        $error['ten_danhmuc_sanpham'] = '<p style="color: red;">Tên danh mục bắt buộc phải nhập</p>' ;
    } else {
        $ten_danhmuc_sanpham = $_POST['ten_danhmuc_sanpham'];
        if(kiemtra_tontai_loaisanpham($ketnoi, $ten_danhmuc_sanpham) ){
            $error['ten_danhmuc_sanpham'] ='<p style="color: red;">Tên danh mục trong hệ thống! Vui lòng nhập tên danh mục khác </p>';
        }else{ unset($error['ten_danhmuc_sanpham']); }
    }

    //Thêm mới
    if(!$error){
        if (them_loaisanpham($data, $ketnoi)) {
            $trangthai = 'Complete! Bạn đã thêm thành công';
            $_POST['ten_danhmuc_sanpham'] = NULL;
        }else{
            $trangthai = 'ERROR! không ghi được vào DB';
        }
    }else{
        $trangthai = 'ERROR! Vui lòng nhập lại chính xác';
    }
}

//Require tập tin giao diện (View)
require 'loaisanpham_them_v.php';
?>