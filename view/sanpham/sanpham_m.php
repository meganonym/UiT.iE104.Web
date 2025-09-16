<?php
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy n sản phẩm mới nhất

function lay_sanpham_moinhat($limit, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM sanpham ORDER BY sanpham_id DESC LIMIT 0, $limit";

    //Return
    return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy n sản phẩm ngẫu nhiên

function lay_sanpham_ngaunhien($limit, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT $limit";
    
    //echo $sql;
    //Return
    return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy tất cả  sản phẩm hiện hoạt 
function lay_danhsach_sanpham_t($danhmuc_sanpham_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM sanpham WHERE trangthai = 1";
    
    //Nếu lấy sản phẩm theo danh mục
    if ($danhmuc_sanpham_id !== null) {
        $sql .= " AND danhmuc_sanpham_id = $danhmuc_sanpham_id";
    }
    
    //Sắp xếp
    $sql .= " ORDER BY sanpham_id ASC";
    
    //Return
    return mysqli_query($ketnoi, $sql);
}

function lay_danhsach_sanpham_s($danhmuc_sanpham_id,$ketnoi,$batdau, $gioihan)
{
    //SQL
    $sql = "SELECT * FROM sanpham WHERE trangthai = 1 ";
    
    //Nếu lấy sản phẩm theo danh mục
    if ($danhmuc_sanpham_id !== null) {
        $sql .= " AND danhmuc_sanpham_id = $danhmuc_sanpham_id";
    }
    
    //Sắp xếp
    $sql .= " ORDER BY sanpham_id ASC LIMIT $batdau, $gioihan";
    
    //Return
    return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy sản phẩm thep
function lay_sanpham_theo_id($sanpham_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM sanpham WHERE trangthai = 1 AND sanpham_id = $sanpham_id ";

    //truy vấn cơ sở dữ liệu
    $truyvan = mysqli_query($ketnoi, $sql);

    //Return
    return mysqli_fetch_assoc($truyvan);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy sản phẩm cùng loại
function lay_sanpham_theo_danhmuc($limit, $danhmuc_sanpham_id, $sanpham_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM sanpham WHERE danhmuc_sanpham_id = $danhmuc_sanpham_id AND trangthai = 1 AND sanpham_id != $sanpham_id  ORDER BY sanpham_id DESC LIMIT 0, $limit";

    //Return
    return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy URL hiện hành

function getCurURL()
{
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "https://";
    } else {
      $pageURL = 'http://';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
    }

?>