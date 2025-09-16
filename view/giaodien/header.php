<!DOCTYPE html>
<html lang="vi-VN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "stylesheet"  type = "text/css"   href = "<?php echo SITE_URL.'/view/giaodien/style.css' ; ?>" />
	<title>Baron Watch - Đồng hồ đeo tay chính hãng - Đồ án 3</title>
</head>
<body>
	<header> 
		<ul class="navibar" style="background: #FDFDFD ;">
			<li class="navi-item">
				<a href="<?php echo SITE_URL; ?>" title="LOGO"><img style="   height: 50px;" src="<?php echo SITE_URL.'/view/giaodien/hinhanh/logo5.png'; ?>" alt="LOGO"></a>
			</li>
			<li class="navi-item admin-name">
				<form class="hd-search-frm" action="<?php echo SITE_URL.'view/info/timkiem.php' ; ?>" method="GET">
					<input type="text" placeholder="Tìm sản phẩm ..." name="timkiem">
					<button type="submit" ><i class="fa fa-search"></i></button>
				</form>
			</li>
		</ul>

    </header>
