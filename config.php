<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	require_once "Facebook/autoload.php";

	
	// Config for App : Influencer v1
	 $FB = new \Facebook\Facebook([
		'app_id' => 'app_id',
		'app_secret' => 'app_secret',
		'default_graph_version' => 'v3.0'
	]); 
	

	$helper = $FB->getRedirectLoginHelper();
?>
