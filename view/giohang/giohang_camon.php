<?php
//Khởi động session
session_start();

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
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
?>


<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<p>&nbsp;</p>
<!-- menu -->
<?php require '../giaodien/menuuser.php';?>
<p>&nbsp;</p>

    <div align="center">
        <h3 align="center"> Quý khách đã đặt hàng thành công</h3>
		<p>&nbsp;</p>
        <h3 align="center"> Vui lòng chờ nhân viên của chúng tôi gọi điện xác nhận đơn hàng </h3>
		<p>&nbsp;</p>
        <h3 align="center"> Cảm ơn quý khách đã mua hàng </h3>
		<p>&nbsp;</p>
        <h3 align="center"><a   href="<?php echo SITE_URL ; ?>"> VỀ TRANG CHỦ </a></h3>
        
    </div>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>