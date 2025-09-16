<?php
//Khởi động session
session_start();

if(!isset($_SESSION['nhom_nguoidung_id'])){
	header('location:../../quanly/nguoidung/dangnhap.php');
}else{
    if($_SESSION['nhom_nguoidung_id']>2){
        header('location:../../index.php');
    }
}

require '../cauhinh/cauhinh.php';
require '../cauhinh/ketnoi.php';
require 'danhmucsanpham/loaisanpham_m.php';

//Lấy danh sách danh mục sản phẩm có sản phẩm hiện hoạt
$dmsp_menu = lay_dmsp_cosp_hh($ketnoi);


?>
<!-- Header -->
<?php require  'giaodien/header-admin.php'; ?>

<!-- Menu -->
<?php require 'giaodien/menuadmin.php';?>
<p>&nbsp;</p>


<div align="center" style="padding-top:30px; max-width: 86%; height: 550px">
<!--	<img alt="Quản lý Website" src="giaodien/nen_ql.jpg" width="900" height="auto">-->
	
	<div class="slideshow-container">
		<div class="mySlides fade">
		  <img src="<?php echo SITE_URL . 'quanly/giaodien/hinhanh/nen_ql1.jpg'; ?>" style=" with: auto; height: 450px;">
<!--
		  <div class="text">
			<section id="offer"> 
				<h2>GIẢM GIÁ SỐC 30%</h2>
				<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
			</section>
			</div>
-->
		</div>

		<div class="mySlides fade">
		  <img src="<?php echo SITE_URL . 'quanly/giaodien/hinhanh/nen_ql2.webp'; ?>" style=" with: auto; height: 450px;">
<!--
		  <div class="text">
			<section id="offer"> 
				<h2>GIẢM GIÁ SỐC 30%</h2>
				<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
			</section>
			</div>
-->
		</div>

		<div class="mySlides fade">
		  <img src="<?php echo SITE_URL . 'quanly/giaodien/hinhanh/Best-Summer-Watches.png'; ?>" style=" with: auto; height: 450px;">
<!--
		  <div class="text">
			<section id="offer"> 
				<h2>GIẢM GIÁ SỐC 30%</h2>
				<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
			</section>
			</div>
-->
		</div>

		<div class="mySlides fade">
		  <img src="<?php echo SITE_URL . 'quanly/giaodien/hinhanh/chronoexpert.jpg'; ?>" style=" with: auto; height: 450px;">
<!--
		  <div class="text">
			<section id="offer"> 
				<h2>GIẢM GIÁ SỐC 30%</h2>
				<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
			</section>
			</div>
-->
		</div>

		<div class="mySlides fade">
		  <img src="<?php echo SITE_URL . 'quanly/giaodien/hinhanh/Top-10-Uhren-unter-1000-Euro.png'; ?>" style=" with: auto; height: 450px;">
<!--
		  <div class="text">
			<section id="offer"> 
				<h2>GIẢM GIÁ SỐC 30% / SẢN PHẨM</h2>
				<p>CHỈ TRONG THÁNG 12 VÀ CHỈ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
			</section>
			</div>
-->
		</div>

		<div class="mySlides fade">
		  <img src="<?php echo SITE_URL . 'quanly/giaodien/hinhanh/TYIG-Affordable-Watches-gear-patrol-lead-full.jpg'; ?>" style=" with: auto; height: 450px;">
<!--
		  <div class="text">
			<section id="offer"> 
				<h2>GIẢM GIÁ SỐC 30%</h2>
				<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
			</section>
			</div>
-->
		</div>
	</div>
      <br>
	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(0)"></span> 
		<span class="dot" onclick="currentSlide(1)"></span> 
		<span class="dot" onclick="currentSlide(2)"></span> 
		<span class="dot" onclick="currentSlide(3)"></span> 
		<span class="dot" onclick="currentSlide(4)"></span> 
		<span class="dot" onclick="currentSlide(5)"></span> 
	  </div>  
    <div style="clear: both"></div>
    <script>
      //khai báo biến slideIndex đại diện cho slide hiện tại
      var slideIndex;
      // KHai bào hàm hiển thị slide
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }

          slides[slideIndex].style.display = "block";  
          dots[slideIndex].className += " active";
          //chuyển đến slide tiếp theo
          slideIndex++;
          //nếu đang ở slide cuối cùng thì chuyển về slide đầu
          if (slideIndex > slides.length - 1) {
            slideIndex = 0
          }    
          //tự động chuyển đổi slide sau 30s
          setTimeout(showSlides, 30000);
      }
      //mặc định hiển thị slide đầu tiên 
      showSlides(slideIndex = 0);


      function currentSlide(n) {
        showSlides(slideIndex = n);
      }
    </script>
</div>

<p>&nbsp;</p>
<!-- footer -->
<?php require  'giaodien/footer-admin.php'; ?>