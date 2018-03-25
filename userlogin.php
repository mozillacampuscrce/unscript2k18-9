<?php

require_once '/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

session_start();

$config = require_once 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


<style>

    <link href="../bootstrap/dist/css/material.min.css" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap/dist/css/dataTables.material.min.css" />

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/dist/css/two-wheeler.css" rel="stylesheet">
</style>




</head>

<body>

    <input type="text" id="posttext"><input type="button" id="posttweet" value="Post Tweet"><br><br><br>
    <input type="button" id="showtweets" value="Show Tweet">

<div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                name (display name)
            </div>
            <div id="tweets">
                mytweet
            </div>
            <div class="panel-footer">
                Panel Footer
            </div>
        </div>
    </div>



    <script src="jquery/dist/jquery.min.js"></script>
    <script src="jquery/dist/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="bootstrap/dist/js/jquery.dataTables.min.js"></script>



    <script>

        $(document).ready(function(){

            $("#showtweets").click(function(){

                console.log("on click")
                var tweets="";
                console.log("i am");

                $.ajax({
                    type:"get",
                    url: "showtweets.php",
                    success:function(data)
                    {
                        var mydata=JSON.parse(data);
                        $.each(mydata, function(i, f) {
                            console.log(f.id);
                            tweets=tweets+f.id+"<br>"+f.created_at+"<br>"+f.text+"<br>"+f.name+"<br><br>";

                        });
                        console.log(tweets);
                        document.getElementById("tweets").innerHTML=tweets;
                    }
                    });
                });
            });

$("#posttweet").click(function(){

    var mytweet=$("#posttext").val();
    console.log(mytweet);
    var tweets="";
    console.log("i am");

    $.ajax({
        type:"post",
        url: "postmessage.php",
        data:{
            mytweet:mytweet
        },
        success:function(response)
        {
            console.log("got data");
            var mydata=JSON.parse(response);

            $.each(mydata, function(i, f) {
                console.log(f.id);
                tweets=tweets+f.id+"<br>"+f.created_at+"<br>"+f.text+"<br>"+f.name+"<br><br>";

            });
            console.log(tweets);
            document.getElementById("tweets").innerHTML=tweets;
        }
    });
});



/*

            $.getJSON('showtweets.php', function(data) {
                    console.log("here");

                    $.each(data, function(i, f) {
                            console.log(f.id);
                            tweets=tweets+f.id+"<br>"+f.created_at+"<br>"+f.text+"<br>"+f.name+"<br><br>";

                        })
                        console.log(tweets);
                        document.getElementById("tweets").innerHTML=tweets;
                });
*/

  /*          });

        });
*/
    </script>
</body>
</html>