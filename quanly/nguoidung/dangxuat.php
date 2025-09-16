<?php
//Khởi động session
session_start();

//Hủy toàn bộ session
session_destroy();

//Quay về trang chủ
header('location:../../index.php');
?>