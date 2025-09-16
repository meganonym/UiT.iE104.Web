<?php
/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm lấy dữ liệu phục vụ đăng nhập

function dangnhap($email, $ketnoi)
{
    //SQL
    $sql = "SELECT * FROM nguoidung WHERE email = '$email' AND 	trangthai = 1";
    
    //echo $sql;
    //Query
    $truyvan = mysqli_query($ketnoi, $sql);
    
    //Return
    return mysqli_fetch_assoc($truyvan);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm thêm mới người dùng

function dangky($data, $ketnoi)
{
    //SQL
    $sql = "INSERT INTO `nguoidung`(`email`, `matkhau`, `hovaten`, `dienthoai`, `gioitinh`, `trangthai`, `nhom_nguoidung_id`, `diachi`) 
    VALUES ('{$data['email']}', '{$data['matkhau']}', '{$data['hovaten']}', '{$data['dienthoai']}', {$data['gioitinh']},  '1', '3', '{$data['diachi']}')";
    //echo $sql;

    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm xử lý validate
function kiemtra_tontai_email($ketnoi, $email) 
{
    $sql = "SELECT * FROM nguoidung WHERE email='$email'";
    //echo $sql;
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $mail_check =  mysqli_num_rows($truyvan);
    
    return ($mail_check > 0)? TRUE : FALSE ;
}

function kiemtra_tontai_dienthoai($dienthoai, $ketnoi) 
{
    $sql = "SELECT * FROM nguoidung WHERE dienthoai='$dienthoai'";
    //echo $sql;
    $truyvan = mysqli_query($ketnoi, $sql);
    
    $phone_check =  mysqli_num_rows($truyvan);
    
    return ($phone_check > 0)? TRUE : FALSE ;
}



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
    
    $sql = " UPDATE nguoidung SET gioitinh = {$data['gioitinh']} ";
    
    //Nếu có cập nhật địa chỉ
    if ($data['diachi'] != null) {
        $sql .= ", diachi = '{$data['diachi']}'";
    }
    
    //Nếu có cập nhật họ và tên
    if ($data['hovaten'] != null) {
        $sql .= ", hovaten = '{$data['hovaten']}'";
    }
    
    //Nếu có cập nhật điện thoại
    if ($data['dienthoai'] != null) {
        $sql .= ", dienthoai = '{$data['dienthoai']}'";
    }
    
    //Nếu có cập nhật mật khẩu
    if ($data['matkhaumoi'] != null) {
        $sql .= ", matkhau = '{$data['matkhaumoi']}'";
    }

    //Điều kiện
    $sql .= " WHERE nguoidung_id = $nguoidung_id";
    
    //echo $sql;
    //Return
    return mysqli_query($ketnoi, $sql);
}

/*---------------------------------------------------------------------------------------------------------------------*/
// Hàm sửa thông tin người dùng khi đặt hàng

function sua_nguoidung_dathang($data, $nguoidung_id, $ketnoi)
{
    //SQL
    $sql = " UPDATE nguoidung SET  hovaten = '{$data['hovaten']}', dienthoai = '{$data['dienthoai']}', diachi = '{$data['diachi']}' ";
    
    //Điều kiện
    $sql .= " WHERE nguoidung_id = $nguoidung_id";
    
    //echo $sql;
    //Return
    return mysqli_query($ketnoi, $sql);
}












