<?php

require '../kiemtra.php';


// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';
require '../danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);
// lấy Model
require 'nguoidung_m.php';


//Lấy nguoidung_id từ URL
if(isset($_GET['nguoidung_id'])){
    $nguoidung_id = $_GET['nguoidung_id'];
}
//Lấy thông tin người dùng để trình bày trên form
$nguoidung = lay_tt_nguoidung_bang_id($nguoidung_id, $ketnoi);


$error=array();
$data=array();
if ($_POST) {

    //Nhận dữ liệu từ form và gán vào một mãng
    $data = array(
        'hovaten' => $_POST['hovaten'],

        //'email' => $_POST['email'],

        //'matkhau' => $_POST['matkhau'],
        
        //'nhaplaimatkhau' => $_POST['nhaplaimatkhau'],
        
        'dienthoai' => $_POST['dienthoai'],

        'gioitinh' => ($_POST['gioitinh'] == 'nam') ? 1 : 0,

        'diachi' => $_POST['diachi'],
        
        'matkhaumoi' => $_POST['matkhaumoi'],
        
        'nhaplaimatkhaumoi' => $_POST['nhaplaimatkhaumoi'],
        
        'trangthai' => ($_POST['trangthai'] == 'kichhoat') ? 1 : 0,
        
        'nhom_nguoidung' => $_POST['nhom_nguoidung']
        );
  
    // Kiểm tra Mật khẩu mới
    if(!empty($_POST['matkhaumoi'])){
        if($_POST['matkhaumoi']===$_POST['nhaplaimatkhaumoi']){
            if(($data['matkhaumoi'])=== $nguoidung['matkhau']){
                $error['matkhau'] ='<p style="color: red;"> Mật khẩu trùng với mật khẩu cũ! Vui lòng nhập lại </p>';
            }else {
                $matkhau = $_POST["matkhaumoi"];
                if(strlen($matkhau)<6 || strlen($matkhau)>20){
                    $error['matkhau'] ='<p style="color: red;"> Mật khẩu quá ngắn (<6) hoặc quá dài (>20)! Vui lòng nhập lại </p>';
                }else{
                    $data['matkhaumoi']=($data['matkhaumoi']);
                    unset($error['matkhau']);
                }
            }
        }else{
            $error['matkhau'] ='<p style="color: red;"> Mật khẩu mới không trùng với Nhập lại mật khẩu mới! Vui lòng nhập lại </p>';
        }
    }else{
        $data['matkhaumoi']=NULL;
    }
    
    // Kiểm tra điện thoại 
    if (empty($_POST["dienthoai"])) {
        $error['dienthoai'] = '<p style="color: red;">Bắt buộc phải nhập số điện thoại</p>';
    } else {
        $dienthoai = $_POST["dienthoai"];
        if(!preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$dienthoai)) {
            $error['dienthoai'] =  '<p style="color: red;">Chỉ chấp nhận số điện thoại di động thật</p>';
        }else {
            if($_POST['dienthoai']== $nguoidung['dienthoai']){
                $data['dienthoai'] =NULL;
            }else{
                if(kiemtra_tontai_dienthoai($dienthoai, $ketnoi) ){
                    $error['dienthoai'] ='<p style="color: red;">Số điện thoại tồn tại trong hệ thống! Vui lòng nhập số khác</p>';
                }else{ 
                    unset($error['dienthoai']); 
                }
            }
        }
    }
	
	//Kiểm tra giới tính
	if(empty($_POST['gioitinh'])|| ($_POST['gioitinh'] != 'nam' && $_POST['gioitinh'] != 'nu')){ $data['gioitinh'] = 1;}
	
	//kiểm tra nhóm người dùng 
	if(empty($_POST['nhom_nguoidung']) || !is_numeric($_POST['nhom_nguoidung']) ){
		$error['nhom_nguoidung']= 'Sai nhóm người dùng';
		$trangthai = 'Sai nhóm người dùng';
	}else{
		if($_POST['nhom_nguoidung']=='1' || $_POST['nhom_nguoidung']=='2'  ){
			if($_SESSION['nhom_nguoidung_id'] !='1'){
				$error['nhom_nguoidung']= 'không đủ quyển sửa';
				$trangthai = 'không đủ quyển sửa';
			}else{
				unset($error['nhom_nguoidung']);
			}
		}else{
			if($_POST['nhom_nguoidung']=='3'){
				if($_SESSION['nhom_nguoidung_id'] >2){
					$error['nhom_nguoidung']= 'không đủ quyển sửa';
					$trangthai = 'không đủ quyển sửa';
				}else{
					unset($error['nhom_nguoidung']);
				}
			}else{
				$error['nhom_nguoidung']= 'không đủ quyển sửa';
				$trangthai = 'không đủ quyển thêm';
			}
		}
	}
	//var_dump($data['nhom_nguoidung']);
    //var_dump($_POST['nhom_nguoidung']);
	//Kiểm tra trạng thái
	if(!isset($data['trangthai'])|| ($data['trangthai'] != 1 && $data['trangthai'] != 0)){ $data['trangthai'] = NULL;}
    //var_dump($data['trangthai']);
    //kiểm tra họ và tên 
    if($nguoidung['hovaten']==$data['hovaten']){$data['hovaten']=NULL;}
    
    //kiểm tra địa chỉ
    if($nguoidung['diachi']==$data['diachi']){$data['diachi']=NULL;}
    
    if (!$error){
        //Cập nhật
        if(isset($_SESSION['nhom_nguoidung_id']) && $_SESSION['nhom_nguoidung_id'] == 2 && $nguoidung['nhom_nguoidung_id'] == 1){
            $trangthai =  '<p style="color: red;">Thông tin thành viên này bạn không có quyền sửa!</p>';
        }else {
            if (sua_nguoidung($data, $nguoidung_id, $ketnoi)) {
                //Tạo session để lưu cờ thông báo thành công
                //$_SESSION['success'] = true;
                $trangthai =  '<p style="color: green;">Thông tin thành viên đã được chỉnh sửa thành công!</p>';
                $nguoidung = lay_tt_nguoidung_bang_id($nguoidung_id, $ketnoi);
                //Tải lại trang (Mục đích là để tải lại thông tin mới)
                //header('location:nguoidung_sua.php');
            }else{
                $trangthai =  '<p style="color: red;">Lỗi! Chưa ghi vào DB được!  </p>';
                }
        }   
    }else{
        $trangthai =  '<p style="color: red;">Lỗi! Chưa lưu được! </p>';
    }
}





//Require tập tin giao diện (View)
require 'nguoidung_sua_v.php';
?>