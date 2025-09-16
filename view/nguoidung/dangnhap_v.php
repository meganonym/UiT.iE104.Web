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
			<a href="<?php echo SITE_URL; ?>" ><img src="<?php echo SITE_URL.'view/giaodien/hinhanh/logo4.png' ; ?>" alt="logo" style="width: 100%; border: #C4A01C solid ; width: 100%;"></a>
			<div class="rg-lg-link">
				<label class="rg-lg-link-left"><h3 align="center" style=" color: #C4A01C"><b>ĐĂNG NHẬP</b></h3></label>
				<a  href="<?php echo SITE_URL.'view/nguoidung/dangky.php' ; ?>" class="rg-lg-link-right">Đăng ký</a>
			</div>
			<form class="rg-lg-frm" method="POST" action="">
				 <?php if (isset($error) && $error == true): ?> 
					<p style="color: red;display: none;">Sai Email hoặc Mật khẩu!</p>
				<?php endif; ?> 
				<div class="lg-input">
					<input type="email" name="email" placeholder="Email đăng nhập" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
					<input type="password" name="matkhau" placeholder="Mật khẩu">
				</div>
				<div class="rg-input">
					<?php echo isset($error['email']) ? $error['email'] : ''; ?>
					<?php echo isset($error['matkhau']) ? $error['matkhau'] : ''; ?>
					<?php echo isset($trangthai) ? $trangthai : ''; ?>
				</div>
				<div class="rg-lg-btn">
					<a class="rg-lg-btn-left" href="<?php echo SITE_URL; ?>" >Về trang chủ</a>
					<button class="rg-lg-btn-right" type="submit">Đăng nhập</button>
				</div>
			</form>
		</div>
		
	</body>
</html>   