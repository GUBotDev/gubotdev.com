<?php 
require('layout/header.php');
?>
		<!-- Banner -->
		<section id="banner">
			<div class="inner">
				<div class="logo"><img src="images/logo.png" style="width: 40%"></img></div>
				<h2></h2>
				<p>I have no idea what to write here, but something should go here. </p>
			</div>
		</section>

		<!-- Wrapper -->
		<section id="wrapper">

			<!-- One -->
			<section id="one" class="wrapper spotlight style1">
				<div class="inner">
					<a href="#" class="image"><img src="images/gu3.jpg" alt="" /></a>
					<div class="content">
						<h2 class="major">We do things</h2>
						<p>lots of things</p>
						<a href="projects.php" class="special">Projects</a>
					</div>
				</div>
			</section>

			<!-- Two -->
			<section id="two" class="wrapper alt spotlight style2">
				<div class="inner">
					<a href="#" class="image"><img src="images/panel1.gif" alt="" /></a>
					<div class="content">
						<h2 class="major">we make videos</h2>
						<p>watch em</p>
						<a href="videos.php" class="special">Videos</a>
					</div>
				</div>
			</section>

			<!-- Three -->
			<section id="three" class="wrapper spotlight style3">
				<div class="inner">
					<a href="#" class="image"><img src="images/gu0.jpg" alt="" /></a>
					<div class="content">
						<h2 class="major">want us to do stuff for you?</h2>
						<p>contact us</p>
						<a href="#contact" class="special">Contact</a>
					</div>
				</div>
			</section>

			<!-- Four -->
			<section id="four" class="wrapper alt style1">
				<div class="inner">
					<section class="features">
						<?php

						$stmt3 = $db->prepare('SELECT * FROM products');
						$stmt3->execute();
						$row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

						$amount = count($row3);

						$randomInt = rand (1, $amount);
						$randomInt2 = rand (1, $amount);

						$numArray = array();

						foreach ($row3 as $row){
							array_push($numArray, (int)$row['id']);

						}

						if (count($numArray) >= 2) {
							do {
								$randomInt = rand (1, $amount);
							} while (!in_array($randomInt, $numArray));

							do {
								$randomInt2 = rand (1, $amount);
							} while ($randomInt == $randomInt2 || !in_array($randomInt2, $numArray));


							echo '
							<article>
								<form name="form'.$row3[$randomInt]['id'].'" method="post" action="item.php" autocomplete="off">
									<input type="hidden" name="id" id="id" value="'.$row3[$randomInt]['id'].'" />
									<a href="JAVASCRIPT:form'.$row3[$randomInt]['id'].'.submit()" class="image"><img src="images/uploads/'.$row3[$randomInt]['pictureName'].'" alt="" /></a>
								</form>
								<h3 class="major">'.$row3[$randomInt]['name'].'</h3>
								<p>'.$row3[$randomInt]['shortDesc'].'</p>
							</article>

							<article>
								<form name="form'.$row3[$randomInt2]['id'].'" method="post" action="item.php" autocomplete="off">
									<input type="hidden" name="id" id="id" value="'.$row3[$randomInt2]['id'].'" />
									<a href="JAVASCRIPT:form'.$row[$randomInt2]['id'].'.submit()" class="image"><img src="images/uploads/'.$row3[$randomInt2]['pictureName'].'" alt="" /></a>
								</form>
								<h3 class="major">'.$row3[$randomInt2]['name'].'</h3>
								<p>'.$row3[$randomInt2]['shortDesc'].'</p>
							</article>';
						}
						?>
					</section>
				</div>
			</section>

		</section>

<?php
//include header template
require('layout/footer.php');
?>
