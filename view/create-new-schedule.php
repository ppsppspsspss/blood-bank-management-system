<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=accessDenied');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Schedule</title>
</head>
<body>
<table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
    <tr>
        <td>
            Schedule Date <br>
            <input type="date" name="scheduleDate">
            <br><br>
            Donor Email <br>
            <input type="email" name="donorEmail">
            <br><br>
            <button>Import</button>
            <br><br>
            <h1>Donor Information</h1>
            Name : Empty<br><br>
            Blood Group : Empty<br><br>
            Gender : Empty<br><br>
            Phone Number : Empty<br><br>
        </td>
    </tr>
</table>
</body>
</html>