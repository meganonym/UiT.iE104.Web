<!-- Header -->
<?php require  '../giaodien/header.php'; ?>

<!-- Menu -->
<?php require  '../giaodien/menuuser.php'; ?>
<!-- Slide Bar -->
<?php  if(!isset($_GET['danhmuc_sanpham_id'])) {require  '../giaodien/sidebar.php'; } else {?>
	<div style="max-width: 1400px; " >
	  <img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/'.$danhmuc_sanpham_banner ; ?>" style="width:100%">
	</div>
<?php } ?>
<!-- Logo Bar -->
<?php  require  '../giaodien/logobar.php'; ?>



<?php if ($tongso_record>0) { ?>
<div class="danhsachsanpham">
    <?php while ($sanpham = mysqli_fetch_assoc($danhsach_sanpham)): ?>
    <div class="sanpham">
        <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sanpham['sanpham_id']; ?>">
            <div class="hinhsanpham">
                <img src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham['hinh']; ?>" alt="Hình ảnh sản phẩm">
            </div>
            <div class="tensanpham">
                <span><?php echo $sanpham['ten_sanpham']; ?></span>
            </div>
            <div class="giasanpham">
                <span><b><?php echo number_format($sanpham['gia'], 0, '', '.'); ?> VNĐ</b></span>
            </div>
        </a>
        <div class="sanphamnutbam">
            <a href="<?php echo SITE_URL . 'view/giohang/giohang_them.php?sanpham_id=' . $sanpham['sanpham_id']; ?>"><button type="button" class="themvaogio" >Thêm vào giỏ hàng</button></a>
        
            <a href="<?php echo SITE_URL . 'view/giohang/giohang_muangay.php?sanpham_id=' . $sanpham['sanpham_id']; ?>"><button type="button" class="muangay" >Mua ngay</button></a>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<!--'phân trang' -->
<div class="pagination">
    <div class="pagination-center">
        <?php for($i=1;$i<=$tongso_page;$i++){ ?>
            <a href="sanpham_danhsach.php?<?php if(isset($_GET['danhmuc_sanpham_id'])) { echo 'danhmuc_sanpham_id='.$_GET['danhmuc_sanpham_id'].'&';} ?>page=<?php echo $i; ?>" <?php if($page == $i) echo "class='active'"; ?>><?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>

<?php }else{ ?>
<h3 align="center">CHƯA CÓ SẢN PHẨM</h3>
<?php } ?>


<!-- Footer -->
<?php require  '../giaodien/footer.php'; ?>