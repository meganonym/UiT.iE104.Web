<?php
// Khởi động session
session_start();


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

// lấy model
require '../../view/nguoidung/nguoidung_m.php';


//nếu có post dữ liệu lên thì xử lý

$error = array();
$data = array();
if ($_POST) {

    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'hovaten' => $_POST['hovaten'],

        'email' => $_POST['email'],

        'matkhau' => $_POST['matkhau'],
        
        'nhaplaimatkhau' => $_POST['nhaplaimatkhau'],
        
        'dienthoai' => $_POST['dienthoai'],

        'gioitinh' => ($_POST['gioitinh'] == 'nam') ? 1 : 0,

        'diachi' => $_POST['diachi'],
        );
    
    
    // Kiểm tra họ và tên 
    if (empty($_POST["hovaten"])) {
        $error['hovaten'] = '<p style="color: red;">Họ tên bắt buộc phải nhập </p>';
    }  else { unset($error['hovaten']);  }
     
    // Kiểm tra Email 
    if (empty($_POST["email"])) {
        $error['email'] = '<p style="color: red;">Email bắt buộc phải nhập</p>' ;
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] =  '<p style="color: red;">Email nhập chưa đúng định dạng</p>';
        } else {
            if(kiemtra_tontai_email($ketnoi, $email) ){
                $error['email'] ='<p style="color: red;">Email tồn tại trong hệ thống! Vui lòng nhập email khác </p>';
            }else{ unset($error['email']); }
        }
    }

    // Kiểm tra Mật khẩu
    if (empty($_POST["matkhau"]) && empty($_POST["nhaplaimatkhau"]) ) {
        $error['matkhau'] = '<p style="color: red;"> Mật khẩu bắt buộc phải nhập </p>';
    } else {
        if($data['matkhau']!=$data['nhaplaimatkhau']){
            $error['matkhau'] ='<p style="color: red;"> Mật khẩu không trùng nhau! Vui lòng nhập lại </p>';
        }
        else{
            $matkhau = $_POST["matkhau"];
            if(strlen($matkhau)<6 || strlen($matkhau)>20){
                $error['matkhau'] ='<p style="color: red;"> Mật khẩu quá ngắn (6) hoặc quá dài (20)! Vui lòng nhập lại </p>';
            }else{
                $data['matkhau']=sha1($data['matkhau']);
                unset($error['matkhau']);
            }
       }
    }
    
    // Kiểm tra điện thoại 
    if (empty($_POST["dienthoai"])) {
        $error['dienthoai'] = '<p style="color: red;">Bắt buộc phải nhập số điện thoại</p>';
    } else {
        $dienthoai = $_POST["dienthoai"];
        if(!preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$dienthoai)) {
            $error['dienthoai'] =  '<p style="color: red;">Chỉ chấp nhận số điện thoại di động thật</p>';
        }else {
            if(kiemtra_tontai_dienthoai($dienthoai, $ketnoi) ){
                $error['dienthoai'] ='<p style="color: red;">Số điện thoại tồn tại trong hệ thống! Vui lòng nhập số khác</p>';
            }
            else{ unset($error['dienthoai']); }
        }
    }
    
    if (!$error){
        if (dangky($data, $ketnoi)){
            $trangthai = 'Complete! Bạn đã đăng ký thành công';
            $_SESSION['trangthai'] = $trangthai ;
            header('Location: dangnhap.php');
        }
        else{
        $trangthai =  '<p style="color: red;">Lỗi! Chưa đăng ký được! Chưa ghi vào cơ sở dữ liệu </p>';
        }
    }
    else{
        $trangthai =  '<p style="color: red;">Lỗi! Chưa đăng ký được! Vui lòng nhập lại</p>';
    }

}

//lấy View
require '../../view/nguoidung/dangky_v.php';
?>