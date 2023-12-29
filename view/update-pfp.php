<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:sign-in.php?err=signIn');
$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "No file selected.";
        break;
      }
    case 'failed': {
        $error_msg = "Profile picture update failed.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'uploaded': {
        $success_msg = "Profile picture successfully updated.";
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
    <title>Update Profile Picture</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
    <form action="../controller/update-pfp-controller.php" method="POST" enctype="multipart/form-data">
    <br><br>
        <h1>Update Profile Picture</h1>
        <hr color="orange" width="530px">
        <br><br><br>
        <table cellspacing="0" cellpadding="10" border=1 class="table">
            <tr>
                <td>
                    <input type="file" name="myfile" accept=".png,.jpg,.jpeg"><br><br>
                    <button class="btn submit">Upload Image</button>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <center><font color="red" align="center"><?= $error_msg ?></font></center>
                        <br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <center><font color="green" align="center"><?= $success_msg ?></font></center>
                        <br>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>