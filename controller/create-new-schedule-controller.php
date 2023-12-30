<?php 
    require_once("../model/schedule-model.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bloodG = $_POST['bloodG'];
    $gender = $_POST['gender'];
    $scheduleDate = $_POST['scheduleDate'];
    $addedBy = $_POST['added_by'];

    $res = ScheduleModel::getInstance()->addSchedule($name, $email, $phone, $bloodG, $gender, $scheduleDate, $addedBy);
    header("location: ../view/schedule.php");


?>