
    <!DOCTYPE html >

    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home Page</title>


        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">




        <!-- jquery -->
        <script src="jquery/dist/jquery.js"></script>


        <!-- jquery -->
        <script src="jquery/dist/jquery.min.js"></script>


        <!-- Bootstrap js -->
        <script src="bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Bootstrap js -->
        <script src="bootstrap/dist/js/bootstrap.js"></script>

        <style>

            .modal-body{
                padding-left: 30px;
                padding-right: 30px;
            }

        </style>


    </head>


    <body>


    <div class="container-fluid">
        <br>


        <div class="row" id="tweets">

        </div>
        <!--./row -->




        <

    </div>
    <!--./container-fluid -->

    <script>

        $(document).ready(function(){

            //$("#showtweets").click(function(){

            //console.log("on click")


                console.log("on click")
                var tweets="";
                var hashtag="";
                console.log("i am");

                $.ajax({
                    type:"get",
                    url: "github.json",
                    success:function(mydata)
                    {

                        //var mydata=JSON.parse(data);
                        console.log(mydata);
                        $.each(mydata, function(i, f) {
                            var icon=''
                            var repo="";/*
                            for(var i=0;i < f.repo.length;i++){
                                repo=repo+f.repo. +" ";
                            }
*/                          var des="";
                            if(f.payload.description != null){
                               des= '<b>Description:</b><br>'+f.payload.description
                            }

                            else{
                                des="";
                            }

                            tweets=tweets+'<div class="col-lg-4"><div class="panel panel-primary" '+icon+'><div class="panel-heading"><b>'+f.actor.display_login+'</b><a href='+f.actor.url+'>'+'repository link</a>'+
                                '</div><div class="panel-body" style="height:200px"><div class="form-group">'+
                                '<div class="col-lg-12"><b>Event Type:</b>'+f.type+'</div><br>'+'<div class="col-lg-12"><b>Repository:</b><br>'+f.repo.name+'</div><br><div class="col-lg-12 container-fluid" style="word-wrap:break-word;"><p>'+'('+f.repo.url+')'+'</p></div><div class="col-lg-12">'+des
                                +'</div></div></div><div class="panel-footer" style="height:50px">'+

                                '</div></div></div>'
                        })
                        //console.log(tweets);
                        document.getElementById("tweets").innerHTML=tweets;

                    }
                });




        });





    </script>


    </body>
    </html>
