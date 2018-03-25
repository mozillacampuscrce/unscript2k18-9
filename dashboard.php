<?php


session_start();
if(!isset($_SESSION['loggedInUser'])){
    
    //send them to login page
    header('Loction: index.php');
}

include('includes/connections.php');




include_once('includes/header.php');

use OAuth\OAuth2\Service\Instagram;
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
    '7fd049cb0cdc43c1bf22e52480d313e5',
    '0d1bf7aaf9ce43199751abfaa4087145',
    'http://localhost/social/dashboard.php'
);
$scopes = array('basic', 'comments', 'relationships', 'likes');
// Instantiate the Instagram service using the credentials, http client and storage mechanism for the token
/** @var $instagramService Instagram */
$serviceFactory = new ServiceFactory();

$instagramService = $serviceFactory->createService('instagram', $credentials, $storage, $scopes);
if (!empty($_GET['code'])) {
    // retrieve the CSRF state parameter
    $state = isset($_GET['state']) ? $_GET['state'] : null;
    // This was a callback request from Instagram, get the token
    $instagramService->requestAccessToken($_GET['code'], $state);
    // Send a request with it
    $result = json_decode($instagramService->request('users/self'), true);
  //  // Show some of the resultant data
    //echo 'Your unique instagram user id is: ' . $result['data']['id'] . ' and your name is ' . $result['data']['full_name'];
    $result = json_decode($instagramService->request('users/self/media/recent'));
    //echo $instagramService->request('users/self/media/liked');



$data_array = $result->data;

$image_url=array();
for($i=0;$i<20;$i++)
{
    $image_url[$i]=$data_array[$i]->images->standard_resolution->url;
}
//print_r($image_url[0]);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Instagram feeds</title>

    <!-- Bootstrap core CSS -->
  <!--  <link href="demo/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="demo/css/thumbnail-gallery.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->

<!-- Page Content -->
<div class="container">

    <h1 class="my-4 text-center text-lg-left">Instagram Gallery</h1>

    <div class="row text-center text-lg-left" name="add-post">

        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[0];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[1];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[2];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[3];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[4];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[5];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[6];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[7];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[8];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[9];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[10];?>" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo $image_url[11];?>" alt="">
            </a>
        </div>
    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>


<?php

} elseif (!empty($_GET['go']) && $_GET['go'] === 'go') {
    $url = $instagramService->getAuthorizationUri();
    header('Location: ' . $url);
} else {
    $url =  'http://localhost/social/dashboard.php'. '?go=go';
    echo "<a href='$url'>Login with Instagram!</a>";
}
?>