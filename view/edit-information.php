<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
    require_once('../model/user-info-model.php');    
  
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $firstNameMsg = $phoneMsg = $bloodGroupMsg = $dobMsg = $genderMsg = $countryMsg = $lastNameMsg = $emailMsg = $usernameMsg = $passwordMsg =  $cpasswordMsg =  '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'fullnameEmpty': {
            $fullnameMsg = "Fullname can not be empty.";
            break;
        }
        case 'phoneEmpty': {
            $phoneMsg = "Phone number can not be empty.";
            break;
        }
        case 'addressEmpty': {
            $addressMsg = "Address can not be empty.";
            break;
        }
        case 'emailEmpty': {
            $emailMsg = "Email can not be empty.";
            break;
        }
        case 'dobEmpty': {
            $dobMsg = "Date of birth can not be empty.";
            break;
        }
        case 'religionEmpty': {
            $religionMsg = "Religion can not be empty.";
            break;
        }
        case 'usernameEmpty': {
            $usernameMsg = "Username can not be empty.";
            break;
        }
        case 'fullnameInvalid': {
            $fullnameMsg = "Fullname is not valid.";
            break;
        }
        case 'phoneInvalid': {
            $phoneMsg = "Phone number is not valid.";
            break;
        }
        case 'emailInvalid': {
            $emailMsg = "Email is not valid.";
            break;
        }
        case 'emailExists': {
            $emailMsg = "Email already exists.";
            break;
        }
        case 'usernameInvalid': {
            $usernameMsg = "Username is not valid.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'changed': {
        $success_msg = "Information successfully updated.";
        break;
      }
  }
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <table width="23%" border="1" cellspacing="0" cellpadding="25" align="center" class="table">
        <tr>
            <td>
                <form method="post" action="../Controller/edit-information-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1>Edit Information</h1>
                    First Name
                    <input type="text" name="firstName" size="43px">
                    <?php if (strlen($firstNameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $firstNameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Last Name
                    <input type="text" name="lastName" size="43px">
                    <?php if (strlen($lastNameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $lastNameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Phone Number
                    <input type="text" name="phone" size="43px">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Email
                    <input type="email" name="email" size="43px">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Password
                    <input type="password" name="password" size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Confirm Password
                    <input type="password" name="cpassword" size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Blood Group &nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="bloodGroup">
                        <option value="B+">B+</option>
                        <option value="B+">A+</option>
                        <option value="B+">O+</option>
                        <option value="B+">A-</option>
                        <option value="B+">AB+</option>
                    </select>
                    <?php if (strlen($bloodGroupMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $bloodGroupMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="date" name="dob" size="43px">
                    <?php if (strlen($dobMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $dobMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Gender &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                    <input type="radio" name="gender" value="Other"> Other
                    <?php if (strlen($genderMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $genderMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Country &nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="country">
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="India">India</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Other">Other</option>
                    </select>
                    <?php if (strlen($countryMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $countryMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <button class="btn submit">Create Account</button>
                </form>
            </td>
        </tr>
    </table>
    
</body>
</html>