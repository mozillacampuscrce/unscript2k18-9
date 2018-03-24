<?php
$token=$url="";
if(isset($_POST['submit']))
{
    $token="";
    //$name = $_POST['name'];
    // $pass = $_POST["password"];
    header('Location:https://api.instagram.com/oauth/authorize/?client_id=7fd049cb0cdc43c1bf22e52480d313e5&redirect_uri=http://localhost/social/dashboard.php&response_type=token');
    //$token=$_GET['access_token'];
    //echo $token;
    //$url=$_SERVER['REQUEST_URI'];
    //$token = substr($url, strrpos($url, '#') + 1);


}
$url=$_SERVER['REQUEST_URI'];

//echo $url;

echo parse_url("http://localhost/social/dashboard.php",PHP_URL_FRAGMENT);

?>
<body onload="fileDialogStart()">
<form action="dashboard.php" method="POST">

        <button type="submit" name="submit">Login</button>



    </div>
</form>
</body>

<?php
echo $_SERVER['REQUEST_URI'];

