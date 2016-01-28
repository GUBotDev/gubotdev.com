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
			<div class="inner">
			<center>';

	$target_dir = $_SERVER['DOCUMENT_ROOT']."/images/uploads/";
	$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
	$upload = true;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileName"]["tmp_name"]);
	    if($check == false  && $upload == true) {
	        echo "Uploaded file is not an image. ";
	        $upload = false;
	    }
	}

	if (file_exists($target_file) && $upload == true) {
	    echo "Image name already exists. ";
	    $upload = false;
	}

	if ($_FILES["fileName"]["size"] > 5000000  && $upload == true) {
	    echo "Image too large, resize and upload again. ";
	    $upload = false;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $upload == true) {
	    echo "JPG, JPEG, PNG, and GIF files only. ";
	    $upload = false;
	}

	if ($upload == false) {
	    echo "File was not uploaded. ";
	} else {
	    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded. ";
	    } else {
	        echo "There was an error uploading the image. ";
	    }
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