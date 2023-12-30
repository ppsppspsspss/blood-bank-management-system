<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong username or password.";
        break;
      }
    case 'accessDenied': {
        $error_msg = "You need to sign in first.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
    case 'signIn': {
        $error_msg = "Sign in to gain access.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please sign in.";
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
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br><br><br>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" class="table">
        <tr>
            <td>
                <form method="post" action="../controller/sign-in-controller.php">
                    <h1>Sign In</h1>
                    Email
                    <input type="email" name="email" size="43px">
                    <br><font color="red" id="emailError"></font><br>
                    Password
                    <input type="password" name="password" size="43px">
                    <br><br>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <font color="red" align="center"><?= $error_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?><br>
                    <center><button size="250px" name="submit" class="btn submit">Sign In</button></center>
                    <br><br>
                    </form>
                    <hr width="auto" color="orange"><br>
                    Dont have an account?
                    <br><br>
                    <a href="sign-up.php"><center><button name="submit" class="btn submit">Sign Up</button></center></a>
            </td>
        </tr>
    </table>
</body>
</html>