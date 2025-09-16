<?php

require '../kiemtra.php';


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

// lấy Model
require 'donhang_m.php';
require '../nguoidung/nguoidung_m.php';
require '../danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

//Lấy giohang_id từ URL
$giohang_id = $_GET['giohang_id'];


//lấy thông tin giỏ hàng
$donhang = lay_thongtin_donhang($giohang_id, $ketnoi);


//lấy thông tin người dùng
$nguoidung_tt =lay_tt_nguoidung_bang_id($donhang['nguoidung_id'], $ketnoi);

// lấy chi tiết giỏ hàng
$donhang_chitiet = lay_chitiet_donhang($giohang_id, $ketnoi);

$error=array();
$data = array();
if ($_POST) {
    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'lienlac' => isset($_POST['lienlac']) ? 1 : 0,
        'xuly' => isset($_POST['xuly']) ? 1 : 0,
    );
    
    
    
    //kiểm tra liên lạc 
    if ($data['xuly']==1 && $data['lienlac']==0){
        $error['xulydonhang']='Chưa liên lạc khách hàng nên đơn này không kết thúc được';
    }else {unset($error['xulydonhang']);}
    //xử lý đơn hàng
    
    if(!$error){
        if($data['xuly']==1 && $data['lienlac']==1){
            if (xuly_donhang($data, $giohang_id, $ketnoi)) {
                //Tạo session để lưu cờ thông báo thành công
                $_SESSION['xulydonhang'] = $giohang_id ;

                //chuyển hướng về danh sách đơn hoàn thành
                header('location:donhang_da_xuly.php');
            }
        }else{
            if (xuly_donhang($data, $giohang_id, $ketnoi)) {
                //Tạo session để lưu cờ thông báo thành công
                $_SESSION['xulydonhang'] = $giohang_id ;

                //chuyển hướng về danh sách đơn hoàn thành
                header('location:donhang_danhsach.php');
            }
        }
        
    }
    
}

// lấy View
require 'donhang_xuly_v.php';

?>