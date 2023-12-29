<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
    
    require_once('../model/user-info-model.php'); 

    $id = $_COOKIE['id'];
    $row = userInfo($id);
    $flag = 0;
    if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    $row2 = UserInfo($id2);
    if($id!=$id2) $flag = 1;
    } 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Information</title>
</head>
<body>
    <br><br>
    <center>
    <?php

        if($flag==0) echo "<img src=\"../{$row['ProfilePicture']}\" width=\"100px\">";
        else echo "<img src=\"../{$row2['ProfilePicture']}\" width=\"100px\">";

    ?>
    </center>
    <br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <?php

                if($flag==0){
                    $fullname=$row['FirstName']." ".$row['LastName'];
                echo "<td>
                    Full Name : {$fullname} </font><br><br>
                    Username  : {$row['Username']} </font><br><br>
                    DOB       : {$row['DOB']} </font><br><br>
                    Religion  : {$row['Religion']} </font><br><br>
                    Phone     : {$row['Phone']} </font><br><br>
                    Email     : {$row['Email']} </font><br><br>
                    Address   : {$row['Address']} </font><br>
                </td>";

                }else{
                    $fullname=$row2['FirstName']." ".$row2['LastName'];
                echo "<td>
                    Full Name : {$fullname} </font><br><br>
                    Username  : {$row2['Username']} </font><br><br>
                    DOB       : {$row2['DOB']} </font><br><br>
                    Religion  : {$row2['Religion']} </font><br><br>
                    Phone     : {$row2['Phone']} </font><br><br>
                    Email     : {$row2['Email']} </font><br><br>
                    Address   : {$row2['Address']} </font><br>
                </td>";

                }

            ?>
        </tr>
    </table>
</body>
</html>