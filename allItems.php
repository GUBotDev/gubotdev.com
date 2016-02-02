<?php
require('layout/header.php');

$stmt1 = $db->prepare('SELECT isAdmin FROM members WHERE username = :username');
$stmt1->execute(array(':username' => $_SESSION['username']));
$userData = $stmt1->fetch(PDO::FETCH_ASSOC);

if ($userData['isAdmin'] == 1) {

	echo '
	<!-- Banner -->
	<section id="banner" style="padding: 0 0 0 0;">
		<div class="inner" ></div>
	</section>

	<div class="wrapper" style="padding: 2em 0 0 0;"><p></p>

		<section id="four" class="wrapper alt style1">
			<div class="inner">';
	
	//id, name, description, shortDesc, price, pictureName, timeRequired

	if(isset($_POST['submit12'])){
		$stmt2 = $db->prepare('SELECT * FROM receipts WHERE isCompleted = :isCompleted');
					$stmt2->execute(array(':isCompleted' => 1));
					$row = $stmt2->fetchAll(PDO::FETCH_ASSOC);

					$activeDis = false;

					//PROCESSED ORDERS
					foreach ($row as $row) {
						if (!empty($row)) {
							if ($row['isCompleted'] == 1) {
								//display in active

								if ($activeDis == false) {
									echo '<h1 class="major">Processed Orders</h1>
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
										<form method="post" action="editReceipt.php" autocomplete="off">
											<input type="hidden" name="id" id="id" value="'.$row['id'].'" />
											<input type="submit" name="submit11" value="Remove Item" tabindex="9" style="color: red">
										</form>
									</article>
								';
							}
						}
					}

					if ($activeDis == true){
						echo '</section>';
					}
	}
	else {
		echo 'Information invalid.';
	}
	
	
	echo '
	</center>
	<p></p>
	<p></p>

				<center><a href="userPage.php" class="button">Back to Admin Page</a></center>
	<p></p>
	<p></p>
			</div>
		</section>
	</div>
	';

	require('layout/footer.php');
}
else{
	header('Location: index.php');
}

?>