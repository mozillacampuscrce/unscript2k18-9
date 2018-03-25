<?php

session_start();
if(!isset($_SESSION['loggedInUser'])){
    
    //send them to login page
    header('Loction: index.php');
}

include('includes/connections.php');





include_once('includes/header.php');

use OAuth\OAuth2\Service\GitHub;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;
use OAuth\ServiceFactory;
/**
 * Bootstrap the example
 */
require_once 'OAuth/bootstrap.php';
// Session storage
$storage = new Session();
// Setup the credentials for the requests
$credentials = new Credentials(
    'f649e7228218a8799898',
    '9c97eb33dd31d032d03c4d21e5c26e46eb47ccf1',
    'http://localhost/social/github.php'
);

$serviceFactory = new ServiceFactory();
// Instantiate the GitHub service using the credentials, http client and storage mechanism for the token
/** @var $gitHub GitHub */
$gitHub = $serviceFactory->createService('GitHub', $credentials, $storage, array('user'));
if (!empty($_GET['code'])) {
    // This was a callback request from github, get the token
    $token = $gitHub->requestAccessToken($_GET['code']);
    //$token->accessToken;
    //$token->refreshToken;
    
    echo $gitHub->request('/users/hardik-08/received_events');
    //$result = json_decode($gitHub->request('/users/hardik-08/received_events'), true);
      
}
   
  
 else if (!empty($_GET['go']) && $_GET['go'] === 'go') {
    $url = $gitHub->getAuthorizationUri();
    header('Location: ' . $url);
}


else {
    $url = $currentUri->getRelativeUri() . '?go=go';
    echo "<a href='$url'>Login with Github!</a>";
}
?>