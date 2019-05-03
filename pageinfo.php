<?php
	require_once "config.php";

	try {
  // Returns a `FacebookFacebookResponse` object
  
  $response = $fb->get(
    '/{page-id}/insights',
    '{access-token}'
  );
} catch(FacebookExceptionsFacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(FacebookExceptionsFacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphNode();

echo "<pre>";
print_r($graphNode);
echo "</pre>";
?>