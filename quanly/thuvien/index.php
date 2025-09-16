<?php

//Khởi động session
session_start();

/*
 * Kiểm tra nếu đã đăng nhập bằng tài khoản quản lý thì quay về trang chủ quản trị
 * nếu đăng nhập bằng tài khoản khác hoặc chưa đăng nhập thì quay về trang chủ view
 */

if (!isset($_SESSION['nhom_nguoidung_id'])) {
    header('location:../view/index.php');
}
else{
    if($_SESSION['nhom_nguoidung_id']<3){
		echo ' Hello ' ; echo $_SESSION['hovaten'] ;
        echo '<p style="color: green;"> Chúc bạn một ngày tốt lành</p>';
    }
	else{
		header('location:../view/index.php');
	}
}
 
require '../../cauhinh/cauhinh.php'


?>

<!-- Header -->
<?php require  '../../view/giaodien/header.php'; ?>
<!-- Header -->
<?php require '../giaodien/menuadmin.php';?>

<div align="center" style="padding-top:30px">
	<img alt="Quản lý Website" src="../../thuvien/ql.png" width="900" height="auto">
</div>
</body>
</html>
