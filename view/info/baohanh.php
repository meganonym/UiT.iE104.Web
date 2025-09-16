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
	<div class="page-title">CH&Iacute;NH S&Aacute;CH BẢO H&Agrave;NH CỦA BARON&nbsp;WATCH</div>
	<div class="introduce-content">
		<p>&nbsp;</p>

		<blockquote>
		<p><em>Trong qu&aacute; tr&igrave;nh sử dụng, t&ugrave;y từng thương hiệu &ndash; ch&uacute;ng t&ocirc;i khuyến kh&iacute;ch Qu&yacute; kh&aacute;ch h&agrave;ng tham khảo v&agrave; t&igrave;m hiểu hướng dẫn sử dụng được k&egrave;m theo khi mua của mỗi h&atilde;ng đồng hồ để việc sử dụng được diễn ra một c&aacute;ch ch&iacute;nh x&aacute;c.</em></p>
		</blockquote>

		<p><em><strong>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh được đề cập dưới đ&acirc;y sẽ hỗ trợ qu&yacute; kh&aacute;ch tối đa h&oacute;a quyền lợi khi mua h&agrave;ng tại Baron Watch.</strong></em></p>

		<h3><strong>CHẾ ĐỘ BẢO H&Agrave;NH:&nbsp;</strong></h3>

		<p><strong>Tất cả c&aacute;c đồng hồ khi b&aacute;n ra đều k&egrave;m theo 2 phiếu bảo h&agrave;nh:</strong></p>


		<ul>
			<li>1 Phiếu Bảo H&agrave;nh (hoặc Thẻ Bảo H&agrave;nh/Sổ Bảo H&agrave;nh) của h&atilde;ng c&oacute; gi&aacute; trị bảo h&agrave;nh Quốc tế (Thời gian bảo h&agrave;nh t&ugrave;y theo quy định của từng h&atilde;ng).</li>
			<li>1 Phiếu Bảo H&agrave;nh của Baron Watch (Sử dụng để được thay pin miễn ph&iacute; vĩnh viễn &amp; Hưởng chế độ bảo h&agrave;nh tăng th&ecirc;m từ 1-4 năm của Baron Watch).</li>
		</ul>

		
		<p><strong>&nbsp;V&iacute; dụ:</strong>&nbsp;Đồng Hồ Citizen c&oacute; chế độ bảo h&agrave;nh ch&iacute;nh h&atilde;ng: m&aacute;y = 12 th&aacute;ng, Pin = 12 th&aacute;ng.</p>

		<ul>
			<li>Khi mua tại Baron Watch, Kh&aacute;ch h&agrave;ng sẽ được tặng th&ecirc;m thời gian bảo h&agrave;nh từ 4 năm về m&aacute;y. Pin = Vĩnh Viễn.</li>
			<li>Tổng cộng: Khi mua tại Baron Watch, đồng hồ Citizen&nbsp;sẽ được bảo h&agrave;nh m&aacute;y = 05 năm, Pin = Vĩnh Viễn.</li>
		</ul>

		
		<p><strong>Lưu &yacute;:</strong></p>

		<ul>
			<li>Đối với sản phẩm c&ograve;n trong thời gian bảo h&agrave;nh Quốc Tế: Qu&yacute; kh&aacute;ch c&oacute; thể đem tới Baron Watch hoặc bất kỳ nh&agrave; trung t&acirc;m bảo h&agrave;nh n&agrave;o của h&atilde;ng được ghi tr&ecirc;n phiếu để y&ecirc;u cầu được kiểm tra đồng hồ.</li>
			<li>Đối với sản phẩm hết thời gian bảo h&agrave;nh Quốc Tế nhưng vẫn trong thời gian bảo h&agrave;nh tại Baron Watch: Qu&yacute; kh&aacute;ch đem đồng hồ k&egrave;m Phiếu Bảo H&agrave;nh của Baron Watch tới bất kỳ chi nh&aacute;nh n&agrave;o của Baron Watch để được hướng dẫn v&agrave; kiểm tra đồng hồ.</li>
		</ul>

		<h3><strong>RED GUARANTEE L&Agrave; G&Igrave;?</strong></h3>

		<ul>
			<li>Đ&acirc;y l&agrave; một chế độ bảo h&agrave;nh đặc biệt tại Baron Watch d&agrave;nh cho d&ograve;ng sản phẩm&nbsp;đồng hồ cao cấp.</li>
			<li>Hiện tại, RED Guarantee chỉ được &aacute;p dụng cho tất cả c&aacute;c đồng hồ Thụy Sỹ (trừ Candino v&agrave; Adriatica) b&aacute;n tại tất cả c&aacute;c chi nh&aacute;nh.</li>
		</ul>

		<h3>VỚI MỘT CHIẾC ĐỒNG HỒ ĐƯỢC &Aacute;P DỤNG RED GUARANTEE QU&Yacute; KH&Aacute;CH ĐƯỢC HƯỞNG CHẾ ĐỘ:</h3>

		<ul>
			<li>Tăng th&ecirc;m 1-2 năm bảo h&agrave;nh tại Baron Watch ngo&agrave;i chế độ bảo h&agrave;nh Quốc Tế của h&atilde;ng để c&oacute; tổng thời gian l&agrave; 4 năm.</li>
			<li>Ưu ti&ecirc;n bảo h&agrave;nh &ndash; Đồng hồ sẽ được xếp v&agrave;o danh s&aacute;ch ưu ti&ecirc;n bảo h&agrave;nh để nhanh ch&oacute;ng quay lại với Qu&yacute; kh&aacute;ch.</li>
			<li>Giao nhận đồng hồ bảo h&agrave;nh ngay tại nh&agrave; Qu&yacute; kh&aacute;ch.</li>
			<li>Cập nhật t&igrave;nh trạng đồng hồ qua điện thoại tới Qu&yacute; kh&aacute;ch. Qu&yacute; kh&aacute;ch được tư vấn, cập nhật t&igrave;nh trạng đồng hồ trong qu&aacute; tr&igrave;nh đồng hồ được bảo h&agrave;nh.</li>
			<li>4 năm đ&aacute;nh b&oacute;ng đồng hồ miễn ph&iacute;.</li>
		</ul>

		<h3><strong>ĐIỀU KIỆN ĐƯỢC BẢO H&Agrave;NH:</strong></h3>

		<ul>
			<li>Bảo h&agrave;nh chỉ c&oacute; gi&aacute; trị khi đồng hồ c&oacute; Phiếu bảo h&agrave;nh của h&atilde;ng &amp; Phiếu bảo h&agrave;nh của Baron Watch đi k&egrave;m, điền ch&iacute;nh x&aacute;c, đầy đủ c&aacute;c th&ocirc;ng tin.</li>
			<li>Phiếu bảo h&agrave;nh phải c&ograve;n nguy&ecirc;n vẹn, kh&ocirc;ng r&aacute;ch, chấp v&aacute;, hoen ố, mờ nhạt.</li>
			<li>C&ograve;n trong thời gian bảo h&agrave;nh. Thời gian bảo h&agrave;nh được t&iacute;nh từ ng&agrave;y mua c&oacute; ghi tr&ecirc;n Phiếu Bảo H&agrave;nh.</li>
			<li>Chỉ bảo h&agrave;nh thay thế mới cho những linh kiện, phụ t&ugrave;ng bị hỏng &ndash; kh&ocirc;ng thay thế bằng một chiếc đồng hồ kh&aacute;c.</li>
		</ul>

		<h3><strong>ĐIỀU KIỆN KH&Ocirc;NG ĐƯỢC BẢO H&Agrave;NH:</strong></h3>

		<ul>
			<li>Đồng hồ kh&ocirc;ng c&oacute; Phiếu bảo h&agrave;nh của h&atilde;ng v&agrave; Phiếu bảo h&agrave;nh của Baron Watch đi k&egrave;m.</li>
			<li>C&aacute;c loại d&acirc;y đeo, kho&aacute;, vỏ, m&agrave;u xi, mặt số, mặt kiếng bị hỏng h&oacute;c, vỡ do sử dụng kh&ocirc;ng đ&uacute;ng, tai nạn, l&atilde;o h&oacute;a tự nhi&ecirc;n, va đập, &hellip; trong qu&aacute; tr&igrave;nh sử dụng.</li>
			<li>Hỏng h&oacute;c do hậu quả gi&aacute;n tiếp của việc sử dụng sai hướng dẫn của h&atilde;ng c&oacute; k&egrave;m theo đồng hồ.</li>
			<li>Trầy xước về d&acirc;y hoặc mặt kiếng bị trầy xước, vỡ do va chạm trong qu&aacute; tr&igrave;nh sử dụng.&nbsp;</li>
			<li>Tự &yacute; thay đổi m&aacute;y m&oacute;c b&ecirc;n trong, mở ra can thiệp sửa chữa trong thời gian c&ograve;n bảo h&agrave;nh &ndash;&nbsp;Tại những nơi kh&ocirc;ng phải l&agrave; trung t&acirc;m của h&atilde;ng</li>
		</ul>
	</div>
</div>
<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>
