<?php
require_once('../model/blood-info-model.php');
$rid=$_GET['req_id'];
$id=$_COOKIE['id'];
$result = BloodModel::getInstance()->updatebloodinfo($rid,$id);
if(isset($result)){
    header('location:../view/blood-request.php');
}
?>