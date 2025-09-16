<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>

<div>
    <div class="page-title">SẢN PHẨM CHI TIẾT</div>
<form name="edit" method="post" enctype="multipart/form-data" action="">

    <div class="pf-info-detail" align="center">
		
		<?php echo isset($error['danhmuc_sanpham_id']) ? $error['danhmuc_sanpham_id'] : ''; unset($error['danhmuc_sanpham_id'] );?>
		<?php echo isset($error['ten_sanpham']) ? $error['ten_sanpham'] : ''; unset($error['ten_sanpham'] );?>
		<?php echo isset($error['gia_sanpham']) ? $error['gia_sanpham'] : ''; unset($error['gia_sanpham'] ); ?>
		<?php echo isset($trangthai) ? $trangthai : ''; unset($trangthai );?>
	</div>
    
    <div class="pf-info-detail">
        <label>Danh mục:</label>
		
        <select name="danhmuc_sanpham_id">
            <?php while ($danhmuc_hh = mysqli_fetch_assoc($danhmuc_hienhoat)): ?>
                <option value="<?php echo $danhmuc_hh['danhmuc_sanpham_id']; ?>"<?php echo ($danhmuc_hh['danhmuc_sanpham_id'] == $sanpham['danhmuc_sanpham_id']) ? 'selected="selected"' : ''; ?>>
                    <?php echo $danhmuc_hh['ten_danhmuc_sanpham']; ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="pf-info-detail">
        <label>Tên sản phẩm:</label>
        <input type="text" name="ten_sanpham" value="<?php echo $sanpham['ten_sanpham']; ?>">
    </div>
    <div class="pf-info-detail">
        <label>Giá bán:</label>
        <input type="text" name="gia" value="<?php echo $sanpham['gia']; ?>">
    </div>
    <div class="pf-info-detail">
        <label>Trạng thái:</label>
        <input type="checkbox" style="height: initial;width: inherit;font-size:initial;"  name="trangthai" <?php echo ($sanpham['trangthai'] == 1) ? 'checked="checked"' : ''; ?>>

    </div>
   
	<div class="pf-info-detail">
			<label>Hình ảnh :</label><img src="<?php echo SITE_URL . 'hinhsanpham/' . $sanpham['hinh']; ?>"  width="250" height="250" />
		<div style="display: block;">
			<label>Thay hình ảnh:</label><input type="file" accept="image/*" name="image" src="" id="file" onchange="loadFile(event)" style="display: none;">
				<img id="imageOutput" src="" alt="" width="250" height="250"  /><label class="product-choose-img" for="file" style="text-align:center;">Chọn hình</label> 
			<script>
				var loadFile = function (event) {
					var image = document.getElementById('imageOutput');
					image.src = URL.createObjectURL(event.target.files[0]);
				};
			</script>
		</div>
	</div>
    <div class="pf-info-detail">    
        <label>Chi tiết:</label>
        <!-- (2): textarea sẽ được thay thế bởi CKEditor -->
       <textarea name="chitiet" cols="80" rows="30">   <?php echo $sanpham['chitiet']; ?>  </textarea>
       
       <script> CKEDITOR.replace( 'chitiet' ); </script> 
        
        
    </div>
    <div align="center">
        <input class="nutbam" type="submit" value="CẬP NHẬT">
    </div>
</form>
</div>


<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>