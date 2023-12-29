<?php
require_once('database.php');
function allSchedule(){
    $conn=dbConnection();
    $sql="select * from scheduleinfo";
    $result=mysqli_query($conn,$sql);
    return $result;
}
?>