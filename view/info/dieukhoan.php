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
	<div class="page-title">ĐIỀU KHOẢN SỬ DỤNG (TERMS OF USE)TẠI ĐỒNG HỒ BARON WATCH</div>
	<div class="introduce-content">

		<p style="text-align:justify">Ch&agrave;o mừng bạn đến với Baron Watch (&ldquo;Baron Watch&rdquo; được hiểu l&agrave; &ldquo;ch&uacute;ng t&ocirc;i&rdquo; trong văn bản n&agrave;y).</p>

		<p style="text-align:justify">Vui l&ograve;ng đọc &ldquo;Điều khoản sử dụng&rdquo; n&agrave;y nếu bạn đang xem x&eacute;t sử dụng bất cứ t&agrave;i liệu, dịch vụ hoặc th&ocirc;ng tin n&agrave;o hiển thị tr&ecirc;n trang của Baron Watch. Lưu &yacute; rằng bằng việc truy cập v&agrave;/hoặc sử dụng trang của ch&uacute;ng t&ocirc;i, bạn đồng &yacute; với những Điều khoản sử dụng n&agrave;y. Nếu bạn kh&ocirc;ng đồng &yacute; với Điều khoản sử dụng của ch&uacute;ng t&ocirc;i, h&atilde;y ngưng kết nối v&agrave; kh&ocirc;ng sử dụng Trang n&agrave;y.</p>

		<p style="text-align:justify"><strong>1. Đủ điều kiện.</strong></p>

		<p style="text-align:justify">a. Phải tr&ecirc;n 13 tuổi. Dịch vụ kh&ocirc;ng d&agrave;nh cho những người dưới 13 tuổi. Nếu bạn dưới 13 tuổi, bạn bị nghi&ecirc;m cấm sử dụng Dịch vụ v&agrave; bạn kh&ocirc;ng thể truy cập bất kỳ t&iacute;nh năng n&agrave;o cho ph&eacute;p bạn cung cấp th&ocirc;ng tin cho ch&uacute;ng t&ocirc;i hoặc truyền đạt v&agrave; chia sẻ th&ocirc;ng tin với người d&ugrave;ng kh&aacute;c của Ứng dụng.</p>

		<p style="text-align:justify">b. V&ocirc; hiệu h&oacute;a trường hợp bị cấm. Bạn c&oacute; tr&aacute;ch nhiệm đảm bảo rằng việc sử dụng Dịch vụ của bạn tu&acirc;n thủ tất cả c&aacute;c luật, quy tắc v&agrave; quy định &aacute;p dụng cho bạn. C&aacute;c điều khoản n&agrave;y đều v&ocirc; hiệu h&oacute;a v&agrave; việc sử dụng Dịch vụ kh&ocirc;ng được ph&eacute;p khi việc sử dụng đ&oacute; bị cấm.</p>

		<p style="text-align:justify"><strong>2. Sử dụng Dịch vụ.</strong></p>

		<p style="text-align:justify">a. Sử dụng thương mại. Bạn được ph&eacute;p sử dụng Ứng dụng v&agrave; Dịch vụ của ch&uacute;ng t&ocirc;i (cũng như API của ch&uacute;ng t&ocirc;i) trong thương mại như một phương tiện để b&aacute;n lại hoặc x&acirc;y dựng h&agrave;ng ho&aacute; v&agrave; dịch vụ m&agrave; bạn sử dụng hoặc đưa ra thương mại, ngoại trừ trường hợp sản phẩm của bạn được thiết kế tương tự hoặc thiết kế để cạnh tranh trực tiếp với Dịch vụ được cung cấp bởi Baron Watch.</p>

		<p style="text-align:justify">b. An to&agrave;n c&aacute; nh&acirc;n. An ninh v&agrave; an to&agrave;n của bạn l&agrave; điều tối quan trọng đối với ch&uacute;ng t&ocirc;i. Dịch vụ tự nhi&ecirc;n th&uacute;c đẩy chia sẻ th&ocirc;ng tin c&aacute; nh&acirc;n giữa Người d&ugrave;ng. Ch&uacute;ng t&ocirc;i kh&ocirc;ng v&agrave; kh&ocirc;ng thể đảm bảo rằng bạn c&oacute; thể li&ecirc;n hệ trực tiếp với bất kỳ c&aacute; nh&acirc;n n&agrave;o kh&aacute;c m&agrave; bạn tiếp x&uacute;c qua Dịch vụ. Nếu bạn tin rằng bất kỳ c&aacute; nh&acirc;n n&agrave;o đang quấy rối bạn hoặc sử dụng th&ocirc;ng tin c&aacute; nh&acirc;n của bạn cho c&aacute;c mục đ&iacute;ch bất hợp ph&aacute;p, ch&uacute;ng t&ocirc;i khuyến kh&iacute;ch bạn trước hết h&atilde;y th&ocirc;ng b&aacute;o cho cơ quan thực thi ph&aacute;p luật v&agrave; sau đ&oacute; li&ecirc;n hệ với ch&uacute;ng t&ocirc;i tại 23730213@ms.uit.edu.vn để ch&uacute;ng t&ocirc;i c&oacute; thể h&agrave;nh động th&iacute;ch hợp để ngăn chặn việc sử dụng Dịch vụ th&ecirc;m bởi bất kỳ c&aacute; nh&acirc;n n&agrave;o c&oacute; thể truy cập ch&uacute;ng v&igrave; c&aacute;c mục đ&iacute;ch kh&ocirc;ng đ&uacute;ng.</p>

		<p style="text-align:justify">c. Sử dụng th&ocirc;ng tin được cung cấp bởi người d&ugrave;ng kh&aacute;c. Bạn đồng &yacute; sử dụng bất kỳ th&ocirc;ng tin n&agrave;o (c&aacute; nh&acirc;n hoặc bằng c&aacute;ch kh&aacute;c) do Người d&ugrave;ng cung cấp, hoặc bằng c&aacute;ch kh&aacute;c th&ocirc;ng qua Dịch vụ, một c&aacute;ch hợp ph&aacute;p v&agrave; c&oacute; tr&aacute;ch nhiệm. Bạn đồng &yacute; rằng bạn sẽ kh&ocirc;ng sử dụng th&ocirc;ng tin về Người d&ugrave;ng v&igrave; bất kỳ l&yacute; do g&igrave; m&agrave; kh&ocirc;ng c&oacute; sự đồng &yacute; trước của Người sử dụng đ&oacute;.</p>

		<p style="text-align:justify">d. Quy tắc ứng xử. Bằng c&aacute;ch truy cập Dịch vụ, bạn đồng &yacute; với c&aacute;c quy tắc ứng xử sau đ&acirc;y:</p>

		<p style="text-align:justify">i. Bạn sẽ kh&ocirc;ng xuất bản, trưng b&agrave;y hoặc sử dụng bất kỳ t&agrave;i liệu x&uacute;c phạm, lạm dụng, tục tĩu, đe doạ, quấy rối, kỳ thị, ph&acirc;n biệt đối xử hoặc g&acirc;y kh&oacute; chịu hoặc bất hợp ph&aacute;p.</p>

		<p style="text-align:justify">ii. Bạn sẽ t&ocirc;n trọng tất cả Người d&ugrave;ng với sự t&ocirc;n trọng v&agrave; được t&ocirc;n trọng.</p>

		<p style="text-align:justify">iii. Bạn sẽ th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i kịp thời về bất kỳ vi phạm n&agrave;o của Người d&ugrave;ng đối với c&aacute;c Điều khoản n&agrave;y.</p>

		<p style="text-align:justify">iv. Bất kỳ th&ocirc;ng tin n&agrave;o trong hồ sơ Facebook của bạn v&agrave; những người sử dụng kh&aacute;c c&oacute; thể truy cập được &ndash; bao gồm bất kỳ số điện thoại, địa chỉ đường phố, t&ecirc;n họ, URL, địa chỉ email hoặc c&aacute;c th&ocirc;ng tin li&ecirc;n lạc kh&aacute;c &ndash; sẽ tự chịu mọi rủi ro v&agrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm về việc sử dụng th&ocirc;ng tin đ&oacute;.</p>

		<p style="text-align:justify">v. Bạn sẽ kh&ocirc;ng mạo nhận bất kỳ c&aacute; nh&acirc;n hoặc tổ chức n&agrave;o.</p>

		<p style="text-align:justify">vi. Bạn sẽ kh&ocirc;ng xem l&eacute;n th&ocirc;ng tin hoặc quấy rối Người d&ugrave;ng hoặc c&aacute; nh&acirc;n kh&aacute;c truy cập Dịch vụ.</p>

		<p style="text-align:justify">vii. Bạn sẽ kh&ocirc;ng thể hiện hoặc ngụ &yacute; rằng bất kỳ tuy&ecirc;n bố bạn thực hiện được ch&uacute;ng t&ocirc;i chứng thực nếu kh&ocirc;ng c&oacute; sự đồng &yacute; trước bằng văn bản cụ thể.</p>

		<p style="text-align:justify">viii. Bạn sẽ kh&ocirc;ng sử dụng quy tr&igrave;nh thủ c&ocirc;ng hoặc tự động để truy xuất, lập chỉ mục, khai th&aacute;c dữ liệu, hoặc bằng c&aacute;ch n&agrave;o đ&oacute; sao ch&eacute;p hoặc ph&aacute; hoại cấu tr&uacute;c điều hướng hoặc nội dung của Dịch vụ. Việc ngăn cấm n&agrave;y kh&ocirc;ng bao gồm việc lập chỉ mục chuẩn bởi c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm tr&ecirc;n Internet.</p>

		<p style="text-align:justify">ix. Bạn sẽ kh&ocirc;ng x&oacute;a bất kỳ th&ocirc;ng b&aacute;o về quyền t&aacute;c giả, nh&atilde;n hiệu hoặc c&aacute;c quyền sở hữu kh&aacute;c được hiển thị th&ocirc;ng qua Dịch vụ.</p>

		<p style="text-align:justify">x. Bạn sẽ kh&ocirc;ng đăng, ph&acirc;n phối hoặc sao ch&eacute;p bằng bất kỳ c&aacute;ch n&agrave;o bất kỳ t&agrave;i liệu c&oacute; bản quyền, thương hiệu hoặc th&ocirc;ng tin độc quyền kh&aacute;c m&agrave; kh&ocirc;ng c&oacute; sự đồng &yacute; trước của chủ sở hữu c&aacute;c quyền đ&oacute;.</p>

		<p style="text-align:justify">xi. Bạn sẽ kh&ocirc;ng can thiệp hoặc l&agrave;m gi&aacute;n đoạn Dịch vụ, c&aacute;c m&aacute;y chủ hoặc mạng kết nối với Dịch vụ.</p>

		<p style="text-align:justify">xii. Bạn sẽ kh&ocirc;ng đăng, gửi email hoặc truyền bất kỳ t&agrave;i liệu n&agrave;o chứa virut phần mềm hoặc bất kỳ m&atilde;, tệp hoặc chương tr&igrave;nh m&aacute;y t&iacute;nh n&agrave;o kh&aacute;c được thiết kế để l&agrave;m gi&aacute;n đoạn, ph&aacute; hủy hoặc giới hạn chức năng của phần mềm hoặc phần cứng m&aacute;y t&iacute;nh hoặc thiết bị viễn th&ocirc;ng.</p>

		<p style="text-align:justify">xiii. Bạn sẽ kh&ocirc;ng giả mạo c&aacute;c ti&ecirc;u đề hoặc bằng c&aacute;ch n&agrave;o kh&aacute;c thao t&uacute;ng c&aacute;c số nhận dạng để ngụy trang nguồn gốc của bất kỳ th&ocirc;ng tin n&agrave;o được truyền qua Dịch vụ. xiv. Bạn sẽ kh&ocirc;ng &ldquo;ghi ch&eacute;p lại&rdquo; hoặc &ldquo;nh&acirc;n bản&rdquo; bất kỳ phần n&agrave;o của Dịch vụ m&agrave; kh&ocirc;ng c&oacute; sự cho ph&eacute;p bằng văn bản trước của ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify">xv. Bạn sẽ kh&ocirc;ng trực tiếp sửa đổi, điều chỉnh, dịch, dịch ngược, giải m&atilde; hoặc bằng c&aacute;ch n&agrave;o đ&oacute; th&aacute;o gỡ bất kỳ phần n&agrave;o của Dịch vụ hoặc bất kỳ phần mềm n&agrave;o được sử dụng tr&ecirc;n Dịch vụ hoặc gi&uacute;p đỡ người kh&aacute;c l&agrave;m như vậy.</p>

		<p style="text-align:justify">e. Dịch vụ dựa tr&ecirc;n địa điểm. Ch&uacute;ng t&ocirc;i c&oacute; thể cung cấp c&aacute;c t&iacute;nh năng dựa tr&ecirc;n vị tr&iacute; của Người d&ugrave;ng v&agrave; c&oacute; thể b&aacute;o c&aacute;o về vị tr&iacute; hiện tại của Người d&ugrave;ng. Việc sử dụng Dịch vụ Dựa tr&ecirc;n Vị tr&iacute; chỉ t&ugrave;y theo quyết định của bạn. Nếu bạn sử dụng Dịch vụ dựa tr&ecirc;n Vị tr&iacute;, bạn đồng &yacute; thu thập v&agrave; phổ biến th&ocirc;ng tin vị tr&iacute; của bạn th&ocirc;ng qua Dịch vụ. Kh&ocirc;ng c&oacute; trường hợp n&agrave;o ch&uacute;ng t&ocirc;i sẽ chịu tr&aacute;ch nhiệm ph&aacute;p l&yacute; về c&aacute;c y&ecirc;u cầu bồi thường hoặc cho bất kỳ thiệt hại n&agrave;o từ n&oacute;, ph&aacute;t sinh từ quyết định th&ocirc;ng b&aacute;o của bạn để phổ biến th&ocirc;ng tin vị tr&iacute; của bạn c&ugrave;ng với th&ocirc;ng tin tiểu sử của bạn th&ocirc;ng qua Dịch vụ.</p>

		<p style="text-align:justify">f. Tu&acirc;n thủ luật &aacute;p dụng. Việc sử dụng Dịch vụ của bạn, bao gồm nhưng kh&ocirc;ng giới hạn ở bất kỳ nội dung n&agrave;o bạn gửi, phải v&agrave; sẽ ph&ugrave; hợp với bất kỳ v&agrave; tất cả c&aacute;c luật v&agrave; quy định &aacute;p dụng cho bạn v&agrave; việc sử dụng Dịch vụ của bạn. g. Từ chối tr&aacute;ch nhiệm về h&agrave;nh động của người d&ugrave;ng.</p>

		<p style="text-align:justify">i. Kh&ocirc;ng tin tưởng v&agrave;o nội dung. C&aacute;c &yacute; kiến, phiếu bầu, lời khuy&ecirc;n, tuy&ecirc;n bố hoặc th&ocirc;ng tin hoặc nội dung kh&aacute;c được cung cấp th&ocirc;ng qua Dịch vụ l&agrave; của t&aacute;c giả v&agrave; kh&ocirc;ng nhất thiết phải dựa v&agrave;o. C&aacute;c t&aacute;c giả như vậy ho&agrave;n to&agrave;n chịu tr&aacute;ch nhiệm về nội dung như vậy. Ch&uacute;ng t&ocirc;i kh&ocirc;ng: (i) đảm bảo t&iacute;nh ch&iacute;nh x&aacute;c, đầy đủ hoặc hữu dụng của bất kỳ th&ocirc;ng tin n&agrave;o tr&ecirc;n Dịch vụ hoặc (ii) th&ocirc;ng qua, x&aacute;c nhận hoặc chấp nhận tr&aacute;ch nhiệm về t&iacute;nh ch&iacute;nh x&aacute;c hoặc độ tin cậy của bất kỳ &yacute; kiến, lời khuy&ecirc;n hoặc tuy&ecirc;n bố n&agrave;o của bất kỳ b&ecirc;n n&agrave;o xuất hiện tr&ecirc;n Dịch vụ. Trong bất kỳ trường hợp n&agrave;o, ch&uacute;ng t&ocirc;i hoặc c&aacute;c chi nh&aacute;nh của ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm cho bất kỳ tổn thất hoặc thiệt hại n&agrave;o do sự tin cậy của bạn v&agrave;o th&ocirc;ng tin hoặc nội dung kh&aacute;c được đăng tải th&ocirc;ng qua Dịch vụ hoặc được chuyển đến hoặc bởi bất kỳ Người d&ugrave;ng n&agrave;o.</p>

		<p style="text-align:justify"><strong>3. Lệ ph&iacute; sử dụng dịch vụ</strong></p>

		<p style="text-align:justify">Baron Watch cung cấp Dịch vụ theo biểu ph&iacute;. Vui l&ograve;ng b&aacute;o c&aacute;o cho ch&uacute;ng t&ocirc;i nếu bạn muốn sử dụng bất kỳ nội dụng n&agrave;o tr&ecirc;n trang web n&agrave;y.</p>

		<p style="text-align:justify"><strong>4. Bảo lưu quyền.</strong></p>

		<p style="text-align:justify">a. Quyền Chấm dứt hoặc Từ chối Dịch Vụ. Bạn hiểu rằng theo quyết định ri&ecirc;ng của ch&uacute;ng t&ocirc;i v&agrave;o bất kỳ l&uacute;c n&agrave;o, v&igrave; bất kỳ l&yacute; do hoặc l&yacute; do g&igrave;, c&oacute; thể từ chối hoặc chặn bất kỳ người d&ugrave;ng n&agrave;o từ Dịch vụ v&agrave; chấm dứt t&agrave;i khoản của người d&ugrave;ng nếu người đ&oacute; l&agrave; Người d&ugrave;ng.</p>

		<p style="text-align:justify">b. Quyền tiết lộ. Bạn thừa nhận v&agrave; đồng &yacute; rằng ch&uacute;ng t&ocirc;i c&oacute; quyền tiết lộ th&ocirc;ng tin bạn cung cấp nếu được y&ecirc;u cầu theo luật ph&aacute;p theo y&ecirc;u cầu của b&ecirc;n thứ ba hoặc nếu ch&uacute;ng t&ocirc;i quyết định cho rằng việc tiết lộ l&agrave; hợp l&yacute; để (1) tu&acirc;n thủ ph&aacute;p luật, y&ecirc;u cầu hoặc lệnh của cơ quan thực thi ph&aacute;p luật hoặc bất kỳ quy tr&igrave;nh ph&aacute;p l&yacute; n&agrave;o (cho d&ugrave; luật ph&aacute;p hiện h&agrave;nh c&oacute; y&ecirc;u cầu hay kh&ocirc;ng); (2) bảo vệ quyền hoặc t&agrave;i sản của ch&uacute;ng t&ocirc;i, hoặc của b&ecirc;n thứ ba; hoặc (3) bảo vệ sức khoẻ hoặc an to&agrave;n của ai đ&oacute;, chẳng hạn như khi c&oacute; hại hoặc bạo lực đối với bất kỳ người n&agrave;o (kể cả người d&ugrave;ng) đang bị đe dọa.</p>

		<p style="text-align:justify">c. Quyền xem x&eacute;t Nội dung; Kh&ocirc;ng c&oacute; Nhiệm vụ Gi&aacute;m s&aacute;t. Bạn thừa nhận v&agrave; đồng &yacute; rằng ch&uacute;ng t&ocirc;i kh&ocirc;ng c&oacute; nghĩa vụ n&agrave;o để kiểm tra trước, kiểm so&aacute;t, gi&aacute;m s&aacute;t hoặc chỉnh sửa nội dung do Người d&ugrave;ng đăng l&ecirc;n v&agrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung do người kh&aacute;c cung cấp. Tuy nhi&ecirc;n, bạn hiểu v&agrave; đồng &yacute; rằng ch&uacute;ng t&ocirc;i c&oacute; thể, nhưng kh&ocirc;ng bắt buộc, xem lại, chỉnh sửa v&agrave; x&oacute;a bất kỳ nội dung, email, tin nhắn, h&igrave;nh ảnh, &acirc;m nhạc hoặc c&aacute;c nội dung kh&aacute;c m&agrave; theo quyết định của ch&uacute;ng t&ocirc;i:</p>

		<p style="text-align:justify">(i) vi phạm c&aacute;c Điều khoản n&agrave;y;</p>

		<p style="text-align:justify">(ii) c&oacute; thể x&uacute;c phạm, l&agrave;m phiền, kh&ocirc;ng an to&agrave;n, hoặc bất hợp ph&aacute;p; hoặc (iii) c&oacute; thể vi phạm bất kỳ quyền n&agrave;o của Người d&ugrave;ng hoặc b&ecirc;n thứ ba kh&aacute;c.</p>

		<p style="text-align:justify">d. Quyền Thay đổi Dịch vụ. Bạn thừa nhận v&agrave; đồng &yacute; rằng đ&ocirc;i khi ch&uacute;ng t&ocirc;i c&oacute; thể thay đổi, tạm ngừng hoặc dừng vĩnh viễn, to&agrave;n bộ hay một phần, bất kỳ kh&iacute;a cạnh hoặc t&iacute;nh năng n&agrave;o của Dịch vụ m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o cho bạn, bao gồm cả những thay đổi về c&aacute;ch sử dụng v&agrave; c&aacute;c thủ tục truy cập. Bạn thừa nhận v&agrave; đồng &yacute; rằng ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm với bạn hoặc bất kỳ b&ecirc;n thứ ba đối với bất kỳ sự sửa đổi, thay đổi, đ&igrave;nh chỉ hoặc ngừng hoạt động như vậy.</p>

		<p style="text-align:justify">e. Quyền tiến h&agrave;nh nghi&ecirc;n cứu; Sự đồng &yacute;. Bằng c&aacute;ch truy cập v&agrave;o Dịch vụ, bạn đồng &yacute; cho ph&eacute;p ch&uacute;ng t&ocirc;i thu thập v&agrave; sử dụng th&ocirc;ng tin từ bạn v&agrave; trải nghiệm của bạn với Dịch vụ để tiến h&agrave;nh nghi&ecirc;n cứu về Dịch vụ v&agrave; cải thiện sản phẩm v&agrave; trải nghiệm người d&ugrave;ng trong đ&oacute;. Tất cả việc thu thập v&agrave; sử dụng th&ocirc;ng tin như vậy sẽ ph&ugrave; hợp với Ch&iacute;nh s&aacute;ch Bảo mật của ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify"><strong>5. Quyền sở hữu; Sử dụng Giấy ph&eacute;p.</strong></p>

		<p style="text-align:justify">a. Sở hữu. Ch&uacute;ng t&ocirc;i v&agrave; nh&agrave; cấp ph&eacute;p của ch&uacute;ng t&ocirc;i sở hữu v&agrave; duy tr&igrave; tất cả c&aacute;c quyền sở hữu trong Dịch vụ. Dịch vụ c&oacute; thể chứa t&agrave;i liệu c&oacute; bản quyền, thương hiệu v&agrave; th&ocirc;ng tin độc quyền kh&aacute;c của ch&uacute;ng t&ocirc;i v&agrave; b&ecirc;n cấp bản quyền (&ldquo;Nội dung ứng dụng&rdquo;).<br />
		Ngoại trừ Nội dung Ứng dụng thuộc lĩnh vực c&ocirc;ng cộng hoặc cho ph&eacute;p đ&atilde; được cung cấp, bạn kh&ocirc;ng được sao ch&eacute;p, sửa đổi, xuất bản, truyền tải, ph&acirc;n phối, thực hiện, hiển thị hoặc b&aacute;n bất kỳ Nội dung ứng dụng.</p>

		<p style="text-align:justify">b. Sử dụng Giấy ph&eacute;p. Theo c&aacute;c Điều khoản n&agrave;y, ch&uacute;ng t&ocirc;i cấp cho bạn một giấy ph&eacute;p hạn chế, c&oacute; thể thu hồi được, kh&ocirc;ng độc quyền, được thanh to&aacute;n đầy đủ để truy cập Nội dung Ứng dụng v&igrave; mục đ&iacute;ch duy nhất v&agrave; hạn chế nhằm tạo thuận lợi cho việc sử dụng Dịch vụ của bạn.</p>

		<p style="text-align:justify">c. Nội dung của Người d&ugrave;ng. Trong suốt Dịch vụ v&agrave; đặc biệt trong &ldquo;Cửa h&agrave;ng Bot&rdquo;, c&oacute; thể gặp phải nội dung được cung cấp bởi những người d&ugrave;ng kh&aacute;c của Dịch vụ. Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng sử dụng hoặc ph&acirc;n phối bất kỳ nội dung n&agrave;o do bạn tạo nếu kh&ocirc;ng c&oacute; sự cho ph&eacute;p r&otilde; r&agrave;ng của bạn. Nếu bạn chọn gửi nội dung cho Cửa h&agrave;ng Bot, bạn cho ph&eacute;p ch&uacute;ng t&ocirc;i ph&acirc;n phối v&agrave; nh&acirc;n bản nội dung trong cấu tr&uacute;c bot của bạn.</p>

		<p style="text-align:justify">Bạn đại diện, đảm bảo v&agrave; đồng &yacute; rằng bạn sẽ kh&ocirc;ng đ&oacute;ng g&oacute;p Nội dung Người d&ugrave;ng n&agrave;o:</p>

		<p style="text-align:justify">vi phạm hoặc g&acirc;y trở ngại cho bất kỳ bản quyền hoặc nh&atilde;n hiệu của b&ecirc;n kh&aacute;c;<br />
		tiết lộ bất kỳ b&iacute; mật thương mại, trừ khi bạn sở hữu b&iacute; mật thương mại hoặc c&oacute; sự cho ph&eacute;p của chủ sở hữu để tiết lộ n&oacute;;<br />
		vi phạm bất kỳ quyền sở hữu tr&iacute; tuệ của người kh&aacute;c hoặc quyền ri&ecirc;ng tư hoặc quyền c&ocirc;ng khai của người kh&aacute;c;<br />
		l&agrave; phỉ b&aacute;ng, tục tĩu, khi&ecirc;u d&acirc;m, ngược đ&atilde;i, khiếm nh&atilde;, đe dọa, quấy rối, g&acirc;y hận th&ugrave;, x&uacute;c phạm hoặc vi phạm bất kỳ luật ph&aacute;p hoặc quyền của bất kỳ b&ecirc;n thứ ba n&agrave;o;<br />
		c&oacute; thể chứa vi-r&uacute;t, trojan hoặc c&aacute;c chương tr&igrave;nh lập tr&igrave;nh m&aacute;y t&iacute;nh kh&aacute;c hoặc c&ocirc;ng cụ c&oacute; &yacute; định g&acirc;y tổn hại, g&acirc;y phương hại đến, l&eacute;n l&uacute;t đ&aacute;nh chặn hoặc tước đoạt bất kỳ hệ thống, dữ liệu hoặc th&ocirc;ng tin n&agrave;o; hoặc l&agrave;<br />
		vi phạm bất kỳ nguy&ecirc;n tắc nội dung Facebook n&agrave;o.</p>

		<p style="text-align:justify"><strong>6. Chấm dứt.</strong></p>

		<p style="text-align:justify">a. Bởi người d&ugrave;ng. Bạn c&oacute; thể chấm dứt quyền truy cập v&agrave;o Dịch vụ của m&igrave;nh bất kỳ l&uacute;c n&agrave;o, v&igrave; bất kỳ l&yacute; do n&agrave;o, bằng c&aacute;ch ngừng sử dụng Ứng dụng hoặc th&ocirc;ng qua c&aacute;c t&iacute;nh năng của Facebook.</p>

		<p style="text-align:justify">b. Bởi ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i, theo &yacute; ri&ecirc;ng của ch&uacute;ng t&ocirc;i, c&oacute; thể chấm dứt quyền truy cập của bạn v&agrave;o Dịch vụ v&igrave; bất kỳ l&yacute; do n&agrave;o hoặc kh&ocirc;ng c&oacute; l&yacute; do g&igrave;. Ch&uacute;ng t&ocirc;i kh&ocirc;ng bắt buộc phải cung cấp cho bạn th&ocirc;ng b&aacute;o trước khi chấm dứt quyền truy cập v&agrave;o Dịch vụ của bạn. Ch&uacute;ng t&ocirc;i kh&ocirc;ng bắt buộc, v&agrave; c&oacute; thể bị cấm, tiết lộ l&yacute; do chấm dứt t&agrave;i khoản của bạn.</p>

		<p style="text-align:justify"><strong>7. Tuy&ecirc;n bố từ chối tr&aacute;ch nhiệm/Hạn chế.</strong></p>

		<p style="text-align:justify">a. Ch&uacute;ng t&ocirc;i kh&ocirc;ng c&oacute; mối quan hệ đặc biệt với hoặc được ủy th&aacute;c tr&aacute;ch nhiệm với bạn. Bạn thừa nhận rằng ch&uacute;ng t&ocirc;i kh&ocirc;ng c&oacute; quyền kiểm so&aacute;t v&agrave; kh&ocirc;ng c&oacute; nghĩa vụ thực hiện bất kỳ h&agrave;nh động n&agrave;o li&ecirc;n quan đến:</p>

		<p style="text-align:justify">i. Người d&ugrave;ng c&oacute; quyền truy cập Dịch vụ;</p>

		<p style="text-align:justify">ii. Nội dung Ứng dụng bạn truy cập qua Dịch vụ;</p>

		<p style="text-align:justify">iii. Những g&igrave; t&aacute;c động Nội dung Ứng dụng c&oacute; thể c&oacute; đối với bạn hoặc bạn b&egrave; của bạn;</p>

		<p style="text-align:justify">iv. C&aacute;ch bạn hoặc người kh&aacute;c c&oacute; thể giải th&iacute;ch hoặc sử dụng Nội dung Ứng dụng; hoặc l&agrave;</p>

		<p style="text-align:justify">v. H&agrave;nh động của bạn hoặc những người kh&aacute;c c&oacute; thể thực hiện như l&agrave; kết quả của việc đ&atilde; tiếp x&uacute;c với Nội dung Ứng dụng.</p>

		<p style="text-align:justify">b. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm đối với bất kỳ nội dung kh&ocirc;ng ch&iacute;nh x&aacute;c hoặc kh&ocirc;ng ch&iacute;nh x&aacute;c n&agrave;o được đăng qua Dịch vụ, d&ugrave; g&acirc;y ra bởi Người d&ugrave;ng hay bất kỳ thiết bị hoặc chương tr&igrave;nh n&agrave;o li&ecirc;n quan đến hoặc sử dụng trong Dịch vụ.</p>

		<p style="text-align:justify">c. Trong bất kỳ trường hợp n&agrave;o ch&uacute;ng t&ocirc;i hoặc bất kỳ chi nh&aacute;nh, nh&agrave; quảng c&aacute;o, hoặc c&aacute;c đối t&aacute;c ph&acirc;n phối của ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm cho bất kỳ tổn thất hoặc thiệt hại, bao gồm thương t&iacute;ch c&aacute; nh&acirc;n hoặc tử vong, kết quả từ việc sử dụng Dịch vụ, bất kỳ nội dung n&agrave;o được đăng tr&ecirc;n Dịch vụ hoặc được truyền đến Người d&ugrave;ng; bất kỳ tương t&aacute;c n&agrave;o giữa người d&ugrave;ng, d&ugrave; l&agrave; trực tuyến hay ngoại tuyến.</p>

		<p style="text-align:justify"><strong>8. Li&ecirc;n kết của b&ecirc;n thứ ba.</strong></p>

		<p style="text-align:justify">Bạn c&oacute; thể được cung cấp li&ecirc;n kết tới c&aacute;c trang web hoặc t&agrave;i nguy&ecirc;n kh&aacute;c th&ocirc;ng qua Dịch vụ. Bởi v&igrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng kiểm so&aacute;t c&aacute;c trang web v&agrave; t&agrave;i nguy&ecirc;n như vậy, bạn thừa nhận v&agrave; đồng &yacute; rằng ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu tr&aacute;ch nhiệm cho sự sẵn c&oacute; của b&ecirc;n ngo&agrave;i trang web hoặc t&agrave;i nguy&ecirc;n v&agrave; kh&ocirc;ng x&aacute;c nhận, kh&ocirc;ng chịu tr&aacute;ch nhiệm về bất kỳ nội dung, quảng c&aacute;o, sản phẩm hoặc c&aacute;c t&agrave;i liệu kh&aacute;c tr&ecirc;n hoặc c&oacute; sẵn từ c&aacute;c trang web hoặc t&agrave;i nguy&ecirc;n đ&oacute;. Bạn thừa nhận v&agrave; đồng &yacute; rằng ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm ph&aacute;p l&yacute;, trực tiếp hoặc gi&aacute;n tiếp, đối với bất kỳ thiệt hại g&acirc;y ra hoặc bị c&aacute;o buộc g&acirc;y ra bởi hoặc li&ecirc;n quan đến việc sử dụng, hoặc dựa tr&ecirc;n bất kỳ nội dung, h&agrave;ng ho&aacute; hoặc dịch vụ n&agrave;o c&oacute; tr&ecirc;n hoặc th&ocirc;ng qua bất kỳ trang web hoặc t&agrave;i nguy&ecirc;n như vậy.</p>

		<p style="text-align:justify"><strong>9. Thẩm quyền v&agrave; Lựa chọn Luật.</strong></p>

		<p style="text-align:justify">Nếu c&oacute; bất kỳ tranh chấp n&agrave;o ph&aacute;t sinh từ Dịch vụ, bằng c&aacute;ch sử dụng Dịch vụ bạn đồng &yacute; r&otilde; r&agrave;ng rằng bất kỳ tranh chấp n&agrave;o sẽ được điều chỉnh bởi luật ph&aacute;p, kh&ocirc;ng phụ thuộc v&agrave;o c&aacute;c điều khoản xung đột của luật ph&aacute;p để giải quyết bất kỳ tranh chấp n&agrave;o.</p>

		<p style="text-align:justify"><strong>10. Bồi thường bởi Bạn.</strong></p>

		<p style="text-align:justify">Bạn đồng &yacute; bồi thường v&agrave; giữ cho ch&uacute;ng t&ocirc;i, c&ocirc;ng ty con, c&aacute;c chi nh&aacute;nh, c&aacute;n bộ, nh&acirc;n vi&ecirc;n v&agrave; c&aacute;c đối t&aacute;c kh&aacute;c của ch&uacute;ng t&ocirc;i (bao gồm cả Facebook) v&agrave; người lao động, v&ocirc; hại từ bất kỳ tổn thất, tr&aacute;ch nhiệm ph&aacute;p l&yacute;, khiếu nại, hoặc theo y&ecirc;u cầu, bao gồm cả ph&iacute; luật sư hợp l&yacute;, của bất kỳ b&ecirc;n thứ ba n&agrave;o do hoặc ph&aacute;t sinh từ việc bạn sử dụng Dịch vụ vi phạm c&aacute;c Điều khoản n&agrave;y v&agrave;/hoặc ph&aacute;t sinh từ việc vi phạm c&aacute;c Điều khoản n&agrave;y v&agrave;/hoặc bất kỳ vi phạm n&agrave;o đối với c&aacute;c tuy&ecirc;n bố v&agrave; bảo đảm của bạn n&ecirc;u tr&ecirc;n.</p>

		<p style="text-align:justify"><strong>11. Tổng hợp.</strong></p>

		<p style="text-align:justify">a. To&agrave;n bộ thỏa thuận. C&aacute;c Điều khoản n&agrave;y chứa to&agrave;n bộ thoả thuận giữa bạn v&agrave; ch&uacute;ng t&ocirc;i về việc sử dụng Dịch vụ.</p>

		<p style="text-align:justify">b. T&iacute;nh khả thi. Nếu bất kỳ quy định n&agrave;o của c&aacute;c Điều khoản n&agrave;y được coi l&agrave; kh&ocirc;ng hợp lệ, bất hợp ph&aacute;p hoặc kh&ocirc;ng thể thi h&agrave;nh ở mọi kh&iacute;a cạnh, điều khoản đ&oacute; sẽ bị hạn chế hoặc loại bỏ ở mức tối thiểu cần thiết để c&aacute;c Điều khoản n&agrave;y c&oacute; hiệu lực.</p>

		<p style="text-align:justify">c. Sự tồn tại. Ngay cả sau khi bạn chấm dứt quyền truy cập Dịch vụ của m&igrave;nh, hoặc việc sử dụng Dịch vụ của bạn chấm dứt th&igrave; c&aacute;c Điều khoản n&agrave;y sẽ vẫn c&oacute; hiệu lực. Tất cả c&aacute;c điều khoản do bản chất của ch&uacute;ng c&oacute; thể c&oacute; hiệu lực sau khi chấm dứt c&aacute;c Điều khoản n&agrave;y sẽ được coi l&agrave; vẫn c&ograve;n hiệu lực.</p>

		<p style="text-align:justify">d. Từ bỏ. Việc ch&uacute;ng t&ocirc;i kh&ocirc;ng thi h&agrave;nh bất kỳ phần n&agrave;o của c&aacute;c Điều khoản n&agrave;y sẽ kh&ocirc;ng cấu th&agrave;nh sự từ bỏ quyền của ch&uacute;ng t&ocirc;i để thi h&agrave;nh sau đ&oacute; hoặc bất kỳ phần n&agrave;o kh&aacute;c của Điều khoản n&agrave;y. Từ bỏ sự tu&acirc;n thủ trong bất kỳ trường hợp cụ thể n&agrave;o kh&ocirc;ng c&oacute; nghĩa l&agrave; ch&uacute;ng t&ocirc;i sẽ l&agrave;m như vậy trong tương lai. Để bất kỳ sự khước từ tu&acirc;n thủ c&aacute;c Điều khoản n&agrave;y l&agrave; bắt buộc, ch&uacute;ng t&ocirc;i phải cung cấp cho bạn th&ocirc;ng b&aacute;o bằng văn bản về việc từ bỏ đ&oacute;, được cung cấp bởi một trong những đại diện được ủy quyền của ch&uacute;ng t&ocirc;i.</p>

		<p style="text-align:justify">e. Ti&ecirc;u đề. Phần v&agrave; ti&ecirc;u đề trong c&aacute;c Điều khoản n&agrave;y chỉ nhằm mục đ&iacute;ch tiện lợi v&agrave; sẽ kh&ocirc;ng ảnh hưởng đến việc giải th&iacute;ch c&aacute;c Điều khoản n&agrave;y.</p>

		<p style="text-align:justify">f. Kh&ocirc;ng c&oacute; người thụ hưởng b&ecirc;n thứ ba. Bạn đồng &yacute; rằng, trừ khi được quy định r&otilde; r&agrave;ng trong c&aacute;c Điều khoản n&agrave;y, sẽ kh&ocirc;ng c&oacute; người thụ hưởng b&ecirc;n thứ ba.</p>

		<p style="text-align:justify">g. Mối quan hệ giữa c&aacute;c B&ecirc;n. Bạn v&agrave; ch&uacute;ng t&ocirc;i l&agrave; c&aacute;c tổ chức/c&aacute; nh&acirc;n độc lập v&agrave; kh&ocirc;ng c&oacute; quan hệ đại l&yacute;, li&ecirc;n danh, người sử dụng lao động hoặc mối quan hệ nhượng quyền được tạo ra bởi c&aacute;c Điều khoản n&agrave;y.</p>


	</div>
</div>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>