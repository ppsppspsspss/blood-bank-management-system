<?php
require_once('../model/schedule-model.php');
$id=$_GET['id'];
$result=ScheduleModel::getInstance()->deleteschedule($id);
if(isset($result)){
    header('location: ../view/schedule.php');
}
?>