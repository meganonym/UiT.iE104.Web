
<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<!-- menu -->
<?php require '../giaodien/menuuser.php';?>
<!-- Logo Bar -->
<?php  require  '../giaodien/logobar.php'; ?>

<p>&nbsp;</p>


<?php if ( strlen($timkiem)<3 ) {   ?>
<div > 
    <h3 align="center">Vui lòng nhập nhiều hơn 2 ký tự </h3>
</div>
<?php } else {   ?>

    <?php  if (isset($tongso_record ) && $tongso_record > 0 )  { ?>
    <div><h3 align="center"> Có <?php echo $tongso_record; ?> kết quả trả về cho từ khóa <b><?php echo $_GET['timkiem']; ?></b> </h3></div>
    <div class="danhsachsanpham">


        <?php while ($sanpham_tim = mysqli_fetch_assoc($truyvan)): ?>
        <div class="sanpham">
            <a href="<?php  echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sanpham_tim['sanpham_id']; ?>">
                <div class="hinhsanpham">
                    <img src="<?php  echo SITE_URL . 'hinhsanpham/' . $sanpham_tim['hinh']; ?>" alt="Hình ảnh sản phẩm">
                </div>
                <div class="tensanpham">
                    <?php echo $sanpham_tim['ten_sanpham']; ?>
                </div>
                <div class="giasanpham">
                    <span><b><?php echo number_format($sanpham_tim['gia'], 0, '', '.'); ?> VNĐ</b></span>
                </div>
            </a>
            <div>
                <a href="<?php echo SITE_URL . 'view/giohang/giohang_them.php?sanpham_id=' . $sanpham_tim['sanpham_id']; ?>"><button type="button" class="themvaogio" >Thêm vào giỏ hàng</button></a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
<?php } else {   ?>
<div > 
    <h3 align="center">Không tìm thấy kết quả! </h3>
</div>
<?php }?>

<?php }?>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>