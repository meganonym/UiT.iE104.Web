<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>
<? if(isset($danhmuc_hienhoat)){ ?>
<div>
    <div class="page-title">THÊM SẢN PHẨM MỚI</div>
<form name="add" method="post" enctype="multipart/form-data" action="">


	<div class="pf-info-detail" align="center">
		<?php echo isset($error['ten_sanpham']) ? $error['ten_sanpham'] : ''; unset($error['ten_sanpham'] );?>
		<?php echo isset($error['gia_sanpham']) ? $error['gia_sanpham'] : ''; unset($error['gia_sanpham'] ); ?>
        <?php echo isset($_SESSION['thanhcong']) ? 'Sản phẩm được thêm thành công' : ''; unset($_SESSION['thanhcong']); ?>
		<?php echo isset($trangthai) ? $trangthai : ''; unset($trangthai );?>
	</div>
    
    
    
     <div class="pf-info-detail">
        <label>Chọn danh mục:</label>
        <select name="danhmuc_sanpham_id">
            <?php while ($danhmuc_hh = mysqli_fetch_assoc($danhmuc_hienhoat)): ?>
                <option value="<?php echo $danhmuc_hh['danhmuc_sanpham_id']; ?>" <?php if(isset($_GET['danhmuc_sanpham_id']) && $_GET['danhmuc_sanpham_id']==$danhmuc_hh['danhmuc_sanpham_id']) { echo 'selected="selected"'; }?> >
                    <?php echo $danhmuc_hh['ten_danhmuc_sanpham']; ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="pf-info-detail">
        <label>Tên sản phẩm:</label>
        <input type="text" name="ten_sanpham" value="<?php echo isset($_POST['ten_sanpham']) ? $_POST['ten_sanpham'] : ''; ?>">
    </div>
    <div class="pf-info-detail">
        <label>Giá bán:</label>
        <input type="text" name="gia" value="<?php echo isset($_POST['gia']) ? $_POST['gia'] : ''; ?>">
    </div>
    <div class="pf-info-detail">
        <label>Trạng thái:</label>
        <input type="checkbox" style="height: initial;width: inherit;font-size:initial;" name="trangthai" value="1" checked>
    </div>
    <div class="pf-info-detail">
        
		<label>Hình ảnh:</label>
		<input type="file" accept="image/*" name="image" src="" id="file" onchange="loadFile(event)" style="display: none;">
		<img id="imageOutput" src="" alt="" width="250" height="250"  />
		<label class="product-choose-img" for="file" style="text-align:center;">Chọn hình</label> 
		<script>
			var loadFile = function (event) {
				var image = document.getElementById('imageOutput');
				image.src = URL.createObjectURL(event.target.files[0]);
			};
		</script>
	</div>
    <div class="pf-info-detail">
        <label>Chi tiết:</label>
        <!--  textarea sẽ được thay thế bởi CKEditor -->
       <textarea name="chitiet" cols="80" rows="10">   <?php echo isset($_POST['chitiet']) ? $_POST['chitiet'] : ''; ?>  </textarea>
       
       <script> CKEDITOR.replace( 'chitiet' ); </script> 
        </div>
    <div align="center">
        <input  class="nutbam"  type="submit" value="THÊM MỚI">
    </div>
</form>
</div>
<? }else{ ?>
<h3 align="center">CHƯA CÓ DANH MỤC SẢN PHẨM</h3>
<h4 align="center"><a class="nutbam" href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_them.php'; ?>">THÊM MỚI</a></h4>
<? } ?>


<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>