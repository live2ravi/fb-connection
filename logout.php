<?php
require_once "config.php";
if (!isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}else{
		unset($_SESSION['access_token']);
		header('Location: index.php');
		exit();
	}

?>
