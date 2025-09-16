<?php

require( '../kiemtra.php');

// lấy cấu hình
require '../../cauhinh/cauhinh.php';
require '../../cauhinh/ketnoi.php';
require '../../quanly/danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);


//lấy model
require 'sanpham_m.php';

//Lấy danh sách danh mục sản phẩm
//$sanpham_danhsach = lay_danhsach_sanpham($ketnoi);


//Lấy category_id từ URL (Nếu có)
$danhmuc_sanpham_id = isset($_GET['danhmuc_sanpham_id']) ? $_GET['danhmuc_sanpham_id'] : NULL;



$page=1;//khởi tạo trang ban đầu

$gioihan=6;//số bản ghi trên 1 trang (2 bản ghi trên 1 trang)

$tongso_record = mysqli_num_rows(lay_danhsach_sanpham_t($danhmuc_sanpham_id, $ketnoi));//tính tổng số bản ghi

$tongso_page=ceil($tongso_record/$gioihan);//tính tổng số trang sẽ chia

if(isset($_GET["page"])) {$page=$_GET["page"];} else {$page =1 ;}//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]

if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1

if($page>$tongso_page) $page=$tongso_page;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng


$batdau = ($page - 1)*$gioihan;
//echo $batdau.'=>'.$gioihan.'=>'.$tongso_page.'=>'.$page.'=>'.$tongso_record;
$danhsach_sanpham = lay_danhsach_sanpham_s($danhmuc_sanpham_id,$ketnoi,$batdau, $gioihan);

//lấy giao diện
require 'sanpham_danhsach_v.php';
?>
