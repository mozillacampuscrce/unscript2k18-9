<?php


    session_start();
    if(!isset($_SESSION['loggedInUser'])){
        
        //send them to login page
        header('Loction: index.php');
    }
    
    include('includes/connections.php');

    


include_once('includes/header.php');

?>

<?php

      include_once('includes/footer.php');
?>
