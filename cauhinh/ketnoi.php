<?php
//Kết nối với database 
$ketnoi = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die('Không kết nối được với database !');

//Lưu trữ và đọc lên theo mã hóa UTF8 - Tiếng Việt
mysqli_set_charset($ketnoi, 'UTF8');

?>