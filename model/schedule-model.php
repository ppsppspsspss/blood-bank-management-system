<?php
require_once('database.php');
function allSchedule(){
    $conn=dbConnection();
    $sql="select * from scheduleinfo";
    $result=mysqli_query($conn,$sql);
    return $result;
}
function deleteschedule($id){
    $conn=dbConnection();
    $sql="delete from scheduleinfo where ScheduleID='$id'";
    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if($count==1){
        return true;
    }
    else{
        return false;
    } 
}
?>