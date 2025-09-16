
	<button onclick="topFunction()" id="scroll-to-top" title="Go to top">
        <i class="fa fa-chevron-circle-up fa-3x" style="color: #C4A01C"></i>
    </button>
    
<div class="footer">
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