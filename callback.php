<?php

require_once '/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
$config = require_once 'config.php';
session_start();

header('Location: userlogin.php');



?>




/*$oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');

if (empty($oauth_verifier) ||
    empty($_SESSION['oauth_token']) ||
    empty($_SESSION['oauth_token_secret'])
) {
    // something's missing, go and login again
    header('Location: ' . $config['url_login']);
}

// connect with application token
$connection = new TwitterOAuth(
    $config['consumer_key'],
    $config['consumer_secret'],
    $_SESSION['oauth_token'],
    $_SESSION['oauth_token_secret']
);

// request user token
$token = $connection->oauth(
    'oauth/access_token', [
        'oauth_verifier' => $oauth_verifier
    ]
);


$_SESSION['token']=$token;


$twitter = new TwitterOAuth(
    $config['consumer_key'],
    $config['consumer_secret'],
    $token['oauth_token'],
    $token['oauth_token_secret']
);


$data = $twitter->get("account/verify_credentials", ['include_entities' => true, 'skip_status' => true, 'include_email' => true]);
echo $data->name."";

$count = 10000;
$params = array("screen_name"=>$data->screen_name,"count"=>$count);
$tweets = $twitter->get('statuses/home_timeline',$params);
$tweet_result = array();
$index = 0;
foreach($tweets as $tweet){
    $tweet_result[$index]['id'] = $tweet->id_str;
    $tweet_result[$index]['createdAt'] = $tweet->created_at;
    $tweet_result[$index]['text'] = $tweet->text;
    $tweet_result[$index]['name'] = $tweet->user->name;
    $tweet_result[$index]['screen_name'] = $tweet->user->screen_name;
    $tweet_result[$index]['profileImageurl'] = $tweet->user->profile_image_url;
    $index++;
}
echo json_encode($tweet_result);*/

/*

$status = $twitter->post(
    "statuses/update", [
        "status" => "Thank you @nedavayruby, use of this tutorial https://goo.gl/N2Znbb"
    ]
);



echo ('Created new status with #' . $status->id . PHP_EOL);*/


?>