<?php
ob_start();
session_start();

date_default_timezone_set('	America/New_York');

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','123456');
define('DBNAME','GUBotDev');

define('DIR','http://domain.com/');
define('SITEEMAIL','noreply@domain.com');

try {
	$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
