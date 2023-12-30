<?php

session_start();

    require_once('../model/user-info-model.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

        header('location:../View/sign-in.php?err=empty');
        return;

    }

    $status = UserModel::getInstance()->login($email, $password);

    if($status!=false){

        $_SESSION['flag'] = "true";
        setcookie("id", $status['UserID'], time()+99999999999, "/");
        header('location:../view/manager-home.php');

    }
    else header('location:../view/sign-in.php?err=mismatch');
        

?>