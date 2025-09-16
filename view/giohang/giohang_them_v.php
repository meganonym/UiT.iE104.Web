<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<!-- Header -->
<?php require '../giaodien/menuuser.php';?>


<p>&nbsp;</p>

<? if(isset($_GET['sanpham_id'])){  ?>

<div class="logo-list"  style="margin: 0 auto 0">
<?php while ($menu_logobar = mysqli_fetch_assoc($dmsp_logo)): ?>
    <div class="logo-item" <?php if(isset($sanpham_theo_id['danhmuc_sanpham_id']) && $menu_logobar['danhmuc_sanpham_id'] == $sanpham_theo_id['danhmuc_sanpham_id'] ) echo 'style="border: 5px solid orange;"' ;?>>
        <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_danhsach.php?danhmuc_sanpham_id='.$menu_logobar['danhmuc_sanpham_id']; ?>"> 
            <img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $menu_logobar['logo']; ?>" alt="Hình ảnh sản phẩm">
        </a>
    </div>
<?php endwhile; ?>
</div>

<form name="add" method="post" action="">

<H3 align="center"> Vui lòng chọn số lượng sản phẩm để thêm vào giỏ hàng </H3>
    <?php if (isset($_SESSION['success'])): ?>
        <p style="color: green;">Sản phẩm đã được thêm vào giỏ hàng thành công!</p>
        
        <p style="color: green;"><a href="<?php echo SITE_URL; ?>"  Tiếp tục mua hàng </p>
        
        
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    
    
	<table  width="auto" border="1" align="center">
		
		<tr>
			<th>Hình ảnh sản phẩm</th>
			<th>Tên sản phẩm</th>
			<th>Số lượng</th>
			<th>Đơn giá</th>
			<th>Thêm vào giỏ</th>
		</tr>
		<tr>
			<td align="center"><img src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham_theo_id['hinh']; ?>" width="200" ></td>
			<td align="center" style="font-size: 10"><?php echo $sanpham_theo_id['ten_sanpham']; ?></td>
			<td align="center">
                <div class="quantity-product" >
                    <!-- tăng số lượng mua-->
                    <button class="quantity-down-btn" type="button" onclick="this.parentNode.querySelector('[type=number]').stepDown();">
                        <span>-</span>
                    </button>
                    <input class="quantity-input" type="number" name="soluong" min="1" max="20" value="1">
                    <!-- tăng số lượng mua-->
                    <button class="quantity-up-btn" type="button" onclick="this.parentNode.querySelector('[type=number]').stepUp();">
                        <span>+</span>
                    </button>
                </div>
            </td>
			<td align="right" class="giasanpham"> <?php echo number_format($sanpham_theo_id['gia'], 0, '', '.'); ?> VNĐ</td>
			<td align="center"><input type="submit" value="Thêm vào giỏ hàng" class="themvaogio"> </td>
		</tr>
	</table>
</form>
<? }else{ ?>
	<h3 align="center"> ĐÃ CÓ LỖI XẢY RA, VUI LÒNG CHỌN LẠI SẢN PHẨM </h3>
	<?  }?>
	

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>
	