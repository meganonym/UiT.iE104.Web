<?php
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách danh mục sản phẩm


function lay_loaisanpham($ketnoi)
{
    //SQL
    $sql = "SELECT * FROM danhmuc_sanpham WHERE trangthai = 1 ORDER BY danhmuc_sanpham_id ASC";
    //SELECT * FROM danhmuc_sanpham WHERE trangthai = 1 ORDER BY danhmuc_sanpham_id ASC
  
    //Return
    return mysqli_query($ketnoi, $sql);
}


/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt

function lay_dmsp_cosp_hh($ketnoi)
{
    //SQL
    $sql = "SELECT DISTINCT `sanpham`.`danhmuc_sanpham_id`, `danhmuc_sanpham`.`ten_danhmuc_sanpham`  FROM `sanpham` LEFT JOIN `danhmuc_sanpham` ON `sanpham`.`danhmuc_sanpham_id` = `danhmuc_sanpham`.`danhmuc_sanpham_id`WHERE `sanpham`.`trangthai` = '1'";
    
    return mysqli_query($ketnoi, $sql);
}
function lay_logo_dmsp_cosp_hh($ketnoi)
{
    //SQL
    $sql = "SELECT DISTINCT `sanpham`.`danhmuc_sanpham_id`, `danhmuc_sanpham`.`logo` FROM `sanpham` LEFT JOIN `danhmuc_sanpham` ON `sanpham`.`danhmuc_sanpham_id` = `danhmuc_sanpham`.`danhmuc_sanpham_id`WHERE `sanpham`.`trangthai` = '1'";
    
    return mysqli_query($ketnoi, $sql);
}

//hàm lấy banner
function lay_banner($ketnoi, $danhmuc_sanpham_id){
    $sql = "SELECT danhmuc_sanpham.banner FROM danhmuc_sanpham WHERE danhmuc_sanpham.danhmuc_sanpham_id = $danhmuc_sanpham_id";
    
    $banner = mysqli_fetch_assoc(mysqli_query($ketnoi, $sql));
    
    
    return $banner['banner'];
    
}
?>
