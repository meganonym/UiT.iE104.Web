<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>
<?php if(isset($_GET['giohang_id'])){  ?>
    <table width="600" cellpadding="10" border="1" align="center">
        <tr>
            <th>Trạng thái đặt hàng</th>
            <th>Trạng thái liên lạc</th>
            <th>Trạng thái xử lý</th>
            <th>Ngày tạo</th>
        </tr>
        <tr>
            <td style="font-weight: 600; "> <?php echo ($donhang['dathang'] == 1) ? '<p style="color: green">Đặt hàng</p>' : '<p style="color: red">Chưa đặt hàng</p>' ?> </td>

            <td style="font-weight: 600; "> <?php echo ($donhang['lienlac'] == 1) ? '<p style="color: green">Đã liên hệ khách hàng</p>' : '<p style="color: red">Chưa liên hệ khách hàng</p>' ?> </td>

            <td style="font-weight: 600; "> <?php echo ($donhang['xuly'] == 1) ? '<p style="color: green">Đơn hàng đã xử lý xong</p>' : '<p style="color: red">Đơn hàng chưa xử lý</p>' ?> </td>

            <td style="font-weight: 600; "> <?php echo date('d/m/Y H:i:s', strtotime($donhang['ngaytao'])); ?></a> </td>
        </tr>
    </table>
<p>&nbsp;</p>
    <div align="center">
        
        <?php if ($donhang['xuly'] != 1){?>
            <a class="nutbam" href="<?php echo SITE_URL . 'quanly/donhang/donhang_xuly.php?giohang_id=' . $donhang['giohang_id']; ?> ">Xử Lý</a>
        <?php }?>
    </div>
<p>&nbsp;</p>
    
    <div class="checkout">
    <div class="checkout-title">CHI TIẾT ĐƠN HÀNG</div>
    <div class="checkout-content" style="width:80%;display:flex;margin:0 auto;">
        <div class="checkout-customer-info" style="width:40%;padding: 0 10px;">
            <div class="checkout-title-info">
                <span>THÔNG TIN NGƯỜI MUA</span>
            </div>
            <div class="checkout-content">
                <div class="checkout-content-info">
                    <div>
                        <label>Họ và tên: <?php echo $nguoidung_tt['hovaten']; ?></label>
                    </div>
                </div>
                <div class="checkout-content-info">
                    <div><label>Địa chỉ nhận hàng: <?php echo $nguoidung_tt['diachi']; ?></label></div>
                </div>
                <div class="checkout-content-info">
                    <div><label>Số điện thoại: <?php echo $nguoidung_tt['dienthoai']; ?></label></div>
                </div>
                <div class="checkout-content-info">
                    <div><label>Địa chỉ email: <?php echo $nguoidung_tt['email']; ?></label></div>
                </div>
            </div>
        </div>
        <div class="checkout-list-product" style="width:60%;padding: 30px 10px;border:10px solid #e4e4e4">
            <div class="checkout-title-info">
                <span>ĐƠN HÀNG CỦA <?php echo $nguoidung_tt['hovaten']; ?></span>
            </div>
            <div style="display:flex;margin-top:20px;">
                <div class="checkout-content-left">SẢN PHẨM</div>
                <div class="checkout-content-right">THÀNH TIỀN</div>
            </div>
            <div>
                <?php $tongtien =0; ?>
                <?php  while ($sanpham_g = mysqli_fetch_assoc($donhang_chitiet)): ?>
                <div class="checkout-detail">
                    <div class="checkout-content-left"><?php echo $sanpham_g['ten_sanpham']; ?>: <span><?php echo number_format($sanpham_g['gia'], 0, '', '.'); ?> VNĐ</span>  X <span><?php echo $sanpham_g['soluong']; ?></span></div>
                    <div class="checkout-content-right"><?php echo number_format($sanpham_g['gia']*$sanpham_g['soluong'], 0, '', '.'); ?> VNĐ </div>
                </div>
               <?php $tongtien = $sanpham_g['gia']*$sanpham_g['soluong'] + $tongtien ; ?>

                <?php endwhile; ?>
            </div>
            <div class="checkout-detail">
                <div class="checkout-content-left">VẬN CHUYỂN</div>
                <div class="checkout-content-right">50 000 đ</div>
            </div>
            <?php $tongtien = $tongtien + 50000 ; ?>
            <div class="checkout-detail">
                <div class="checkout-content-left">TỔNG CỘNG</div>
                <div class="checkout-content-right"><strong><?php echo number_format($tongtien, 0, '', '.'); ?> VNĐ</strong></div>
            </div>

        </div>
    </div>
    </div>
<?php } else { ?>
<h2 align="center" > Chưa có thông tin đơn hàng</h2>
<?php }?>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>