<div class="logo-list"  style="margin: 0 auto 0">
<?php while ($menu_logobar = mysqli_fetch_assoc($dmsp_logo)): ?>
    <div class="logo-item" <?php if(isset($_GET['danhmuc_sanpham_id']) && $menu_logobar['danhmuc_sanpham_id'] == $_GET['danhmuc_sanpham_id'] ) echo 'style="border: 5px solid orange;"' ;?>>
        <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_danhsach.php?danhmuc_sanpham_id='.$menu_logobar['danhmuc_sanpham_id']; ?>"> 
            <img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $menu_logobar['logo']; ?>" alt="Hình ảnh sản phẩm">
        </a>
    </div>
<?php endwhile; ?>
</div>