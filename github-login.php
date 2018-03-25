<?php
    $client_id = 'f649e7228218a8799898';
    $redirect_url = 'http://localhost/social/github.php';
     include_once('includes/functions.php');
     include_once('includes/connections.php');
    session_start();
    $id = $_SESSION['id'];
     $query = "select github from  where user_id=$id";
     
        //store result
         $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result)==0){
                
               
            $url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_url&scope=repo";
            header("Location: $url");
                
         }
         else
         {
            while($row=mysqli_fetch_assoc($result)){
                
                $github = $row['github'];
                
                };
            header("Location: github");

         }
    //login request
    

  


?>