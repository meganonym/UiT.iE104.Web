
<div class="slideshow-container">
	<div class="mySlides fade">
	  <img src="<?php echo SITE_URL . 'view/giaodien/hinhanh/banner_1.jpg'; ?>" style="width:100%">
	  <div class="text">
		<section id="offer"> 
			<h2>GIẢM GIÁ SỐC 30%</h2>
			<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
	  	</section>
		</div>
	</div>

	<div class="mySlides fade">
	  <img src="<?php echo SITE_URL . 'view/giaodien/hinhanh/banner_2.jpg'; ?>" style="width:100%">
	  <div class="text">
		<section id="offer"> 
			<h2>GIẢM GIÁ SỐC 30%</h2>
			<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
	  	</section>
		</div>
	</div>

	<div class="mySlides fade">
	  <img src="<?php echo SITE_URL . 'view/giaodien/hinhanh/banner_3.jpg'; ?>" style="width:100%">
	  <div class="text">
		<section id="offer"> 
			<h2>GIẢM GIÁ SỐC 30%</h2>
			<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
	  	</section>
		</div>
	</div>
	
	<div class="mySlides fade">
	  <img src="<?php echo SITE_URL . 'view/giaodien/hinhanh/banner_4.jpg'; ?>" style="width:100%">
	  <div class="text">
		<section id="offer"> 
			<h2>GIẢM GIÁ SỐC 30%</h2>
			<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
	  	</section>
		</div>
	</div>

	<div class="mySlides fade">
	  <img src="<?php echo SITE_URL . 'view/giaodien/hinhanh/banner_5.jpg'; ?>" style="width:100%">
	  <div class="text">
		<section id="offer"> 
			<h2>GIẢM GIÁ SỐC 30% / SẢN PHẨM</h2>
			<p>CHỈ TRONG THÁNG 12 VÀ CHỈ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
	  	</section>
		</div>
	</div>

	<div class="mySlides fade">
	  <img src="<?php echo SITE_URL . 'view/giaodien/hinhanh/banner_6.jpg'; ?>" style="width:100%">
	  <div class="text">
		<section id="offer"> 
			<h2>GIẢM GIÁ SỐC 30%</h2>
			<p>CHỈ TRONG THÁNG 12 VÀ DÀNH CHO THÀNH VIÊN ĐẶT HÀNG ONLINE</p>
	  	</section>
		</div>
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