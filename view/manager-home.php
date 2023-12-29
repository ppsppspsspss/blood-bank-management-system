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
    <title>Manager Home</title>
</head>
<body>
    <?php echo "<img src=\" {$row['ProfilePicture']} \" width=\"40px\">"; ?> &nbsp;&nbsp; |  &nbsp;&nbsp; <a href="profile.php">Profile</a> &nbsp;&nbsp; |  &nbsp;&nbsp; <a href="logout-controller.php">Logout</a><br><br><br>
    <a href="schedule.php">Schedule</a>
    <br><br>
    <a href="user-list.php">User List</a>
</body>
</html>