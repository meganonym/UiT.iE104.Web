<!DOCTYPE html>
<html lang="vi-VN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "stylesheet"  type = "text/css"   href = "<?php echo SITE_URL.'view/giaodien/style.css';?>" />
	<title>Trang quản trị - Baron Watch - Đồng hồ đeo tay chính hãng - Đồ án 3</title>
</head>
    <body>
    

 	<div class="rg-lg">
		<a  href="<?php echo SITE_URL ; ?>"><img src="<?php echo SITE_URL.'view/giaodien/hinhanh/logo4.png' ;?>" alt="logo" style="width: 100%;"></a>
		<div class="rg-lg-link">
			<label class="rg-lg-link-left">Đăng nhập - Quản trị</label>
			<a  href="<?php echo SITE_URL ; ?>" class="rg-lg-link-right">Về trang chủ</a>
		</div>
		<form class="rg-lg-frm" method="POST" action="">

        <?php if (isset($error) && $error == true): ?>
            <p style="color: red;display: none;">Sai Email hoặc Mật khẩu!</p>
        <?php endif; ?>

        <div class="pf-info-detail">
             <input type="email" name="email" placeholder="Email đăng nhập" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
        
             <input type="password" name="matkhau" placeholder="Mật khẩu">

        </div>
            <div class="rg-input">
                <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                <?php echo isset($error['matkhau']) ? $error['matkhau'] : ''; ?>
                <?php echo isset($trangthai) ? $trangthai : ''; ?>
            </div>
        <div class="checkout-btn" align="center">
                <button type="submit" class="rg-lg-btn-right">ĐĂNG NHẬP</button>
        </div>
    </form>
</div>
</body>
</html>   

