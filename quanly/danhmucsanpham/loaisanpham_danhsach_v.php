<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>
<?php if ($tongso_record>0) { ?>
<div class="page-title">DANH SÁCH DANH MỤC SẢN PHẨM</div>
<?php 
	if (isset($_SESSION['xoa_loaisanpham'])){
		echo '<p class="alert">'.$_SESSION['xoa_loaisanpham'].'</p> ';
		unset($_SESSION['xoa_loaisanpham']);
	} else {echo '';}
?>

   <div align="center" style="margin-bottom: 20px;">
        <a  class="nutbam"href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_them.php'; ?>">Thêm mới</a>
    </div>

<table id="listGrid" align="center">
    <tr id="titleRow">
        <th style="display: none">ID</th>
        <th>Tên danh mục sản phẩm</th>
        <th>Trạng thái</th>
        <th>LOGO</th>
        <th>BANNER</th>
        <th>Tác vụ</th>
    </tr>
    <?php while ($loaisanpham= mysqli_fetch_assoc($loaisanpham_danhsach)): ?>
        <tr>
            <td style="display: none">
                <?php echo $loaisanpham['danhmuc_sanpham_id']; ?>
            </td>
            <td>
                 <a href="<?php echo SITE_URL .'quanly/sanpham/sanpham_danhsach.php?danhmuc_sanpham_id=' . $loaisanpham['danhmuc_sanpham_id']; ?>"><?php echo $loaisanpham['ten_danhmuc_sanpham']; ?> </a>
            </td>
            <td>
                <?php echo ($loaisanpham['trangthai'] == 1) ? 'Kích hoạt' : 'Không kích hoạt'; ?>
            </td>
            <td> <img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $loaisanpham['logo']; ?>" width="268" height="125" > </td>
            <td> <img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $loaisanpham['banner']; ?>" width="348" height="120"> </td>
            <td>
                <a class="nutbam" href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_sua.php?danhmuc_sanpham_id=' . $loaisanpham['danhmuc_sanpham_id']; ?>">Sửa </a>
                &nbsp;&nbsp;
                <?php if ($_SESSION['nhom_nguoidung_id']==1): ?>
                <a class="nutbam"  href="<?php if ( $_SESSION['nhom_nguoidung_id'] == 1) {echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_xoa.php?danhmuc_sanpham_id=' . $loaisanpham['danhmuc_sanpham_id'];} ?>">Xóa</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<p>&nbsp;</p>

<!--' phân trang ' -->
<div class="pagination">
    <div class="pagination-center">
        <?php for($i=1;$i<=$tongso_page;$i++){ ?>
            <a href="loaisanpham_danhsach.php?page=<?php echo $i; ?>" <?php if($page == $i) echo "class='active'"; ?>><?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>
<?php }else{ ?>
<h3 align="center">CHƯA CÓ DANH MỤC SẢN PHẨM</h3>
<h4 align="center"><a href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_them.php'; ?>">THÊM MỚI</a></h4>
<?php } ?>

<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>