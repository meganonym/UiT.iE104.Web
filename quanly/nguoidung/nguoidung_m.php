<?php
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy dữ liệu phục vụ đăng nhập

function dangnhap($email, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM nguoidung WHERE email = '$email' AND 	trangthai = 1";
    
    //Query
    $truyvan = mysqli_query($ketnoi, $sql);
    
    //Return
    return mysqli_fetch_assoc($truyvan);
}
// Hàm lấy dữ liệu phục vụ đăng nhập quản trị

function laydulieunguoidung_bang_email($email, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM nguoidung WHERE email = '$email' AND 	trangthai = 1 AND nhom_nguoidung_id <3";

    //Truyvaans
    $truyvan = mysqli_query($ketnoi, $sql);
    
    //Return
    return mysqli_fetch_assoc($truyvan);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy danh sách người dùng quản trị

function lay_danhsach_nguoidung_t($ketnoi)
{
	//SQL
	$sql = "SELECT * FROM nguoidung ORDER BY nguoidung_id DESC";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}

function lay_danhsach_nguoidung_s($ketnoi,$batdau, $gioihan)
{
	//SQL
	$sql = "SELECT * FROM nguoidung ORDER BY nguoidung_id DESC LIMIT $batdau, $gioihan";
	
	//Return
	return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm thêm mới người dùng

function them_nguoidung($data, $ketnoi)
{
    //SQL
    $sql = "INSERT INTO nguoidung (`email`, `matkhau`, `hovaten`, `dienthoai`, `gioitinh`, `trangthai`, `nhom_nguoidung_id`, `diachi`) 
    VALUES ('{$data['email']}', '{$data['matkhau']}', '{$data['hovaten']}', '{$data['dienthoai']}', '{$data['gioitinh']}',  '{$data['trangthai']}', '{$data['nhom_nguoidung']}', '{$data['diachi']}')";
    
    //echo($sql);
    //Return
    return mysqli_query($ketnoi, $sql);
}
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm xử lý validate
function kiemtra_tontai_email($ketnoi, $email) 
{
    $sql = "SELECT * FROM nguoidung WHERE email='$email'";

    $truyvan = mysqli_query($ketnoi, $sql);
    
    $mail_check =  mysqli_num_rows($truyvan);
    
    return ($mail_check > 0)? TRUE : FALSE ;
}

function kiemtra_tontai_dienthoai($dienthoai, $ketnoi) 
{
    $sql = "SELECT * FROM nguoidung WHERE dienthoai='$dienthoai'";

    $truyvan = mysqli_query($ketnoi, $sql);
    
    $phone_check =  mysqli_num_rows($truyvan);
    
    return ($phone_check > 0)? TRUE : FALSE ;
}


/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm sửa thông tin người dùng

function lay_tt_nguoidung_bang_id($nguoidung_id, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM nguoidung WHERE nguoidung_id = $nguoidung_id";
  
    //Query
    $truyvan = mysqli_query($ketnoi, $sql);
  
    //Return
    return mysqli_fetch_assoc($truyvan);
}

function sua_nguoidung($data, $nguoidung_id, $ketnoi)
{
    //SQL
    $sql = " UPDATE nguoidung SET trangthai = '{$data['trangthai']}', gioitinh = '{$data['gioitinh']}' ";
        
    //Nếu có cập nhật họ và tên
    if ($data['hovaten'] != null) {
        $sql .= ", hovaten = '{$data['hovaten']}'";
    }

//    if ($data['email'] != null) {
//        $sql .= ", email = '{$data['email']}'";
//    }

    //Nếu có cập nhật điện thoại
    if ($data['dienthoai'] != null) {
        $sql .= ", dienthoai = '{$data['dienthoai']}'";
    }
    
    //Nếu có cập nhật địa chỉ
    if ($data['diachi'] != null) {
        $sql .= ", diachi = '{$data['diachi']}'";
    }
    
    //nếu cập nhật nhóm người dùng
    if ($data['nhom_nguoidung'] != null) {
        $sql .= ", nhom_nguoidung_id = '{$data['nhom_nguoidung']}'";
    }
    
//    //nếu cập nhật trạng thái
//    if ($data['trangthai'] != null) {
//        $sql .= ", trangthai = '{$data['trangthai']}'";
//    }

    //Nếu có cập nhật mật khẩu
    if ($data['matkhaumoi'] != null) {
        $sql .= ", matkhau = '{$data['matkhaumoi']}'";
    }
    //echo $sql;
    //Điều kiện
    $sql .= " WHERE nguoidung_id = $nguoidung_id";
    

    //Return
    return mysqli_query($ketnoi, $sql);
}


/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm xóa thông tin người dùng

function xoa_nguoidung($nguoidung_id, $ketnoi)
{
    //SQL
    $sql = "DELETE FROM nguoidung WHERE nguoidung_id = $nguoidung_id";
    //echo $sql;
    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/


// Hàm kiểm tra tồn tại ID nguoidung
function kiemtra_tontai_nguoidung_id($ketnoi, $nguoidung_id) 
{
    $sql = "SELECT * FROM nguoidung WHERE nguoidung_id='$nguoidung_id'";

    $truyvan = mysqli_query($ketnoi, $sql);
    
    $nguoidung_id_check =  mysqli_num_rows($truyvan);
    
    return ($nguoidung_id_check > 0)? TRUE : FALSE ;
}

function lay_ten_nguoidung ($ketnoi, $nguoidung_id){
	$sql = "SELECT hovaten FROM nguoidung WHERE nguoidung_id = $nguoidung_id";
	$ten_nguoidung = mysqli_fetch_row(mysqli_query($ketnoi, $sql));
	return $ten_nguoidung[0];
}
?>