<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>

<p>&nbsp;</p><p>&nbsp;</p>
<? if ($tongso_record>0) { ?>
<H2 align="center">DANH SÁCH ĐƠN HÀNG CHƯA XỬ LÝ</H2>

<?php if (isset($_SESSION['xulydonhang'])): ?>
    <p align="center" style="color: green;">Đơn hàng số <?php echo $_SESSION['xulydonhang']; ?>  đã cập nhật thành công!</p>
    <?php unset($_SESSION['xulydonhang']); ?>
<?php endif; ?>
<table width="100%" cellpadding="10" border="1">
    <tr>
        <th>Mã số đơn hàng</th>
        <th>Khách hàng</th>
		<th>Trạng thái đặt hàng</th>
        <th>Trạng thái liên lạc</th>
        <th>Trạng thái xử lý</th>
		<th>Ngày tạo</th>
        <th>Tác vụ</th>
    </tr>
    <?php while ($donhang = mysqli_fetch_assoc($danhsach_donhang)): ?>
    <tr>
        <td> <?php echo $donhang['giohang_id']; ?> </td>

        <td> <?php echo lay_ten_nguoidung ($ketnoi, $donhang['nguoidung_id']) ; ?></a> </td>

        <td style="font-weight: 600; "> <?php echo ($donhang['dathang'] == 1) ? '<p style="color: green">Đặt hàng</p>' : '<p style="color: red">Chưa đặt hàng</p>' ?> </td>

        <td style="font-weight: 600; "> <?php echo ($donhang['lienlac'] == 1) ? '<p style="color: green">Đã liên hệ khách hàng</p>' : '<p style="color: red">Chưa liên hệ khách hàng</p>' ?> </td>

        <td style="font-weight: 600; "> <?php echo ($donhang['xuly'] == 1) ? '<p style="color: green">Đơn hàng đã xử lý xong</p>' : '<p style="color: red">Đơn hàng chưa xử lý</p>' ?> </td>

        <td style="font-weight: 600; "> <?php echo date('d/m/Y H:i:s', strtotime($donhang['ngaytao'])); ?></a> </td>

        <td align="center">
            <a class="nutbam" href="<?php echo SITE_URL . 'quanly/donhang/donhang_xuly.php?giohang_id=' . $donhang['giohang_id']; ?> ">Xử Lý</a> 
            
            &nbsp;&nbsp;|&nbsp;&nbsp;
            
            <a class="nutbam" href="<?php echo SITE_URL . 'quanly/donhang/donhang_xem.php?giohang_id=' . $donhang['giohang_id']; ?> ">Xem</a>
        </td>
            </tr>
            <?php endwhile; ?>
        </table> 
<!-- phân trang' -->
<div class="pagination">
    <div class="pagination-center">
        <?php for($i=1;$i<=$tongso_page;$i++){ ?>
            <a href="donhang_danhsach.php?page=<?php echo $i; ?>" <?php if($page == $i) echo "class='active'"; ?> ><?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>
<? }else{ ?>
<h3 align="center">CHƯA CÓ ĐƠN HÀNG</h3>
<? } ?>

<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>