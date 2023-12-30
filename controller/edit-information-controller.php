<?php
require("../model/user-info-model.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $bloodGroup = $_POST['bloodGroup'];

    if (!isValidName($firstName)) {
        header('location: ../view/edit-information.php?err=firstNameInvalid');
        exit();
    }
    if (!isValidName($lastName)) {
        header('location: ../view/edit-information.php?err=lastNameInvalid');
        exit();
    }
    if (!isValidEmail($email)) {
        header('location: ../view/edit-information.php?err=emailInvalid');
        exit();
    }
    if (!isValidPhone($phone, $country)) {
        header('location: ../view/edit-information.php?err=firstNameEmpty');
        exit();
    }
    if (!isValidBloodGroup($bloodGroup)) {
        header('location: ../view/edit-information.php?err=invalidBloodGroup');
        exit();
    }


    UserModel::getInstance()->updateUser($id, $firstName, $lastName, $email, $bloodGroup, $dob, $gender, $country, $phone);
    header('Location: ../view/edit-information.php');

} else
    header('Location: ../view/edit-information.php');

// validation functions
function isValidEmail($email)
{
    $atIndex = strpos($email, '@');
    $dotIndex = strpos($email, '.');

    if ($atIndex === false || $dotIndex === false) {
        return false;
    }
    if ($atIndex === 0 || $dotIndex === (strlen($email) - 1)) {
        return false;
    }

    if (strpos($email, '..') !== false) {
        return false;
    }

    if (strpos($email, '.@') !== false) {
        return false;
    }

    if (strpos($email, '@.') !== false) {
        return false;
    }

    if (strpos($email, ' ') !== false) {
        return false;
    }

    return true;
}

function isValidName($name) 
{

    if (strlen($name) < 3)
        return false;

    for ($i = 0; $i < strlen($name); $i++) { 
        $character = $name[$i];

        if (!ctype_alpha($character) && $character !== ' ' && $character !== '.') {
            return false;
        }
    }

    return true;
}

function isValidBloodGroup($group)
{
    $available = array('A+', 'A-', 'B+', 'O+', 'AB+');
    if (array_search($group, $available) === false) {
        return false;
    }
    return true;

}

function isValidPassword($password)
{
    if (strlen($password) < 8)
        return false;
    return true;
}

function isValidPhone($phone, $region)
{
    $regions = array(
        'India' => 5,
        'United Kingdom' => 11,
        'Bangladesh' => 11,
        'US' => 11,
        'Other' => 11
    );

    if (strlen($phone) != $regions[$region])
        return false;

    $allowedCharacters = '0123456789';

    for ($i = 0; $i < strlen($phone); $i++) {
        $character = $phone[$i];

        if (strpos($allowedCharacters, $character) === false) {
            return false;
        }
    }

    return true;
}

?>