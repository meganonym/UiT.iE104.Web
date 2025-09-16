<?php

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách danh mục sản phẩm

function lay_loaisanpham_t($ketnoi)
{
    //SQL
    $sql = "SELECT * FROM danhmuc_sanpham  ORDER BY danhmuc_sanpham_id DESC";
  
    //Return
    return mysqli_query($ketnoi, $sql);
}

function lay_loaisanpham_s($ketnoi,$batdau, $gioihan)
{
    //SQL
    $sql = "SELECT * FROM danhmuc_sanpham  ORDER BY danhmuc_sanpham_id DESC LIMIT $batdau, $gioihan";
  
    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm thêm danh mục sản phẩm


function them_loaisanpham($data, $ketnoi)
{
    //SQL
    $sql = "INSERT INTO `danhmuc_sanpham`(`ten_danhmuc_sanpham`, `trangthai`,`logo`,`banner`) VALUES ('{$data['ten_danhmuc_sanpham']}','{$data['trangthai']}','{$data['logo']}','{$data['banner']}')";
  
    
    //echo $sql;
  
    //Return
    return mysqli_query($ketnoi, $sql);
}
// kiểm tra tồn tại bằng tên
function kiemtra_tontai_loaisanpham($ketnoi, $ten_danhmuc_sanpham) 
{
    $sql = "SELECT * FROM danhmuc_sanpham WHERE ten_danhmuc_sanpham='$ten_danhmuc_sanpham'";
    //echo $sql;
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $ten_danhmuc_sanpham_check =  mysqli_num_rows($truyvan);
    
    return ($ten_danhmuc_sanpham_check > 0)? TRUE : FALSE ;
}
// kiểm tra tồn tại bằng id
function kiemtra_tontai_loaisanpham_id($ketnoi, $danhmuc_sanpham_id) 
{
    $sql = "SELECT * FROM danhmuc_sanpham WHERE danhmuc_sanpham_id='$danhmuc_sanpham_id'";
    //echo $sql;
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $id_danhmuc_sanpham_check =  mysqli_num_rows($truyvan);
    
    return ($id_danhmuc_sanpham_check > 0)? TRUE : FALSE ;
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm sửa danh mục sản phẩm
function lay_danhmuc_theo_id($danhmuc_sanpham_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM danhmuc_sanpham WHERE danhmuc_sanpham_id = $danhmuc_sanpham_id";

    //lệnh truy vấn
    $truyvan = mysqli_query($ketnoi, $sql);

    //Return
    return mysqli_fetch_assoc($truyvan);
}

function sua_loaisanpham($data, $danhmuc_sanpham_id, $ketnoi)
{
    //SQL
    $sql = "UPDATE danhmuc_sanpham SET  trangthai = {$data['trangthai']} ";
    
    if($data['ten_danhmuc_sanpham']!=NULL){
		$sql .=", ten_danhmuc_sanpham = '{$data['ten_danhmuc_sanpham']}'";
	}
    if($data['logo']!=NULL){
		$sql .=", logo = '{$data['logo']}'";
	}
    if($data['banner']!=NULL){
		$sql .=", banner = '{$data['banner']}'";
	}
	
	//Điều kiện
    $sql .= " WHERE danhmuc_sanpham_id = $danhmuc_sanpham_id ";

    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm xóa danh mục sản phẩm
function xoa_loaisanpham($danhmuc_sanpham_id, $ketnoi)
{
    //SQL
    $sql = "DELETE FROM danhmuc_sanpham WHERE danhmuc_sanpham_id = $danhmuc_sanpham_id";
    
    //Return
    return mysqli_query($ketnoi, $sql);
}


/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh mục sản phẩm hiện hoạt tức trạng thái =1
function lay_danhmuc_hienhoat($ketnoi)
{
    //SQL
    $sql = "SELECT * FROM danhmuc_sanpham WHERE trangthai = 1 ORDER BY danhmuc_sanpham_id ASC";
    
    //Return
    return mysqli_query($ketnoi, $sql);
}

function lay_tendanhmuc ($ketnoi, $danhmuc_sanpham_id){
	$sql = "SELECT ten_danhmuc_sanpham FROM danhmuc_sanpham WHERE danhmuc_sanpham_id = $danhmuc_sanpham_id";
	$ten_danhmuc = mysqli_fetch_row(mysqli_query($ketnoi, $sql));
	return $ten_danhmuc[0];
}

// Hàm lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt

function lay_dmsp_cosp_hh($ketnoi)
{
    //SQL
    $sql = "SELECT DISTINCT `sanpham`.`danhmuc_sanpham_id` , `danhmuc_sanpham`.`ten_danhmuc_sanpham` FROM `sanpham` LEFT JOIN `danhmuc_sanpham` ON `sanpham`.`danhmuc_sanpham_id` = `danhmuc_sanpham`.`danhmuc_sanpham_id` WHERE `sanpham`.`trangthai` = '1'";
    
    return mysqli_query($ketnoi, $sql);
}

?>
