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
//Lấy danh sách logo danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_logo = lay_logo_dmsp_cosp_hh($ketnoi);

if (isset($_SESSION['nguoidung_id'])){
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
}

?>


<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<!-- menu -->
<?php require '../giaodien/menuuser.php';?>
<!-- Logo Bar -->
<?php  require  '../giaodien/logobar.php'; ?>



<div class="contact">
        
        <div class="contact-content">
            <div class="contact-agency">
				<div class="contact-location page-title">HỆ THỐNG CỬA HÀNG</div>
                <div class="contact-agency-content">
                    <div>
                        <span class="contact-agency-title">Company</span>
                    </div>
                    <div class="contact-agency-info">
                        <i class="fa fa-map-marker" aria-hidden="true"></i><span>số 7 - 9 Nguyễn Bỉnh Khiêm, phường Sài Gòn, TP. Hồ Chí Minh</span>
                    </div>
                    <div class="contact-agency-info">
                        <i class="fa fa-mobile" aria-hidden="true"></i><span>091 2345 678</span>
                    </div>
                    <div>
                        <div>
                            <span class="contact-agency-title">Store</span>
                        </div>
                        <div class="contact-agency-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i><span>khu phố 34, phường Linh Xuân, TP. Hồ Chí Minh</span>
                        </div>
                        <div class="contact-agency-info">
                            <i class="fa fa-mobile" aria-hidden="true"></i><span>091 2345 678</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map" style="padding-left:20px;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.3271419551506!2d106.7032168!3d10.7862369!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4b7fd883bf%3A0x5640664af3a5fbed!2zNyBOZ3V54buFbiBC4buJbmggS2hpw6ptLCBC4bq_biBOZ2jDqSwgUXXhuq1uIDEsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1sen!2s!4v1757091533790!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>