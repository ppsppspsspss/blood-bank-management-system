<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
    require_once('../model/user-info-model.php'); 
    $id = $_COOKIE['id'];
    $row = UserModel::getInstance()->userInfo($id);
    $flag = 0;
    if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    $row2 = UserModel::getInstance()->UserInfo($id2);
    if($id!=$id2) $flag = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>View Information</title>
</head>
<body>
<?php if($flag == 0) echo "<a href=\"profile.php\" class=\"backButton\">&#8249;</a>"; ?>
<?php if($flag == 1) echo "<a href=\"user-list.php\" class=\"backButton\">&#8249;</a>"; ?>

    <br><br>
    <center>
    <?php

        if($flag==0) echo "<img src=\"../{$row['ProfilePicture']}\" width=\"100px\">";
        else echo "<img src=\"../{$row2['ProfilePicture']}\" width=\"100px\">";

    ?>
    </center>
    <br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center" class="table">
        <tr>
            <?php

                if($flag==0){
                    $fullname=$row['FirstName']." ".$row['LastName'];
                echo "<td>
                    Full Name : {$fullname} </font><br><br>
                    Email  : {$row['Email']} </font><br><br>
                    Date Of Birth       : {$row['DOB']} </font><br><br>
                    Blood Group  : {$row['BloodGroup']} </font><br><br>
                    Gender     : {$row['Gender']} </font><br><br>
                    Country     : {$row['Country']} </font><br><br>
                    Phone   : {$row['Phone']} </font><br>
                    </td>";
                }else{
                    $fullname = $row2['FirstName']." ".$row2['LastName'];
                echo "<td>
                Full Name : {$fullname} </font><br><br>
                Email  : {$row2['Email']} </font><br><br>
                Date Of Birth       : {$row2['DOB']} </font><br><br>
                Blood Group  : {$row2['BloodGroup']} </font><br><br>
                Gender     : {$row2['Gender']} </font><br><br>
                Country     : {$row2['Country']} </font><br><br>
                Phone   : {$row2['Phone']} </font><br>
                </td>";
                }

            ?>
        </tr>
    </table>
</body>
</html>