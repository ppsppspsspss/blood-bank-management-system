<?php
session_start();
require_once('../model/user-info-model.php');
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=accessDenied');

$emailMsg = "";
$donor = null;
if(isset($_GET['donorEmail'])){
    $donor = UserModel::getInstance()->getUserByMail($_GET['donorEmail']);
    if($donor && $donor['Role'] !== "Donor") {
        $donor = null;
        $emailMsg = "No donor found with this email.";
    }
    else if(empty($_GET['donorEmail'])) $emailMsg = "Invalid value provided.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Create New Schedule</title>
</head>
<body>
<a href="manager-home.php" class="backButton">&#8249;</a><br><br>
<table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
    <tr>
        <td>
            <form action="" method="get">
                Donor Email <br>
                <input type="email" name="donorEmail">
                <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                <br><br>
                <button type="submit" class="btn submit">Import</button>
            </form>
            <br><br>
            <form action="../controller/create-new-schedule-controller.php" method="post">
                Schedule Date &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="date" name="scheduleDate">
                <br><br>
                <h1>Donor Information</h1>
                Name : <?php if($donor != null) {echo $donor['FirstName'] . " " . $donor['LastName']; } else echo "Empty" ?> <br><br>
                Blood Group : <?php if($donor != null) {echo $donor['BloodGroup']; } else echo "Empty" ?> <br><br>
                Gender : <?php if($donor != null) {echo $donor['Gender']; } else echo "Empty" ?> <br><br>
                Phone Number : <?php if($donor != null) {echo $donor['Phone']; } else echo "Empty" ?> <br><br>
                <?php 
                    if($donor != null) {
                        ?>
                            <button type="submit"  class="btn submit">Create Schedule</button>
                            <input type="hidden" name="name" value="<?= $donor['FirstName'] . $donor['LastName'] ?> ">
                            <input type="hidden" name="email" value="<?= $donor['Email']?> ">
                            <input type="hidden" name="phone"  value="<?= $donor['Phone']?> ">
                            <input type="hidden" name="bloodG"  value="<?= $donor['BloodGroup']?> ">
                            <input type="hidden" name="gender"  value="<?= $donor['Gender']?> ">
                            <input type="hidden" name="added_by"  value="<?= UserModel::getInstance()->userInfo($_COOKIE['id'])['Email'] ?> ">
                        <?php
                    }
                ?>
            </form>
        </td>
    </tr>
</table>

</body>
</html>