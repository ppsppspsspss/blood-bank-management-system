<?php

require("validation.php");
require("../model/user-info-model.php");

if (isset($_POST['submit_button'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $bloodGroup = $_POST['bloodGroup'];
    $role = "Manager";

    if(
        isValidName($firstName) &&
        isValidName($lastName) &&
        isValidEmail($email) &&
        isValidPassword($password) &&
        isValidPhone($phone, $country) &&
        isValidBloodGroup($bloodGroup)
    ){
        
    }
    else{ 
        header('location: ../view/signup.php?err=invalid');
        exit();
    }

    addUser($firstName, $lastName, $email, $password, $bloodGroup, $dob, $gender, $country, $phone, $role);
    header('Location: ../view/login.php');

} else header('Location: ../view/signup.php');

?>


 
