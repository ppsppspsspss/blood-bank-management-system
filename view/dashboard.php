<?php
session_start();
require('../model/user-info-model.php');
require('../model/blood-info-model.php');

if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a>
<br><br><br><br><br><br><br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center" class="table">
        <tr>
            <td>
                Number of Patients : <?= UserModel::getInstance()->getPatientCount()?> <br><br>
                Number of Male Patients : <?= UserModel::getInstance()->getPatientCount("Male")?> <br><br>
                Number of Female Patients : <?= UserModel::getInstance()->getPatientCount("Female") ?> <br><br>
                Number of Pending Blood Requests : <?= BloodModel::getInstance()->getAllReqCount("Pending") ?> <br><br>
                Number of Approved Blood Requests : <?= BloodModel::getInstance()->getAllReqCount("Approved") ?> <br>
            </td>
        </tr>
    </table>
</body>
</html>