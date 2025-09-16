<ul class="navibar">
        <li class="navi-item"><a href="<?php echo SITE_URL . 'quanly'; ?>">TRANG QUẢN TRỊ</a></li>
        <li class="navi-item navibar-dropdown">
            <a class="navibar-dropbtn" href="javascript:void(0)">DANH MỤC SẢN PHẨM<i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i></a>
            <div class="navibar-dropdown-content">
                <a href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_danhsach.php'; ?>">Danh sách danh mục SP</a>
                <a href="<?php echo SITE_URL . 'quanly/danhmucsanpham/loaisanpham_them.php'; ?>">Thêm mới danh mục SP</a>
            </div>
        </li>
        <li class="navi-item navibar-dropdown">
            <a class="navibar-dropbtn" href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_danhsach.php'; ?>">SẢN PHẨM<i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i></a>
            <div class="navibar-dropdown-content">
                <a href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_them.php'; ?>">THÊM SẢN PHẨM</a>
                <?php while ($menu_dm = mysqli_fetch_assoc($dmsp_menu)): ?>
                <a href="<?php echo SITE_URL . 'quanly/sanpham/sanpham_danhsach.php?danhmuc_sanpham_id='.$menu_dm['danhmuc_sanpham_id']; ?>"> <?php echo $menu_dm['ten_danhmuc_sanpham']; ?> </a>
                <?php endwhile; ?>
                
            </div>
        </li>
        <li class="navi-item navibar-dropdown">
            <a class="navibar-dropbtn" href="javascript:void(0)">THÀNH VIÊN<i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i></a>
            <div class="navibar-dropdown-content">
                <a href="<?php echo SITE_URL . 'quanly/nguoidung/nguoidung_danhsach.php'; ?>">Danh sách thành viên</a>
                <a href="<?php echo SITE_URL . 'quanly/nguoidung/nguoidung_themmoi.php'; ?>">Thêm mới thành viên</a>
            </div>
        </li>
        <li class="navi-item navibar-dropdown">
            <a class="navibar-dropbtn" href="javascript:void(0)">ĐƠN HÀNG<i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i></a>
            <div class="navibar-dropdown-content">
                <a href="<?php echo SITE_URL . 'quanly/donhang/donhang_danhsach.php'; ?>">Đơn hàng chưa xử lý</a>
                <a href="<?php echo SITE_URL . 'quanly/donhang/donhang_da_xuly.php'; ?>">Đơn hàng đã xử lý xong</a>
            </div>
        </li>
        <li class="navi-item navibar-dropdown admin-name hd-user">
            <a class="navibar-dropbtn" href="javascript:void(0)">Chào <span><?php if(isset($_SESSION['hovaten'])){echo $_SESSION['hovaten'] ;} ?></span><i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i></a>
            <div class="navibar-dropdown-content admin-logout">
                <a href="<?php echo SITE_URL . 'quanly/nguoidung/dangxuat.php'; ?>">Đăng xuất</a>
            </div>
        </li>
    </ul>
<hr>
  