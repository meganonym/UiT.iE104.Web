<?php

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy tìm người dùng có giỏ hàng hay chưa
function giohang_theo_nguoidung_id($nguoidung_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM giohang WHERE nguoidung_id = $nguoidung_id AND dathang = 0";
    
    //truy vấn cơ sở dữ liệu
    $truyvan = mysqli_query($ketnoi, $sql);

    //Return
    return mysqli_fetch_assoc($truyvan);
    //return mysqli_query($ketnoi, $sql);
}


/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm thêm mới giỏ hàng

function them_giohang($data_giohang, $ketnoi){
    
    //SQL
    $sql = "INSERT INTO giohang (nguoidung_id, dathang, lienlac, xuly, ngaytao) VALUES ({$data_giohang['nguoidung_id']}, '0', '0', '0', '{$data_giohang['ngaytao']}')";
    
    //echo $sql;

    //Return
    return mysqli_query($ketnoi, $sql);
    
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm thêm mới sản phẩm vào giỏ hàng với giỏ hàng ID
function them_giohang_sanpham($giohang_id, $data_giohang, $ketnoi){
	
	//SQL
    $sql = "INSERT INTO giohang_chitiet(giohang_id, sanpham_id, soluong ) VALUES ($giohang_id, '{$data_giohang['sanpham_id']}', '{$data_giohang['soluong']}')";
    
    //echo $sql;

    //Return
    return mysqli_query($ketnoi, $sql);
	
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy thông tin giỏ hàng theo ID chưa được xử lý == đơn hàng chưa xử lý

function giohang_theo_id($giohang_id, $ketnoi)
{
    //SQL
    $sql = "SELECT giohang.giohang_id, giohang.lienlac, giohang_chitiet.sanpham_id, giohang_chitiet.soluong, sanpham.ten_sanpham, sanpham.hinh, sanpham.gia, sanpham.chitiet FROM giohang LEFT JOIN giohang_chitiet ON giohang_chitiet.giohang_id = giohang.giohang_id LEFT JOIN sanpham ON giohang_chitiet.sanpham_id = sanpham.sanpham_id WHERE giohang.giohang_id = $giohang_id AND giohang.dathang =0";
    
    //Return
    return mysqli_query($ketnoi, $sql);
    
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy thông tin giỏ hàng theo ID chưa được xử lý == đơn hàng chưa xử lý

function xoa_sanpham_trong_giohang($giohang_id, $sanpham_id, $ketnoi)
{
    //SQL
    $sql = "DELETE FROM giohang_chitiet WHERE sanpham_id = $sanpham_id AND giohang_id = $giohang_id";

    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm kiểm tra sản phẩm có trong giỏ hàng chưa?

function kiemtra_sptontai_trong_giohang($giohang_id, $sanpham_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM `giohang_chitiet` WHERE sanpham_id = $sanpham_id AND giohang_id = $giohang_id";
    
    
    //truy vấn cơ sở dữ liệu
    $truyvan = mysqli_query($ketnoi, $sql);
    
    
    //Return
    return mysqli_fetch_assoc($truyvan);
    
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm kiểm tra sản phẩm có trong giỏ hàng chưa?

function them_soluong_vao_sptronggio($giohang_id, $sanpham_id, $soluong, $ketnoi)
{
    $sql = "UPDATE giohang_chitiet SET soluong = $soluong WHERE sanpham_id = $sanpham_id AND giohang_id = $giohang_id";
    
    //Return
    return mysqli_query($ketnoi, $sql);
    
    
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm đếm số loại sản phẩm trong giỏ hàng
function dem_sanpham_trong_giohang($giohang_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM `giohang_chitiet` WHERE giohang_id = $giohang_id";
    
    
    //truy vấn cơ sở dữ liệu
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $soloai_sanpham = mysqli_num_rows($truyvan);
        
    //Return
    return $soloai_sanpham;
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm gủi đơn hàng đến shop

function dathang($giohang_id, $ketnoi)
{
    $sql = "UPDATE giohang SET dathang = 1 WHERE giohang_id = $giohang_id";
    
    //Return
    return mysqli_query($ketnoi, $sql);
    
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm xóa giỏ hàng 

function xoa_giohang($giohang_id, $ketnoi)
{
    $sql = "DELETE FROM giohang WHERE giohang_id = $giohang_id AND dathang =0 AND lienlac =0 AND xuly =0";
    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy lịch sử đặt hàng
function lichsu_dathang($nguoidung_id, $limit , $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM giohang WHERE nguoidung_id = $nguoidung_id AND dathang = 1 LIMIT 0, $limit";
    

    //Return
    return mysqli_query($ketnoi, $sql);
}

// Hàm lấy thông tin giỏ hàng theo ID đã đặt hàng

function giohang_theo_id_ls($giohang_id, $ketnoi)
{
    //SQL
    $sql = "SELECT giohang.giohang_id, giohang.lienlac, giohang_chitiet.sanpham_id, giohang_chitiet.soluong, sanpham.ten_sanpham, sanpham.hinh, sanpham.gia, sanpham.chitiet FROM giohang LEFT JOIN giohang_chitiet ON giohang_chitiet.giohang_id = giohang.giohang_id LEFT JOIN sanpham ON giohang_chitiet.sanpham_id = sanpham.sanpham_id WHERE giohang.giohang_id = $giohang_id AND giohang.dathang =1";
    
    //Return
    return mysqli_query($ketnoi, $sql);
    
}



?>