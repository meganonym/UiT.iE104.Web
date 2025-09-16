<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>


<?php if ($tongso_record>0) { ?>

<div class="page-title">DANH SÁCH NGƯỜI DÙNG</div>
<?php  if (isset($_SESSION['xoa_nguoidung'])){ echo '<p class="alert">'.$_SESSION['xoa_nguoidung'].'</p> '; unset($_SESSION['xoa_nguoidung']); }?>
    <div align="center" style="margin-bottom: 20px;">
        <a  class="nutbam"  href="<?php echo SITE_URL . 'quanly/nguoidung/nguoidung_themmoi.php'; ?>">Thêm mới</a>
    </div>
    <table class="grid-list">
        <tr>
            <th style="display: none">ID</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Điện thoại</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Nhóm người dùng</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>
        </tr>
    <?php while ($nguoidung = mysqli_fetch_assoc($danhsach_nguoidung)): ?>
        <tr>
            <td style="display: none">
                <?php echo $nguoidung['nguoidung_id']; ?>
            </td>
            <td>				
               <?php echo $nguoidung['email']; ?></a>
            </td>
			<td>				
               <?php echo $nguoidung['hovaten']; ?></a>
            </td>
            <td>
                <?php echo $nguoidung['dienthoai']; ?>
            </td>
			<td>
                <?php echo ($nguoidung['gioitinh'] == 1 ? 'Nam' : 'Nữ') ?>
            </td>
			<td>
                <?php echo $nguoidung['diachi']; ?>
            </td>
            <td><?php 
						  if ($nguoidung['nhom_nguoidung_id']==3){ echo 'Khách hàng';} 
						  elseif($nguoidung['nhom_nguoidung_id']==2){echo 'Quản trị viên';}
						  elseif($nguoidung['nhom_nguoidung_id']==1){echo 'Admin';}
						  ?>
			</td>

	        <td><?php echo ($nguoidung['trangthai'] == 1) ? 'Kích hoạt' : 'Không kích hoạt'; ?>  </td>
            
            <td class="grid-action">
                <div class="grid-action-link">
                    <a  class="nutbam"  href="<?php echo SITE_URL . 'quanly/nguoidung/nguoidung_sua.php?nguoidung_id=' . $nguoidung['nguoidung_id']; ?> "> Sửa </a>
                    
                </div>
                <p>&nbsp;</p>
                <?php if ($_SESSION['nhom_nguoidung_id']==1): ?>
                <div class="grid-action-link">
                    <a  class="nutbam"  href="<?php echo SITE_URL . 'quanly/nguoidung/nguoidung_xoa.php?nguoidung_id=' . $nguoidung['nguoidung_id']; ?> "> Xóa </a>
                </div>
                <?php endif; ?>
                
            </td>
        </tr>
    <?php endwhile; ?>
</table> 
<!--' phân trang ' -->
<div class="pagination">
    <div class="pagination-center">
        <?php for($i=1;$i<=$tongso_page;$i++){ ?>
            <a href="nguoidung_danhsach.php?page=<?php echo $i; ?>" <?php if($page == $i) echo "class='active'"; ?>><?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>

<?php }else{ ?>
<h3 align="center">CHƯA CÓ DANH MỤC NGƯỜI DÙNG</h3>
<h4 align="center"><a  class="nutbam"  href="<?php echo SITE_URL . 'quanly/nguoidung/nguoidung_themmoi.php'; ?>">THÊM MỚI</a></h4>
<?php } ?>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>