<?php
	require_once "config.php";
	try {
		$accessToken = $helper->getAccessToken();
	} catch (\Facebook\Exceptions\FacebookResponseException $e) {
		echo "Response Exception: " . $e->getMessage();
		exit();
	} catch (\Facebook\Exceptions\FacebookSDKException $e) {
		echo "SDK Exception: " . $e->getMessage();
		exit();
	}

	if (!$accessToken) {
		//header('Location: login.php');
		//echo "Access token missing";
		header('Location: https://www.example.in/socialmedia-connection/connect-with-insta/');
		exit();
	}

	$oAuth2Client = $FB->getOAuth2Client();
	if (!$accessToken->isLongLived())
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		// $response = $FB->get("/me?fields=id, first_name, name, last_name, birthday, gender, link, email, picture.type(large),accounts{link,name,id,fan_count,new_like_count,access_token,about,connected_instagram_account,location,impressum,influences,price_range,rating_count,talking_about_count,verification_status,website,picture.width(400).height(400),app_id}", $accessToken);

		$response = $FB->get("/me?fields=id, first_name, name, last_name, gender, email, picture.type(large),accounts{link,name,id,fan_count,access_token,about,connected_instagram_account,website,picture.width(400).height(400),app_id}", $accessToken);

	$userData = $response->getGraphNode()->asArray();
	$_SESSION['insta']['userData'] = $userData;
	$_SESSION['insta']['user_access_token'] = (string) $accessToken;
	
	//header('Location: index.php');
	header('Location: https://www.example.in/facebooklogin/insta-callback.php');
	exit();
?>