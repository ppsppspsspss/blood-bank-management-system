<?php
session_start();

session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');

require('../model/userModel.php');

$importfailed = '';
$show = false;

if (isset($_POST['import'])) {
    $randomUUID = $_POST['randomUUID'];
    $donor = getUserByMail($_POST['email']);
    $show = true;
    if ($donor === false || $donor['role'] != 'donor') {
        $importfailed = "No donor found";
        $donor = [
            'firstname' => "empty",
            'lastname' => "",
            'bloodG' => "empty",
            'dob' => "empty",
            'gender' => "empty",
            'phone' => "empty",
            'email' => "empty",
        ];
        $show = false;
    }
} else {
    $randomUUID = random_int(100000000, 999999999);
    $donor = [
        'firstname' => "empty",
        'lastname' => "",
        'bloodG' => "empty",
        'dob' => "empty",
        'gender' => "empty",
        'phone' => "empty",
        'email' => "empty",
    ];
}

$logged_user = userInfo($_COOKIE['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Schedule</title>
</head>

<body>
<?php require("header.php"); ?>

    <center>
        <table cellspacing="0" cellpadding="10">
            <tr>
                <td align="center">
                    <fieldset>
                        <legend align="center">
                            <h3>Create New Schedule</h3>
                        </legend>
                        <form action="" method="post">
                            <input type="hidden" name="randomUUID" value="<?= $randomUUID ?>">
                            <table cellspacing="0" cellpadding="10">
                                <tr>
                                    <td><strong>Schedule ID : </strong></td>
                                    <td>
                                        <?= $randomUUID ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Donate Date: </strong></td>
                                    <td> <input type="date" name="donate_date" id="donate_date"
                                            value="<?php if (isset($_POST['donate_date']))
                                                echo $_POST['donate_date'] ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Donor Email: </strong></td>
                                        <td> <input type="email" name="email" id="email"
                                                value="<?php if (isset($_POST['email']))
                                                echo $_POST['email'] ?>"> </td>
                                    </tr>

                                    <tr>
                                        <td align="right" colspan="2">
                                            <input type="submit" name="import" value="import"> <br>
                                        <?= $importfailed ?>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <p>
                        <h3>Donor Details</h3>
                        </p>
                        <table cellpadding="5">
                            <tr>
                                <td><b>Name: </b></td>
                                <td>
                                    <?= $donor['firstname'] . " " . $donor['lastname'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Blood Group: </b></td>
                                <td>
                                    <?= $donor['bloodG'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Gender:</b> </td>
                                <td>
                                    <?= $donor['gender'] ?>
                                </td>
                            </tr>

                            <tr>
                                <td><b>Phone: </b></td>
                                <td>
                                    <?= $donor['phone'] ?>
                                </td>
                            </tr>
                        </table>
                        <?php if ($show) {
                            ?>
                            <form action="../controller/add-schedule.php" method="post">
                                <input type="hidden" name="name" value="<?= $donor['firstname'] . " " . $donor['lastname'] ?>">
                                <input type="hidden" name="email" value="<?= $donor['email'] ?>">
                                <input type="hidden" name="bloodG" value="<?= $donor['bloodG'] ?>">
                                <input type="hidden" name="gender" value="<?= $donor['gender'] ?>">
                                <input type="hidden" name="phone" value="<?= $donor['phone'] ?>">
                                <input type="hidden" name="donate_date" value="<?= $_POST['donate_date'] ?>">
                                <input type="hidden" name="added_by" value="<?= $logged_user['email'] ?>">
                                <input type="hidden" name="id" value="<?= $randomUUID ?>">
                                <br><br>
                                <input type="submit" name="create" value="Create">
                            </form>
                            <?php
                        } ?>
                    </fieldset>
                </td>
            </tr>
        </table>
    </center>
    <?php require("footer.php"); ?>
</body>

</html>