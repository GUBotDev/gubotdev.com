<?php 
require('layout/header.php');
?>
<!-- Banner -->
<section id="banner" style="padding: 0 0 0 0;">
	<div class="inner" ></div>
</section>

<div class="wrapper" style="padding: 2em 0 0 0;">

	<!-- Four -->
	<section id="four" class="wrapper alt style1">
		<div class="inner">
			<h2 class="major">Store</h2>
			<section class="features">
				<?php
					$stmt3 = $db->prepare('SELECT * FROM products');
					$stmt3->execute();
					$row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

					$productDis = false;

					foreach ($row3 as $row) {

						echo '
							<article>
								<form name="'.$row['name'].'" method="post" action="item.php" autocomplete="off">
									<input type="hidden" name="id" id="id" value="'.$row['id'].'" />
									<a href="#" onclick="document.forms[\''.$row['name'].'\'].submit()" class="image"><img src="images/uploads/'.$row['pictureName'].'" alt="" /></a>
									<input style="display: hidden" type="submit" name="submit7" value="Confirm Changes">
								</form>
								<h3 class="major">'.$row['name'].'</h3>
								<p>$'.$row['price'].'</p>
								<p>'.$row['shortDesc'].'</p>
								<p></p>
							</article>
						';
					}
				?>
			</section>
		</div>
	</section>

	

</section>
</div>

<?php
//include header template
require('layout/footer.php');
?>
