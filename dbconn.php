<?php

    $hostName = "localhost";
    $user = "root";
    $pw = "";
    $dbName = "laundryheaven";

    $dbconn =  mysqli_connect($hostName, $user, $pw, $dbName)
    or die("Failed to Connect with the Database");
    

?>
