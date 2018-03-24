<?php
    $client_id = 'f649e7228218a8799898';
    $redirect_url = 'http://localhost/social/github.php';
     
    //login request
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_url&scope=repo&state=1";
        header("Location: $url");
    }

  


?>