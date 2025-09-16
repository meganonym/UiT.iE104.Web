<!-- Header -->
<?php require  '../giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require '../giaodien/menuadmin.php';?>
<p>&nbsp;</p>

<div>
        <div class="page-title">THÊM MỚI DANH MỤC SẢN PHẨM</div>
        <form name="edit" method="post" action="" enctype="multipart/form-data">

  
   <div class="pf-info-detail" align="center">
                <label>Tên danh mục:</label>
                <input type="text" name="ten_danhmuc_sanpham" value="<?php echo isset($_POST['ten_danhmuc_sanpham']) ? $_POST['ten_danhmuc_sanpham'] : ''; ?>">
            </div>
            <div class="pf-info-detail" align="center">
                <label>Trạng thái:</label>
                <input type="checkbox" style="height: initial;font-size: initial;width: inherit;" name="trangthai" value="1" checked>
            </div>
            <div class="pf-info-detail" align="center">
                <label>LOGO:</label>
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
            <div class="pf-info-detail" align="center">
        
                <label>BANNER:</label>
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
            <div class="pf-info-detail" align="center">
                <?php echo isset($error['ten_danhmuc_sanpham']) ? $error['ten_danhmuc_sanpham'] : ''; ?>
                <?php echo isset($trangthai) ? $trangthai : ''; ?>
            </div>
            <div align="center">
                <input  class="nutbam"  type="submit" value="Thêm mới">
            </div>
        </form>
    </div>


<p>&nbsp;</p>
<!-- footer -->
<?php require  '../giaodien/footer-admin.php'; ?>