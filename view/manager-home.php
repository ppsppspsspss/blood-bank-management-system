<?php

    session_start();
    if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');

    require_once('../model/user-info-model.php');

    $id = $_COOKIE['id'];
    $row =  userInfo($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Manager Home</title>
</head>
<body>
<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">"; ?> &nbsp;&nbsp;&nbsp;&nbsp;
    <select name="profile" onchange="location = this.value;">
        <option disabled selected hidden> <?php echo $row['FirstName'].' '.$row['LastName']; ?></option>
        <option value="profile.php">Profile</option>
        <option value="settings.php">Settings</option>
        <option value="../controller/logout-controller.php">Log Out</option>
    </select></p>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
        <tr>
            <td>
            <a href="schedule.php"><button class="btn submit">Schedule</button></a><br><br>
            <a href="create-new-schedule.php"><button class="btn submit">Create New Schedule</button></a><br><br>
            <a href="user-list.php"><button class="btn submit">User List</button></a>
            </td>
        </tr>
    </table>
</body>
</html>