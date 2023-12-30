<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
    require_once('../model/user-info-model.php');    
  
    $id = $_COOKIE['id'];
    $row = UserModel::getInstance()->userInfo($id);

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
    <script src="javascript/script.js"></script>
</head>
<body>
<a href="settings.php" class="backButton">&#8249;</a><br><br><br>
    <table width="23%" border="1" cellspacing="0" cellpadding="25" align="center" class="table">
        <tr>
            <td>
                <form method="post" action="../Controller/edit-information-controller.php" novalidate autocomplete="off" onsubmit="return validateEditInfoForm(this);">
                    <input type="hidden" name="id" value="<?= $id ?> ">
                    <h1>Edit Information</h1>
                    First Name
                    <input type="text" name="firstName" id="firstName" size="43px" value="<?php echo $row['FirstName'] ?>">
                    <?php if (strlen($firstNameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $firstNameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="firstNameError"></font><br>
                    Last Name
                    <input type="text" name="lastName" id="lastName" size="43px" value="<?php echo $row['LastName'] ?>">
                    <?php if (strlen($lastNameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $lastNameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="lastNameError"></font><br>
                    Phone Number
                    <input type="text" name="phone" id="phone" size="43px" value="<?php echo $row['Phone'] ?>">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="phoneError"></font><br>
                    Email
                    <input type="email" name="email" id="email" size="43px" value="<?php echo $row['Email'] ?>" onkeyup="checkEmailValidity(this.value)">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="emailError"></font><br>
                    Blood Group &nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="bloodGroup" value="<?php echo $row['BloodGroup'] ?>">
                        <option value="B+">B+</option>
                        <option value="A+">A+</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="AB+">AB+</option>
                    </select>
                    <?php if (strlen($bloodGroupMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $bloodGroupMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="date" type="date" name="dob" id="dob" size="43px" value="<?php echo date('Y-m-d',strtotime($row["DOB"])) ?>">
                    <?php if (strlen($dobMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $dobMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="dobError"></font><br>
                    <?php $gender=$row['Gender'] ?>
                    Gender &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" id="gender1" value="Male" <?php if($gender=="Male") echo "checked" ?>> Male
                    <input type="radio" name="gender" id="gender2" value="Female" <?php if($gender=="Female") echo "checked" ?>> Female
                    <input type="radio" name="gender" id="gender3" value="Other" <?php if($gender=="Others") echo "checked" ?>> Other
                    <?php if (strlen($genderMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $genderMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="genderError"></font><br>
                    Country &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $country=$row['Country'];
                    ?>
                    <select name="country">
                        <option value="Bangladesh" <?php if($country=="Bangladesh") echo "selected"?>>Bangladesh</option>
                        <option value="India" <?php if($country=="India") echo "selected"?>>India</option>
                        <option value="United Kingdom" <?php if($country=="United Kingdom") echo "selected"?>>United Kingdom</option>
                        <option value="United States" <?php if($country=="United States") echo "selected"?>>United States</option>
                        <option value="Other" <?php if($country=="Other") echo "selected"?>>Other</option>
                    </select>
                    <?php if (strlen($countryMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $countryMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <button class="btn submit" id="button">Update Account Info</button>
                </form>
            </td>
        </tr>
    </table>
    <br><br>
</body>
