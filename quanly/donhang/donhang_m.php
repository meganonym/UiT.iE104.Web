<?php

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách gio hang de xu ly

function lay_danhsach_donhang_t($ketnoi)
{
	//SQL
	$sql = "SELECT * FROM giohang WHERE dathang = 1 AND ( lienlac = 0 OR xuly = 0 ) ORDER BY ngaytao DESC";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}

function lay_danhsach_donhang_s($ketnoi,$batdau, $gioihan)
{
	//SQL
	$sql = "SELECT * FROM giohang WHERE dathang = 1 AND ( lienlac = 0 OR xuly = 0 ) ORDER BY ngaytao DESC LIMIT $batdau, $gioihan";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách gio hang đã xu ly

function lay_danhsach_donhang_done_t($ketnoi)
{
	//SQL
	$sql = "SELECT * FROM giohang  WHERE dathang = 1  AND xuly = 1 ORDER BY ngaytao DESC";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}

function lay_danhsach_donhang_done_s($ketnoi,$batdau, $gioihan)
{
	//SQL
	$sql = "SELECT * FROM giohang  WHERE dathang = 1  AND xuly = 1 ORDER BY ngaytao DESC LIMIT $batdau, $gioihan";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy thông tin gio hang de xu ly
function lay_thongtin_donhang($giohang_id, $ketnoi)
{
	//SQL
	$sql = "SELECT * FROM giohang  WHERE giohang_id = $giohang_id";
	
    // truy vấn
    $truyvan = mysqli_query($ketnoi, $sql);
    
    
	//Return
	return mysqli_fetch_assoc($truyvan);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy thông tin chi tiết  gio hang de xu ly
function lay_chitiet_donhang($giohang_id, $ketnoi)
{
    //SQL
	$sql = "SELECT `giohang_chitiet`.*, `sanpham`.* FROM `giohang_chitiet`  LEFT JOIN `sanpham` ON `giohang_chitiet`.`sanpham_id` = `sanpham`.`sanpham_id` WHERE giohang_chitiet.giohang_id = $giohang_id";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy xử lý đơn hàng

function xuly_donhang($data, $giohang_id, $ketnoi) 
{
    //SQL
    $sql = "UPDATE giohang SET lienlac = '{$data['lienlac']}', xuly = {$data['xuly']} WHERE giohang_id = $giohang_id ";
    
    //echo $sql;

    //Return
    return mysqli_query($ketnoi, $sql);
}


