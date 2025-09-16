<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>

<?php if ($tongso_record>0) { ?>
    <?php if(isset($_GET['danhmuc_sanpham_id'])) { ?>
        <div class="page-title">DANH SÁCH SẢN PHẨM THUỘC DANH MỤC <?php echo lay_tendanhmuc($ketnoi, $danhmuc_sanpham_id); ?> </div>
    <?php } else {?>
        <div class="page-title">DANH SÁCH TẤT CẢ SẢN PHẨM</div>
    <?php }?>
<?php 
	if (isset($_SESSION['xoa_sanpham'])){
		echo '<p class="alert">'.$_SESSION['xoa_sanpham'].'</p> ';
		unset($_SESSION['xoa_sanpham']);
	} else {echo '';}
?>
    <?php if(isset($_GET['danhmuc_sanpham_id'])) { ?>
        <div align="center" style="margin-bottom: 20px;"><a class="nutbam" href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_them.php?'.'danhmuc_sanpham_id='.$_GET['danhmuc_sanpham_id']; ?>">Thêm sản phẩm thuộc danh mục <?php echo lay_tendanhmuc($ketnoi, $danhmuc_sanpham_id); ?> </a></div>
    <?php } else {?>
        <div align="center" style="margin-bottom: 20px;"><a class="nutbam" href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_them.php'; ?>">Thêm mới</a></div>
    <?php }?>


<!-- phân trang' -->
<div class="pagination">
    <div class="pagination-center">
        <?php for($i=1;$i<=$tongso_page;$i++){ ?>
            <a href="sanpham_danhsach.php?<?php if(isset($_GET['danhmuc_sanpham_id'])) { echo 'danhmuc_sanpham_id='.$_GET['danhmuc_sanpham_id'].'&';} ?>page=<?php echo $i; ?>" <?php if($page == $i) echo "class='active'"; ?>><?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>
    <table>
        <tr>
            <th style="display: none">ID</th>
            <th >Danh mục sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>
            <th>Chi tiết sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>
        </tr>
    <?php while ($sanpham = mysqli_fetch_assoc($danhsach_sanpham)): ?>
        <tr>
            <td  style="display: none"><?php echo $sanpham['sanpham_id']; ?></td>
            
            <td ><?php echo lay_tendanhmuc($ketnoi, $sanpham['danhmuc_sanpham_id']); ?></td>
            
            <td> <?php echo $sanpham['ten_sanpham']; ?> </td>
            
            <td> <?php echo number_format($sanpham['gia'], 0, '', '.'); ?> VNĐ</td> 
            
            <td> <?php echo $sanpham['chitiet']; ?> </td>
            
            <td> <img src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham['hinh']; ?>" width="200" height="200"> </td>
            
            <td> <?php echo ($sanpham['trangthai'] == 1) ? 'Kích hoạt' : 'Không kích hoạt'; ?> </td>
            
            <td class="grid-action">
                <div class="grid-action-link">
                    <a  class="nutbam" href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_sua.php?sanpham_id=' . $sanpham['sanpham_id']; ?>">Sửa </a>
                </div>
                <p>&nbsp;</p>
                <?php if ($_SESSION['nhom_nguoidung_id']==1): ?>
                <div class="grid-action-link">
                    <a  class="nutbam" href="<?php if ( $_SESSION['nhom_nguoidung_id'] == 1) {echo SITE_URL . 'quanly/sanpham/sanpham_xoa.php?sanpham_id=' . $sanpham['sanpham_id'];} ?>">Xóa</a>
                    
                </div>
                <?php endif; ?>
            </td>
            
        </tr>
    <?php endwhile; ?>
</table>
<!-- phân trang' -->
<div class="pagination">
    <div class="pagination-center">
        <?php for($i=1;$i<=$tongso_page;$i++){ ?>
            <a href="sanpham_danhsach.php?<?php if(isset($_GET['danhmuc_sanpham_id'])) { echo 'danhmuc_sanpham_id='.$_GET['danhmuc_sanpham_id'].'&';} ?>page=<?php echo $i; ?>" <?php if($page == $i) echo "class='active'"; ?>><?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>

<?php }else{ ?>

    <?php if(isset($_GET['danhmuc_sanpham_id'])) { ?>
        <p>&nbsp;</p>
        <div class="page-title">DANH SÁCH TẤT CẢ SẢN PHẨM THUỘC DANH MỤC <?php echo lay_tendanhmuc($ketnoi, $danhmuc_sanpham_id); ?> </div>
        <h3 align="center">CHƯA CÓ SẢN PHẨM</h3>
        <div align="center" style="margin-bottom: 20px;"><a class="nutbam" href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_them.php?'.'danhmuc_sanpham_id='.$_GET['danhmuc_sanpham_id']; ?>">Thêm sản phẩm thuộc danh mục <?php echo lay_tendanhmuc($ketnoi, $danhmuc_sanpham_id); ?> </a></div>
    <?php } else {?>
        <p>&nbsp;</p>
        <div class="page-title">DANH SÁCH TẤT CẢ SẢN PHẨM  </div>
        <h3 align="center">CHƯA CÓ SẢN PHẨM</h3>
        <h4 align="center"><a href="<?php echo SITE_URL .'quanly/sanpham/sanpham_them.php'; ?>">THÊM MỚI</a></h4>
    <?php }?>


<?php } ?>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>