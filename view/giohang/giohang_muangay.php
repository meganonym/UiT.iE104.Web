<?php
//Khởi động session
session_start();

/*
Kiểm tra đăng nhập hay chưa? nếu chưa trả về trang đăng nhập
 */

if (empty($_SESSION['nguoidung_id'])) {
    header('location:../../view/nguoidung/dangnhap.php');
}
// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require '../../view/sanpham/sanpham_m.php';
require '../../view/giohang/giohang_m.php';

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


//Lấy id sản phẩm từ URL (luôn có)
if(isset($_GET['sanpham_id'])){
	$sanpham_id = $_GET['sanpham_id'];
	//Lấy thông tin sản phẩm
	$sanpham_theo_id = lay_sanpham_theo_id($sanpham_id, $ketnoi);
 
    
    $data_giohang = array(
        'nguoidung_id' => $_SESSION['nguoidung_id'],
        'ngaytao' => date('Y-m-d H:i:s'),
        'sanpham_id' => $sanpham_id,
        'soluong' => '1' 
    );
    
    
    // kiểm tra có giỏ hàng chưa gửi đặt hàng hay không?
	if (empty($check_data_giohang)) {  //nếu chưa có giỏ hàng thì tạo giỏ hàng mới
        
        // tạo giỏ hàng mới
		if (them_giohang($data_giohang, $ketnoi)) {
            // nếu tạo thành công thì lấy ID giỏ hàng gán vào biến 
        	$giohang_id = mysqli_insert_id($ketnoi);
            
            // thêm sản phẩm vào giỏ
            if (them_giohang_sanpham($giohang_id, $data_giohang, $ketnoi)){
                // thêm mới thành công gắn cờ báo thành công
                $_SESSION['success'] = true;

                //Tải lại trang chuyển hướng đến trang xem giỏ hàng
                header('location:giohang_dathang.php');
            }
		}
	}
	else{ // nếu đã có giỏ hàn thì thêm sản phẩm vào giỏ hàng
        
        // kiểm tra giỏ hàng có tồn tại sản phẩm đang thêm vào hay không
        $sptontai_trong_giohang = kiemtra_sptontai_trong_giohang($check_data_giohang['giohang_id'], $data_giohang['sanpham_id'], $ketnoi);

        if(empty($sptontai_trong_giohang)){ 
            // nếu sản phẩm không tồn tại trong giỏ hàng thì thêm mới
            if (them_giohang_sanpham($check_data_giohang['giohang_id'], $data_giohang, $ketnoi)){
                // thêm mới thành công gắn cờ báo thành công
                $_SESSION['success'] = true;

                //Tải lại trang chuyển hướng đến trang xem giỏ hàng
                header('location:giohang_dathang.php');
            }
        }
        else{ // nếu sản phẩm đã tồn tại trong giỏ hàng thì cộng thêm số lượng vào sản phẩm trong giỏ

            $soluong_sanpham=$sptontai_trong_giohang['soluong']+$data_giohang['soluong'];

            if (them_soluong_vao_sptronggio($check_data_giohang['giohang_id'],  $data_giohang['sanpham_id'], $soluong_sanpham, $ketnoi)){
                // thêm mới thành công gắn cờ báo thành công
                $_SESSION['success'] = true;

                //Tải lại trang chuyển hướng đến trang xem giỏ hàng
                header('location:giohang_dathang.php');
            }
        }
    }
}

?>