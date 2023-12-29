<?php
session_start();
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
                Number of Patients : <br><br>
                Number of Male Patients : <br><br>
                Number of Female Patients : <br><br>
                Number of Pending Blood Requests : <br><br>
                Number of Approved Blood Requests : <br>
            </td>
        </tr>
    </table>
</body>
</html>