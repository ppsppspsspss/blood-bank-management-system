<?php
require_once('database.php');
function allbloodreq(){
    $conn=dbConnection();
    $sql="select userinfo.FirstName,userinfo.LastName,bloodrequest.BloodGroup,bloodrequest.NumberOfBags,bloodrequest.DateOfDonation,bloodrequest.Status,bloodrequest.RequestID from userinfo,bloodrequest where userinfo.UserID =bloodrequest.UserID and bloodrequest.Status='Pending'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
?>