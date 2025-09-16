<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<!-- Header -->
<?php require '../giaodien/menuuser.php';?>

<?php if (isset($_SESSION['hovaten'])) { ?>
<H2 align="center" style="color: goldenrod"> Đơn hàng đã mua của <?php echo $_SESSION['hovaten'];?> </H2>

<hr>
<p>&nbsp;</p>
<?php while ($lichsu = mysqli_fetch_assoc($lichsu_dathang)): ?>   
<H3 align="center"style="color: goldenrod"> Đơn hàng số <?php echo $lichsu['giohang_id']; ?>  </H3>
 

<table width="auto"  align="center">
    <tr>
        <th><div  class="cart-product-title">Ngày tạo</div></th>
        <th><div  class="cart-product-title">Xác nhận</div></th>
        <th><div  class="cart-product-title">Xử lý</div></th>
    </tr>
    <tr>
        <td><?php echo date('d/m/Y', strtotime($lichsu['ngaytao'])); ?></td>
        <td><?php echo ($lichsu['lienlac'] == 1) ? 'đã xác nhận' : 'chưa xác nhận'; ?></td>
        <td><?php echo ($lichsu['xuly'] == 1) ? 'đã xử lý' : 'chưa xử lý'; ?></td>
         
    </tr>
</table>
<H4 align="center" style="color: goldenrod"> Danh sách sản phẩm trong giỏ hàng </H4>
<table width="auto"  align="center">
    <tr>
        <th><div class="cart-product-title">SẢN PHẨM</div></th>
        <th><div  class="cart-product-title">GIÁ BÁN</div></th>
        <th><div  class="cart-product-title">SỐ LƯỢNG</div></th>
        <th><div  class="cart-product-title">THÀNH TIỀN</div></th>
    </tr>
    <? $sanpham_tronggio = giohang_theo_id_ls($lichsu['giohang_id'], $ketnoi); ?>
    <?php $tongtien =0; ?>
    <?php while ($sp_trong_gh = mysqli_fetch_assoc($sanpham_tronggio)): ?>
    <tr>
        <td> 
            <div class="cart-product-value cart-content-product-detail">
                <img src="<?php echo SITE_URL . 'hinhsanpham/' . $sp_trong_gh['hinh']; ?>" class="cart-product-image" alt="image">
                <div class="cart-product-value-name">
                    <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_chitiet.php?sanpham_id=' . $sp_trong_gh['sanpham_id']; ?>">
                        <?php echo $sp_trong_gh['ten_sanpham']; ?>
                    </a>
                </div>
            </div>
        </td>
        <td><b></b> <?php echo number_format($sp_trong_gh['gia'], 0, '', '.'); ?> VNĐ</b> </td> 
        <td ><?php echo $sp_trong_gh['soluong']; ?></td>
        <?php $tongtien = $sp_trong_gh['gia']*$sp_trong_gh['soluong'] + $tongtien ; ?>
        <td>
            <div class="cart-product-value cart-price-amount">
                <label class="price"><?php echo number_format($sp_trong_gh['gia']*$sp_trong_gh['soluong'], 0, '', '.'); ?></label><span>VNĐ</span>
            </div>
        </td>         
    </tr>
    <?php endwhile; ?>
    <tr>
        <td colspan="3"> <p align="right">TỔNG CỘNG : </p></td>
        <td> <span class="cart-info-detail-item-right"><?php echo number_format($tongtien, 0, '', '.'); ?> VNĐ</span></td>

    </tr>
</table>
<p>&nbsp;</p>
<hr><hr>

<?php endwhile; ?>
<?php }?>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>