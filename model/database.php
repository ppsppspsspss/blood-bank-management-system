<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'BookShopManagementSystem');
    return $conn;
    
}

?>
