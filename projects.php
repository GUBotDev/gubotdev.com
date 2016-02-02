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
			<h2 class="major">Projects - Buy or Build</h2>
			<section class="features">
				<?php
					$stmt3 = $db->prepare('SELECT * FROM products');
					$stmt3->execute();
					$row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

					foreach ($row3 as $row) {

						echo '
							<article>
								<form name="form'.$row['id'].'" method="post" action="item.php" autocomplete="off">
									<input type="hidden" name="id" id="id" value="'.$row['id'].'" />
									<a href="JAVASCRIPT:form'.$row['id'].'.submit()" class="image"><img src="images/uploads/'.$row['pictureName'].'" alt="" /></a>
								</form>
								<h3 class="major">'.$row['name'].'</h3>
								<p>$'.$row['price'].'
								<form role="form" method="post" action="" autocomplete="off">
									<input type="hidden" name="item" id="item" value="'.$row['id'].'" />
									<input type="text" name="quantity" id="quantity" placeholder="Quantity"/>
									<p></p>
									<input type="submit" name="submit13" value="Add to Cart" class="button fit" style="margin-bottom: 1em">
								</form></p>
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
