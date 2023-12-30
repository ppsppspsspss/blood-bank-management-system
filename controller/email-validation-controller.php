<?php 

    require_once('../model/user-info-model.php');

    $email = $_REQUEST['email'];
    $status = UserModel::getInstance()->uniqueEmail($email);

    if ($status === false) echo "This email already belongs to another account<br>";
    else echo "This email is available<br>";

?>