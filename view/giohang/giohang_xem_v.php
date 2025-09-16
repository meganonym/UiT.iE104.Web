<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<!-- Header -->
<?php require '../giaodien/menuuser.php';?>
<p>&nbsp;</p>
<p>&nbsp;</p>
    

<?php if (!isset($_SESSION['soluong_sanpham'])||$_SESSION['soluong_sanpham']<1 ) { ?>
<div class="cart-empty">
    <div class="cart-empty-title">Giỏ hàng chưa có sản phẩm nào!</div>
    <div class="cart-empty-link">
        <a href="<?php echo SITE_URL.'view/sanpham/sanpham_danhsach.php'; ?>" title="Về trang sản phẩm">Tiếp tục mua hàng</a>
    </div>
</div>
<?php } else { ?>

<H2 align="center" class="cart-title "> Danh sách sản phẩm trong giỏ hàng </H2>

<div>
	<?php
		if (isset($capnhatgiohang)){
			echo $capnhatgiohang; 
			unset($capnhatgiohang );
		}
	?>
</div>

<form action="" name="capnhatsoluong" method="post">
<div class="cart-content">
<table width="auto"  align="center">
    <tr>
        <th><div class="cart-product-title">SẢN PHẨM</div></th>
        <th><div  class="cart-product-title">GIÁ BÁN</div></th>
        <th><div  class="cart-product-title">SỐ LƯỢNG</div></th>
        <th><div  class="cart-product-title">THÀNH TIỀN</div></th>
        <th><div  class="cart-product-title">TÁC VỤ</div></th>
    </tr>
    
    <?php $tongtien =0; ?>
    <?php if (!empty($check_data_giohang['giohang_id'])) while ($sanpham_g = mysqli_fetch_assoc($sanpham_tronggio)): ?>
    <tr>
        
        <td> 
			<div class="hinhsanpham">
				<a href="<?php echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sanpham_g['sanpham_id']; ?>">
					<img src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham_g['hinh']; ?>" class="cart-product-image" alt="image"><br>
					
				</a>
			</div>
			<div class="cart-product-name">
                <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sanpham_g['sanpham_id']; ?>">
                    <?php echo $sanpham_g['ten_sanpham']; ?>
                </a>
            </div>
            
        </td>
        <td>
            <div class="giasanpham"><b> <?php echo number_format($sanpham_g['gia'], 0, '', '.'); ?> VNĐ</b></div>
        </td> 
        <td >           
            <div class="quantity-product" >
                <!-- tăng số lượng mua-->
                <button class="quantity-down-btn" type="button" onclick="this.parentNode.querySelector('[type=number]').stepDown();">
                    <span>-</span>
                </button>
                <input class="quantity-input" type="number" name="<? echo $sanpham_g['sanpham_id']; ?>" min="1" max="20" value="<?php echo $sanpham_g['soluong']; ?>">
                <!-- tăng số lượng mua-->
                <button class="quantity-up-btn" type="button" onclick="this.parentNode.querySelector('[type=number]').stepUp();">
                    <span>+</span>
                </button>
            </div>
        </td>
        <?php $tongtien = $sanpham_g['gia']*$sanpham_g['soluong'] + $tongtien ; ?>
        <td>
            <div class="giasanpham"><b>
                <label class="price"><?php echo number_format($sanpham_g['gia']*$sanpham_g['soluong'], 0, '', '.'); ?></label><span>VNĐ</span>
                </b>
            </div>
        </td> 
        <td>
            <a class="muangay" href="<?php echo SITE_URL . 'view/giohang/giohang_xoa_sanpham.php?sanpham_id=' . $sanpham_g['sanpham_id'].'&giohang_id=' . $sanpham_g['giohang_id']; ?>">Xóa sản phẩm</a> 
        </td>
        
    </tr>
    <?php endwhile; ?>
</table>
</div>

<div align="center" class="cart-info-detail">
    <button class="themvaogio" type="submit" >Cập nhật số lượng</button>
    </div>


</form>
<p>&nbsp;</p>
<div class="cart-info">
    <div class="cart-info-summary">
        <div class="cart-info-title">
            Thông tin giỏ hàng
        </div>
        <div class="cart-info-detail">
            <div class="cart-info-detail-item cart-info-amount">
                <span class="cart-info-detail-item-left">TỔNG TIỀN HÀNG</span>
                <span class="cart-info-detail-item-right"><?php echo number_format($tongtien, 0, '', '.'); ?> VNĐ</span>
            </div>
            <div class="cart-info-detail-item">
                <span class="cart-info-detail-item-left">VẬN CHUYỂN</span>
                <span class="cart-info-detail-item-right">Miễn phí</span>
            </div>
            <div class="cart-info-detail-item">
                <span class="cart-info-detail-item-left">TỔNG CỘNG</span>
                <span class="cart-info-detail-item-right"><?php echo number_format($tongtien, 0, '', '.'); ?> VNĐ</span>
            </div>
            <div class="cart-info-detail-item-right">
                <a class="themvaogio" href="<?php echo SITE_URL . 'view/giohang/giohang_dathang.php?giohang_id='. $check_data_giohang['giohang_id']; ?>">Tiến hành đặt hàng</a>
                
            </div>
        </div>
    </div>
</div>

<?php }  ?>
<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>