<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>

<div>
    <div class="page-title">THÔNG TIN NGƯỜI DÙNG</div> 
 
<form name="chinhsua" method="post" action="">
    
    <div align="center">
        <div class="pf-info-detail">
            <label>Họ và tên :</label>
            <input type="text" name="hovaten" <?php if ( $_SESSION['nhom_nguoidung_id'] != 1){echo 'readonly';} ?> value="<?php if(isset($_POST['hovaten'])) { echo $_POST['hovaten']; } else { echo $nguoidung['hovaten']; }   ?>">
        </div>
        <div class="pf-info-detail">
            <label>Email :</label>
            <input type="email" name="email" style="border: none;" readonly value="<?php echo $nguoidung['email'];?>">
        </div>
        <p>&nbsp;</p>
        <div class="pf-info-detail">
            <h3 style="color: firebrick">Đổi mật khẩu :</h3>
            <label>Mật khẩu mới :</label><input type="password" name="matkhaumoi" value="" placeholder="Mật khẩu mới"><br>
            <label>Nhập lại mật khẩu mới :</label><input type="password" name="nhaplaimatkhaumoi" placeholder=" Nhập lại mật khẩu mới">
        </div>
        <p>&nbsp;</p>
        <div class="pf-info-detail">
            <label>Số điện thoại</label>
            <input type="tel" pattern="[0-9]{10}" name="dienthoai" value="<?php echo $nguoidung['dienthoai']; ?>" <?php if ( $_SESSION['nhom_nguoidung_id'] != 1){echo 'readonly';} ?>>
        </div>
        <div class="pf-info-detail pf-info-gender">
            <label>Giới tính</label>
            <input type="radio" name="gioitinh" value="nam" <?php echo ($nguoidung['gioitinh'] == 1) ? 'checked="checked"' : ''; ?>>Nam
            <input type="radio" name="gioitinh" value="nu" <?php echo ($nguoidung['gioitinh'] == 1) ? '' : 'checked="checked"'; ?>>Nữ
        </div>
        <div class="pf-info-detail pf-info-check">
            <label>Trạng thái</label>
            <input type="radio" name="trangthai" value="kichhoat" <?php echo ($nguoidung['trangthai'] == 1) ? 'checked="checked"' : ''; ?>>Kích hoạt
            <input type="radio" name="trangthai" value="khongkichhoat" <?php echo ($nguoidung['trangthai'] == 0) ? 'checked="checked"' : ''; ?>>Không kích hoạt
        </div>
        <div class="pf-info-detail">
            <label>Địa chỉ</label>
            <input type="text" name="diachi" value="<?php echo $nguoidung['diachi']; ?>">
        </div>
        <div class="pf-info-detail">
            <label>Nhóm người dùng :</label>
            <select name="nhom_nguoidung" style=" height: 30px; width: 150px; font-size: 18px;">
                <option value="1" <?php echo ($nguoidung['nhom_nguoidung_id'] == 1)? 'selected' : '' ?>>Admin</option>
                <option value="2" <?php echo ($nguoidung['nhom_nguoidung_id'] == 2)? 'selected' : '' ?>>Quản trị viên</option>
                <option value="3" <?php echo ($nguoidung['nhom_nguoidung_id'] == 3)? 'selected' : '' ?>>Khách hàng</option>
            </select>
        </div>
        
    </div>
    <div align="center">
        <div class="pf-info-detail">
            <?php echo isset($error['hovaten']) ? $error['hovaten'] : ''; unset($error['hovaten']); ?>
            <?php echo isset($error['matkhaumoi']) ? $error['matkhaumoi'] : ''; unset($error['matkhaumoi']);  ?>
            <?php echo isset($error['dienthoai']) ? $error['dienthoai'] : ''; unset($error['dienthoai']);  ?>
            <?php echo isset($error['trangthai']) ? $error['trangthai'] : ''; unset($error['trangthai']);  ?>
            <?php echo isset($error['nhom_nguoidung']) ? $error['nhom_nguoidung'] : ''; unset($error['nhom_nguoidung']);  ?>
            <?php echo isset($trangthai) ? $trangthai : ''; unset($trangthai);  ?>
            
        </div>
    </div>
    <div align="center">
        <button  class="nutbam" >CẬP NHẬT</button>
    </div>
</form>
</div>
<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>