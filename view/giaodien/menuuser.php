
<ul class="navibar">
        <li class="navi-item"><a href="<?php echo SITE_URL; ?>">Trang chủ</a></li>
        <li class="navi-item navibar-dropdown">
            <a class="navibar-dropbtn" href="<?php echo SITE_URL . 'view/sanpham/sanpham_danhsach.php'; ?>"> Sản Phẩm <i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i>
            </a>
            <div class="navibar-dropdown-content">
                <?php while ($menu_dm = mysqli_fetch_assoc($dmsp_menu)): ?>
                <a href="<?php echo SITE_URL . 'view/sanpham/sanpham_danhsach.php?danhmuc_sanpham_id='.$menu_dm['danhmuc_sanpham_id']; ?>"> 
                    <?php echo $menu_dm['ten_danhmuc_sanpham']; ?> 
                    
                </a>
                <?php endwhile; ?>
            </div>
        </li>
        <li class="navi-item navibar-dropdown">
            <a class="navibar-dropbtn"> Chính sách <i class="fa fa-chevron-circle-down" style="padding-left:5px;" aria-hidden="true"></i>
            </a>
            <div class="navibar-dropdown-content">
                <a href="<?php echo SITE_URL . 'view/info/dieukhoan.php'; ?>">Điều khoản sử dụng</a>
                <a href="<?php echo SITE_URL . 'view/info/trahang.php'; ?>">Chính sách trả hàng </a>
                <a href="<?php echo SITE_URL . 'view/info/baomat.php'; ?>">Chính sách bảo mật </a>
            </div>
        </li>
        <li class="navi-item"><a href="<?php echo SITE_URL . 'view/info/baohanh.php' ;?>">Bảo hành</a></li>
        <li class="navi-item"><a href="<?php echo SITE_URL . 'view/info/lienhe.php' ;?>">Liên Hệ</a></li>
        <li class="navi-item"><a href="<?php echo SITE_URL . 'view/info/gioithieu.php' ;?>">Giới Thiệu</a></li>
		
		<?php if (isset($_SESSION['nguoidung_id'])){ ?>
			<li class="navi-item navibar-dropdown admin-name">
				<a class="navibar-dropbtn" href="<?php echo SITE_URL.'view/nguoidung/nguoidung_sua.php' ; ?>"> 
					<i class="fa fa-user" aria-hidden="true" style="margin-right: 6px"></i><?php echo $_SESSION['hovaten'] ; ?>	 
				</a>
				<div class="navibar-dropdown-content">
					<a href="<?php echo SITE_URL.'view/nguoidung/nguoidung_sua.php' ; ?>" title="Tài khoản của tôi">Tài khoản của tôi</a>
					<a href="<?php echo SITE_URL.'view/giohang/giohang_xem.php' ; ?>" title="Đăng xuất">Giỏ hàng của tôi</a>
					<a href="<?php echo SITE_URL.'view/giohang/giohang_da_dathang.php' ; ?>" title="Đăng xuất">Đơn hàng đã mua</a>
					<a href="<?php echo SITE_URL.'view/nguoidung/dangxuat.php' ; ?>" title="Đăng xuất">Đăng xuất</a>
				</div>
			</li>
	
			<li class="navi-item admin-name"></li>
		<li class="navi-item admin-name"><b><a href="<?php echo SITE_URL.'view/giohang/giohang_xem.php' ; ?>" style=" padding-top: 0px; padding-bottom: 0px; font-size: 25px; "><?php if(isset($_SESSION['soluong_sanpham']) && $_SESSION['soluong_sanpham'] >0) {echo $_SESSION['soluong_sanpham'] ;}  ?><img width="40" height="40" class="hd-cart-icon" src="<?php echo SITE_URL.'view/giaodien/hinhanh/cart-icon.png' ; ?>" alt="image"></a></b></li>

		<?php } else { ?>
			<li class="navi-item admin-name"><a href="<?php echo SITE_URL.'view/nguoidung/dangky.php' ; ?>"><img src="<?php echo SITE_URL.'view/giaodien/hinhanh/icon-register.png' ; ?>" alt="register icon">Đăng ký</a></li>	
			<li class="navi-item admin-name"><a href="<?php echo SITE_URL.'view/nguoidung/dangnhap.php' ; ?>"><img src="<?php echo SITE_URL.'view/giaodien/hinhanh/icon-login.png' ; ?>" alt="login icon"> Đăng nhập</a> </li>

		<?php  } ?>
		
    </ul>

