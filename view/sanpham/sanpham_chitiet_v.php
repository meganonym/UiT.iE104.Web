<!-- Header -->
<?php require  '../giaodien/header.php'; ?>

<!-- Menu -->
<?php require  '../giaodien/menuuser.php'; ?>


<?php if(isset($_GET['sanpham_id']) && is_numeric($_GET['sanpham_id'])){ ?>
<?php if($sanpham_theo_id['danhmuc_sanpham_id'] != NULL){?>
<div class="logo-list"  style="margin: 0 auto 0">
<?php while ($menu_logobar = mysqli_fetch_assoc($dmsp_logo)): ?>
    <div class="logo-item" <?php if(isset($sanpham_theo_id['danhmuc_sanpham_id'] ) && $menu_logobar['danhmuc_sanpham_id'] == $sanpham_theo_id['danhmuc_sanpham_id'] ) echo 'style="border: 5px solid orange;"' ;?>>
        <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_danhsach.php?danhmuc_sanpham_id='.$menu_logobar['danhmuc_sanpham_id']; ?>"> 
            <img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $menu_logobar['logo']; ?>" alt="Hình ảnh sản phẩm">
        </a>
    </div>
<?php endwhile; ?>
</div>
<div class="product-content">
        <div class="product-image">
            <div class="product-image-content">
                <!--hình ảnh sản phẩm-->
                <img id="image" class="product-image-detail" data-zoom="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham_theo_id['hinh']; ?>" src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham_theo_id['hinh']; ?>" alt="image">
            </div>
            
            <div class="product-detail-info">
                <div style=" margin: 0 auto; padding-bottom: 10px;">
                    <lable>THÔNG TIN SẢN PHẨM</lable>
                </div><br><hr>
                <!--tên sản phẩm-->
                <div class="tensanpham"><?php echo $sanpham_theo_id['ten_sanpham']; ?></div>
                <div>
                    <!--giá sản phẩm-->
                    <span class="giasanpham"><?php echo number_format($sanpham_theo_id['gia'], 0, '', '.'); ?> VNĐ</span>
                </div>
                <div>
                    <a href="<?php echo SITE_URL . 'view/giohang/giohang_them.php?sanpham_id='.$sanpham_theo_id['sanpham_id']; ?>"><button class="themvaogio">Thêm vào giỏ hàng</button></a>
                    <a href="<?php echo SITE_URL . 'view/giohang/giohang_muangay.php?sanpham_id='.$sanpham_theo_id['sanpham_id']; ?>"><button class="muangay ">Mua ngay</button></a>
                </div>
                <div>
                    <!-- chi tiet san pham-->
                    <div>
                        <p>
                            <?php echo $sanpham_theo_id['chitiet']; ?>
                        </p>
                    </div>
                </div>
                <div class="nutbamsanpham">
                    <a href="<?php echo SITE_URL . 'view/giohang/giohang_them.php?sanpham_id='.$sanpham_theo_id['sanpham_id']; ?>"><button class="themvaogio">Thêm vào giỏ hàng</button></a>
                    <a href="<?php echo SITE_URL . 'view/giohang/giohang_muangay.php?sanpham_id='.$sanpham_theo_id['sanpham_id']; ?>"><button class="muangay ">Mua ngay</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo SITE_URL.'view/giaodien/Drift.js' ; ?>"></script>
 	<script>
		new Drift(document.querySelector('.product-image-detail'), {
			paneContainer: document.querySelector('.product-detail-info')   
		});
	</script>
        
    <!--sản phẩm cùng loại, chỉ hiển thị 6 sản phẩm -->
    <div class="product-revalent">
        <div class="product-revalent-title">
            <span>SẢN PHẨM CÙNG LOẠI</span>
        </div>
        <div class="product-revalent-info">
            <div class="danhsachsanpham">
                <?php while ($sp_cl = mysqli_fetch_assoc($sanpham_cungloai)): ?>
                <div class="sanpham">
                    <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sp_cl['sanpham_id']; ?>">
                        <div class="hinhsanpham">
                            <img src="<?php echo SITE_URL . 'hinhsanpham/' . $sp_cl['hinh']; ?>" alt="Hình ảnh sản phẩm">
                        </div>
                        <div class="tensanpham">
                            <span><?php echo $sp_cl['ten_sanpham']; ?></span>
                        </div>
                        <div class="giasanpham">
                            <span><b><?php echo number_format($sp_cl['gia'], 0, '', '.'); ?> VNĐ</b></span>
                        </div>
                    </a>
                    <div class="nutbamsanpham">
                        <a href="<?php echo SITE_URL . 'view/giohang/giohang_them.php?sanpham_id=' . $sp_cl['sanpham_id']; ?>"><button type="button" class="themvaogio" >Thêm vào giỏ hàng</button></a>
                        <a href="<?php echo SITE_URL . 'view/giohang/giohang_muangay.php?sanpham_id=' . $sp_cl['sanpham_id']; ?>"><button type="button" class="muangay" >Mua ngay</button></a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php } else { ?>
<h3 align="center"> ĐÃ CÓ LỖI XẢY RA! MÃ SẢN PHẨM KHÔNG TỒN TẠI! VUI LÒNG CHỌN LẠI SẢN PHẨM</h3>

<?php }?>
<?php } else { ?>
<h3 align="center"> ĐÃ CÓ LỖI XẢY RA VUI LÒNG CHỌN LẠI SẢN PHẨM</h3>

<?php }?>

<?php require  '../giaodien/footer.php'; ?>