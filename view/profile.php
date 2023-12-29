<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=accessDenied');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a>
<br><br><br><br><br><br><br><br><br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
        <tr>
            <td>
                <a href="view-information.php"><button class="btn submit">View Information</button></a>
                <br><br>
                <a href="update-pfp.php"><button class="btn submit">Update Profile Picture</button></a>
            </td>
        </tr>
    </table>
</body>
</html>