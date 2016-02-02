<?php 
require('layout/header.php');
?>

<!-- Banner -->
<section id="banner" style="padding: 0 0 0 0;">
	<div class="inner" ></div>
</section>

<div class="wrapper" style="padding: 2em 0 0 0;">
	<div class="inner">
		<?php

		if(isset($_POST['id'])){
			$stmt2 = $db->prepare('SELECT * FROM products WHERE id = :id');
			$stmt2->execute(array(':id' => $_POST['id']));
			$row4 = $stmt2->fetch(PDO::FETCH_ASSOC);

			
			echo'
				<section>
					<h2 style="border-bottom: solid 2px rgba(242, 175, 50, 0.5);">'.$row4['name'].'</h2>
					<div class="box alt">
						<div class="row uniform">
							<div class="16u$">
								<span class="image fit">'.$row4['polyMapCode'].'</span>
							</div>
						</div>
					</div>
				</section>

				<section>
					<h2 style="text-transform: capitalize; border-bottom: solid 2px rgba(242, 175, 50, 0.5);">Specifications</h2>
					<div class="table-wrapper">
						<table class="default">
							<tbody>
								<tr>
									<td>Price</td>
									<td>$'.$row4['price'].'</td>
								</tr>
								<tr>
									<td>Time Required Before Shipment</td>
									<td>'.$row4['timeRequired'].' days</td>
								</tr>
							</tbody>
						</table>
					</div>

					<h2 style="text-transform: capitalize; border-bottom: solid 2px rgba(242, 175, 50, 0.5);">About the '.$row4['name'].'</h2>
					<p style="font-size: 10pt"><span class="image right"><img src="images/uploads/'.$row4['pictureName'].'" alt="" /></span>'.$row4['description'].'</p>
					
					<h2 style="text-transform: capitalize; border-bottom: solid 2px rgba(242, 175, 50, 0.5);">Don\'t want to build it?</h2>
					<a href="javascript:void(0)" class="button special disabled" disabled>Add the '.$row4['name'].' to the Cart</a> - Out of Stock
					<p></p>
				</section>
			';


			if(empty($row4['id'])){
				echo 'Product provided is not recognised.';
			}

		}
		else {
			echo 'Information invalid.';
		}

			?>
	</div>
</div>


<?php
//include header template
require('layout/footer.php');
?>