<?php

require_once('database.php');

class UserModel {
    private $con;
    private static $instance;

    public function __construct() {
        $this->con = dbConnection();
    }

    public static function getInstance() {
        if (!UserModel::$instance) {
            UserModel::$instance = new UserModel();
        }
        return UserModel::$instance;
    }
    
    public function login($email, $password) {
        $sql = "SELECT * FROM UserInfo WHERE email ='{$email}' AND password ='{$password}'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    public function addUser($firstName, $lastName, $email, $password, $bloodGroup, $dob, $gender, $country, $phone, $role) {
        $sql = "INSERT INTO UserInfo VALUES('', '{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$bloodGroup}', '{$dob}', '{$gender}', '{$country}', '{$phone}', 'uploads/images/default_pfp.png', '{$role}')";

        return mysqli_query($this->con, $sql);
    }

    public function updateUser($id, $firstName, $lastName, $email, $bloodGroup, $dob, $gender, $country, $phone) {
        $sql = "UPDATE userinfo SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', BloodGroup = '$bloodGroup', DOB = '$dob', Gender = '$gender', Country = '$country', Phone = '$phone' WHERE UserID = '$id'";

        return mysqli_query($this->con, $sql);
    }

    public function userInfo($id) {
        $sql = "SELECT * FROM UserInfo WHERE UserID='$id'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    public function alluser() {
        $sql = "SELECT * FROM UserInfo WHERE Role NOT LIKE 'Manager'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function getUserByMail($email) {
        $sql = "SELECT * FROM UserInfo WHERE Email = '$email'";
        $result = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    public function updateProfilePicture($imagename, $id) {
        $sql = "UPDATE UserInfo SET ProfilePicture = '{$imagename}' WHERE UserID = '{$id}'";

        return mysqli_query($this->con, $sql);
    }

    public function searchuser($name) {
        $sql = "SELECT * FROM userinfo WHERE CONCAT(FirstName,LastName) LIKE'%$name%' AND Role NOT LIKE 'Manager'";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function getPatientCount($gender = "") {
        $sql = "SELECT COUNT(UserID) as count FROM userinfo WHERE Role = 'Patient'";
        if (!empty($gender)) $sql .= " AND Gender = '$gender'";
        $result = mysqli_query($this->con, $sql);
        return mysqli_fetch_assoc($result)['count'];
    }

    public function changePassword($id, $newpass) {
        $sql = "UPDATE UserInfo SET Password = '$newpass' WHERE UserID = '$id'";

        return mysqli_query($this->con, $sql);
    }

    public function uniqueEmail($email) {
        $sql = "SELECT email FROM userinfo WHERE email = '{$email}'";
        $result = mysqli_query($this->con, $sql);
        $count = mysqli_num_rows($result);

        return $count === 0;
    }
}

?>
