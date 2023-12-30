<?php
require_once('../model/blood-info-model.php');
$result=allbloodreq();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Blood Request</title>
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a>
    <center><h1>Blood Request</h1><hr width="30%" color="orange">
    </center>
    <br><br>
    <?php
    if(mysqli_num_rows($result) > 0) {
        echo"<table align=\"center\" width=\"60%\" border=\"1\" cellpadding=\"15\" cellspacing=\"0\" bgcolor=\"white\" class=\"table\">
        <tr><td align=\"center\">Name</td>
            <td align=\"center\">Blood Group</td>
            <td align=\"center\">Number Of Bags</td>
            <td align=\"center\">Date Of Donation</td>
            <td align=\"center\">Action</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $rid=$row['RequestID'];
            $name=$row['FirstName']." ".$row['LastName'];
            $BloodGroup=$row['BloodGroup'];
            $NumberOfBags=$row['NumberOfBags'];
            $DateOfDonation=$row['DateOfDonation'];
            echo"
            <tr><td align=\"center\">$name</td>
            <td align=\"center\">$BloodGroup</td>
            <td align=\"center\">$NumberOfBags</td>
            <td align=\"center\">$DateOfDonation</td>
            <td align=\"center\"><a href=\"../controller/approve-controller.php?req_id=$rid\">Approve</a></td>
        </tr>";
        }
        echo"</table>";
    }else{
        echo "<center><h2>No Request Found<h2></center>";
    }
    ?>
</body>
</html>