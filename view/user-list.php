<?php
require_once('../model/user-info-model.php');
$result=alluser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a>
<br><br>
<center>
        <h1>User List</h1>
        <hr width="20%" color="orange"><br>
        <table border="0"><tr><td><input type="text" name="search" onkeypress="searchUser(this.value)" placeholder="Search By Name"></td></tr></table>
        <br><br>
    </center>
    <?php
    if(mysqli_num_rows($result) > 0) {
        echo"<table align=\"center\" width=\"60%\" border=\"1\" cellpadding=\"15\" cellspacing=\"0\" bgcolor=\"white\" >
        <tr><td align=\"center\">Name</td>
            <td align=\"center\">Email</td>
            <td align=\"center\">Action</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $uid=$row['UserID'];
            $name=$row['FirstName']." ".$row['LastName'];
            $email=$row['Email'];
            echo"
            <tr><td align=\"center\">$name</td>
            <td align=\"center\">$email</td>
            <td align=\"center\"><a href=\"../controller/userupdate-controller.php?id=$uid\">Update</a></td>
        </tr>";
        }
        echo"</table>";
    }else{
        echo "<center><h2>No User Found<h2></center>";
    }
    ?>
</body>
</html>