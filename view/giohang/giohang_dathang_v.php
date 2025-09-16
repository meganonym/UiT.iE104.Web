<!-- Header -->
<?php require  '../giaodien/header.php'; ?>
<!-- Header -->
<?php require '../giaodien/menuuser.php';?>
<p>&nbsp;</p>
    
    <form action="" name="capnhatsoluong" method="post">
        <div class="checkout">
        <div class="checkout-title">THANH TOÁN</div>
        <div class="checkout-content" style="width:80%;display:flex;margin:0 auto;">
            <div class="checkout-customer-info" style="width:40%;padding: 0 10px;">
                <div class="checkout-title-info">
                    <span>THÔNG TIN GIAO HÀNG</span>
                </div>
                <div class="checkout-content">
                    <div class="checkout-content-info">
                        <div>
                            <label>Họ và tên:<span style="color:red;">*</span></label>
                        </div>
                        <div><input type="text" name="hovaten" value="<?php echo $nguoidung_tt['hovaten']; ?>"></div>
                    </div>
                    <div class="checkout-content-info">
                        <div><label>Địa chỉ nhận hàng:<span style="color:red;">*</span></label></div>
                        <div><input type="text" name="diachi" value="<?php echo $nguoidung_tt['diachi']; ?>"></div>
                    </div>
                    <div class="checkout-content-info">
                        <div><label>Số điện thoại:<span style="color:red;">*</span></label></div>
                        <div><input type="text" name="dienthoai" value="<?php echo $nguoidung_tt['dienthoai']; ?>"></div>
                    </div>
                    <div class="checkout-content-info">
                        <div><label>Địa chỉ email:<span style="color:red;">*</span></label></div>
                        <div><input type="text" name="email" value="<?php echo $nguoidung_tt['email']; ?>" readonly></div>
                    </div>
                </div>
            </div>
            <div class="checkout-list-product" style="width:60%;padding: 10px 10px;border:5px solid #e4e4e4">
                <div class="checkout-title-info">
                    <span>ĐƠN HÀNG CỦA BẠN</span>
                </div>
                <div style="display:flex;margin-top:20px;">
                    <div class="checkout-content-left">SẢN PHẨM</div>
                    <div class="checkout-content-right">THÀNH TIỀN</div>
                </div>
                <div>
                    <?php $tongtien =0; ?>
                    <?php if (!empty($check_data_giohang['giohang_id'])) while ($sanpham_g = mysqli_fetch_assoc($sanpham_tronggio)): ?>
                    <div class="checkout-detail">
                        <div class="checkout-content-left"><?php echo $sanpham_g['ten_sanpham']; ?>: <span><?php echo number_format($sanpham_g['gia'], 0, '', '.'); ?> VNĐ</span>  X <span><?php echo $sanpham_g['soluong']; ?></span></div>
                        <div class="checkout-content-right"><?php echo number_format($sanpham_g['gia']*$sanpham_g['soluong'], 0, '', '.'); ?> VNĐ </div>
                    </div>
                   <?php $tongtien = $sanpham_g['gia']*$sanpham_g['soluong'] + $tongtien ; ?>
                    
                    <?php endwhile; ?>
                </div>
                <div class="checkout-detail">
                    <div class="checkout-content-left">VẬN CHUYỂN</div>
                    <div class="checkout-content-right">50 000 VNĐ</div>
                </div>
                <?php $tongtien = $tongtien + 50000 ; ?>
                <div class="checkout-detail">
                    <div class="checkout-content-left">TỔNG CỘNG</div>
                    <div class="checkout-content-right"><strong><?php echo number_format($tongtien, 0, '', '.'); ?> VNĐ</strong></div>
                </div>
                <div class="checkout-btn" align="right">
                    <button type="submit" >ĐẶT HÀNG</button>
                    <!--<input type="submit" value=" ĐẶT HÀNG " >-->
                </div>
            </div>
        </div>
    </div>
</form>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer.php'; ?>