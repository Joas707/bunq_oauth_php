<?php
$configs = include('config.php');
try {
	$db = new PDO('mysql:host='. $configs['db_host'] .';dbname=' . $configs['db_name'] .'',''. $configs['db_username'] .'', ''. $configs['db_password'] .'');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
?>
