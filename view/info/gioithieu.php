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
        <div class="page-title">BARON&nbsp;WATCH nh&agrave; nhập khẩu đồng hồ ch&iacute;nh h&atilde;ng Thụy Sỹ</div>
        <div class="introduce-content">

			<p style="text-align:justify">T&ecirc;n c&ocirc;ng ty:&nbsp;<strong>C&Ocirc;NG TY CỔ PHẦN TRỰC TUYẾN BARON&nbsp;WATCH</strong></p>

			<p style="text-align:justify">T&ecirc;n giao dịch tiếng Anh: <strong>BARON&nbsp;WATCH ONLINE .,JSC</strong></p>

			<p style="text-align:justify"><strong>1. Qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển:</strong></p>

			<p style="text-align:justify"><strong>Baron Watch</strong>&nbsp;tiền th&acirc;n l&agrave; Si&ecirc;u thị Baron Watch được th&agrave;nh lập v&agrave;o năm 2008. Ra đời trong thời điểm kinh doanh qua internet tại Việt Nam c&ograve;n non trẻ, thị trường c&ograve;n kh&oacute; khăn.&nbsp;</p>

			<p style="text-align:justify">Trong qu&aacute; tr&igrave;nh ph&aacute;t triển, Baron Watch mở rộng hoạt động kinh doanh đa dạng hơn l&agrave; k&ecirc;nh ph&acirc;n phối, b&aacute;n lẻ c&aacute;c thương hiệu đồng hồ danh tiếng. Kh&aacute;ch h&agrave;ng lu&ocirc;n lu&ocirc;n tin tưởng sử dụng sản phẩm v&agrave; dịch vụ được cung cấp bởi Baron Watch. Qua đ&oacute;, Baron Watch&nbsp;lu&ocirc;n duy tr&igrave; được tốc độ tăng trưởng cao, to&agrave;n diện về mọi mặt một c&aacute;ch bền vững so với c&aacute;c c&ocirc;ng ty kinh doanh c&ugrave;ng lĩnh vực.</p>

			<p style="text-align:justify">Với nền tảng vững chắc, C&ocirc;ng ty Cổ phần Trực tuyến Baron Watch được th&agrave;nh lập theo quyết định số 0104938104 Sở Kế hoạch &amp; Đầu tư th&agrave;nh phố Hồ Ch&iacute; Minh&nbsp;cấp ng&agrave;y 07 th&aacute;ng 10 năm 2010, t&ecirc;n giao dịch tiếng Anh l&agrave; <strong>Baron Watch Online .,Jsc</strong>, ch&iacute;nh thức đặt nền m&oacute;ng x&acirc;y dựng trở&nbsp;th&agrave;nh c&ocirc;ng ty ph&acirc;n phối, b&aacute;n lẻ đồng hồ h&agrave;ng đầu Việt Nam. V&agrave; website <a href="http://localhost/iE104Web/">iE104Web&nbsp;</a>của C&ocirc;ng ty Cổ phần Trực tuyến Baron Watch đ&atilde; trở th&agrave;nh địa chỉ quen thuộc của mọi người khi muốn t&igrave;m mua cho m&igrave;nh những sản phẩm đồng hồ h&agrave;ng hiệu cao cấp.</p>

			<p style="text-align:justify">C&ocirc;ng ty c&oacute; đội ngũ nh&acirc;n vi&ecirc;n trẻ nhưng am hiểu s&acirc;u sắc về nghiệp vụ, chuy&ecirc;n m&ocirc;n cao, đủ khả năng để c&oacute; thể đ&aacute;p ứng mọi y&ecirc;u cầu d&ugrave; khắt khe nhất của kh&aacute;ch h&agrave;ng. Kh&ocirc;ng những thế, đội ngũ nh&acirc;n vi&ecirc;n của Baron Watch c&ograve;n l&agrave; những người đầy l&ograve;ng nhiệt t&igrave;nh v&agrave; c&oacute; th&aacute;i độ niềm nở trong cung c&aacute;ch phục vụ kh&aacute;ch h&agrave;ng.&nbsp;</p>

			<p style="text-align:justify">Baron Watch cam kết duy tr&igrave; mối quan hệ đối t&aacute;c l&acirc;u d&agrave;i, tận tụy với kh&aacute;ch h&agrave;ng. Sự th&agrave;nh c&ocirc;ng của kh&aacute;ch h&agrave;ng cũng l&agrave; sự th&agrave;nh c&ocirc;ng của ch&uacute;ng t&ocirc;i.</p>

			<p style="text-align:justify"><strong>2. Mục ti&ecirc;u với đối t&aacute;c:</strong></p>

			<p style="text-align:justify">Hiện nay, Baron Watch đang ph&acirc;n phối c&aacute;c thương hiệu đồng hồ danh tiếng tr&ecirc;n thế giới như:&nbsp;<a href="http://www.dangquangwatch.vn/sp/Dong-ho-Tourbillon-Memorigin/553-0-0-0-0-0-0.html">Tourbillon Memorigin</a>,&nbsp;<a href="http://www.dangquangwatch.vn/sp/Stuhrling-Original-Swiss/556-0-0-0-0-0-0.html">Stuhrling Original</a>,&nbsp;<a href="http://www.dangquangwatch.vn/sp/Dong-ho-Diamond-D/557-0-0-0-0-0-0.html">Diamond D</a>,&nbsp;<a href="http://www.dangquangwatch.vn/sp/Bruno-Sohnle-Glashutte/560-0-0-0-0-0-0.html">Bruno Sohnle Glashutte</a>,&nbsp;<a href="http://www.dangquangwatch.vn/sp/Dong-ho-Atlantic-Swiss/559-0-0-0-0-0-0.html">Atlantic Swiss</a>,&nbsp;<a href="http://www.dangquangwatch.vn/sp/Dong-ho-Epos-Swiss/563-0-0-0-0-0-0.html">Aries Gold</a>,&nbsp;<a href="http://www.dangquangwatch.vn/sp/Dong-ho-Epos-Swiss/563-0-0-0-0-0-0.html">Epos Swiss</a>...</p>

			<p style="text-align:justify">Với mục ti&ecirc;u h&agrave;ng h&oacute;a phục vụ đa dạng, mẫu m&atilde; mới nhất, chất lượng tốt nhất, gi&aacute; cả cạnh tranh nhất, Baron Watch hiểu được tầm quan trọng của việc x&acirc;y dựng c&aacute;c mối quan hệ v&agrave; đạt được sự ủng hộ của những nh&agrave; cung cấp, những đối t&aacute;c h&agrave;ng đầu thế giới.</p>

			<p style="text-align:justify">Baron Watch mong muốn t&igrave;m kiếm những đối t&aacute;c tiềm năng c&oacute; khả năng cũng cấp những mẫu đồng hồ mới nhất để thiết lập mối quan hệ hợp t&aacute;c trong tinh thần tất cả c&aacute;c b&ecirc;n c&ugrave;ng c&oacute; lợi v&agrave; c&ugrave;ng ph&aacute;t triển.</p>

			<p style="text-align:justify">Th&agrave;nh c&ocirc;ng của kh&aacute;ch h&agrave;ng l&agrave; tương lai của c&ocirc;ng ty.&nbsp;Những yếu tố tr&ecirc;n lu&ocirc;n gắn liền với truyền thống, uy t&iacute;n v&agrave; thương hiệu của <strong>C&ocirc;ng ty Cổ phần&nbsp;Trực tuyến Baron Watch</strong> tr&ecirc;n thị trường Việt Nam cũng như với quốc tế.</p>

			<p style="text-align:justify"><strong>3. Tầm nh&igrave;n:</strong></p>

			<p style="text-align:justify">&bull; Trở th&agrave;nh c&ocirc;ng ty c&oacute; hệ thống showroom đồng hồ quy m&ocirc;, chuy&ecirc;n nghiệp v&agrave; th&acirc;n thiện lớn nhất Việt Nam.</p>

			<p style="text-align:justify">&bull; X&acirc;y dựng Baron Watch trở th&agrave;nh m&ocirc;i trường l&agrave;m việc chuy&ecirc;n nghiệp, nơi m&agrave; mọi c&aacute; nh&acirc;n c&oacute; thể ph&aacute;t huy tối đa sức s&aacute;ng tạo, khả năng l&atilde;nh đạo v&agrave; cơ hội l&agrave;m chủ thực sự bản th&acirc;n.</p>

			<p style="text-align:justify">&bull; X&acirc;y dựng Baron Watch trở th&agrave;nh một ng&ocirc;i nh&agrave; chung thực sự cho tất cả CB-NV trong c&ocirc;ng ty bằng việc c&ugrave;ng nhau chia sẻ quyền lợi, tr&aacute;ch nhiệm v&agrave; nghĩa vụ một c&aacute;ch c&ocirc;ng bằng v&agrave; minh bạch nhất.</p>

			<p style="text-align:justify"><strong>4. Gi&aacute; trị cốt l&otilde;i:</strong></p>

			<p style="text-align:justify">&bull; Kh&aacute;ch h&agrave;ng l&agrave; trọng t&acirc;m</p>

			<p style="text-align:justify">&bull; Uy t&iacute;n</p>

			<p style="text-align:justify">&bull; Chất lượng</p>

			<p style="text-align:justify">&bull; Trung thực</p>

			<p style="text-align:justify">&bull; Hiệu quả</p>

			<p style="text-align:justify">&bull; Ph&aacute;t triển con người</p>

			<p style="text-align:justify">&bull; Tạo sự kh&aacute;c biệt.</p>

			<p style="text-align:justify"><strong>5. Triết l&yacute; kinh doanh:</strong></p>

			<p style="text-align:justify">&bull; Chất lượng sản phẩm v&agrave; dịch vụ: L&agrave; yếu tố tạo n&ecirc;n sự ph&aacute;t triển bền vững của doanh nghiệp.</p>

			<p style="text-align:justify">&bull; Phương ch&acirc;m h&agrave;nh động: D&aacute;m nghĩ, d&aacute;m l&agrave;m, d&aacute;m chịu tr&aacute;ch nhiệm.</p>

			<p style="text-align:justify">&bull; Chăm s&oacute;c kh&aacute;ch h&agrave;ng: X&acirc;y dựng niềm tin bền vững để trở th&agrave;nh đối t&aacute;c tin cậy v&agrave; chuy&ecirc;n nghiệp nhất.</p>

			<p style="text-align:justify">&bull; Yếu tố rủi ro: Lu&ocirc;n lu&ocirc;n nằm trong tầm kiểm so&aacute;t.</p>

			<p style="text-align:justify">&bull; &Yacute; thức, tinh thần, tr&aacute;ch nhiệm của CB-NV: Ph&aacute;t huy tinh thần th&acirc;n &aacute;i, đo&agrave;n kết, hợp lực giữa c&aacute;n bộ c&ocirc;ng nh&acirc;n vi&ecirc;n tạo th&agrave;nh một tập thể vững mạnh.</p>

			<p style="text-align:justify"><em>(Lưu &yacute;: Ngo&agrave;i c&aacute;c hệ thống cửa h&agrave;ng tr&ecirc;n hệ thống đều kh&ocirc;ng&nbsp;phải showroom Baron Watch&nbsp;quản l&yacute; n&ecirc;n c&aacute;c chế độ bảo h&agrave;nh hoặc khuyến mại sẽ kh&ocirc;ng&nbsp;c&oacute;)</em></p>
        </div>
    </div>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>