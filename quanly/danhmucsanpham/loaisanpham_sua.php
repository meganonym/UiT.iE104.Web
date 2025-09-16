<?php

include_once '../kiemtra.php';


// lấy cấu hình
include_once '../../cauhinh/cauhinh.php';
include_once '../../cauhinh/ketnoi.php';

//lấy model
include_once 'loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);
if(isset($_GET['danhmuc_sanpham_id'])){
    //Lấy category_id từ URL
    $danhmuc_sanpham_id = $_GET['danhmuc_sanpham_id'];
    //Lấy thông tin danh mục sản phẩm để trình bày trên form và kiểm tra
    $loaisanpham_id =  lay_danhmuc_theo_id($danhmuc_sanpham_id, $ketnoi);

}
$error = array();
$data = array();
//Nếu có post dữ liệu lên thì xử lý
if ($_POST) {
    //Tải hình ảnh lên máy chủ (Upload)
    if (($logo = $_FILES['logo']['name']) != null) {
        move_uploaded_file($_FILES['logo']['tmp_name'], '../../hinhdanhmucsanpham/' . $logo);
    } else {
        $logo = NULL;
    }
    //Tải hình ảnh lên máy chủ (Upload)
    if (($banner = $_FILES['banner']['name']) != null) {
        move_uploaded_file($_FILES['banner']['tmp_name'], '../../hinhdanhmucsanpham/' . $banner);
    } else {
        $banner = NULL;
    }
    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'ten_danhmuc_sanpham' => $_POST['ten_danhmuc_sanpham'],
        'trangthai' => isset($_POST['trangthai']) ? 1 : 0,
        'logo' =>  $logo,
        'banner' =>  $banner,
    );

    // Kiểm tra ten_danhmuc_sanpham 
    if (empty($_POST['ten_danhmuc_sanpham'])) {
        $error['ten_danhmuc_sanpham'] = '<p style="color: red;">Tên danh mục bắt buộc phải nhập</p>' ;
    } else {
        if($loaisanpham_id['ten_danhmuc_sanpham'] == $_POST['ten_danhmuc_sanpham']){
            $data['ten_danhmuc_sanpham'] = NULL;
        }else{
            $ten_danhmuc_sanpham = $_POST['ten_danhmuc_sanpham'];
            if(kiemtra_tontai_loaisanpham($ketnoi, $ten_danhmuc_sanpham) ){
                $error['ten_danhmuc_sanpham'] ='<p style="color: red;">Tên danh mục trong hệ thống! Vui lòng nhập tên danh mục khác </p>';
            }else{ unset($error['ten_danhmuc_sanpham']); }
        }
    }

    //Sửa
    if(!$error){
        if (sua_loaisanpham($data, $danhmuc_sanpham_id, $ketnoi)) {
            $trangthai = 'Complete! Bạn đã sửa thành công';
            $loaisanpham_id =  lay_danhmuc_theo_id($danhmuc_sanpham_id, $ketnoi);
        }else{
            $trangthai = 'ERROR! không ghi được vào DB';
        }
    }else{
        $trangthai = 'ERROR! Vui lòng nhập lại chính xác';
    }
}




//Require tập tin giao diện (View)
include_once 'loaisanpham_sua_v.php';
?>