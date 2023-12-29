<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a>
<br><br><br><br><br><br><br><br><br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
        <tr>
            <td>
                <a href="edit-information.php"><button class="btn submit">Edit Information</button></a>
                <br><br>
                <a href="update-password.php"><button class="btn submit">Update Password</button></a>
            </td>
        </tr>
    </table>
</body>
</html>