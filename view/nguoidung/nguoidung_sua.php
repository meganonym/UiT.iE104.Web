<?php
// Khởi động Session
session_start();

if (!isset($_SESSION['nguoidung_id'])) {
    header('location:../../nguoidung/dangnhap.php');
}

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

// lấy Model
require '../../view/nguoidung/nguoidung_m.php';

require '../../view/giohang/giohang_m.php';

require '../../view/sanpham/danhmuc_sanpham_m.php';
//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);

//Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
if (!empty($_SESSION['nguoidung_id'])){
    //Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
    $check_data_giohang = giohang_theo_nguoidung_id($_SESSION['nguoidung_id'], $ketnoi);

    //echo $check_data_giohang['giohang_id'];
    if (!empty($check_data_giohang['giohang_id']))
    {
        $sanpham_tronggio = giohang_theo_id($check_data_giohang['giohang_id'], $ketnoi);
        $soloai_sanpham_tronggiohang =  dem_sanpham_trong_giohang($check_data_giohang['giohang_id'], $ketnoi);
        $_SESSION['soluong_sanpham'] = $soloai_sanpham_tronggiohang;
        //echo $soloai_sanpham_tronggiohang;
    }else{$_SESSION['soluong_sanpham'] = 0;}
}else{$_SESSION['soluong_sanpham'] = 0;}

//Lấy nguoidung_id 
if(isset($_SESSION['nguoidung_id'])){
    $nguoidung_id = $_SESSION['nguoidung_id'];
	//Lấy thông tin người dùng để trình bày trên form
	$nguoidung = lay_tt_nguoidung_bang_id($nguoidung_id, $ketnoi);
}else{
	header('location:../../index.php');
}

$error=array();
$data = array();
//Nếu có post dữ liệu lên thì xử lý cập nhật
if ($_POST) {

    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'hovaten' => addcslashes($_POST['hovaten']), 

        //'email' => $_POST['email'],

        'matkhau' => $_POST['matkhau'],
        
        //'nhaplaimatkhau' => $_POST['nhaplaimatkhau'],
        
        'dienthoai' => $_POST['dienthoai'],

        'gioitinh' => ($_POST['gioitinh'] == 'nam') ? 1 : 0,

        'diachi' => $_POST['diachi'],
        
        'matkhaumoi' => $_POST['matkhaumoi'],
        
        'nhaplaimatkhaumoi' => $_POST['nhaplaimatkhaumoi'],
        );
  
    // Kiểm tra Mật khẩu mới
    if(!empty($_POST['matkhaumoi'])){
        if($_POST['matkhaumoi']===$_POST['nhaplaimatkhaumoi']){
            if(sha1($data['matkhaumoi'])=== $nguoidung['matkhau']){
                //$data['matkhau']= null;
                $error['matkhau'] ='<p style="color: red;"> Mật khẩu trùng với mật khẩu cũ! Vui lòng nhập lại </p>';
            }else {
                $matkhau = $_POST["matkhaumoi"];
                if(strlen($matkhau)<6 || strlen($matkhau)>20){
                    $error['matkhau'] ='<p style="color: red;"> Mật khẩu quá ngắn (<6) hoặc quá dài (>20)! Vui lòng nhập lại </p>';
                }else{
                    $data['matkhaumoi']=sha1($data['matkhaumoi']);
                    unset($error['matkhau']);
                }
            }
        }else{
            $error['matkhau'] ='<p style="color: red;"> Mật khẩu mới không trùng với nhập lại mật khẩu mới! Vui lòng nhập lại </p>';
        }
    }else{
        $data['matkhaumoi']=NULL;
    }
    
    // Kiểm tra họ và tên 
    if (empty($_POST["hovaten"])) {
        $error['hovaten'] = '<p style="color: red;">Họ tên bắt buộc phải nhập </p>';
    }
    else { 
        unset($error['hovaten']);
        
        if($data['hovaten']== $nguoidung['hovaten']){
            $data['hovaten']= null;
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
            if($data['dienthoai']== $nguoidung['dienthoai']){
                $data['dienthoai']=NULL;
                //$error['dienthoai'] =  '<p style="color: red;">Số điện thoại trùng với Số điện thoại cũ</p>';
            }else{
                if(kiemtra_tontai_dienthoai($dienthoai, $ketnoi) ){
                    $error['dienthoai'] ='<p style="color: red;">Số điện thoại tồn tại trong hệ thống! Vui lòng nhập số khác</p>';
                }
                else{ unset($error['dienthoai']); }
            }
        }
    }
    
    //kiểm tra địa chỉ
    if($data['diachi']== $nguoidung['diachi']){
            $data['diachi']= null;
        }
    
    
    //kiểm tra mật khẩu cũ
    if(sha1($_POST['matkhau'])!=$nguoidung['matkhau']){
        $error['matkhau'] ='<p style="color: red;"> Mật khẩu không chính xác! Vui lòng nhập lại </p>';
    }
    
    if (!$error){
        //Cập nhật
        if (sua_nguoidung($data, $nguoidung_id, $ketnoi)) {
            //Tạo session để lưu cờ thông báo thành công
            //$_SESSION['success'] = true;
            $trangthai =  '<p style="color: green;">Thông tin thành viên đã được chỉnh sửa thành công!</p>';
            $nguoidung = lay_tt_nguoidung_bang_id($nguoidung_id, $ketnoi);
            //Tải lại trang (Mục đích là để tải lại thông tin mới)
            //header('location:nguoidung_sua.php');
        }
            else{
            $trangthai =  '<p style="color: red;">Lỗi! Chưa lưu được!  </p>';
            }
    }
    else{
        $trangthai =  '<p style="color: red;">Lỗi! Chưa lưu được! </p>';
    }
}

//Require tập tin giao diện (View)
require '../../view/nguoidung/nguoidung_sua_v.php';
?>