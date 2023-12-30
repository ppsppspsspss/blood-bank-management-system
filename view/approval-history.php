<?php
require_once('../model/approve-model.php');
$id=$_COOKIE['id'];
$result = ApproveModel::getInstance() -> allapprovedreq($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Approve History</title>
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a><br><br>
<center>
        <h1>Approve History</h1>
        <hr width="30%" color="orange"><br>
        <br><br>
    </center>
    <?php
    if(mysqli_num_rows($result) > 0) {
        echo"<table align=\"center\" width=\"60%\" border=\"1\" cellpadding=\"15\" cellspacing=\"0\" bgcolor=\"white\" >
        <tr><td align=\"center\">Name</td>
            <td align=\"center\">Approval Date</td>
            <td align=\"center\">Blood Group</td>
            <td align=\"center\">Number Of Bags</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $bag=$row['NumberOfBags'];
            $name=$row['FirstName']." ".$row['LastName'];
            $date=$row['ApprovalDate'];
            $BG=$row['BloodGroup'];
            echo"
            <tr><td align=\"center\">$name</td>
            <td align=\"center\">$date</td>
            <td align=\"center\">$BG</td>
            <td align=\"center\">$bag</td>
        </tr>";
        }
        echo"</table>";
    }else{
        echo "<center><h2>No Approval History Found<h2></center>";
    }
    ?>  
</body>
</html>