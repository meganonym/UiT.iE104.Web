<?php
//Khởi động session
session_start();


if(!isset($_SESSION['nhom_nguoidung_id'])){
	header('location:../../index.php');
}
?>