<?php
require_once('../model/schedule-model.php');
$id=$_GET['id'];
$result=deleteschedule($id);
header('location: ../view/schedule.php');
?>