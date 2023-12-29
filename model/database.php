<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'BloodBankManagementSystem');
    return $conn;
    
}

?>
