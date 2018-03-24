<?php
use OAuth\OAuth2\Service\Facebook;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;
/**
 * Bootstrap the example
 */
require_once 'OAuth/bootstrap.php';
// Session storage
$storage = new Session();
// Setup the credentials for the requests
$credentials = new Credentials(
    '1652813641480280',
    '7eb3939c0c450319cdebaa6a8c86cd68',
    'http://localhost/social/facebook.php'
);
// Instantiate the Facebook service using the credentials, http client and storage mechanism for the token
/** @var $facebookService Facebook */
$facebookService = $serviceFactory->createService('facebook', $credentials, $storage, array());
if (!empty($_GET['code'])) {
    // retrieve the CSRF state parameter
    $state = isset($_GET['state']) ? $_GET['state'] : null;
    // This was a callback request from facebook, get the token
    $token = $facebookService->requestAccessToken($_GET['code'], $state);
    // Send a request with it
    $result = json_decode($facebookService->request('/me'), true);
    // Show some of the resultant data
    echo 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
} elseif (!empty($_GET['go']) && $_GET['go'] === 'go') {
    $url = $facebookService->getAuthorizationUri();
    header('Location: ' . $url);
} else {
    $url = $currentUri->getRelativeUri() . '?go=go';
    echo "<a href='$url'>Login with Facebook!</a>";
}
?>