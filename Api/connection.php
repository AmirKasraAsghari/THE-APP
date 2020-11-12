<?php
    $db_name = "id15299090_applicationdb";
    $mysql_username = "id15299090_applicationdb11344";
    $mysql_password = "userDB_12345";
    $server_name = "localhost";
    $con = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
    
    
     if ($con->connect_error) {
       die("Connection failed: " . $con->connect_error);
     }
    

?>