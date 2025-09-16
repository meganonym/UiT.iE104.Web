<?php require  '../giaodien/header.php'; ?>

<?php require  '../giaodien/menuuser.php'; ?>


<div align="center">
    <div class="pf-info-navi" align="center">
        <div class="pf-info-navi-title" style=" padding-top: 10px;">Hồ sơ của tôi</div>
        <div class="pf-info-navi-note">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
    </div>
    
    <form name="chinhsua" method="post" action="">
    <div class="pf-info-content">
        
        <div class="pf-info-detail">
            <label>Họ và tên :</label>
            <input type="text" name="hovaten" value="<?php if(isset($_POST['hovaten'])) { echo $_POST['hovaten']; } else { echo $nguoidung['hovaten']; }   ?>">
        </div>
        <div class="pf-info-detail">
            <label>Email :</label>
            <input type="email" name="email" style="border: none;" readonly value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $nguoidung['email']; }   ?>">
        </div>
        <div class="pf-info-detail">
            <label>Số điện thoại :</label>
            <input type="tel" name="dienthoai" value="<?php echo $nguoidung['dienthoai']; ?>">
        </div>
        <div class="pf-info-detail pf-info-gender">
            <label>Giới tính :</label>
            <input <?php echo ($nguoidung['gioitinh'] == 1) ? 'checked="checked"' : ''; ?> type="radio" name="gioitinh" value="nam">Nam
            <input <?php echo ($nguoidung['gioitinh'] == 1) ? '' : 'checked="checked"'; ?> type="radio" name="gioitinh" value="nu">Nữ
        </div>
        <div class="pf-info-detail">
            <label>Địa chỉ :</label>
            <input type="text" name="diachi" value="<?php echo $nguoidung['diachi']; ?>">
        </div>
        <div class="pf-info-detail">
            <p>Vui lòng nhập mật khẩu để xác nhận bạn thay đổi bất cứ thông nào</p>
            <label style="color: firebrick">Mật khẩu :</label>
            <input type="password" name="matkhau" value="">
        </div>
        <div class="pf-info-detail">
            <h3 style="color: firebrick">Đổi mật khẩu :</h3>
<!--
            <p style="color: firebrick">Chỉ điền khi bạn có nhu cầu muốn đổi mật khẩu</p>
            <p style="color: firebrick">Vui lòng nhập mật khẩu cũ ở trên để xác nhận bạn thay đổi mật khẩu</p>
-->
            <label>Mật khẩu mới :</label><input type="password" name="matkhaumoi" value="" placeholder="Mật khẩu mới"><br>
            <label>Nhập lại mật khẩu mới :</label><input type="password" name="nhaplaimatkhaumoi" placeholder=" Nhập lại mật khẩu mới">
        </div>
    </div>
        
        
        
    <div class="rg-input">
        <?php echo isset($error['hovaten']) ? $error['hovaten'] : ''; ?>
        <?php echo isset($error['diachi']) ? $error['diachi'] : ''; ?>
        <?php echo isset($error['matkhau']) ? $error['matkhau'] : ''; ?>
        <?php echo isset($error['dienthoai']) ? $error['dienthoai'] : ''; ?>
        <?php echo isset($trangthai) ? $trangthai : ''; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <p style="color: green;">Thành viên đã được chỉnh sửa thành công!</p>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    </div>
    <div>
        <button type="submit" class="btn-pf-save">Lưu</button>
    </div>
        </form>
</div>


<?php require  '../giaodien/footer.php'; ?>