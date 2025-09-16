<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h3 align="center" style=" color: #C4A01C"><b>THÊM MỚI NGƯỜI DÙNG</b></h3>
<p>&nbsp;</p>
<div class="pf-info-detail" align="center">
<form name="" method="post" action="">
    <div >
        <p>
            <label>Họ và tên : </label>
            <input type="text" name="hovaten" placeholder="Họ và tên" value="<?php  if(isset($_POST['hovaten'])) echo $_POST['hovaten'] ; ?>">
        </p>
        <p>
            <label>Email: </label>
            <input type="email" name="email" required placeholder="Email đăng nhập" value="<?php  if(isset($_POST['email'])) echo $_POST['email'] ; ?>">
        </p>
        <p>
            <label>Điện thoại</label>
            <input type="tel" name="dienthoai" required placeholder="Số điện thoại" value="<?php  if(isset($_POST['dienthoai'])) echo $_POST['dienthoai'] ; ?>">
        </p>
        <p>
            <label>Mật khẩu: </label>
            <input type="password" name="matkhau" required placeholder="Mật khẩu">
        </p>
        <p>
            <label>Xác nhận mật khẩu: </label>
			<input type="password" name="nhaplaimatkhau"required  placeholder="Xác nhận mật khẩu">
        </p>
        <p>
            <label> Giới tính: </label>
            <input <?php  if(isset($_POST['gioitinh'])){ echo ($_POST['gioitinh'] == 'nam')?  'checked' : '';} else{echo 'checked';} ?> type="radio" name="gioitinh" value="nam" style="width: initial;margin: 0px 4px 0px 3px;"> Nam
			<input <?php  if(isset($_POST['gioitinh'])) {echo ($_POST['gioitinh'] == 'nam')?  '' : 'checked' ;} else{echo '';} ?> type="radio" name="gioitinh" value="nu" style="width: initial;margin: 0px 4px 0px 8px;"> Nữ
        </p>
        <p>
            <label> Trạng thái: </label>
            <input <?php  if(isset($_POST['trangthai'])){ echo ($_POST['trangthai'] == 'kichhoat')?  'checked' : '';} else{echo 'checked';} ?> type="radio" name="trangthai" value="kichhoat" style="width: initial;margin: 0px 4px 0px 3px;"> Kích hoạt
			<input <?php  if(isset($_POST['trangthai'])) {echo ($_POST['trangthai'] == 'kichhoat')?  '' : 'checked' ;} else{echo '';} ?> type="radio" name="trangthai" value="khongkichhoat" style="width: initial;margin: 0px 4px 0px 8px;"> Không kích hoạt
        </p>
        <p>
            <label>Địa chỉ : </label>
            <input type="text" name="diachi" placeholder="Địa chỉ" value="<?php  if(isset($_POST['diachi'])) echo $_POST['diachi'] ; ?>">
        </p>
        <p>
            <label>Nhóm người dùng :</label>
                <select name="nhom_nguoidung" style=" height: 30px; width: 150px; font-size: 18px;">
					<?php if($_SESSION['nhom_nguoidung_id'] == 1) echo '<option value="1">Admin</option>
                    <option value="2">Quản trị viên</option>' ?>
                    <option value="3">Khách hàng</option>
                </select>
        </p>
    </div>
	<div class="rg-input">
		<?php if(isset($error['hovaten'])){ echo $error['hovaten'];unset($error['hovaten']) ;}  ?>
		<?php if(isset($error['email'])){ echo $error['email'];unset($error['email']) ;}  ?>
		<?php if(isset($error['matkhau'])){ echo $error['matkhau'];unset($error['matkhau']) ;}  ?>
		<?php if(isset($error['dienthoai'])){ echo $error['dienthoai'];unset($error['dienthoai']) ;}  ?>
		<?php if(isset($trangthai)){ echo $trangthai;unset($trangthai) ;}  ?>
	</div>
    <div style="margin: 0 auto 0; padding: 20px;">
        <button  class="nutbam"   type="submit">THÊM MỚI</button>
    </div>
</form>
</div>
<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>