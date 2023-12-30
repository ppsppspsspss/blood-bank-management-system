<?php

$firstNameMsg = $phoneMsg = $bloodGroupMsg = $dobMsg = $genderMsg = $countryMsg = $lastNameMsg = $emailMsg = $usernameMsg = $passwordMsg =  $cpasswordMsg =  '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'firstNameInvalid': {
        $firstNameMsg = "First name is invalid.";
        break;
      }
    case 'lastNameInvalid': {
        $lastNameMsg = "Last name is invalid.";
        break;
      }
    case 'emailEmpty': {
        $emailMsg = "Email can not be empty.";
        break;
      }
    case 'usernameEmpty': {
        $usernameMsg = "Username can not be empty.";
        break;
      }
    case 'passwordEmpty': {
        $passwordMsg = "Password can not be empty.";
        break;
      }
    case 'cpasswordEmpty': {
        $cpasswordMsg = "Confirm password can not be empty.";
        break;
      }
    case 'fullnameInvalid': {
        $fullnameMsg = "Fullname is not valid.";
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
    case 'passwordInvalid': {
        $passwordMsg = "Password is not valid.";
        break;
      }
    case 'passwordMismatch': {
        $cpasswordMsg = "Passwords do not match.";
        break;
      }
    case 'invalidBloodGroup': {
        $cpasswordMsg = "Blood group is not valid.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <a href="sign-in.php" class="backButton">&#8249;</a>
    <br><br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
        <tr>
            <td>
                <form method="post" action="../controller/sign-up-controller.php" onsubmit="return validateSignUpForm(this);">
                    <h1>Sign Up</h1>
                    First Name
                    <input type="text" name="firstName" id="firstName" size="43px">
                    <?php if (strlen($firstNameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $firstNameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="firstNameError"></font><br>
                    Last Name
                    <input type="text" name="lastName" id="lastName" size="43px">
                    <?php if (strlen($lastNameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $lastNameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="lastNameError"></font><br>
                    Phone Number
                    <input type="text" name="phone" id="phone" size="43px">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="phoneError"></font><br>
                    Email
                    <input type="email" name="email" id="email" size="43px">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="emailError"></font><br>
                    Password
                    <input type="password" name="password" id="password" size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="passwordError"></font><br>
                    Confirm Password
                    <input type="password" name="cpassword" id="cpassword" size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="cpasswordError"></font><br>
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
                    <input type="date" name="dob" id="dob" size="43px">
                    <?php if (strlen($dobMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $dobMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="dobError"></font><br>
                    Gender &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="Male" id="gender1"> Male
                    <input type="radio" name="gender" value="Female" id="gender2"> Female
                    <input type="radio" name="gender" value="Other" id="gender3"> Other
                    <?php if (strlen($genderMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $genderMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="genderError"></font><br>
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
    <br><br><br>
</body>
</html>