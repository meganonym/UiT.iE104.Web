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
//Kiểm tra có tồn tại giỏ hàng hay không? nếu có add giỏ hàng ID vào  biến check_data giỏ hàng
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


<p>&nbsp;</p>

<div class="introduce">
	<div class="page-title">CH&Iacute;NH S&Aacute;CH ĐỔI H&Agrave;NG TẠI ĐỒNG HỒ BARON WATCH</div>
	<div class="introduce-content">

		<blockquote>
		<p style="text-align:justify"><em>Tại Baron Watch, ch&uacute;ng t&ocirc;i lu&ocirc;n cố gắng hết sức để hiển thị v&agrave; m&ocirc; tả từng chiếc đồng hồ&nbsp; một c&aacute;ch thực tế v&agrave; chi tiết hết mức c&oacute; thể. Ch&uacute;ng t&ocirc;i rất tiếc v&agrave; hiểu rằng đ&ocirc;i khi sản phẩm bạn nhận được sẽ kh&ocirc;ng như bạn mong đợi, ch&iacute;nh v&igrave; vậy ch&uacute;ng t&ocirc;i tự h&agrave;o cung cấp cho bạn 7 ng&agrave;y đổi h&agrave;ng ho&agrave;n to&agrave;n miễn ph&iacute; để bạn c&oacute; thể tự do t&igrave;m cho m&igrave;nh một chiếc đồng hồ ưng &yacute; nhất với bản th&acirc;n khi mua h&agrave;ng tại Baron Watch.</em></p>
		</blockquote>

		<p style="text-align:justify"><img alt="" src="https://cdn3.dhht.vn/wp-content/uploads/2018/09/5.png" title="" />&nbsp; Trong v&ograve;ng 7 ng&agrave;y kể từ ng&agrave;y mua h&agrave;ng từ Baron Watch, Qu&yacute; kh&aacute;ch c&oacute; thể y&ecirc;u cầu đổi h&agrave;ng ho&agrave;n to&agrave;n miễn ph&iacute;. Thời hạn 7 ng&agrave;y được tính theo d&acirc;́u bưu đi&ecirc;̣n khi Qu&yacute; kh&aacute;ch gửi sản phẩm v&ecirc;̀ cho ch&uacute;ng t&ocirc;i hoặc thời gian ch&uacute;ng t&ocirc;i ti&ecirc;́p nh&acirc;̣n y&ecirc;u c&acirc;̀u trực tiếp (tại cửa h&agrave;ng) của&nbsp;Quý khách.</p>

		<h3 style="text-align:justify"><strong>QU&Yacute; KH&Aacute;CH LƯU &Yacute;:</strong></h3>

		<ul>
			<li style="text-align: justify;">Đồng hồ mua rồi c&oacute; thể đổi với t&igrave;nh trạng mới 100% trong v&ograve;ng 7 ng&agrave;y &ndash; Chỉ chấp nhận đổi 1 lần duy nhất v&agrave; đổi mới sản phẩm đ&atilde; c&oacute; dấu hiệu qua sử dụng nếu c&oacute; lỗi do nh&agrave; sản xuất.</li>
		</ul>

		<h3 style="text-align:justify"><strong>ĐIỀU KIỆN ĐỔI SẢN PHẨM</strong></h3>

		<p style="text-align:justify"><img alt="" src="https://cdn3.dhht.vn/wp-content/uploads/2018/09/2.png" title="" />&nbsp; Qu&yacute; kh&aacute;ch vui l&ograve;ng đọc kỹ c&aacute;c điều khoản n&ecirc;u r&otilde; trong ch&iacute;nh s&aacute;ch đổi h&agrave;ng của ch&uacute;ng t&ocirc;i để đảm bảo sản phẩm được đổi cần thỏa m&atilde;n tất cả c&aacute;c điều kiện sau đ&acirc;y:</p>

		<ul>
			<li style="text-align: justify;">Y&ecirc;u cầu đổi h&agrave;ng cần được thực hiện trong v&ograve;ng 7 ng&agrave;y kể từ ng&agrave;y Qu&yacute; kh&aacute;ch nhận được h&agrave;ng.</li>
			<li style="text-align: justify;">Sản phẩm kh&ocirc;ng c&oacute; dấu hiệu đ&atilde; qua sử dụng.</li>
			<li style="text-align: justify;">Sản ph&acirc;̉m kh&ocirc;ng bị d&acirc;y bẩn, trầy xước, hư hỏng, dính hoá ch&acirc;́t hoặc c&oacute; dấu hiệu cạy mở.</li>
			<li style="text-align: justify;">C&aacute;c bộ phận, linh kiện, phụ kiện, t&agrave;i liệu hướng dẫn sử dụng, t&agrave;i liệu kỹ thuật, qu&agrave; tặng k&egrave;m theo (nếu c&oacute;), &hellip; phải c&ograve;n đầy đủ v&agrave; kh&ocirc;ng c&oacute; dấu hiệu đ&atilde; qua sử dụng.</li>
			<li style="text-align: justify;">Hộp đựng, bao b&igrave; đ&oacute;ng g&oacute;i sản phẩm c&ograve;n nguy&ecirc;n vẹn, kh&ocirc;ng bị m&oacute;p, r&aacute;ch, &ocirc;́ vàng, &hellip;</li>
		</ul>
	</div>
</div>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>