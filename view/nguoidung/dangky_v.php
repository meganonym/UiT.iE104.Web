<!DOCTYPE html>
<html lang="vi-VN">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel = "stylesheet"  type = "text/css"   href = "<?php echo SITE_URL.'view/giaodien/style.css' ; ?>" />
		<title>Baron Watch - Đồng hồ đeo tay chính hãng - Đồ án 3</title>
	</head>
	<body>
		
		<div class="rg-lg">
			<a href="<?php echo SITE_URL; ?>" ><img src="<?php echo SITE_URL.'view/giaodien/hinhanh/logo4.png' ; ?>" alt="logo" style="width: 100%; border: #C4A01C solid ;"></a>
			<div class="rg-lg-link">
				<label class="rg-lg-link-left"><h3 align="center" style=" color: #C4A01C"><b>ĐĂNG KÝ</b></h3></label>
				<a href="<?php echo SITE_URL.'view/nguoidung/dangnhap.php' ; ?>" class="rg-lg-link-right">Đăng nhập</a>
			</div>
			<form action="" method="post" name="" class="rg-lg-frm" >
				<div class="rg-input">
					<input type="text" name="hovaten" placeholder="Họ và tên" value="<?php echo isset($data['hovaten']) ? $data['hovaten'] : ''; ?>">
					<input type="email" name="email" required placeholder="Email đăng nhập" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
					<input type="tel" name="dienthoai" required placeholder="Số điện thoại" value="<?php echo isset($data['dienthoai']) ? $data['dienthoai'] : ''; ?>">
					<input type="password" name="matkhau" required placeholder="Mật khẩu">
					<input type="password" name="nhaplaimatkhau"required  placeholder="Xác nhận mật khẩu">
					<input checked type="radio" name="gioitinh" value="nam" style="width: initial;margin: 0px 4px 0px 3px;">Nam
					<input type="radio" name="gioitinh" value="nu"style="width: initial;margin: 0px 4px 0px 8px;">Nữ
					<input type="text" name="diachi" placeholder="Địa chỉ" value="<?php echo isset($data['diachi']) ? $data['diachi'] : ''; ?>">
				</div>
				<p>&nbsp;</p>
				<div class="rg-input">
					<?php if(isset($error['hovaten'])){ echo $error['hovaten'];unset($error['hovaten']) ;}  ?>
					<?php if(isset($error['email'])){ echo $error['email'];unset($error['email']) ;}  ?>
					<?php if(isset($error['matkhau'])){ echo $error['matkhau'];unset($error['matkhau']) ;}  ?>
					<?php if(isset($error['dienthoai'])){ echo $error['dienthoai'];unset($error['dienthoai']) ;}  ?>
					<?php if(isset($trangthai)){ echo $trangthai;unset($trangthai) ;}  ?>
				</div>
				<p>&nbsp;</p>
				<label>Bằng việc đăng ký, bạn đã đồng ý về <a href="<?php echo SITE_URL . 'view/info/baomat.php'; ?>">Điều khoản dịch vụ và Chính sách bảo mật</a> của chúng tôi</label>
				<div class="rg-lg-btn">
					<a class="rg-lg-btn-left" href="<?php echo SITE_URL; ?>" >Về trang chủ</a>
					<button class="rg-lg-btn-right" type="submit">Đăng ký</button>
				</div>
			</form>
		</div>

	</body>
</html>