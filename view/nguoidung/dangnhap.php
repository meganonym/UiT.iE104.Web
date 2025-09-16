<?php

session_start();

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

// lấy Model
require '../../view/nguoidung/nguoidung_m.php';

$error = array();
$data = array();
if ($_POST) {
    // Gán tài khoản và mật khẩu nhận được từ form vào 2 biến tương ứng
    $email = addslashes($_POST['email']);
    $matkhau = addslashes($_POST['matkhau']);
    //echo sha1($_POST['matkhau']);
    
    
    // Kiểm tra Email 
    if (empty($_POST["email"])) {
        $error['email'] = '<p style="color: red;">Email bắt buộc phải nhập</p>' ;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] =  '<p style="color: red;">Email nhập chưa đúng định dạng</p>';
        } else {
            if(kiemtra_tontai_email($ketnoi, $email) ){
                unset($error['email']);
            }else{ $error['email'] ='<p style="color: red;">Email không tồn tại trong hệ thống! Vui lòng nhập email khác </p>'; }
        }
    }

    // Kiểm tra Mật khẩu
    if (empty($matkhau)) {
        $error['matkhau'] = '<p style="color: red;"> Mật khẩu bắt buộc phải nhập </p>';
    } else {
        if(strlen($matkhau)<6 || strlen($matkhau)>20){
            $error['matkhau'] ='<p style="color: red;"> Mật khẩu quá ngắn (6) hoặc quá dài (20)! Vui lòng nhập lại </p>';
        }else {
            unset($error['matkhau']);
        }
    }

    //Đăng nhập
    if (!$error){
        // Lấy thông tin người dùng từ DB
        $nguoidung = dangnhap($email, $ketnoi); // hàm này viết trong file Model

        // Kiểm tra sự tồn tại của người dùng và mật khẩu có trùng khớp
        if ($nguoidung && $nguoidung['matkhau'] === ($matkhau)) {
            // Tạo session lưu thông tin người dùng đăng nhập thành công
                $_SESSION['email'] = $nguoidung['email'];
                $_SESSION['nguoidung_id'] = $nguoidung['nguoidung_id'];
                $_SESSION['nhom_nguoidung_id'] = $nguoidung['nhom_nguoidung_id'];
                $_SESSION['hovaten'] = $nguoidung['hovaten'];

            // Chuyển hướng về trang chủ 
            header('location:../../index.php');
        } else {
            // Bật cờ lỗi
             $error['matkhau'] ='<p style="color: red;"> Bạn nhập sai mật khẩu vui lòng nhập lại </p>';
        } 
    }
}

// lấy View
require '../../view/nguoidung/dangnhap_v.php';
?>
