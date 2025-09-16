<!-- Header -->
<?php require  'view/giaodien/header.php'; ?>

<!-- Menu -->
<?php require  'view/giaodien/menuuser.php'; ?>

<!-- Slide Bar -->
<?php  require  'view/giaodien/sidebar.php'; ?>

<!-- Logo Bar -->
<?php  require  'view/giaodien/logobar.php'; ?>



	
<?php if ($soluong_sanpham>0) { ?>

<div class="danhsachsanpham" style="margin: 0 auto 0">


    <?php while ($sanpham_moi = mysqli_fetch_assoc($sanpham_ngaunhien)): ?>
    <div class="sanpham" >
        <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sanpham_moi['sanpham_id']; ?>">
            <div class="hinhsanpham">
                <img src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham_moi['hinh']; ?>" alt="Hình ảnh sản phẩm">
            </div>
            <div class="tensanpham">
                <span><?php echo $sanpham_moi['ten_sanpham']; ?></span>
            </div>
            <div class="giasanpham">
                <span><b><?php echo number_format($sanpham_moi['gia'], 0, '', '.'); ?> VNĐ</b></span>
            </div>
        </a>
        <div class="sanphamnutbam">
            <a href="<?php echo SITE_URL . 'view/giohang/giohang_them.php?sanpham_id=' . $sanpham_moi['sanpham_id']; ?>"><button type="button" class="themvaogio" >Thêm vào giỏ hàng</button></a>
            <a href="<?php echo SITE_URL . 'view/giohang/giohang_muangay.php?sanpham_id=' . $sanpham_moi['sanpham_id']; ?>"><button type="button" class="muangay" >Mua ngay</button></a>
        </div>
    </div>
    <?php endwhile; ?>
   


<?php }else{ ?>
<h3 align="center">CHƯA CÓ SẢN PHẨM</h3>
<?php } ?>
</div> 

<!-- footer -->
<?php require  'view/giaodien/footer.php'; ?>