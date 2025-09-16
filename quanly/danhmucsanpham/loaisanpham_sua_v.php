<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>
<? if(isset($_GET['danhmuc_sanpham_id'])){ ?>
<div>
        <div class="page-title">CHỈNH SỬA DANH MỤC SẢN PHẨM</div>
        <form name="edit" method="post" action="" enctype="multipart/form-data">

    <?php if (isset($_SESSION['success'])): ?>
        <p style="color: green;">Danh mục sản phẩm đã được chỉnh sửa thành công!</p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    
    <div class="pf-info-detail" align="center">
        <label>Tên danh mục:</label>
        <input type="text" name="ten_danhmuc_sanpham" value="<?php echo $loaisanpham_id['ten_danhmuc_sanpham']; ?>">
    </div>
    <div class="pf-info-detail" align="center">
        <label>Trạng thái:</label>
        <input type="checkbox" style="height: initial;font-size: initial;width: inherit;" name="trangthai" value="1" <?php echo ($loaisanpham_id['trangthai'] == 1) ? 'checked="checked"' : ''; ?>>
    </div>
    <div class="pf-info-detail" align="center">
			<label>Logo :</label><img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $loaisanpham_id['logo']; ?>"  width="268" height="125" />
		<div style="display: block;">
			<label>Thay logo:</label>
            <input type="file" accept="image/*" name="logo" src="" id="filelogo" onchange="loadFilelogo(event)" style="display: none;">
            <img id="logoOutput" src="" alt="" width="268" height="125"  />
            <label class="product-choose-img" for="filelogo" style="text-align:center;">Chọn hình</label> 
            <script>
                var loadFilelogo = function (event) {
                    var logo = document.getElementById('logoOutput');
                    logo.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>
		</div>
	</div>
    <div class="pf-info-detail" align="center">
        <label>Banner :</label><img src="<?php echo SITE_URL . 'hinhdanhmucsanpham/' . $loaisanpham_id['banner']; ?>"  width="348" height="120" />
		<div style="display: block;">
            <label>Thay banner:</label>
            <input type="file" accept="image/*" name="banner" src="" id="filebanner" onchange="loadFilebanner(event)" style="display: none;">
            <img id="bannerOutput" src="" alt="" width="870" height="300"  />
            <label class="product-choose-img" for="filebanner" style="text-align:center;">Chọn hình</label> 
            <script>
                var loadFilebanner = function (event) {
                    var banner = document.getElementById('bannerOutput');
                    banner.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>
		</div>
	</div>
    <div class="pf-info-detail" align="center">
        <?php echo isset($error['ten_danhmuc_sanpham']) ? $error['ten_danhmuc_sanpham'] : ''; ?>
        <?php echo isset($trangthai) ? $trangthai : ''; ?>
    </div>
    
    <div align="center">
        <input  class="nutbam"  type="submit" value="Chỉnh sửa">
    </div>
</form>
</div>

<? }else{ ?>
<h3 align="center">CHƯA CÓ DANH MỤC SẢN PHẨM</h3>
<h4 align="center"><a href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_them.php'; ?>">THÊM MỚI</a></h4>
<? } ?>
<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>