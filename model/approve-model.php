<?php
require_once('../model/database.php');

function allapprovedreq($id){
    $conn=dbConnection();
    $sql="select userinfo.FirstName,userinfo.LastName,bloodrequest.BloodGroup,bloodrequest.NumberOfBags,bloodrequest.RequestID,bloodrequest.UserID,approvalhistory.ApprovalDate from approvalhistory,bloodrequest,userinfo where userinfo.UserID =bloodrequest.UserID and approvalhistory.RequestID=bloodrequest.RequestID and approvalhistory.UserID='$id'";
    $result=mysqli_query($conn,$sql);
    return $result;
}

?>

