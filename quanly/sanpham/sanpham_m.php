<?php
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách sản phẩm

//function lay_danhsach_sanpham_t($ketnoi)
//{
//    //SQL
//    $sql = "SELECT * FROM sanpham ORDER BY sanpham_id DESC ";
//    
//    //Return
//    return mysqli_query($ketnoi, $sql);
//}
//
//function lay_danhsach_sanpham_s($ketnoi, $batdau, $gioihan)
//{
//    //SQL
//    $sql = "SELECT * FROM sanpham ORDER BY sanpham_id DESC LIMIT $batdau, $gioihan";
//    
//    //Return
//    return mysqli_query($ketnoi, $sql);
//}
// Hàm lấy tất cả  sản phẩm 
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
    $sql .= " ORDER BY sanpham_id DESC";
    
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
    $sql .= " ORDER BY sanpham_id DESC LIMIT $batdau, $gioihan";
    
    //Return
    return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm thêm sản phẩm
function them_sanpham($data, $ketnoi)
{
    //SQL
    $sql = "INSERT INTO sanpham (danhmuc_sanpham_id, ten_sanpham, gia, chitiet, hinh, trangthai) VALUES ({$data['danhmuc_sanpham_id']}, '{$data['ten_sanpham']}', '{$data['gia']}', '{$data['chitiet']}', '{$data['hinh']}', '{$data['trangthai']}')";
    
	//echo $sql;

    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm kiểm tra tồn tại tên sản phẩm
function kiemtra_tontai_tensanpham($ketnoi, $ten_sanpham) 
{
    $sql = "SELECT * FROM sanpham WHERE ten_sanpham='$ten_sanpham'";
    //echo $sql;
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $ten_sanpham_check =  mysqli_num_rows($truyvan);
    
    return ($ten_sanpham_check > 0)? TRUE : FALSE ;
}
// Hàm kiểm tra tồn tại ID sản phẩm
function kiemtra_tontai_sanpham_id($ketnoi, $sanpham_id) 
{
    $sql = "SELECT * FROM sanpham WHERE sanpham_id='$sanpham_id'";
    //echo $sql;
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $sanpham_id_check =  mysqli_num_rows($truyvan);
    
    return ($sanpham_id_check > 0)? TRUE : FALSE ;
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm sửa sản phẩm

function lay_sanpham_theo_id($sanpham_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM sanpham WHERE sanpham_id = $sanpham_id";

    //Query
    $query = mysqli_query($ketnoi, $sql);

    //Return
    return mysqli_fetch_assoc($query);
}

function sua_sanpham($data, $sanpham_id, $ketnoi)
{
    //SQL
    $sql = "UPDATE sanpham SET danhmuc_sanpham_id = '{$data['danhmuc_sanpham_id']}'";
	
	
//	//Nếu có cập nhật danh mục sản phẩm
//    if ($data['danhmuc_sanpham_id'] != null) {
//        $sql .= ", danhmuc_sanpham_id = '{$data['danhmuc_sanpham_id']}'";
//    }
	
	//Nếu có cập nhật tên sản phẩm
    if ($data['ten_sanpham'] != null) {
        $sql .= ", ten_sanpham = '{$data['ten_sanpham']}'";
    }
	
	//Nếu có cập nhật giá
    if ($data['gia'] != null) {
        $sql .= ", gia = '{$data['gia']}'";
    }
	
	//Nếu có cập nhật chi tiết
    if ($data['chitiet'] != null) {
        $sql .= ", chitiet = '{$data['chitiet']}'";
    }
	
	//Nếu có cập nhật trạng thái
    if ($data['trangthai'] != null) {
        $sql .= ", trangthai = '{$data['trangthai']}'";
    }
	
    //Nếu có cập nhật hình ảnh
    if ($data['hinh'] != null) {
        $sql .= ", hinh = '{$data['hinh']}'";
    }

    //Điều kiện
    $sql .= " WHERE sanpham_id = $sanpham_id";
    
    //echo $sql;

    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm xóa sản phẩm

function xoa_sanpham($sanpham_id, $ketnoi)
{
    //SQL
    $sql = "DELETE FROM sanpham WHERE sanpham_id = $sanpham_id";

    //Return
    return mysqli_query($ketnoi, $sql);
}


?>