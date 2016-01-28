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
				$stmt1 = $db->prepare('SELECT isAdmin FROM members WHERE username = :username');
				$stmt1->execute(array(':username' => $_SESSION['username']));
				$userData = $stmt1->fetch(PDO::FETCH_ASSOC);

				if ($userData['isAdmin'] == 1) {
					echo '<h2 class="major" style="color: red">Administration</h2>';

					$stmt2 = $db->prepare('SELECT * FROM receipts WHERE isCompleted = :isCompleted');
					$stmt2->execute(array(':isCompleted' => 0));
					$row = $stmt2->fetchAll(PDO::FETCH_ASSOC);

					$activeDis = false;

					//UNPROCESSED ORDERS
					foreach ($row as $row) {
						if (!empty($row)) {
							if ($row['isCompleted'] == 0) {
								//display in active

								if ($activeDis == false) {
									echo '<h1 class="major">Unprocessed Orders</h1>
									<section class="features">
									';
									$activeDis = true;
								}

								echo '
									<article>
										<h3 class="major">Username: '.$row['username'].'</h3>
										<div class="table-wrapper">
											<table class="default">
												<tbody>
													<tr>
														<td>Order Number:</td>
														<td>'.$row['id'].'</td>
													</tr>
													<tr>
														<td>Shipping Address:</td>
														<td>'.$row['address'].'</td>
													</tr>
													<tr>
														<td>Order Date:</td>
														<td>'.$row['orderDate'].'</td>
													</tr>
													<tr>
														<td>Estimated Shipping Date:</td>
														<td>'.$row['estimateDate'].'</td>
													</tr>
													<tr>
														<td>Items:</td>
														<td>'.$row['items'].'</td>
													</tr>
													<tr>
														<td>Amount:</td>
														<td>$'.$row['amount'].'</td>
													</tr>
												</tbody>
											</table>
										</div>
									</article>
								';
							}
						}
					}

					if ($activeDis == true){
						echo '</section>';
					}


					//ADD ADMINS
					echo '
					<form method="post" action="addAdmin.php" autocomplete="off">
					<h1 class="major">Add Administrator</h1>
						<input type="text" name="username" id="username" placeholder="Username" tabindex="1">
						<p></p>
						<input type="submit" name="submit5" value="OP User" tabindex="2">
					</form>';

					//ADD PRODUCT AND IMAGE UPLOAD
					echo '
					<h1 class="major">Add Product</h1>
					<form action="upload.php" method="post" enctype="multipart/form-data">
						Upload Image:
						<input type="file" name="fileName" id="fileName">
						<input type="submit" value="Upload Image" name="submit">
					</form>
						<section class="features">
							<article style="width: 100%">
								<h3 class="major">Product Information:</h3>
						
								<form method="post" action="addItem.php" autocomplete="off">
									<input type="text" name="name" id="name" placeholder="Name" tabindex="1">
									<p></p>
									<input type="text" name="description" id="description" placeholder="Description" tabindex="2">
									<p></p>
									<input type="text" name="shortDesc" id="shortDesc" placeholder="Shortened Description" tabindex="3">
									<p></p>
									<input type="text" name="price" id="price" placeholder="Price (0.00)" tabindex="4">
									<p></p>
									<input type="text" name="pictureName" id="pictureName" placeholder="PictureName (test.jpg)" tabindex="5">
									<p></p>
									<input type="text" name="timeRequired" id="timeRequired" placeholder="Time Required (Days)" tabindex="6">
									<p></p>
									<input type="submit" name="submit7" value="Add Product" tabindex="7">
								</form>

							</article>
						</section>
					';

					//EDIT PRODUCTS
					echo '<h1 class="major">Edit Products</h1>';

					$stmt3 = $db->prepare('SELECT * FROM products');
					$stmt3->execute();
					$row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

					$productDis = false;

					foreach ($row3 as $row) {
						if ($productDis == false) {
							echo '<section class="features">';
							$productDis = true;
						}

						echo '
							<article>
								<h3 class="major">ID Number: '.$row['id'].'</h3>
						
								<form method="post" action="editItem.php" autocomplete="off">
									<input type="hidden" name="id" id="id" value="'.$row['id'].'" />
									<input type="text" name="name" id="name" placeholder="'.$row['name'].'" value="'.$row['name'].'" tabindex="1">
									<p></p>
									<input type="text" name="description" id="description" placeholder="'.$row['description'].'" value="'.$row['description'].'" tabindex="2">
									<p></p>
									<input type="text" name="shortDesc" id="shortDesc" placeholder="'.$row['shortDesc'].'" value="'.$row['shortDesc'].'" tabindex="3">
									<p></p>
									<input type="text" name="price" id="price" placeholder="'.$row['price'].'" value="'.$row['price'].'" tabindex="4">
									<p></p>
									<input type="text" name="pictureName" id="pictureName" placeholder="'.$row['pictureName'].'" value="'.$row['pictureName'].'" tabindex="5">
									<p></p>
									<input type="text" name="timeRequired" id="timeRequired" placeholder="'.$row['timeRequired'].'" value="'.$row['timeRequired'].'" tabindex="6">
									<p></p>
									<input type="submit" name="submit6" value="Confirm Changes" tabindex="7">
								</form>

							</article>
						';


					}

					if ($productDis == true){
						echo '</section>';
					}



				}//end ROOT USER PAGE
				else {
					$stmt3 = $db->prepare('SELECT * FROM receipts WHERE username = :username');
					$stmt3->execute(array(':username' => $_SESSION['username']));
					$row = $stmt3->fetchAll(PDO::FETCH_ASSOC);

					$activeDis = false;
					$processedDis = false;

					foreach ($row as $row) {
						if (!empty($row)) {
							if ($row['isCompleted'] == 0) {
								//display in active

								if ($activeDis == false) {
									echo '<h2 class="major">Active Orders</h2>
											<section class="features">';
									$activeDis = true;
								}

								echo '
									<article>
										<h3 class="major">Order Number: '.$row['id'].'</h3>
										<div class="table-wrapper">
											<table class="default">
												<tbody>
													<tr>
														<td>Shipping Address:</td>
														<td>'.$row['address'].'</td>
													</tr>
													<tr>
														<td>Order Date:</td>
														<td>'.$row['orderDate'].'</td>
													</tr>
													<tr>
														<td>Estimated Shipping Date:</td>
														<td>'.$row['estimateDate'].'</td>
													</tr>
													<tr>
														<td>Items:</td>
														<td>'.$row['items'].'</td>
													</tr>
													<tr>
														<td>Amount:</td>
														<td>$'.$row['amount'].'</td>
													</tr>
												</tbody>
											</table>
										</div>
									</article>
								';
							}
							else {
								//display in processed

								if ($processedDis == false) {
									echo '</section>
										<h2 class="major">Processed Orders</h2>
											<section class="features">';
									$processedDis = true;
								}

								echo '
									<article>
										<h3 class="major">Order Number: '.$row['id'].'</h3>
										<div class="table-wrapper">
											<table class="default">
												<tbody>
													<tr>
														<td>Shipping Address:</td>
														<td>'.$row['address'].'</td>
													</tr>
													<tr>
														<td>Order Date:</td>
														<td>'.$row['orderDate'].'</td>
													</tr>
													<tr>
														<td>Date Shipped:</td>
														<td>'.$row['estimateDate'].'</td>
													</tr>
													<tr>
														<td>Items:</td>
														<td>'.$row['items'].'</td>
													</tr>
													<tr>
														<td>Amount:</td>
														<td>$'.$row['amount'].'</td>
													</tr>
												</tbody>
											</table>
										</div>
									</article>
								';
							}
						}

						if ($processedDis == true){
							echo '</section>';
						}

						//echo "<h2>".$row['id']." ".$row['username']." ".$row['email']." ".$row['items']." ".$row['orderDate']." ".$row['amount']." ".$row['address']." ".$row['estimateDate']." ".$row['isCompleted']."</h2>";
					}

					if ($processedDis == false && $activeDis == false) {
						echo '<h2 class="major">No Orders</h2>
							<a href="store.php" class="button special">Go To Store</a>
							';
					}
				}
			?>
	</div>
</div>

<?php 
//include header template
require('layout/footer.php'); 
?>
