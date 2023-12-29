<?php 

require_once('database.php');

    function login($email, $password){

        $con = dbConnection();
        $sql = "select * from UserInfo where email ='{$email}' and password ='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
        }
        else return false;

    }

    function addUser($firstName, $lastName, $email, $password, $bloodGroup, $dob, $gender, $country, $phone, $role){

        $con = dbConnection();
        $sql = "insert into UserInfo values('', '{$firstName}' ,'{$lastName}' ,'{$email}', '{$password}', '{$bloodGroup}', '{$dob}', '{$gender}', '{$country}', '{$phone}', 'uploads\images\default_pfp.png', '{$role}')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }

?>