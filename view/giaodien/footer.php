
	<button onclick="topFunction()" id="scroll-to-top" title="Go to top">
        <i class="fa fa-chevron-circle-up fa-3x" style="color: #C4A01C"></i>
    </button>
    
<div class="footer">
	<div class="footer-content">
		<div class="footer-logo">
			<br>
			<form class="hd-search-frm" action="<?php echo SITE_URL.'view/info/timkiem.php' ; ?>" method="GET">
				<input type="text" placeholder="Tìm sản phẩm ..." name="timkiem" >
				<button type="submit" ><i class="fa fa-search" style="color: white;"></i></button>
			</form>
			

			<img  style="display: block;margin: 0px auto 0px;"  src="<?php echo SITE_URL.'view/giaodien/hinhanh/logo1.png' ; ?>"  alt="Footer image">
		</div>
		<div class="footer-contact">
			<label class="footer-title"><b>Thông tin liên hệ</b></label>
			<div class="footer-contact-item">
				<i class="fa fa-map-marker" aria-hidden="true"></i> Company: 
				<a href="https://maps.app.goo.gl/WwMMmM2j4W5r3svF7" target="_blank">CiTD UiT</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-map-marker" aria-hidden="true"></i> Store : 
				<a href="https://maps.app.goo.gl/62n8bQZXZDEbjm2N7" target="_blank">khu phố 34, phường Linh Xuân, TP. Hồ Chí Minh</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-mobile" aria-hidden="true"></i>
				<a href="tel:0912345678">091 2345 678</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<a href="mailto:23730213@ms.uit.edu.vn">23730213@ms.uit.edu.vn</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-globe" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL ; ?>" title="">IE104 Internet and Web Technology</a>
			</div>
			<img style="display: block;margin: 0px auto 0px;" src="<?php echo SITE_URL.'view/giaodien/hinhanh/thongbao.png' ; ?>" alt="Footer image">
			
		</div>
		<div class="footer-link">
			<label class="footer-title"><b>Thông tin thêm</b></label>
			
			
			<div class="footer-contact-item">
				<i class="fa fa-play" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL . 'view/info/gioithieu.php' ;?>">Giới thiệu</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-play" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL . 'view/info/lienhe.php' ;?>">Liên hệ</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-play" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL . 'view/info/baohanh.php'; ?>">Chính sách bảo hành</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-play" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL . 'view/info/trahang.php'; ?>">Hướng dẫn đổi trả</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-play" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL . 'view/info/baomat.php'; ?>" title="">Chính sách bảo mật</a>
			</div>
			<div class="footer-contact-item">
				<i class="fa fa-play" aria-hidden="true"></i>
				<a href="<?php echo SITE_URL . 'view/info/dieukhoan.php'; ?>" title="">Điều khoản sử dụng</a>
			</div>
			<img  style="background: #C4A01C ;display: block;margin: 0px auto 0px; will-change: auto; max-width: 86%" src="<?php echo SITE_URL.'view/giaodien/hinhanh/chinhhang.png' ; ?>" alt="Footer image">
			
			
		</div>
	</div>
	<div class="footer-copyright">
		<p>&copy; 2025 <a style="color: white" href="<?php echo SITE_URL ; ?>" title="">IE104 Internet and Web Technology</a> - Phạm Bùi Hải Thanh </p>
	</div>
</div>
<script>
	//quay về đầu trang
	var mybutton = document.getElementById("scroll-to-top");
	window.onscroll = function () { scrollFunction() };
	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
    
</body>