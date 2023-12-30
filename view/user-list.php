<?php
require_once('../model/user-info-model.php');
$result = UserModel::getInstance()->alluser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a>
<br><br>
<center>
        <h1>User List</h1>
        <hr width="20%" color="orange"><br>
        <table border="0"><tr><td><input type="text" name="search" onkeyup="live(this.value)" placeholder="Search By Name"></td></tr>
        </table>
        <br>
        <font id="message"></font>
        <br><br>
    </center>
    <?php
    if(mysqli_num_rows($result) > 0) {
        echo"<table align=\"center\" width=\"60%\" border=\"1\" cellpadding=\"15\" cellspacing=\"0\" bgcolor=\"white\" class=\"table\">
        <tr><td align=\"center\">Name</td>
            <td align=\"center\">Blood Group</td>
            <td align=\"center\">Date Of Birth</td>
            <td align=\"center\">Email</td>
            <td align=\"center\">Role</td>
            <td align=\"center\">Action</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $uid=$row['UserID'];
            $name=$row['FirstName']." ".$row['LastName'];
            $email=$row['Email'];
            $dob=$row['DOB'];
            $BG=$row['BloodGroup'];
            $role=$row['Role'];
            echo"
            <tr><td align=\"center\">$name</td>
            <td align=\"center\">$BG</td>
            <td align=\"center\">$dob</td>
            <td align=\"center\">$email</td>
            <td align=\"center\">$role</td>
            <td align=\"center\"><a href=\"../view/view-information.php?id=$uid\">View Information</a></td>
        </tr>";
        }
        echo"</table>";
    }else{
        echo "<center><h2>No User Found<h2></center>";
    }
    ?>
</body>
</html>