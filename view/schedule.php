<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
require_once('../model/schedule-model.php');
$result = allSchedule(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Schedule</title>
</head>
<body><a href="manager-home.php" class="backButton">&#8249;</a><br><br>
<center>
        <h1>Schedule List</h1>
        <hr width="20%" color="orange"><br><br>
</center>
    <?php
    if(mysqli_num_rows($result) > 0) {
        echo"<table align=\"center\" width=\"85%\" border=\"1\" bgcolor = \"white\" cellpadding=\"15\" cellspacing=\"0\" class=\"table\">
        <tr><td align=\"center\">Name</td>
            <td align=\"center\">Email</td>
            <td align=\"center\">Phone</td>
            <td align=\"center\">Blood Group</td>
            <td align=\"center\">Gender</td>
            <td align=\"center\">Donate Date</td>
            <td align=\"center\">Manager Email</td>
            <td align=\"center\">Action</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $sid=$row['ScheduleID'];
            $name=$row['Name'];
            $email=$row['Email'];
            $phone=$row['Phone'];
            $bg=$row['BloodGroup'];
            $gender=$row['Gender'];
            $donatedate=$row['DonationDate'];
            $manageremail=$row['ManagerEmail'];
            echo"
            <tr><td align=\"center\">$name</td>
            <td align=\"center\">$email</td>
            <td align=\"center\">$phone</td>
            <td align=\"center\">$bg</td>
            <td align=\"center\">$gender</td>
            <td align=\"center\">$donatedate</td>
            <td align=\"center\">$manageremail</td>
            <td align=\"center\"><a href=\"../controller/schedule-controller.php?id=$sid\">Delete</a></td>
        </tr>";
        }
        echo"</table>";
    }else{
        echo "<center><h2>No Schedule Found<h2></center>";
    }
    ?>
</body>
</html>