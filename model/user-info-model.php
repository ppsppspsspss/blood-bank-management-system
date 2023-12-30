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
        $sql = "insert into UserInfo values('', '{$firstName}' ,'{$lastName}' ,'{$email}', '{$password}', '{$bloodGroup}', '{$dob}', '{$gender}', '{$country}', '{$phone}', 'uploads/images/default_pfp.png', '{$role}')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }

    function userInfo($id){

        $con=dbConnection();
        $sql="select* from UserInfo where UserID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }
    function alluser(){
        $conn=dbConnection();
        $sql="select * from UserInfo where Role not like 'Manager'";
        $result=mysqli_query($conn,$sql);
        return $result;
    }

    function getUserByMail($email){

        $con=dbConnection();
        $sql="select * from UserInfo where Email = '$email'";

        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
        
    }

    function updateProfilePicture($imagename, $id){

        $con = dbConnection();
        $sql = "update UserInfo set ProfilePicture = '{$imagename}' where UserID = '{$id}'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function searchuser($name){
        $conn=dbConnection();
        $sql="SELECT * FROM userinfo WHERE FirstName OR LastName LIKE'%$name%'";
        $result=mysqli_query($conn,$sql);
        return $result;
    }

    function getPatientCount($gender = ""){
        $conn=dbConnection();
        $sql="SELECT COUNT(UserID) as count FROM userinfo WHERE Role = 'Patient'";
        if(!empty($gender)) $sql .= " and Gender = '$gender'";
        $result=mysqli_query($conn,$sql);
        return mysqli_fetch_assoc($result)['count'];
    }

    function changePassword($id, $newpass){

        $con = dbConnection();
        $sql = "update UserInfo set Password = '$newpass' where UserID = '$id'";

        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

    function uniqueEmail($email){

        $con = dbConnection();
        $sql = "select email from userinfo where email = '{$email}'";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count > 0) return false;
        else return true; 
        
    }


    

?>