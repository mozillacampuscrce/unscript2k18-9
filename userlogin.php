<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


<style>





    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/dist/css/material.min.css" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap/dist/css/dataTables.material.min.css" />

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/dist/css/two-wheeler.css" rel="stylesheet"> </style>




</head>

<body>

    <input type="button" id="posttweet" value="Post Tweets">
    <input type="button" id="showtweets" value="Show Tweets">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Primary Panel
            </div>
            <div id="tweeets" class="panel-body">

            </div>
            <div class="panel-footer">
                Panel Footer
            </div>
        </div>
    </div>


    <script src="jquery/dist/jquery.min.js"></script>
    <script src="jquery/dist/jquery.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="bootstrap/dist/js//jquery.dataTables.min.js"></script>
    <script src="bootstrap/dist/js/dataTables.material.min.js"></script>



    <script>

        $(document).ready(function(){

            $("#showtweets").click(function(){

                console.log("on click")
                $.getJSON('tweets.json', function(data) {
                    $.each(data, function(i, f) {


                            var tweets="";
                            tweets=tweets+f.id+"<br>"+f.created_at+"<br>"+f.text+"<br>"+f.name+"<br>"<br>";

                        })
                        $("#tweets").val(tweets);

                });

            });

        });

    </script>
</body>
</html>