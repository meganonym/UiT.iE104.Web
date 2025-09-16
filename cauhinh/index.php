<?php
//Khởi động session
session_start();


if(!isset($_SESSION['nhom_nguoidung_id']) || $_SESSION['nhom_nguoidung_id']>2){
	header('location:../index.php');
}
?>