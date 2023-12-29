<?php
require_once('database.php');

function allbloodreq(){
    $conn=dbConnection();
    $sql="select userinfo.FirstName,userinfo.LastName,bloodrequest.BloodGroup,bloodrequest.NumberOfBags,bloodrequest.DateOfDonation,bloodrequest.Status,bloodrequest.RequestID from userinfo,bloodrequest where userinfo.UserID =bloodrequest.UserID and bloodrequest.Status='Pending'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function updatebloodinfo($req_id,$id){
    $conn=dbConnection();
    $sql="update bloodrequest set Status = 'Approved' where RequestID ='$req_id'";
    $result = mysqli_query($conn, $sql);
    $date=date('Y-m-d');
    $sql1="insert into approvalhistory values('','$req_id','$id','$date') ";
    $result = mysqli_query($conn, $sql1);
    return true;
}
?>