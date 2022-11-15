<?php
    $host = 'localhost';
    $user = 'team20';
    $pw = 'team20';
    $db = 'team20';


    $mysqli = new mysqli($host, $user, $pw, $db);

    if($mysqli){
        echo "Connection established";
    }
    else{
        printf("Could not connect: %s\n", mysqli_error($connection));
    }
    #mysqli_close($mysqli);
?>