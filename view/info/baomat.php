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
<!-- menu -->
<?php require '../giaodien/menuuser.php';?>
<!-- Logo Bar -->
<?php  require  '../giaodien/logobar.php'; ?>



<div class="introduce">
	<div class="page-title">CHÍNH SÁCH BẢO MẬT TH&Ocirc;NG TIN (PRIVACY POLICY) BARON&nbsp;WATCH </div>
	<div class="introduce-content">
		<p style="text-align:justify">Ch&uacute;ng t&ocirc;i t&ocirc;n trọng quyền ri&ecirc;ng tư của người d&ugrave;ng v&agrave; đ&atilde; ph&aacute;t triển ch&iacute;nh s&aacute;ch bảo mật n&agrave;y (&ldquo;Ch&iacute;nh s&aacute;ch Bảo mật&rdquo;) để tuy&ecirc;n bố cam kết của m&igrave;nh để bảo vệ sự ri&ecirc;ng tư của bạn. Ch&iacute;nh s&aacute;ch Bảo mật nhằm m&ocirc; tả cho bạn, với tư c&aacute;ch c&aacute; nh&acirc;n l&agrave; người sử dụng Ứng dụng của ch&uacute;ng t&ocirc;i hoặc của c&aacute;c dịch vụ được cung cấp th&ocirc;ng qua Ứng dụng (c&ugrave;ng với Ứng dụng, &ldquo;Dịch vụ&rdquo;), th&ocirc;ng tin ch&uacute;ng t&ocirc;i thu thập, th&ocirc;ng tin đ&oacute; c&oacute; thể được sử dụng, với người m&agrave; n&oacute; c&oacute; thể được chia sẻ, v&agrave; lựa chọn của bạn về việc sử dụng như vậy v&agrave; tiết lộ.</p>

		<p style="text-align:justify">Ch&uacute;ng t&ocirc;i khuyến kh&iacute;ch bạn đọc Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y một c&aacute;ch cẩn thận khi sử dụng Dịch vụ. Bằng c&aacute;ch truy cập Dịch vụ, bạn thừa nhận v&agrave; đồng &yacute; rằng bạn đ&atilde; đọc, chấp nhận đầy đủ v&agrave; sẽ tu&acirc;n thủ Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y.</p>

		<p style="text-align:justify">Dịch vụ hiện đang được ph&aacute;t triển mạnh mẽ v&agrave; c&aacute;c kh&iacute;a cạnh kh&aacute;c nhau của Dịch vụ sẽ được triển khai trong những th&aacute;ng tới. Một số phần của Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y đề cập đến c&aacute;c chức năng của C&aacute;c Dịch vụ chưa được triển khai hoặc đ&atilde; triển khai. Khi c&aacute;c chức năng n&agrave;y đ&atilde; c&oacute; sẵn để sử dụng, bằng c&aacute;ch truy cập v&agrave; tiếp tục sử dụng Dịch vụ sau đ&oacute;, bạn đồng &yacute; rằng những phần của Ch&iacute;nh s&aacute;ch Bảo mật sẽ c&oacute; hiệu lực.</p>

		<p style="text-align:justify"><strong>Th&ocirc;ng tin ch&uacute;ng t&ocirc;i thu thập được về bạn</strong></p>

		<p style="text-align:justify">Th&ocirc;ng tin bạn cung cấp hoặc c&oacute; sẵn. Ch&uacute;ng t&ocirc;i c&oacute; thể thu thập v&agrave; lưu trữ bất kỳ th&ocirc;ng tin n&agrave;o bạn nhập th&ocirc;ng qua Ứng dụng hoặc cung cấp cho ch&uacute;ng t&ocirc;i theo một số c&aacute;ch kh&aacute;c, chẳng hạn như th&ocirc;ng qua việc sử dụng một số Dịch vụ của ch&uacute;ng t&ocirc;i hoặc cung cấp th&ocirc;ng tin của bạn th&ocirc;ng qua Facebook hoặc c&aacute;c mạng x&atilde; hội kh&aacute;c m&agrave; bạn kết nối với dịch vụ của ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify">1. Th&ocirc;ng tin nhận dạng c&aacute; nh&acirc;n. Mặc d&ugrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng y&ecirc;u cầu nhiều mục m&agrave; sẽ được coi l&agrave; th&ocirc;ng tin nhận dạng c&aacute; nh&acirc;n, th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i thu thập c&oacute; thể bao gồm c&aacute;c mục như t&ecirc;n, địa chỉ email v&agrave; độ tuổi của bạn để ch&uacute;ng t&ocirc;i c&oacute; thể x&aacute;c minh bạn đủ điều kiện sử dụng c&aacute;c dịch vụ.</p>

		<p style="text-align:justify">2. Th&ocirc;ng tin v&agrave; nội dung ưu ti&ecirc;n c&ocirc;ng cộng. Khi bạn sử dụng Dịch vụ, ch&uacute;ng t&ocirc;i c&oacute; thể tự động nhận được th&ocirc;ng tin c&oacute; sẵn từ hồ sơ Facebook của bạn, chẳng hạn như ảnh hồ sơ của bạn. Trong phạm vi bạn cung cấp bất kỳ th&ocirc;ng tin n&agrave;o trong c&aacute;c phần của Dịch vụ, th&ocirc;ng tin đ&oacute; l&agrave; c&ocirc;ng khai, c&oacute; thể được lập chỉ mục bởi c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm tr&ecirc;n Internet v&agrave; c&oacute; thể được ch&uacute;ng t&ocirc;i sử dụng cho bất kỳ mục đ&iacute;ch n&agrave;o. Do đ&oacute;, bạn n&ecirc;n thận trọng khi tiết lộ th&ocirc;ng tin trong c&aacute;c kh&iacute;a cạnh c&ocirc;ng khai của Dịch vụ.</p>

		<p style="text-align:justify">Th&ocirc;ng tin được thu thập bằng cookie v&agrave; c&aacute;c c&ocirc;ng nghệ kh&aacute;c. Ch&uacute;ng t&ocirc;i sử dụng c&aacute;c c&ocirc;ng nghệ kh&aacute;c nhau để thu thập th&ocirc;ng tin từ m&aacute;y t&iacute;nh của bạn v&agrave; về c&aacute;c hoạt động của bạn tr&ecirc;n Dịch vụ.</p>

		<p style="text-align:justify">1. Th&ocirc;ng tin được thu thập tự động. Ch&uacute;ng t&ocirc;i tự động thu thập th&ocirc;ng tin từ tr&igrave;nh duyệt của bạn khi bạn truy cập Dịch vụ. Th&ocirc;ng tin n&agrave;y bao gồm địa chỉ IP, loại tr&igrave;nh duyệt v&agrave; ng&ocirc;n ngữ của bạn, thời gian truy cập, nội dung của c&aacute;c cookie kh&ocirc;ng bị xo&aacute; m&agrave; tr&igrave;nh duyệt của bạn đ&atilde; chấp nhận từ ch&uacute;ng t&ocirc;i trước đ&oacute; (xem &ldquo;Cookie&rdquo; b&ecirc;n dưới) v&agrave; địa chỉ trang web tham khảo.</p>

		<p style="text-align:justify">2. Cookie. Khi bạn truy cập Dịch vụ, ch&uacute;ng t&ocirc;i c&oacute; thể chỉ định m&aacute;y t&iacute;nh của bạn một hoặc nhiều cookie, để tạo điều kiện truy cập Dịch vụ v&agrave; c&aacute; nh&acirc;n ho&aacute; trải nghiệm của bạn. Th&ocirc;ng qua việc sử dụng cookie, ch&uacute;ng t&ocirc;i cũng c&oacute; thể tự động thu thập th&ocirc;ng tin về hoạt động của bạn c&oacute; li&ecirc;n quan đến Dịch vụ, chẳng hạn như c&aacute;c trang web bạn truy cập, c&aacute;c li&ecirc;n kết m&agrave; bạn nhấp chuột v&agrave; c&aacute;c t&igrave;m kiếm bạn thực hiện. Hầu hết c&aacute;c tr&igrave;nh duyệt tự động chấp nhận cookie nhưng bạn thường c&oacute; thể sửa đổi c&agrave;i đặt tr&igrave;nh duyệt của m&igrave;nh để từ chối cookie. Nếu bạn chọn từ chối cookie, vui l&ograve;ng lưu &yacute; rằng bạn kh&ocirc;ng thể đăng nhập hoặc sử dụng một số t&iacute;nh năng tương t&aacute;c được cung cấp bởi Dịch vụ.</p>

		<p style="text-align:justify">3. C&ocirc;ng nghệ kh&aacute;c. Ch&uacute;ng t&ocirc;i c&oacute; thể sử dụng c&ocirc;ng nghệ Internet chuẩn, chẳng hạn như GIF trong suốt v&agrave; c&aacute;c c&ocirc;ng nghệ tương tự kh&aacute;c, để theo d&otilde;i việc sử dụng Dịch vụ của bạn. Ch&uacute;ng t&ocirc;i cũng c&oacute; thể bao gồm GIF trong suốt trong quảng c&aacute;o hoặc quảng c&aacute;o hoặc c&aacute;c tin nhắn e-mail kh&aacute;c hoặc để x&aacute;c định xem th&ocirc;ng điệp đ&atilde; được mở v&agrave; hoạt động hay kh&ocirc;ng. Th&ocirc;ng tin ch&uacute;ng t&ocirc;i nhận được theo c&aacute;ch n&agrave;y cho ph&eacute;p ch&uacute;ng t&ocirc;i t&ugrave;y chỉnh Dịch vụ.</p>

		<p style="text-align:justify"><strong>Th&ocirc;ng tin được thu thập bởi c&aacute;c b&ecirc;n thứ ba</strong></p>

		<p style="text-align:justify">Ch&uacute;ng t&ocirc;i c&oacute; thể cho ph&eacute;p c&aacute;c b&ecirc;n thứ ba, bao gồm nhưng kh&ocirc;ng giới hạn đối với c&aacute;c nh&agrave; cung cấp dịch vụ được ủy quyền của ch&uacute;ng t&ocirc;i, c&aacute;c c&ocirc;ng ty quảng c&aacute;o, c&aacute;c đối t&aacute;c c&ocirc;ng ty, v&agrave; c&aacute;c mạng quảng c&aacute;o, để hiển thị li&ecirc;n kết, khuyến m&atilde;i v&agrave; quảng c&aacute;o th&ocirc;ng qua Dịch vụ. C&aacute;c c&ocirc;ng ty n&agrave;y c&oacute; thể sử dụng c&ocirc;ng nghệ theo d&otilde;i, chẳng hạn như cookie, để thu thập th&ocirc;ng tin về người d&ugrave;ng xem hoặc tương t&aacute;c với quảng c&aacute;o của họ. Th&ocirc;ng tin n&agrave;y c&oacute; thể cho ph&eacute;p họ cung cấp c&aacute;c quảng c&aacute;o được nhắm mục ti&ecirc;u v&agrave; đ&aacute;nh gi&aacute; hiệu quả của ch&uacute;ng. Ch&uacute;ng t&ocirc;i kh&ocirc;ng cung cấp bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o cho c&aacute;c b&ecirc;n thứ ba n&agrave;y.</p>

		<p style="text-align:justify"><strong>Trường hợp ch&uacute;ng t&ocirc;i thu thập th&ocirc;ng tin</strong></p>

		<p style="text-align:justify">Khi bạn cung cấp cho ch&uacute;ng t&ocirc;i th&ocirc;ng tin c&aacute; nh&acirc;n, th&ocirc;ng tin đ&oacute; c&oacute; thể được gửi đến c&aacute;c m&aacute;y chủ của Amazon Web Service.</p>

		<p style="text-align:justify"><strong>C&aacute;ch ch&uacute;ng t&ocirc;i sử dụng th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i thu thập được</strong></p>

		<p style="text-align:justify">Th&ocirc;ng thường, ch&uacute;ng t&ocirc;i c&oacute; thể sử dụng th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i thu thập về bạn để:</p>

		<p style="text-align:justify">1. Tạo điều kiện v&agrave; tăng cường việc sử dụng Dịch vụ của bạn;</p>

		<p style="text-align:justify">2. Quản l&yacute; t&agrave;i khoản của bạn v&agrave; cung cấp cho bạn hỗ trợ kh&aacute;ch h&agrave;ng;</p>

		<p style="text-align:justify">3. Thực hiện nghi&ecirc;n cứu v&agrave; ph&acirc;n t&iacute;ch về việc bạn sử dụng hoặc quan t&acirc;m đến trang web, Dịch vụ v&agrave; nội dung do ch&uacute;ng t&ocirc;i cung cấp hoặc c&aacute;c sản phẩm, dịch vụ v&agrave; nội dung do người kh&aacute;c cung cấp;</p>

		<p style="text-align:justify">4. X&aacute;c minh t&iacute;nh hợp lệ của bạn;</p>

		<p style="text-align:justify">5. Thi h&agrave;nh Điều khoản Sử dụng;</p>

		<p style="text-align:justify">6. Quản l&yacute; kinh doanh; v&agrave;</p>

		<p style="text-align:justify">7. Thực hiện c&aacute;c chức năng theo c&aacute;ch kh&aacute;c cho bạn tại thời điểm thu thập.</p>

		<p style="text-align:justify"><strong>Với người m&agrave; ch&uacute;ng t&ocirc;i chia sẻ th&ocirc;ng tin của bạn</strong></p>

		<p style="text-align:justify">Ch&uacute;ng t&ocirc;i muốn bạn hiểu khi n&agrave;o v&agrave; với ai m&agrave; ch&uacute;ng t&ocirc;i c&oacute; thể chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n hoặc th&ocirc;ng tin kh&aacute;c m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; thu thập được về bạn hoặc c&aacute;c hoạt động của bạn trong khi sử dụng Dịch vụ của ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify">Th&ocirc;ng tin c&ocirc;ng cộng. Bất kỳ th&ocirc;ng tin n&agrave;o (i) bạn đặt trong hồ sơ Facebook của bạn được đ&aacute;nh dấu l&agrave; c&ocirc;ng khai, chẳng hạn như t&ecirc;n người d&ugrave;ng của bạn, bất kỳ ảnh n&agrave;o bạn tải l&ecirc;n v&agrave; c&aacute;c th&ocirc;ng tin kh&aacute;c; hoặc (ii) bạn đăng l&ecirc;n một phần c&ocirc;ng khai của Dịch vụ, được c&ocirc;ng khai v&agrave; c&oacute; thể được lập chỉ mục bởi c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm tr&ecirc;n Internet. Như vậy, bằng c&aacute;ch cung cấp cho ch&uacute;ng t&ocirc;i th&ocirc;ng tin đ&oacute;, bạn x&aacute;c nhận rằng bạn kh&ocirc;ng c&oacute; kỳ vọng hợp l&yacute; về quyền ri&ecirc;ng tư v&agrave; n&oacute; c&oacute; thể được sử dụng cho bất kỳ mục đ&iacute;ch n&agrave;o. Như đ&atilde; lưu &yacute; ở tr&ecirc;n, bạn n&ecirc;n tập trung cẩn thận trong việc tiết lộ th&ocirc;ng tin th&ocirc;ng qua c&aacute;c phần c&ocirc;ng cộng n&agrave;y của Dịch vụ.</p>

		<p style="text-align:justify">Th&ocirc;ng tin c&aacute; nh&acirc;n kh&aacute;c. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn với những người kh&aacute;c trừ khi được chỉ ra b&ecirc;n dưới hoặc khi ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o cho bạn v&agrave; cho bạn cơ hội để kh&ocirc;ng tham gia chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn. Ch&uacute;ng t&ocirc;i c&oacute; thể chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n với:</p>

		<p style="text-align:justify">1. C&aacute;c đại l&yacute; được ủy quyền v&agrave; nh&agrave; cung cấp dịch vụ: Ch&uacute;ng t&ocirc;i c&oacute; thể chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn, bao gồm t&ecirc;n v&agrave; th&ocirc;ng tin li&ecirc;n lạc của bạn (bao gồm địa chỉ e-mail) với c&aacute;c đại l&yacute; v&agrave; nh&agrave; cung cấp dịch vụ được ủy quyền của ch&uacute;ng t&ocirc;i thực hiện c&aacute;c dịch vụ nhất định. C&aacute;c dịch vụ n&agrave;y c&oacute; thể bao gồm việc duy tr&igrave; c&aacute;c m&aacute;y chủ của ch&uacute;ng t&ocirc;i, thực hiện c&aacute;c y&ecirc;u cầu đăng k&yacute;, cung cấp dịch vụ kh&aacute;ch h&agrave;ng v&agrave; hỗ trợ tiếp thị, thực hiện ph&acirc;n t&iacute;ch kinh doanh v&agrave; b&aacute;n h&agrave;ng, hỗ trợ c&aacute;c chức năng của Dịch vụ, cung cấp c&aacute;c dịch vụ thanh to&aacute;n v&agrave; ho&agrave; giải thanh to&aacute;n v&agrave; hỗ trợ c&aacute;c chương tr&igrave;nh, khảo s&aacute;t v&agrave; c&aacute;c t&iacute;nh năng kh&aacute;c. C&aacute;c đại l&yacute; v&agrave; nh&agrave; cung cấp dịch vụ c&oacute; thể c&oacute; quyền truy cập th&ocirc;ng tin c&aacute; nh&acirc;n cần thiết để thực hiện c&aacute;c chức năng của m&igrave;nh nhưng kh&ocirc;ng được ph&eacute;p chia sẻ hoặc sử dụng th&ocirc;ng tin đ&oacute; cho bất kỳ mục đ&iacute;ch n&agrave;o kh&aacute;c.</p>

		<p style="text-align:justify">2. Đối t&aacute;c kinh doanh: Khi bạn mua h&agrave;ng hoặc tham gia chương tr&igrave;nh khuyến mại được cung cấp qua Dịch vụ, ch&uacute;ng t&ocirc;i c&oacute; thể chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n với c&aacute;c doanh nghiệp m&agrave; ch&uacute;ng t&ocirc;i hợp t&aacute;c để cung cấp cho bạn những sản phẩm, dịch vụ, khuyến m&atilde;i hoặc phần thưởng đ&oacute;. Khi bạn chọn tham gia một chương tr&igrave;nh hoặc dịch vụ cụ thể, bạn ủy quyền cho ch&uacute;ng t&ocirc;i cung cấp địa chỉ e-mail v&agrave; c&aacute;c th&ocirc;ng tin kh&aacute;c cho thương nh&acirc;n li&ecirc;n quan, nếu c&oacute;. Ch&uacute;ng t&ocirc;i sẽ lu&ocirc;n cung cấp cho bạn cơ hội để kh&ocirc;ng chia sẻ th&ocirc;ng tin với c&aacute;c doanh nghiệp n&agrave;y.</p>

		<p style="text-align:justify">3. C&aacute;c t&igrave;nh huống kh&aacute;c: Ch&uacute;ng t&ocirc;i cũng c&oacute; thể tiết lộ th&ocirc;ng tin của bạn, bao gồm th&ocirc;ng tin c&aacute; nh&acirc;n:</p>

		<p style="text-align:justify">a. Để đ&aacute;p lại tr&aacute;t đ&ograve;i hầu t&ograve;a hoặc y&ecirc;u cầu điều tra tương tự, lệnh của t&ograve;a &aacute;n, hoặc y&ecirc;u cầu hợp t&aacute;c từ cơ quan thực thi ph&aacute;p luật hoặc c&aacute;c cơ quan ch&iacute;nh phủ kh&aacute;c; thiết lập hoặc thực hiện c&aacute;c quyền hợp ph&aacute;p của ch&uacute;ng t&ocirc;i; để bảo vệ chống lại c&aacute;c y&ecirc;u cầu ph&aacute;p l&yacute;; hoặc theo y&ecirc;u cầu của luật ph&aacute;p. Trong những trường hợp như vậy, ch&uacute;ng t&ocirc;i c&oacute; thể tăng hoặc từ bỏ bất kỳ phản đối ph&aacute;p l&yacute; hoặc quyền n&agrave;o c&oacute; sẵn cho ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify">b. Khi ch&uacute;ng t&ocirc;i tin rằng c&ocirc;ng bố th&ocirc;ng tin ph&ugrave; hợp với nỗ lực điều tra, ngăn chặn hoặc c&oacute; h&agrave;nh động kh&aacute;c li&ecirc;n quan đến hoạt động bất hợp ph&aacute;p, gian lận nghi ngờ hoặc c&aacute;c h&agrave;nh vi sai tr&aacute;i kh&aacute;c; để bảo vệ v&agrave; bảo vệ quyền, t&agrave;i sản hoặc sự an to&agrave;n của c&ocirc;ng ty ch&uacute;ng t&ocirc;i, người sử dụng, nh&acirc;n vi&ecirc;n của ch&uacute;ng t&ocirc;i, hoặc những người kh&aacute;c; tu&acirc;n thủ luật ph&aacute;p hiện h&agrave;nh hoặc hợp t&aacute;c với cơ quan thực thi ph&aacute;p luật; hoặc để thi h&agrave;nh Điều khoản Sử dụng hoặc c&aacute;c thoả thuận hoặc ch&iacute;nh s&aacute;ch kh&aacute;c.</p>

		<p style="text-align:justify">Bất kỳ b&ecirc;n thứ ba n&agrave;o m&agrave; ch&uacute;ng t&ocirc;i c&oacute; thể tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n c&oacute; thể c&oacute; ch&iacute;nh s&aacute;ch ri&ecirc;ng tư của họ m&ocirc; tả c&aacute;ch họ sử dụng v&agrave; tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n. C&aacute;c ch&iacute;nh s&aacute;ch n&agrave;y sẽ chi phối việc sử dụng, xử l&yacute; v&agrave; tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn khi ch&uacute;ng t&ocirc;i đ&atilde; chia sẻ n&oacute; với c&aacute;c b&ecirc;n thứ ba như được m&ocirc; tả trong Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y. Nếu bạn muốn t&igrave;m hiểu th&ecirc;m về thực tiễn bảo mật của m&igrave;nh, ch&uacute;ng t&ocirc;i khuy&ecirc;n bạn n&ecirc;n truy cập c&aacute;c trang web của c&aacute;c b&ecirc;n thứ ba đ&oacute;.</p>

		<p style="text-align:justify"><strong>Th&ocirc;ng tin tổng hợp v&agrave; kh&ocirc;ng phải c&aacute; nh&acirc;n.</strong></p>

		<p style="text-align:justify">Ch&uacute;ng t&ocirc;i c&oacute; thể chia sẻ th&ocirc;ng tin tổng hợp v&agrave; phi c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i thu thập được theo bất kỳ trường hợp n&agrave;o ở tr&ecirc;n. Ch&uacute;ng t&ocirc;i cũng c&oacute; thể chia sẻ n&oacute; với c&aacute;c b&ecirc;n thứ ba để ph&aacute;t triển v&agrave; ph&acirc;n phối quảng c&aacute;o nhắm mục ti&ecirc;u th&ocirc;ng qua Dịch vụ v&agrave; tr&ecirc;n c&aacute;c trang web của b&ecirc;n thứ ba. Ch&uacute;ng t&ocirc;i c&oacute; thể kết hợp c&aacute;c th&ocirc;ng tin kh&ocirc;ng phải c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i thu thập được với c&aacute;c th&ocirc;ng tin phi c&aacute; nh&acirc;n bổ sung được thu thập từ c&aacute;c nguồn kh&aacute;c. Ch&uacute;ng t&ocirc;i cũng c&oacute; thể chia sẻ th&ocirc;ng tin tổng hợp với c&aacute;c b&ecirc;n thứ ba, bao gồm cả cố vấn, nh&agrave; quảng c&aacute;o v&agrave; nh&agrave; đầu tư, nhằm mục đ&iacute;ch ph&acirc;n t&iacute;ch kinh doanh n&oacute;i chung. V&iacute; dụ: ch&uacute;ng t&ocirc;i c&oacute; thể cho nh&agrave; quảng c&aacute;o biết số lượng kh&aacute;ch truy cập trang web v&agrave; c&aacute;c t&iacute;nh năng phổ biến nhất m&agrave; mọi người đ&atilde; truy cập. Th&ocirc;ng tin n&agrave;y kh&ocirc;ng chứa bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o v&agrave; c&oacute; thể được sử dụng để ph&aacute;t triển nội dung v&agrave; dịch vụ của trang web m&agrave; ch&uacute;ng t&ocirc;i hy vọng bạn v&agrave; những người d&ugrave;ng kh&aacute;c sẽ quan t&acirc;m v&agrave; nhắm mục ti&ecirc;u nội dung v&agrave; quảng c&aacute;o.</p>

		<p style="text-align:justify"><strong>C&aacute;c trang web b&ecirc;n thứ ba</strong></p>

		<p style="text-align:justify">Th&ocirc;ng qua Dịch vụ, bạn c&oacute; thể nhấp v&agrave;o li&ecirc;n kết để truy cập c&aacute;c trang web kh&aacute;c kh&ocirc;ng hoạt động theo Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y. V&iacute; dụ: nếu bạn nhấp v&agrave;o li&ecirc;n kết tới một b&agrave;i b&aacute;o b&ecirc;n ngo&agrave;i, bạn c&oacute; thể được đưa đến trang web m&agrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng kiểm so&aacute;t. C&aacute;c trang web của b&ecirc;n thứ ba n&agrave;y c&oacute; thể y&ecirc;u cầu độc lập v&agrave; thu thập th&ocirc;ng tin, bao gồm th&ocirc;ng tin c&aacute; nh&acirc;n, từ bạn v&agrave;, trong một số trường hợp, cung cấp cho ch&uacute;ng t&ocirc;i th&ocirc;ng tin về c&aacute;c hoạt động của bạn tr&ecirc;n c&aacute;c trang web đ&oacute;. Ch&uacute;ng t&ocirc;i khuy&ecirc;n bạn n&ecirc;n tham khảo ch&iacute;nh s&aacute;ch bảo mật của tất cả c&aacute;c trang web b&ecirc;n thứ ba m&agrave; bạn truy cập bằng c&aacute;ch nhấp v&agrave;o li&ecirc;n kết &ldquo;ri&ecirc;ng tư&rdquo; thường nằm ở cuối trang web bạn đang truy cập.</p>

		<p style="text-align:justify"><strong>C&aacute;ch bạn c&oacute; thể truy cập th&ocirc;ng tin của bạn</strong></p>

		<p style="text-align:justify">Bạn c&oacute; khả năng xem x&eacute;t v&agrave; cập nhật th&ocirc;ng tin m&agrave; bạn cung cấp qua Facebook qua c&aacute;c c&agrave;i đặt bảo mật của bạn.</p>

		<p style="text-align:justify"><strong>C&aacute;ch bạn c&oacute; thể x&oacute;a th&ocirc;ng tin của m&igrave;nh</strong></p>

		<p style="text-align:justify">Giữ th&ocirc;ng tin. Nếu bạn đ&oacute;ng t&agrave;i khoản của m&igrave;nh, ch&uacute;ng t&ocirc;i vẫn c&oacute; thể giữ lại một số th&ocirc;ng tin nhất định li&ecirc;n quan đến t&agrave;i khoản của bạn nhằm mục đ&iacute;ch ph&acirc;n t&iacute;ch v&agrave; lưu giữ hồ sơ to&agrave;n vẹn, cũng như để tr&aacute;nh gian lận, thu thập bất kỳ khoản ph&iacute; phải trả n&agrave;o, thực thi c&aacute;c điều khoản v&agrave; điều kiện của ch&uacute;ng t&ocirc;i, của trang web của ch&uacute;ng t&ocirc;i hoặc người d&ugrave;ng của ch&uacute;ng t&ocirc;i, hoặc thực hiện c&aacute;c h&agrave;nh động kh&aacute;c nếu ph&aacute;p luật cho ph&eacute;p. Hơn nữa, do sự phức tạp của c&ocirc;ng nghệ li&ecirc;n quan, ch&uacute;ng t&ocirc;i kh&ocirc;ng thể đảm bảo x&oacute;a to&agrave;n bộ hoặc kh&ocirc;ng thể thu hồi th&ocirc;ng tin t&agrave;i khoản của bạn v&agrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng thể cung cấp cho bạn bất kỳ thời hạn cụ thể n&agrave;o để x&oacute;a. Ngo&agrave;i ra, nếu th&ocirc;ng tin nhất định đ&atilde; được cung cấp cho c&aacute;c b&ecirc;n thứ ba như được m&ocirc; tả trong Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y, việc lưu giữ th&ocirc;ng tin đ&oacute; sẽ phải tu&acirc;n theo c&aacute;c ch&iacute;nh s&aacute;ch của b&ecirc;n thứ ba đ&oacute;.</p>

		<p style="text-align:justify"><strong>Sự lựa chọn của bạn về thu thập v&agrave; sử dụng th&ocirc;ng tin của bạn</strong></p>

		<p style="text-align:justify">Bạn c&oacute; thể chọn kh&ocirc;ng cung cấp cho ch&uacute;ng t&ocirc;i một số th&ocirc;ng tin nhất định, nhưng c&oacute; thể dẫn đến việc bạn kh&ocirc;ng thể sử dụng một số t&iacute;nh năng của Dịch vụ. Bạn c&oacute; thể chọn kh&ocirc;ng chia sẻ c&ocirc;ng khai bất kỳ th&ocirc;ng tin tiểu sử n&agrave;o bằng c&aacute;ch truy cập v&agrave;o trang c&agrave;i đặt Facebook v&agrave; chọn chỉ cung cấp hồ sơ cho người d&ugrave;ng đ&atilde; đăng nhập v&agrave;o Dịch vụ. Điều n&agrave;y kh&ocirc;ng ngăn cản ch&uacute;ng t&ocirc;i chia sẻ th&ocirc;ng tin của bạn với c&aacute;c b&ecirc;n thứ ba như đ&atilde; n&ecirc;u ở tr&ecirc;n. Nếu ch&uacute;ng t&ocirc;i đ&atilde; cung cấp th&ocirc;ng tin của bạn cho b&ecirc;n thứ ba (như nh&agrave; cung cấp dịch vụ) trước khi bạn thay đổi t&ugrave;y chọn hoặc cập nhật th&ocirc;ng tin của m&igrave;nh, bạn c&oacute; thể phải thay đổi sở th&iacute;ch của m&igrave;nh trực tiếp với b&ecirc;n thứ ba đ&oacute;. Xin lưu &yacute; rằng việc thay đổi th&ocirc;ng tin trong t&agrave;i khoản của bạn, hoặc bằng c&aacute;ch chọn kh&ocirc;ng nhận c&aacute;c th&ocirc;ng tin li&ecirc;n lạc qua email, sẽ chỉ ảnh hưởng đến c&aacute;c hoạt động hoặc th&ocirc;ng tin li&ecirc;n lạc trong tương lai từ ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify"><strong>C&aacute;ch ch&uacute;ng t&ocirc;i bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn</strong></p>

		<p style="text-align:justify">Ch&uacute;ng t&ocirc;i &aacute;p dụng c&aacute;c biện ph&aacute;p bảo mật th&iacute;ch hợp (bao gồm c&aacute;c biện ph&aacute;p vật l&yacute;, điện tử v&agrave; thủ tục) để gi&uacute;p bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn khỏi bị truy cập v&agrave; tiết lộ tr&aacute;i ph&eacute;p. V&iacute; dụ: chỉ những nh&acirc;n vi&ecirc;n được ủy quyền v&agrave; b&ecirc;n thứ ba đ&atilde; đồng &yacute; bị r&agrave;ng buộc bởi c&aacute;c hạn chế về bảo mật, chẳng hạn như tư vấn, c&oacute; thể được ph&eacute;p truy cập th&ocirc;ng tin c&aacute; nh&acirc;n v&agrave; họ chỉ l&agrave;m như vậy đối với c&aacute;c chức năng kinh doanh được ph&eacute;p. Ngo&agrave;i ra, ch&uacute;ng t&ocirc;i sử dụng m&atilde; h&oacute;a SSL trong việc truyền tải th&ocirc;ng tin c&aacute; nh&acirc;n nhạy cảm của bạn giữa hệ thống của bạn v&agrave; ch&uacute;ng t&ocirc;i, v&agrave; ch&uacute;ng t&ocirc;i sử dụng tường lửa để gi&uacute;p ngăn chặn những người kh&ocirc;ng c&oacute; thẩm quyền truy cập th&ocirc;ng tin c&aacute; nh&acirc;n của bạn. Ch&uacute;ng t&ocirc;i muốn bạn cảm thấy tự tin bằng c&aacute;ch sử dụng Dịch vụ. Tuy nhi&ecirc;n, kh&ocirc;ng c&oacute; hệ thống c&oacute; thể được ho&agrave;n to&agrave;n an to&agrave;n. Do đ&oacute;, mặc d&ugrave; ch&uacute;ng t&ocirc;i thực hiện c&aacute;c bước để bảo mật th&ocirc;ng tin của bạn, ch&uacute;ng t&ocirc;i kh&ocirc;ng hứa hẹn, v&agrave; bạn kh&ocirc;ng n&ecirc;n mong đợi, rằng th&ocirc;ng tin c&aacute; nh&acirc;n, t&igrave;m kiếm của bạn, hoặc c&aacute;c th&ocirc;ng tin li&ecirc;n lạc kh&aacute;c sẽ lu&ocirc;n được bảo mật. Người d&ugrave;ng cũng n&ecirc;n quan t&acirc;m đến c&aacute;ch họ xử l&yacute; v&agrave; tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của họ v&agrave; tr&aacute;nh phải gửi th&ocirc;ng tin c&aacute; nh&acirc;n qua email kh&ocirc;ng an to&agrave;n.</p>

		<p style="text-align:justify"><strong>Sự ri&ecirc;ng tư của trẻ em</strong></p>

		<p style="text-align:justify">Mặc d&ugrave; Dịch vụ d&agrave;nh cho đối tượng chung, nhưng ch&uacute;ng t&ocirc;i hạn chế việc sử dụng ch&uacute;ng cho c&aacute;c c&aacute; nh&acirc;n từ 13 tuổi trở l&ecirc;n. Ch&uacute;ng t&ocirc;i kh&ocirc;ng cố &yacute; t&igrave;m kiếm hoặc thu thập th&ocirc;ng tin c&aacute; nh&acirc;n từ trẻ em dưới 13 tuổi.</p>

		<p style="text-align:justify"><strong>Kh&ocirc;ng c&oacute; quyền của b&ecirc;n thứ ba</strong></p>

		<p style="text-align:justify">Ch&iacute;nh s&aacute;ch bảo mật n&agrave;y kh&ocirc;ng tạo ra c&aacute;c quyền thực thi bởi b&ecirc;n thứ ba hoặc y&ecirc;u cầu tiết lộ bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o li&ecirc;n quan đến người sử dụng Dịch vụ.</p>

		<p style="text-align:justify"><strong>Thay đổi đối với Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y</strong></p>

		<p style="text-align:justify">Đ&ocirc;i khi ch&uacute;ng t&ocirc;i sẽ cập nhật Ch&iacute;nh s&aacute;ch Bảo mật để phản &aacute;nh những thay đổi trong thực tiễn của ch&uacute;ng t&ocirc;i v&agrave; trong Dịch vụ. Khi ch&uacute;ng t&ocirc;i đăng c&aacute;c thay đổi cho Ch&iacute;nh s&aacute;ch Bảo mật, ch&uacute;ng t&ocirc;i sẽ sửa lại ng&agrave;y &ldquo;cập nhật lần cuối&rdquo; ở cuối Ch&iacute;nh s&aacute;ch Bảo mật n&agrave;y. Nếu ch&uacute;ng t&ocirc;i thực hiện bất kỳ thay đổi quan trọng n&agrave;o trong c&aacute;ch ch&uacute;ng t&ocirc;i thu thập, sử dụng v&agrave;/hoặc chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n của bạn, ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng b&aacute;o cho bạn bằng c&aacute;ch gửi email đến địa chỉ email bạn vừa cung cấp cho ch&uacute;ng t&ocirc;i trong t&agrave;i khoản, (trừ khi ch&uacute;ng t&ocirc;i kh&ocirc;ng c&oacute; địa chỉ email như vậy), v&agrave;/hoặc th&ocirc;ng b&aacute;o bằng văn bản về c&aacute;c thay đổi th&ocirc;ng qua Dịch vụ. Ch&uacute;ng t&ocirc;i khuy&ecirc;n bạn n&ecirc;n thường xuy&ecirc;n kiểm tra Dịch vụ để th&ocirc;ng b&aacute;o cho m&igrave;nh về bất kỳ thay đổi n&agrave;o trong Ch&iacute;nh s&aacute;ch Bảo mật hoặc bất kỳ ch&iacute;nh s&aacute;ch n&agrave;o kh&aacute;c của ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify"><strong>Li&ecirc;n lạc với ch&uacute;ng t&ocirc;i bằng c&aacute;ch n&agrave;o</strong></p>

		<p style="text-align:justify">Nếu bạn c&oacute; bất kỳ c&acirc;u hỏi n&agrave;o về Ch&iacute;nh s&aacute;ch Bảo mật hoặc c&aacute;c th&ocirc;ng lệ xử l&yacute; th&ocirc;ng tin của ch&uacute;ng t&ocirc;i hoặc nếu bạn muốn y&ecirc;u cầu th&ocirc;ng tin về việc tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n của ch&uacute;ng t&ocirc;i cho c&aacute;c b&ecirc;n thứ ba v&igrave; mục đ&iacute;ch tiếp thị trực tiếp của họ, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua email tại&nbsp;</p>

	</div>
</div>

<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>