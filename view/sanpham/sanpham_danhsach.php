<?php

session_start();

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';

//lấy model
require '../../view/sanpham/sanpham_m.php';
require '../../view/sanpham/danhmuc_sanpham_m.php';

//Lấy category_id từ URL (Nếu có)
$danhmuc_sanpham_id = isset($_GET['danhmuc_sanpham_id']) ? $_GET['danhmuc_sanpham_id'] : NULL;
if (isset($_GET['danhmuc_sanpham_id'])){
    $danhmuc_sanpham_banner = lay_banner($ketnoi, $_GET['danhmuc_sanpham_id']);
    //echo $_GET['danhmuc_sanpham_id'];
   // echo lay_banner($ketnoi, $_GET['danhmuc_sanpham_id']);
    //echo $danhmuc_sanpham_banner;
}



$page=1;//khởi tạo trang ban đầu

$gioihan=12;//số bản ghi trên 1 trang (2 bản ghi trên 1 trang)

$tongso_record = mysqli_num_rows(lay_danhsach_sanpham_t($danhmuc_sanpham_id, $ketnoi));//tính tổng số bản ghi

$tongso_page=ceil($tongso_record/$gioihan);//tính tổng số trang sẽ chia

if(isset($_GET["page"])) {$page=$_GET["page"];} else {$page =1 ;}//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]

if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1

if($page>$tongso_page) $page=$tongso_page;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng


$batdau = ($page - 1)*$gioihan;
//echo $batdau.'=>'.$gioihan.'=>'.$tongso_page.'=>'.$page.'=>'.$tongso_record;
$danhsach_sanpham = lay_danhsach_sanpham_s($danhmuc_sanpham_id,$ketnoi,$batdau, $gioihan);



//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);
//Lấy danh sách logo danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_logo = lay_logo_dmsp_cosp_hh($ketnoi);



if(isset($_SESSION['nguoidung_id'])){
    require '../../view/giohang/giohang_m.php';
    //Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
    $check_data_giohang = giohang_theo_nguoidung_id($_SESSION['nguoidung_id'], $ketnoi);
    //$giohang_id = $check_data_giohang['giohang_id'];
    if (!empty($check_data_giohang['giohang_id']))
    {
        $sanpham_tronggio = giohang_theo_id($check_data_giohang['giohang_id'], $ketnoi);
        $soloai_sanpham_tronggiohang =  dem_sanpham_trong_giohang($check_data_giohang['giohang_id'], $ketnoi);
        $_SESSION['soluong_sanpham'] = $soloai_sanpham_tronggiohang;
        //echo $soloai_sanpham_tronggiohang;
    }else{$_SESSION['soluong_sanpham'] = 0;}
}

//Require tập tin giao diện (View)
require '../../view/sanpham/sanpham_danhsach_v.php';
?>