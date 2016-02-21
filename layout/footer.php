
<!-- footer -->
<section id="footer">
	<div class="inner">
		<ul class="copyright">
			<li>&copy;<?php echo date("Y"); ?> GUBotDev All rights reserved.</li>
			<li><a href="https://github.com/GUBotDev" class="icon fa-github"><span class="label">Github</span></a></li>
			<li><a href="https://www.facebook.com/GUBotDevelopment" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="https://twitter.com/gubotdev" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="https://www.youtube.com/channel/UCZmfiBEb2jFXskunSBqsjGA" class="icon fa-youtube"><span class="label">YouTube</span></a></li>
		</ul>
	</div>
</section>

</div>

<script src="assets/js/skel.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery.rwdImageMaps.min.js"></script>
<script>
$(document).ready(function(e) {
	$('img[usemap]').rwdImageMaps();
});

var ids = ["contactHide", "loginHide", "signUpHide", "errorsHide"];

function toggleVisibility(id) {
	var el = document.getElementById(id);

	if (id == 'mainMenuBlock'){
		document.getElementById("mainMenu").style.display = 'block';

		document.getElementById("contactHide").style.display = 'none';
		document.getElementById("loginHide").style.display = 'none';
		document.getElementById("signUpHide").style.display = 'none';

		<?php
		if(isset($error)){
			echo "document.getElementById('errorsHide').style.display = 'none';";
		}
		?>

	}
	else
	{
		el.style.display = 'block';

		if (id == ids[0]){
			document.getElementById("loginHide").style.display = 'none';
			document.getElementById("signUpHide").style.display = 'none';
			<?php
			if(isset($error)){
				echo "document.getElementById('errorsHide').style.display = 'none';";
			}

			?>
		}
		else if (id == ids[1]){
			document.getElementById("contactHide").style.display = 'none';
			document.getElementById("signUpHide").style.display = 'none';
			<?php
			if(isset($error)){
				echo "document.getElementById('errorsHide').style.display = 'none';";
			}

			?>
		}
		else if (id == ids[2]){
			document.getElementById("contactHide").style.display = 'none';
			document.getElementById("loginHide").style.display = 'none';
			<?php
			if(isset($error)){
				echo "document.getElementById('errorsHide').style.display = 'none';";
			}

			?>
		}
		else if (id == ids[3]){
			document.getElementById("loginHide").style.display = 'none';
			document.getElementById("signUpHide").style.display = 'none';
			document.getElementById("contactHide").style.display = 'none';

		}

		document.getElementById("mainMenu").style.display = 'none';
	}
};



	</script>

</body>
</html>